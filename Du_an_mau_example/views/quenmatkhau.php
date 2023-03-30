<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css-model/css/dangnhap.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" />
</head>

<body>
    <!-- Form without bootstrap -->
    <div class="auth-wrapper">
        <div class="auth-container">
            <div class="auth-action-left">
                <div class="auth-form-outer">
                    <h2 class="auth-form-title">
                        Lấy lại mật khẩu
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
                        <input type="text" class="auth-form-input" placeholder="Email hoặc số điện thoại" name="quenmk">
                        <div class="footer-action">
                            <input type="submit" value="Lấy lại mật khẩu" class="auth-submit" name="btn">
                            <a href="index.php?act=dangky" class="auth-btn-direct">Đăng ký</a>
                        </div>
                    </form>
                    <?php

                    if (isset($_POST['btn'])) {
                        $quenmk = $_POST['quenmk'];
                        $stement = $conn->prepare("SELECT email,phone FROM khachhang WHERE email='$quenmk' OR phone='$quenmk'");
                        $stement->execute();
                        $count = $stement->rowCount();
                        if ($count == 0) {
                            echo "<span style='color:red'>email k tồn tại! hãy đăng ký </span>";
                        } else {
                            $newpass = rand(0, 99990000);
                            echo "<span style='color:red'>Tài khoản:$quenmk mật khẩu mới  là:" . $newpass . "</span>";
                            $kq = $conn->prepare("UPDATE khachhang SET pass='$newpass' WHERE email='$quenmk' OR phone='$quenmk'");
                            $kq->execute();
                        }
                    }
                    ?>
                </div>
            </div>
            <div class="auth-action-right">
                <div class="auth-image">
                    <img src="../img/6e594136fcce34906ddf.jpg" alt="login">
                </div>
            </div>
        </div>
    </div>
    <script src="js/common.js"></script>
</body>

</html>