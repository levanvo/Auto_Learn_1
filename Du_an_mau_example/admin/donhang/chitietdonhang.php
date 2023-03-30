<?php
if (isset($_GET['ctdh']) && isset($_GET['idkh'])) {
    $id_dh = $_GET['ctdh'];
    $id_kh = $_GET['idkh'];

    $kqct = $conn->query("SELECT * FROM donhang WHERE id_dh=$id_dh")->fetch();

    $inner = "SELECT khachhang.*,donhang.* FROM khachhang
            INNER JOIN donhang ON khachhang.id_kh=donhang.id_kh
            WHERE donhang.id_kh=$id_kh AND id_dh=$id_dh";
    $kqinner = $conn->query($inner)->fetch();

    $stmtctdh = $conn->query("SELECT * FROM chitietdonhang WHERE id_dh=$id_dh")->fetchAll();

    $ssmstt = $conn->query("SELECT * FROM donhang INNER JOIN trangthaidonhang ON donhang.id_tt = trangthaidonhang.id_tt WHERE id_dh=$id_dh")->fetch();
    $ssmsvc = $conn->query("SELECT * FROM donhang INNER JOIN magiamgia ON donhang.id_vc = magiamgia.id_vc WHERE id_dh=$id_dh")->fetch();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <div class="container" style="margin: 40px;">
        <h2 style="text-align: center;font-size: 35px;">Chi tiết đơn hàng</h2>
        <h5>Tên khách hàng: <?php echo $kqinner['user'] ?></h5>
        <h5>Phone: <?php echo $kqct['phone'] ?></h5>
        <h5>Mã đơn hàng: <?php echo $kqct['id_dh'] ?></h5>
        <h5>Trạng thái đơn hàng: <?php echo $ssmstt['trangthai'] ?></h5>
        <h5>Mã giảm giá(nếu có): <?php echo $ssmsvc['code'] ?></h5>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table" style="margin-top: 30px;" class="table " width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th scope="col">STT</th>
                            <th scope="col">Tên sản phẩm</th>
                            <th scope="col">Hình ảnh</th>
                            <th scope="col">Số lượng</th>
                            <th scope="col">Đơn giá</th>
                            <th scope="col">Thành Tiền</th>
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
                            <td><?php $sale = $ssmsvc['salemony'] * 100;
                                echo "Voucher giảm $sale% " ?></td>
                            <td><?php $lastPrice = ($total - ceil($total * $ssmsvc['salemony']));
                                ?></td>
                            <td><strong style="color:red">Giá cuối: <?php echo number_format($lastPrice) ?>đ</strong></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>