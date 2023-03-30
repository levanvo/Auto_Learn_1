<?php
// session_start();
include "../css-model/model/db.php";
include "header.php";
if (isset($_GET['act'])) {
    switch ($_GET['act']) {
        case "trangchu":
            include "trangchu.php";
            break;
        case "gioithieu":
            include "about.php";
            break;
        case "tintuc":
            // include "#";
            break;
        case "sanpham":
            include "product.php";
            break;
        case "lienhe":
            include "contact.php";
            break;
        case "ctsp":
            include "chi_tiet_sp.php";
            break;
        case "dangnhap":
            include "dangnhap.php";
            break;
        case "dangky":
            include "dangky.php";
            break;
        case "dangxuat";
            unset($_SESSION['user']);
            echo "<script>location.href='index.php'</script>";
            break;
        case "voucher":
            include "voucher.php";
            break;
        case "blog":
            include "blog.php";
            break;
        case "in4":
            include "information.php";
            break;
        case "cart":
            include "cart.php";
            break;
        case "quenmatkhau":
            include "quenmatkhau.php";
            break;
        case "admin":
            include "../admin/index.php";
            break;
        case "danhmucsanpham":
            include "danhmucsanpham.php";
            break;
        case "cart2":
            include "cart2.php";
            break;
        case "cart":
            include "cart.php";
            break;
        case "checkout":
            include "checkout.php";
            break;
        case "ctdh":
            include "chitietdonhang.php";
            break;
        case "huydonhang":
            include 'huydonhang.php';
            break;
    }
} else {
    include "trangchu.php";
}
include "footer.php";
