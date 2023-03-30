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
                        Đăng ký tài khoản
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
                        <p class="auth-sgt">hoặc sử dụng email để đăng ký:</p>
                    </div>
                    <form class="login-form" method="POST" enctype="multipart/form-data">
                        <input type="text" class="auth-form-input" placeholder="Name" name="user">
                        <input type="email" class="auth-form-input" placeholder="Email" name="email">
                        <div class="input-icon">
                            <input type="password" class="auth-form-input" placeholder="Password" name="pass">
                            <i class="fa fa-eye show-password"></i>
                        </div>
                        <input type="text" class="auth-form-input" placeholder="Phone Number" name="phone">
                        <input type="text" class="auth-form-input" placeholder="Address" name="address">
                        <input type="file" class="auth-form-input" name="img">
                        <input type="hidden" class="auth-form-input" name="role" value="2">
                        <label class="btn active">
                            <input type="checkbox" name='email1' checked>
                            <i class="fa fa-square-o"></i><i class="fa fa-check-square-o"></i>
                            <span> Tôi đồng ý với các <a href="#">Chính sách</a> và <a href="#">Điều khoản bảo mật.</a>.</span>
                        </label>
                        <div class="footer-action">
                            <input type="submit" value="Đăng ký" class="auth-submit" name="btn" onclick="return alert('Bạn đã đăng ký thành công!Hãy đăng nhập! ')">
                            <a href="index.php?act=dangnhap" class="auth-btn-direct">Đăng nhập</a>
                        </div>
                    </form>
                    <?php
                    if (isset($_POST['btn'])) {
                        $name = $_POST['user'];
                        $email = $_POST['email'];
                        $pass = $_POST['pass'];
                        $phone = $_POST['phone'];
                        $address = $_POST['address'];
                        $role= $_POST['role'];
                        $avt = $_FILES['img']['name'];
                        $link = $_FILES['img']['tmp_name'];
                        move_uploaded_file($link, '../img/' . $avt);

                        $kq = $conn->exec("INSERT INTO khachhang(user,avt,pass,email,phone,address,id_role)
                            VALUES('$name','$avt','$pass','$email','$phone','$address',$role)");
                        // echo "<script>alert('Bạn đã đăng ký thành công')</script>";
                        echo "<script>location.href='index.php?act=dangnhap'</script>";
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