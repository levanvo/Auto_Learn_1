<?php
if (isset($_GET['maxoa'])) {
    $ma = $_GET['maxoa'];
    $sql = "DELETE FROM magiamgia WHERE id_vc=$ma";
    $kq = $conn->prepare($sql);
    if ($kq->execute()) {
        // header('location:index.php?act=voucher');
        echo "<script>location.href='index.php?act=voucher'</script>";
    } else {
        echo 'không xóa được';
    }
}
