<?php
if (isset($_GET['xoakh'])) {
    $ma = $_GET['xoakh'];
    $sql = "DELETE FROM khachhang WHERE id_kh=$ma";
    $kq = $conn->prepare($sql);
    if ($kq->execute()) {
        echo "<script>location.href='index.php?act=listkh'</script>";
    } else {
        echo 'không xóa được';
    }
}
