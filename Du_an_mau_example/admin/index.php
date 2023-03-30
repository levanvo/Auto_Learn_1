<?php
session_start();
include "../css-model/model/db.php";
include "header1.php";

if (isset($_GET['act'])) {
    switch ($_GET['act']) {
        case "trangchu":
            include "trangchu.php";
            break;
        case "listsp":
            include "sanpham/lists.php";
            break;
        case "listcate":
            include "sanpham/cate.php";
            break;
        case "listkh":
            include "khachhang/listkh.php";
            break;
        case "voucher":
            include "voucher/listvoucher.php";
            break;
        case "suavoucher":
            include "voucher/suavoucher.php";
            break;
        case "xoavoucher":
            include "voucher/xoavoucher.php";
            break;
        case "addsp":
            include "sanpham/addsp.php";
            break;
        case "listdh":
            include "donhang/listdh.php";
            break;
        case "addcate":
            include "sanpham/addcate.php";
            break;
        case "addvoucher":
            include "voucher/addvoucher.php";
            break;
        case "suadh":
            include "donhang/suadh.php";
            break;
        case "xoadh":
            include "donhang/xoadh.php";
            break;
        case "suasp":
            include "sanpham/suasp.php";
            break;
        case "xoasp":
            include "sanpham/xoasp.php";
            break;
        case "suavoucher":
            include "voucher/suavoucher.php";
            break;
        case "xoavoucher":
            include "voucher/xoavoucher.php";
            break;
        case "xoakh":
            include "khachhang/xoakh.php";
            break;
        case "suakh":
            include "khachhang/suakh.php";
            break;
        case "xoacate":
            include "sanpham/xoacate.php";
            break;
        case "suacate":
            include "sanpham/suacate.php";
            break;
        case "feedback":
            include "feedback/listfb.php";
            break;
        case "listpost":
            include "baiviet/listpost.php";
            break;
        case "addpost":
            include "baiviet/addpost.php";
            break;
        case "suatt":
            include "baiviet/suapost.php";
            break;
        case "xoatt":
            include "baiviet/xoapost.php";
            break;
        case "xoabl":
            include "feedback/xoa.php";
            break;
        case "ctdh":
            include "donhang/chitietdonhang.php";
            break;
        case "editStatus":
            include "donhang/editModelStatus.php";
            break;
        case "xoadh":
            include "donhang/xoadh.php";
            break;
        case "listlh":
            include "lienhe/listlh.php";
            break;
        case "sualh":
            include "lienhe/sualh.php";
            break;
        case "xoalh":
            include "lienhe/xoalh.php";
            break;
        case "dangxuat";
            unset($_SESSION['user']);
            echo "<script>location.href='../views/index.php'</script>";
            break;
    }
} else {
    include "trangchu.php";
}

include "footer1.php";
