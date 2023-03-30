<?php
$kqtt = $conn->query("SELECT * FROM donhang INNER JOIN trangthaidonhang ON donhang.id_tt = trangthaidonhang.id_tt 
WHERE id_kh=$id_kh
ORDER BY id_dh DESC");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css-model/css/in4.css">
    <link rel="stylesheet" href="../css-model/css/form.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" />

</head>

<body>
    <div class="wapper">
        <div class="text-banner">
            <h1>Trang khách hàng</h1>
            <!-- <form action="">
        <input placeholder="Tìm kiếm..." type="text">
        <button type="submit"><i class="fas fa-search"></i></button>
      </form> -->
        </div>

        <div class="grid_kh wrapper-tab">
            <div class="kh1 nav-tabs">
                <h3>Trang tài khoản</h3>
                <?php
                $kq = $conn->query("SELECT * FROM khachhang WHERE id_kh=$id_kh")->fetch();
                if ($kq['id_role'] == 2) {
                ?>
                    <span><b>Xin chào, <a href="#" style="text-decoration: none; color: #91ad41;"><?php echo $kq['user'] ?>!</a></b></span><br>
                    <span class="actives"><a href="#menu_1">Thông tin tài khoản</a></span><br>
                    <span><a href="#menu_2">Đơn hàng của bạn</a></span><br>
                    <span><a href="#menu_3">Cập nhật tài khoản</a></span><br>
                    <span><a href="#menu_4">Đổi mật khẩu</a></span><br>
                    <span style="color: blue;"><a href="index.php?act=dangxuat"><i class="fa fa-sign-out fa-lg"></i> Đăng xuất</a></span>
                <?php
                } else {
                ?>
                    <span><b>Xin chào, <a href="#" style="text-decoration: none; color: #91ad41;"><?php echo $kq['user'] ?>!</a></b></span><br>
                    <span class="actives"><a href="#menu_1">Thông tin tài khoản</a></span><br>
                    <span><a href="#menu_2">Đơn hàng của bạn</a></span><br>
                    <span><a href="#menu_3">Cập nhật tài khoản</a></span><br>
                    <span><a href="#menu_4">Đổi mật khẩu</a></span><br>
                    <span><a href="../admin/index.php">Quản trị</a></span><br>
                    <span style="color: blue;"><a href="index.php?act=dangxuat"><i class="fa fa-sign-out fa-lg"></i> Đăng xuất</a></span>
                <?php
                }
                ?>
            </div>
            <div class="tab-content">
                <div id="menu_1" class="tab-content-item ">
                    <h3>Thông tin khách hàng</h3>
                    <span><b>Họ tên: </b> </span> <?php echo $kq['user'] ?> <br>
                    <span><b>Số điện thoại: </b> </span> <?php echo $kq['phone'] ?> <br>
                    <span><b>Email: </b> </span> <?php echo $kq['email'] ?><br>
                    <span><b>Địa chỉ: </b> </span> <?php echo $kq['address'] ?> <br>
                </div>
                <div id="menu_2" class="tab-content-item">
                    <h3>Đơn hàng của bạn</h3>
                    <table border="1" style="border-collapse: collapse;" width="100%">
                        <thead>
                            <tr>
                                <td>Đơn hàng</td>
                                <td>Ngày đặt</td>
                                <td>Địa chỉ</td>
                                <td>Trạng thái đơn hàng</td>
                                <td>Chi tiết hóa đơn</td>
                                <td>Hủy</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
                            foreach ($kqtt as $key => $value) {
                            ?>
                                <tr>
                                    <td><?php echo $i++ ?></td>
                                    <td><?php echo $value['time'] ?></td>
                                    <td><?php echo $value['address'] ?></td>
                                    <td><?php echo $value['trangthai'] ?></td>
                                    <td><a style="text-decoration: none;" href="index.php?act=ctdh&iddh=<?= $value['id_dh'] ?>">Xem chi tiết</a></td>
                                    <td>
                                        <?php if ($value['id_tt'] == 3 || $value['id_tt'] == 4) {
                                        ?>
                                            <span style="cursor: pointer;" onclick="return confirm('không thể hủy đơn hàng!')">Hủy đơn hàng</span>
                                        <?php
                                        } else {
                                        ?>
                                            <a style="text-decoration: none;" href="index.php?act=huydonhang&id_dh=<?= $value['id_dh'] ?>" onclick="return confirm('Bạn có chắc chắn muốn hủy đơn hàng!')">Hủy đơn hàng</a>
                                        <?php
                                        }
                                        ?>
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>

                        </tbody>
                    </table>
                </div>
                <div id="menu_3" class="tab-content-item">
                    <!-- <h3>Cập nhật tài khoản</h3> -->
                    <!-- Form without bootstrap -->
                    <div class="auth-wrapper">
                        <div class="auth-container">
                            <div class="auth-action-left">
                                <div class="auth-form-outer">
                                    <h2 class="auth-form-title">
                                        Cập nhật tài khoản
                                    </h2>
                                    <div class="auth-external-container">
                                        <div class="auth-external-list">
                                            <ul>
                                                <li><a href="#"><i class="fa fa-google"></i></a></li>
                                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <form class="login-form" method="POST" enctype="multipart/form-data">
                                        <input type="hidden" class="auth-form-input" name="matin" value="<?php echo $kq['id_kh'] ?>">
                                        <input type="text" class="auth-form-input" placeholder="Họ và tên" name="name" value="<?php echo $kq['user'] ?>">
                                        <input type="text" class="auth-form-input" placeholder="Số điện thoại" name="phone" value="<?php echo $kq['phone'] ?>">
                                        <input type="file" class="auth-form-input" placeholder="Avatar" name="img">
                                        <input type="email" class="auth-form-input" placeholder="Email" name="email" value="<?php echo $kq['email'] ?>">
                                        <input type="text" class="auth-form-input" placeholder="Địa chỉ" name="address" value="<?php echo $kq['address'] ?>">
                                        <label class="btn active">
                                            <input type="checkbox" name='email1' checked>
                                            <i class="fa fa-square-o"></i><i class="fa fa-check-square-o"></i>
                                            <span> Ghi nhớ mật khẩu.</span>
                                        </label>
                                        <div class="footer-action">
                                            <input type="submit" value="Update" class="auth-submit" name="btn">
                                            <!-- <a href="register.html" class="auth-btn-direct">Đăng nhập</a> -->
                                        </div>
                                    </form>
                                    <?php
                                    if (isset($_POST['btn'])) {
                                        $matin = $_POST['matin'];
                                        $name = $_POST['name'];
                                        $sdt = $_POST['phone'];
                                        $img = $_FILES['img']['name'];
                                        $link = $_FILES['img']['tmp_name'];
                                        move_uploaded_file($link, '../img/' . $img);
                                        $email = $_POST['email'];
                                        $address = $_POST['address'];

                                        if (empty($img)) {
                                            $sqll = "UPDATE khachhang 
                                        SET user='$name',email='$email',phone='$sdt',address='$address' 
                                        WHERE id_kh=$matin";
                                            $kqq = $conn->prepare($sqll);
                                            if ($kqq->execute()) {
                                                echo "<script>
                                            alert('Bạn đã thay đổi thông tin thành công')
                                            </script>";
                                            } else {
                                                echo "<script>
                                            alert( 'thay đổi không thành công thành công')
                                            </script>";
                                            }
                                        } else {
                                            $sqll = "UPDATE khachhang 
                                        SET user='$name',avt='$img',email='$email',phone='$sdt',address='$address' 
                                        WHERE id_kh=$matin";
                                            $kqq = $conn->prepare($sqll);
                                            if ($kqq->execute()) {
                                                echo "<script>location.href='index.php?act=in4'</script>";
                                            } else {
                                                echo "<script>
                                            alert( 'thay đổi không thành công thành công')
                                            </script>";
                                            }
                                        }
                                    }
                                    ?>

                                </div>
                            </div>
                            <div class="auth-action-right">
                                <div class="auth-image">
                                    <img src="../img/bg_3.jpg" alt="login">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="menu_4" class="kh2 tab-content-item">
                    <!-- <h3>Đổi mật khẩu</h3> -->
                    <!-- Form without bootstrap -->
                    <div class="auth-wrapper">
                        <div class="auth-container">
                            <div class="auth-action-left">
                                <div class="auth-form-outer">
                                    <h2 class="auth-form-title">
                                        Đổi mật khẩu
                                    </h2>
                                    <div class="auth-external-container">
                                        <div class="auth-external-list">
                                            <ul>
                                                <li><a href="#"><i class="fa fa-google"></i></a></li>
                                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <form class="login-form" method="POST">
                                        <div class="input-icon">
                                            <input type="password" class="auth-form-input" placeholder="Mật khẩu cũ" name="oldpass">
                                            <i class="fa fa-eye show-password"></i>
                                        </div>
                                        <div class="input-icon">
                                            <input type="password" class="auth-form-input" placeholder="Mật khẩu mới" name="new-pass">
                                            <i class="fa fa-eye show-password"></i>
                                        </div>
                                        <div class="input-icon">
                                            <input type="password" class="auth-form-input" placeholder="Nhập lại mật khẩu mới" name="re-new-pass">
                                            <i class="fa fa-eye show-password"></i>
                                        </div>
                                        <div class="footer-action">
                                            <input type="submit" value="Đổi mật khẩu" name="doimk" class="auth-submit">
                                        </div>
                                    </form>
                                    <?php
                                    $result = "";
                                    if (isset($_SESSION['user']) == false) {
                                        echo "<script>location.href='index.php?act=dangnhap'</script>";
                                        exit;
                                    }
                                    if (isset($_POST['doimk'])) {
                                        $mkcu = $_POST['oldpass'];
                                        $mkmoi = $_POST['new-pass'];
                                        $mkmoi2 = $_POST['re-new-pass'];
                                        $stement = $conn->prepare("SELECT * FROM khachhang WHERE pass='$mkcu'");
                                        $stement->execute();

                                        if (strlen($mkmoi) < 6) {
                                            echo "<span style='color:red'>mật khẩu quá yếu! yêu cầu nhập trên 6 ký tự</span><br>";
                                        }
                                        if ($mkmoi != $mkmoi2) {
                                            echo "<span style='color:red'>Mật khẩu mới không trùng khớp</span><br>";
                                        }
                                        if ($stement->rowCount() == 1) {
                                            $execute = $conn->prepare("UPDATE khachhang 
                                                                        SET pass='$mkmoi'
                                                                         WHERE id_kh = $id_kh");
                                            $execute->execute();
                                            echo "<script>location.href='index.php?act=in4'</script>";
                                        }
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class="auth-action-right">
                                <div class="auth-image">
                                    <img src="../img/bg_3.jpg" alt="login">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>

<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script>
    $(document).ready(function() {
        $('.tab-content-item').hide();
        $('.tab-content-item:first-child').fadeIn();
        $('.nav-tabs span').click(function() {
            //active nav tabs
            $('.nav-tabs span').removeClass('actives');
            $(this).addClass('actives');

            //Show tab-content item
            let id_tab_content = $(this).children('a').attr('href');
            // alert(id_tab_content);
            $('.tab-content-item').hide();
            $(id_tab_content).fadeIn();
            return false;
        });
    });
</script>
<script>
    window.addEventListener("load", function() {
        const loginForm = document.querySelector(".login-form");
        const showPasswordIcon =
            loginForm && loginForm.querySelector(".show-password");
        const inputPassword =
            loginForm && loginForm.querySelector('input[type="password"');
        showPasswordIcon.addEventListener("click", function() {
            const inputPasswordType = inputPassword.getAttribute("type");
            inputPasswordType === "password" ?
                inputPassword.setAttribute("type", "text") :
                inputPassword.setAttribute("type", "password");
        });
    });
</script>