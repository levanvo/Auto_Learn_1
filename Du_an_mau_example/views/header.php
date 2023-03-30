<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lora:ital@1&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/3e9f5cb61f.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <link rel="stylesheet" href="../css-model/css/swiper.css">
    <link rel="stylesheet" href="../css-model/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        @font-face {
            src: url(./../font/Quicksand-VariableFont_wght.ttf);
            font-family: a1;
        }

        #wraper {
            width: 100%;
            margin: 0 auto;
            position: relative;
        }

        .background-white {
            padding-bottom: 30px;

            background-color: #fff;
        }

        .background-white1 {
            background-color: #fff;
        }

        /*------header-top------*/
        .header-top {
            height: 28px;
            width: 100%;
            background-color: #82ae46 !important;
            display: flex;
            justify-content: center;
            grid-gap: 250px;
            font-size: 12px;
            line-height: 28px;
            color: #fff;
        }

        .sticky {
            width: 100%;
            margin-top: -28px;
        }

        .icons {
            padding-right: 20px;
            margin-left: 148px;
            display: flex;
            grid-gap: 10px;
        }

        .icons i {
            font-size: 12px;
            color: #91ad41;
        }

        .icons a {
            display: inline-block;
            font-size: 15px;
            padding-left: 5px;
            text-decoration: none;
            color: #91ad41;
            padding: 10px 0;
        }

        .menu>ul>li {
            position: relative;
            display: inline-block;
        }

        .menu>ul>li>a:hover {
            color: yellowgreen;
        }

        .menu ul .subnav a:hover {
            background-color: white;
        }

        .menu ul ul {
            position: absolute;
            display: none;
            border-radius: 3px;
            width: 200px;
            /* border-right: 1px  solid gray;
        border-left: 1px solid gray;
        border-bottom: 1px solid gray; */
            border-bottom: 0 0 5px black;
            background-color: white;
            margin-left: 0;
            padding-left: 10px;
        }

        .menu ul ul a {
            display: block;
            line-height: 30px;
        }

        .menu ul ul a:hover {
            color: yellowgreen;
        }

        .menu>ul>li:hover>ul {
            display: block;
        }

        header.sticky .icons a,
        header.sticky .menu>ul>li>a,
        header.sticky .icons i {
            color: black;
        }

        header.sticky .icons a:hover {
            color: #8fbe0b;
        }

        .logo {
            font-size: 30pt;
            font-weight: bold;
            margin-left: 50px;
            font-family: 'Lora', serif;
            color: #8fbe0b;
        }

        .logo:hover {
            color: #a3db0a;
            font-size: 30pt;
            text-shadow: 2px 2px 3px rgb(163, 162, 162);
            font-weight: bold;
        }

        .inner-header>img {
            display: block;
        }

        /* .inner-header */
        .inner-header {
            display: flex;
            margin-left: 70px;
            /* justify-content: space-between; */
            align-items: center;
            margin-top: 28px;

        }

        .inner-header ul {
            text-decoration: none;
            list-style: none;
            margin-left: 110px;
        }

        .phantrang :hover {
            border-bottom: 2px solid #82ae46;
        }

        ul.main-menu {
            display: flex;
            text-transform: uppercase;
        }

        .inner-header ul>li>a {
            text-decoration: none;
            padding: 5px 10px;
            display: block;
            /* font-weight: bold; */
            /* margin-right: 10px; */
            color: #91ad41;
        }

        header {
            position: fixed;
            z-index: 3;
            /*mặc định xếp chồng lêm ảnh khi mình hover vào*/
            top: 0;
            /* left: 0; */
            width: 1348px;
            border-bottom: 1px solid #f5f5f5;
            padding: 10px 0;
            transition: all 0.5s ease-in;

        }

        header.sticky .menu>ul>li>a:hover {
            color: #91ad41;

        }

        header.sticky {
            background: #fff;
            /* opacity: 0.9; */
            color: black;
            padding: 7px 0px;
            box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.5);
        }

        header.sticky .main-menu a {
            color: black;
        }

        #banner {
            background-image: url(../img/bg_1.jpg);
            min-height: 440px;
            width: 100%;
            background-size: cover;
        }

        .send_mail {
            display: grid;
            grid-template-columns: 1fr 1fr;
            height: 200px;
            background-color: #f7f6f2;
            margin: 0 auto;
            justify-content: center;
            align-items: center;

        }

        #backTop {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            color: #fff;
            background-color: #91ad41;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: -25px auto;
            cursor: pointer;
            box-shadow: 0 0 10px #8fbe0b;
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
            font-size: 14px;
        }

        .send_mail .content {
            width: 400px;
            left: 50%;
            transform: translateX(50%);
        }

        .send_mail .content>input {
            width: 250px;
            height: 45px;
            outline: none;
            border: none;
            padding-left: 10px;
        }

        .send_mail .content>button {
            width: 100px;
            height: 45px;
            background-color: #91ad41;
            border: none;
            margin-left: -10px;
            color: #fff;
        }

        /*-------footer------*/
        footer {
            height: 500px;
            /* background: yellowgreen; */
            display: grid;
            grid-template-columns: 1fr 1fr 1fr 1fr;
            /* margin: 50px 100px 50px 0;*/
            grid-gap: 30px;
            padding: 0 130px;
            background-color: #fff;

        }

        .footer,
        footer {
            background-color: rgb(228, 241, 188);
        }

        footer .content1 {
            margin-top: 150px;
            line-height: 30px;
        }

        footer .content1>h2 {
            font-size: 20px;
            margin-bottom: 50px;
        }

        footer .content1 .icon {
            font-size: 30px;
            margin-top: 70px;
        }

        footer .content1 .icon>i {
            padding: 10px;

        }

        .class-helo {
            position: relative;
        }
    </style>
</head>
<body>
    <div id="wraper">
        <img class="wraper-img" src="../img/bg_2.jpg" alt="">


        <div class="background-white">

            <section class="header">
                <div class="header-top">
                    <div class="icon-header">
                        <i class="fas fa-phone-alt"></i>
                        + 1235 2355 98
                    </div>
                    <div class="icon-header">
                        <i class="fab fa-telegram-plane"></i>
                        YOUREMAIL@EMAIL.COM
                    </div>
                    <div class="icon-header">
                        3-5 NGÀY LÀM VIỆC GIAO HÀNG & ĐỔI TRẢ MIỄN PHÍ
                    </div>
                </div>

                <header>
                    <div class="inner-header">
                        <span class="logo">VegeFoods</span>
                        <nav class="menu">
                            <ul>
                                <li><a href="index.php?act=trangchu">Trang chủ</a></li>
                                <li><a href="index.php?act=gioithieu">Giới thiệu</a></li>
                                <li><a href="index.php?act=sanpham">Sản phẩm</a>
                                    <ul class="subnav">
                                        <?php
                                        $stmt = $conn->query("SELECT * FROM danhmuc");
                                        foreach ($stmt as $key => $value) {
                                            # code...
                                        ?>
                                            <li><a href="index.php?act=danhmucsanpham&madanhmuc=<?php echo $value['id_dm'] ?>"><?php echo$value['name']?></a></li>
                                        <?php
                                        }
                                        ?>
                                    </ul>
                                </li>
                                <li><a href="index.php?act=blog">Tin Tức</a></li>
                                <li><a href="index.php?act=voucher">Khuyến mãi</a></li>
                                <li><a href="index.php?act=lienhe">Liên hệ</a></li>
                            </ul>
                        </nav>
                        <?php
                        if (isset($_SESSION['user'])) {
                            $user = $_SESSION['user'];
                            $stmt = $conn->query("SELECT * FROM khachhang WHERE email='$user'")->fetch();
                            $id_kh = $stmt['id_kh'];
                        ?>
                            <div class="icons">
                                <div class="">
                                    <a href="index.php?act=in4">
                                        <img src="../img/<?php echo $stmt['avt'] ?>" height="40px" width="40px" style="margin-right: 10px;border-radius: 50%;">
                                    </a>
                                </div>
                                <div style="margin-top:12px ;">
                                    <a href="index.php?act=cart"><i class="fas fa-shopping-cart"></i> Giỏ hàng</a>
                                </div>
                            </div>
                        <?php
                        } else {
                        ?>
                            <div class="icons">
                                <div class="">
                                    <i class="fas fa-user"></i>
                                    <a href="index.php?act=dangnhap"> Đăng nhập</a>
                                </div>
                                <div class="">
                                    <i class="fas fa-shopping-cart"></i>
                                    <!-- giỏ hàng phải đăng nhập mới xem được phần giỏ hàng -->
                                    <a href="index.php?act=dangnhap" onclick="return confirm('bạn phải đăng nhập!')"> Giỏ hàng</a>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                </header>
                <div id="banner">

                </div>
            </section>

            <!-- END HEADER ============================================================================================================== -->