<?php 
if (isset($_GET['xoatt'])) {
    $maxoa = $_GET['xoatt'];
    $sql = "DELETE FROM tintuc WHERE id_tintuc=$maxoa";
    $kq=$conn->prepare($sql);
    if($kq->execute()){
        // header('location:index.php?act=listpost');
        echo "<script>location.href='index.php?act=listpost'</script>";
    }else{
        echo'không xóa được';
    }
}