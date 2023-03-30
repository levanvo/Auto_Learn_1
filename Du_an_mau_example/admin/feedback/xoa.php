<?php
if (isset($_GET['maxoasp']) && isset($_GET['maxoakh'])) {

    $xoabl = $_GET['maxoasp'];
    $xoabl2 = $_GET['maxoakh'];
    $sql = "DELETE FROM phanhoi WHERE id_kh=$xoabl2 AND id_sp=$xoabl ";
    $kq = $conn->prepare($sql);
    if ($kq->execute()) {
        echo "<script>location.href='index.php?act=feedback'</script>";
    } else {
        echo 'không xóa được';
    }
}