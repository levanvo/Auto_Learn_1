<?php 
if (isset($_GET['maxoa'])) {
    $maxoa = $_GET['maxoa'];
    $sql = "DELETE FROM danhmuc WHERE id_dm=$maxoa";
    $kq=$conn->prepare($sql);
    if($kq->execute()){
        echo "<script>location.href='index.php?act=listcate'</script>";
        // header('location:index.php?act=listcate');
    }else{
        echo'không xóa được';
    }
}