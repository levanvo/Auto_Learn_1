<?php 
if (isset($_GET['xoasp'])) {
    $maxoa = $_GET['xoasp'];
    $sql = "DELETE FROM sanpham WHERE id_sp=$maxoa";
    $kq=$conn->prepare($sql);
    if($kq->execute()){
        echo "<script>location.href='index.php?act=listsp'</script>";
        // header('location:index.php?act=listcate');
    }else{
        echo'không xóa được';
    }
}