<?php
date_default_timezone_set('Asia/Ho_Chi_Minh');

$dateNow = date('d/m/Y H');

$stmtkh = $conn->query("SELECT * FROM khachhang WHERE id_kh=$id_kh")->fetch();

if (isset($_GET['iddh'])) {
    $id_dh = $_GET['iddh'];
    $stmtctdh = $conn->query("SELECT * FROM chitietdonhang WHERE id_dh=$id_dh")->fetchAll();

    $kqstt = $conn->query("SELECT * FROM donhang INNER JOIN trangthaidonhang ON donhang.id_tt = trangthaidonhang.id_tt WHERE id_dh=$id_dh")->fetch();
    $kqvc = $conn->query("SELECT * FROM donhang INNER JOIN magiamgia ON donhang.id_vc = magiamgia.id_vc WHERE id_dh=$id_dh")->fetch();
    $id_vc = $kqvc['id_vc'];
    // $sql = $conn->query("SELECT * FROM magiamgia")->fetchAll();
    $kq = $conn->query("SELECT * FROM magiamgia WHERE id_vc=$id_vc")->fetch();
    // var_dump($kq);
    // echo "<pre>";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/ct_hd.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <style>
        .top-hd {
            margin-top: 50px;
        }

        .form-top-hd {
            text-align: center;

        }

        .form-top-hd>h4 {
            color: gray;
        }

        .form-left {
            margin: 30px 20px;
        }

        button>a {
            text-decoration: none;
            color: #fff;
        }

        .form-tt-sp>button {
            border-radius: 30px;
            background-color: #91da41;
            color: #fff;
            padding: 10px 20px;
            border: none;
            margin-left: 40px;
            margin-top: 30px;
        }
    </style>
</head>

<body>
    <section>
        <div class="top-hd">
            <div class="form-top-hd">
                <h4>Hóa đơn chi tiết</h4>
                <h3>Đặt thực phẩm 24/7 Vegafodds</h3>
                <span>Thời Gian :<?php echo $kqstt['time'] ?></span><br>
                <span><b>Mã hóa đơn :</b></span><strong><?php echo $id_dh ?></strong>
            </div>
        </div>
        <form action="">
            <div class="form-left">
                <span><b>Tên Khách hàng:</b></span> <?php echo $stmtkh['user'] ?><br>
                <span><b>Số điện thoại: </b></span> <?php echo $stmtkh['phone'] ?><br>
                <span><b>Địa chỉ: </b></span> <?php echo $kqvc['address'] ?><br>
                <span><b>Hình thức thanh toán: </b></span> <?php echo $kqvc['payments'] ?><br>
                <span><b>Voucher(nếu có): </b></span> <?= $kqvc['code'] ?>
            </div>
            <div class="form-tt-sp">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <td>STT</td>
                            <td>Tên sản phẩm</td>
                            <td>Hình ảnh</td>
                            <td>Số lượng</td>
                            <td>Đơn Giá</td>
                            <td>Thành tiền</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        $total = 0;
                        foreach ($stmtctdh as $key) {
                            $id_sp = $key['id_sp'];
                        ?>
                            <tr>
                                <td><?php echo $i++ ?> </td>
                                <?php
                                $kqsp = $conn->query("SELECT sanpham.*,chitietdonhang.* 
                                    FROM sanpham 
                                    INNER JOIN chitietdonhang ON sanpham.id_sp=chitietdonhang.id_sp
                                    WHERE sanpham.id_sp =$id_sp AND chitietdonhang.id_sp =$id_sp")->fetch();
                                ?>
                                <td><?php echo $kqsp['name'] ?> </td>
                                <td><img width="70px" src="../img/<?php echo $kqsp['img'] ?> " alt=""></td>

                                <td><?php echo $key['quantity'] ?> </td>
                                <td><?php echo $key['price'] ?> đ</td>
                                <td><?php echo number_format($key['price'] * $key['quantity']) ?> đ</td>
                            </tr>
                        <?php
                            $total += $key['price'] * $key['quantity'];
                        }
                        ?>
                        <tr>
                            <td>&nbsp;</td>
                            <td> Thành Tiền: <?php echo number_format($total) ?></td>
                            <td>&nbsp;</td>
                            <td><?php $sale = $kq['salemony'] * 100;
                                echo "Voucher giảm $sale% " ?></td>
                            <td><?php $lastPrice = ($total - ceil($total * $kq['salemony']));
                                ?></td>
                            <td><strong style="color: red;">Giá cuối: <?php echo number_format($lastPrice) ?>đ</strong></td>
                        </tr>
                    </tbody>
                </table>
                <button><a href="index.php?act=sanpham">Tiếp tục đặt hàng</a> </button>
            </div>

        </form>
    </section>

</body>

</html>