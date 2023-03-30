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
                        Đăng nhập
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
                        <p class="auth-sgt">hoặc đăng nhập với:</p>
                    </div>
                    <form class="login-form" method="POST">
                        <input type="email" class="auth-form-input" placeholder="Email" name="email">
                        <div class="input-icon">
                            <input type="password" class="auth-form-input" placeholder="Password" name="pass">
                            <i class="fa fa-eye show-password"></i>
                        </div>
                        <label class="btn active">
                            <input type="checkbox" name='email1' checked>
                            <i class="fa fa-square-o"></i><i class="fa fa-check-square-o"></i>
                            <span> nhớ mật khẩu.</span>
                        </label>
                        <div class="footer-action">
                            <input type="submit" value="Đăng nhập" class="auth-submit" name="dangnhap">
                            <a href="index.php?act=dangky" class="auth-btn-direct">Đăng ký</a>
                        </div>
                    </form>
                    <div class="auth-forgot-password">
                        <a href="index.php?act=quenmatkhau">Quên mật khẩu ?</a>
                    </div>
                </div>
                <?php
                if (isset($_POST['dangnhap'])) {
                    $email = $_POST['email'];
                    $pass = $_POST['pass'];
                    $kq = $conn->query("SELECT * FROM khachhang WHERE email='$email' AND pass='$pass'");
                    // var_dump($kq);
                    if ($kq->rowCount() == 1) {
                        $_SESSION['user'] = $email;
                        echo "<script>location.href='index.php?act=trangchu'</script>";
                    } else {
                        echo "<span style='color:red'><i class='fas fa-exclamation-triangle'></i> tài khoản hoặc mật khẩu không chính xác!</span>";
                    }
                };
                ?>
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