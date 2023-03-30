<?php 
if (isset($_GET['id_dh'])) {
    $maxoa = $_GET['id_dh'];
    $sql = "DELETE FROM donhang WHERE id_dh=$maxoa";
    $kq=$conn->prepare($sql);
    if($kq->execute()){
        echo "<script>location.href='index.php?act=listdh'</script>";
    }else{
        echo'không xóa được';
    }
}