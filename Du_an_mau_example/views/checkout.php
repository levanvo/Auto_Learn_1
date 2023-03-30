<?php
date_default_timezone_set('Asia/Ho_Chi_Minh');

$order = isset($_SESSION['cart']) ? $_SESSION['cart'] : $_SESSION['cart'] = [];
// echo "<pre>";
// var_dump($order);

// var_dump($order);die;
$kqorder = $conn->query("SELECT * FROM khachhang WHERE id_kh=$id_kh")->fetch();

$dateNow = date('Y-m-d');
// echo $dateNow;
// var_dump($_POST['btn']);die;

if (isset($_POST['btn'])) {
    $tenkh = $_POST['tenkhachhang'];
    $sdt = $_POST['sodienthoai'];
    $diachichitiet = $_POST['diachichitiet'];
    $thanhpho = $_POST['thanhpho'];
    $quanhuyen = $_POST['quanhuyen'];
    $xaphuong = $_POST['xaphuong'];
    $ghichu = $_POST['ghichu'];
    $id_vc = $_POST['voucherInOrder'];
    if (isset($_POST['check_out_online'])) {
        $payments = $_POST['check_out_online'];
    } else {
        echo "<script>alert('Bạn đã chưa chọn hình thức đặt hàng!')</script>";
    }


    $adress = "$diachichitiet - " . "$xaphuong - " . "$quanhuyen - " . "$thanhpho";
    $insertOrder = "INSERT INTO donhang (id_kh,phone,address,note,time,payments,id_vc)
                VALUES ($id_kh,'$sdt','$adress','$ghichu','$dateNow','$payments','$id_vc')";
    $executeOrder = $conn->exec($insertOrder);


    $getBill = "SELECT * FROM  donhang ORDER BY id_dh ASC";
    $dataBill = $conn->query($getBill)->fetchAll();
    // $dataBill  = $smtBill->fetchAll();
    $endBill = end($dataBill);
    $bill_id = $endBill['id_dh'];

    foreach ($order as $key) {
        $id_sp = $key['id'];
        $price = $key['product_price'];
        $number = $key['product_number'];
        $sql = "INSERT INTO chitietdonhang (id_dh, id_sp, price, quantity) VALUES ('$bill_id','$id_sp','$price','$number')";
        $insertDetail = $conn->exec($sql);


        $kqpr = $conn->query("SELECT * FROM sanpham WHERE id_sp=$id_sp")->fetch();
        echo $quantity = $kqpr['quantity'];

        $soluongconlai = $quantity - $number;

        $sqlupdate = "UPDATE sanpham SET quantity='$soluongconlai' WHERE id_sp=$id_sp";
        $kqupdate = $conn->prepare($sqlupdate);
        $kqupdate->execute();
    }

    unset($_SESSION['cart']);
    echo "<script>alert('Bạn đã đặt hàng thành công!')</script>";
    echo "<script>location.href='index.php?act=in4'</script>";
}

// $kkkk=$conn->query("SELECT * FROM donhang INNER JOIN magiamgia ON donhang.id_vc=magiamgia.id_vc")->fetchAll();
// echo "<pre>";
// print_r($kkkk);
// echo $kkkk[5]['salemony'];

$total = 0;
$sqlvc = "SELECT * FROM magiamgia";
$kqvc = $conn->query($sqlvc)->fetchAll();


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="../css-model/css/checkout.css" />
</head>

<body>
    <div class="container">
        <main>
            <form action="" method="POST">
                <div class="check_out">
                    <div class="checkout__form">
                        <hr />
                        <h2 class="title__checkout">Thông tin khách hàng</h2>
                        <!-- <form action="" method="POST"> -->
                        <div class="form__content">
                            <div class="form__top">
                                <div class="form__top_left">
                                    <div class="form_name">
                                        <label for="">Họ và Tên<span>*</span></label> <br />
                                        <input type="text" style="padding-left: 10px;" id="" value="<?= $kqorder['user'] ?>" name="tenkhachhang" placeholder="  Vui lòng điền đầy đủ họ tên của bạn" />
                                    </div>
                                    <div class="form__phone">
                                        <label for="">Số điện thoại<span>*</span></label> <br />
                                        <input type="text" style="padding-left: 10px;" id="" value="<?= $kqorder['phone'] ?>" name="sodienthoai" placeholder="  Vui lòng điền số điện thoại của bạn" />
                                    </div>
                                    <div class="form_address">
                                        <label for="">Địa chỉ nhận hàng<span>*</span></label>
                                        <br />
                                        <input type="text" style="padding-left: 10px;" id="" name="diachichitiet" placeholder="  Vui lòng điền địa chỉ nhận hàng của bạn" />
                                    </div>
                                </div>

                                <div class="form__top_right">
                                    <div class="form_city">
                                        <label for="">Tỉnh/Thành Phố<span>*</span></label> <br />
                                        <input type="text" style="padding-left: 10px;" name="thanhpho" id="" placeholder="  Vui lòng điền tỉnh/thành phố của bạn" />
                                    </div>
                                    <div class="form__district">
                                        <label for="">Quận/Huyện<span>*</span></label> <br />
                                        <input type="text" style="padding-left: 10px;" name="quanhuyen" id="" placeholder="  Vui lòng điền quận/huyện của bạn" />
                                    </div>
                                    <div class="form_commune">
                                        <label for="">Phường/Xã<span>*</span></label> <br />
                                        <input type="text" style="padding-left: 10px;" name="xaphuong" id="" placeholder="  Vui lòng điền phường/xã của bạn" />
                                    </div>
                                </div>
                            </div>
                            <hr />
                            <h2 class="title__checkout">Thông tin thêm</h2>
                            <div class="form_note">
                                <label for="">Ghi chú</label> <br />
                                <textarea name="ghichu" style="padding: 10px;" id="" cols="83" rows="7" placeholder="  Ghi chú về giao hàng và nhận hàng"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="order_details">
                        <h2 class="title">Đơn hàng của bạn</h2>
                        <div class="cart-sub">
                            <div class="flex-cart-sub cart-sub-title">
                                <h4>Sản Phẩm</h4>
                                <h4>Tổng Cộng</h4>
                            </div>
                            <div class="cart__product">
                                <div class="cart-sub-list">
                                    <?php
                                    foreach ($order as $key) {
                                    ?>
                                        <div class="flex-cart-sub cart-sub-item">
                                            <span class="title__product">
                                                <?php echo $key['product_name'] ?>
                                                <span class="quantity">x <?php echo $key['product_number'] ?></span>
                                            </span>
                                            <span class="right-item"> <?php echo number_format($key['product_price'])  ?> đ</span>
                                        </div>
                                    <?php
                                        $total += $key['product_price'] * $key['product_number'];
                                    }
                                    ?>
                                    <div class="cart__total">
                                        <div class="flex-cart-sub total">
                                            <span class="title-total" style="color:red"> Tổng cộng: <?= number_format($total) ?>đ</span>
                                            <span style="color: red;font-size: 20px;">
                                                <?php
                                                $sale=0;
                                                $idVcInOrder = 0;
                                                if (isset($_POST['btn_voucher'])) {
                                                    $vc = $_POST['voucher'];
                                                    foreach ($kqvc as $key) {
                                                        if ($vc === $key['code'] && $key['quantity'] > 0) {
                                                            $idVcInOrder = $key['id_vc'];
                                                            $lastPrice = ($total - ceil($total * $key['salemony']));
                                                            $sale = $key['salemony'] * 100;
                                                            echo "Voucher giảm $sale% <br> còn : " . number_format($lastPrice)."đ";
                                                        }
                                                        else if($vc != $key['code'] && $vc===''){
                                                            // echo "voucher không tồn tại !";
                                                        }
                                                    }
                                                    
                                                } else {
                                                    echo number_format($total);
                                                }
                                                ?>
                                                </span>
                                        </div>
                                        <span class="VAT_cart">Đã bao gồm VAT (nếu có)</span>
                                    </div>
                                    <input type="hidden" value="<?= $idVcInOrder ?>" name="voucherInOrder">
                                </div>
                            </div>
                        </div>
                        <div class="check__out_card">
                            <input type="radio" name="check_out_online" value="Thanh toán online" />
                            <label for="" class="title__main">Thanh toán Online</label>
                            <br />
                            <div class="check_out_card_ATM">
                                <input type="radio" name="check_out_ATM" />
                                <label for="">Thanh toán bằng Thẻ ATM </label>
                                <div class="card__ATM">
                                    <div class="image__ATM">
                                        <img src="../img/doi-tac-07.jpg" alt="" />
                                    </div>

                                    <div class="image__ATM">
                                        <img src="../img/logo-Vietcom.png" alt="" />
                                    </div>

                                    <div class="image__ATM">
                                        <img src="../img/mbbank-la-ngan-hang-gi-co-tot-khong-4-652x367-1.jpg" alt="" />
                                    </div>

                                    <div class="image__ATM">
                                        <img src="../img/ngan-hang-BIDV.jpg" alt="" />
                                    </div>
                                </div>
                            </div>

                            <div class="check_out_card_CREDIT">
                                <input type="radio" name="check_out_ATM" />
                                <label for="">Thanh toán bằng Thẻ Visa, Master, JCB</label>
                                <div class="card_CREDIT">
                                    <div class="image_CREDIT">
                                        <img src="../img/images.png" alt="" />
                                    </div>

                                    <div class="image_CREDIT">
                                        <img src="../img/visa-5-logo-png-transparent.png" alt="" />
                                    </div>

                                    <div class="image_CREDIT">
                                        <img src="../img/1538191971_jcblogosvg.png" alt="" />
                                    </div>
                                </div>
                            </div>

                            <div class="card_COD">
                                <input type="radio" name="check_out_online" value="Thanh toán khi nhận hàng" />
                                <label for="" class="title__main">Thanh toán khi nhận hàng (COD)</label>
                            </div>
                            <div class="discount_code">
                                <form action="" method="POST">
                                    <input type="text" placeholder="  Nhập mã giảm giá (chỉ áp dụng 1 lần)" name="voucher" />
                                    <button type="submit" name="btn_voucher" class="btn__discount_code">Áp dụng</button>
                                </form>
                            </div>
                            <button type="submit" name="btn" style="cursor: pointer;" class="btn_check_out">Thanh Toán</button>
                        </div>
                    </div>
                </div>
            </form>
        </main>
    </div>
</body>

</html>