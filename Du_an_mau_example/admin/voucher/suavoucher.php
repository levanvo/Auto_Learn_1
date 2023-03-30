<?php
if (isset($_GET['masua'])) {
    $suavoucher = $_GET['masua'];
    // echo $suacate;
    $sql1 = "SELECT * FROM magiamgia WHERE id_vc=$suavoucher";
    $kq1 = $conn->query($sql1)->fetch();
}
?>

<form method="POST" style="margin-left: 50px;">
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Mã giam gia</label><br>
        <input type="text" class="form-control" name="id" value="<?php echo $kq1['id_ma'] ?>" disabled placeholder="Tự động tăng"><br>
        <label for="exampleInputPassword1" class="form-label">Code</label>
        <input type="text" class="form-control" value="<?php echo $kq1['code'] ?>" name="code" required>
        <label for="exampleInputPassword1" class="form-label">Ngày bắt đầu</label>
        <input type="text" class="form-control" value="<?php echo $kq1['startday'] ?>" name="startday" required>
        <label for="exampleInputPassword1" class="form-label">Ngày kết thúc</label>
        <input type="text" class="form-control" value="<?php echo $kq1['endday'] ?>" name="endday" required>
        <label for="exampleInputPassword1" class="form-label">Tiền được giảm(đơn vị %)</label>
        <input type="text" class="form-control" value="<?php echo $kq1['salemony'] ?>" name="salemoney" required>
        <label for="exampleInputPassword1" class="form-label">Số lượng</label>
        <input type="text" class="form-control" value="<?php echo $kq1['quantity'] ?>" name="quantity" required>
    </div>
    <input type="submit" name="btn" value="Update">
    <input type="reset" value="Nhập lại">
    <a href="index.php?act=voucher" style="color: white; text-decoration: none;"><input type="button" value="Danh sách"></a>
    <?php
    if (isset($_POST["btn"])) {
        $code = $_POST["code"];
        $startday = $_POST['startday'];
        $endday = $_POST['endday'];
        $sale = $_POST['salemoney'];
        $salemoney = $sale / 100;
        $quantity = $_POST['quantity'];
        $conn->query("UPDATE magiamgia SET code='$code',startday='$startday',endday='$endday',salemony='$salemoney',quantity='$quantity'  WHERE id_ma =$suavoucher");
        echo "<script>location.href='index.php?act=voucher'</script>";
    }
    ?>
</form>