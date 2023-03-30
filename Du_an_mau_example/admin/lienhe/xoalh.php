
<?php 
if (isset($_GET['maxoa'])) {
    $maxoa = $_GET['maxoa'];
    $sql = "DELETE FROM lienhe WHERE id=$maxoa";
    $kq=$conn->prepare($sql);
    if($kq->execute()){
        echo "<script>location.href='index.php?act=listlh'</script>";
    }else{
        echo'không xóa được';
    }
}