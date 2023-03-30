<?php
    if (isset($_GET['suakh'])) {
        $suakhachhang = $_GET['suakh'];
        $sql1 = "SELECT * FROM khachhang WHERE id_kh=$suakhachhang";
        $kq1 = $conn->query($sql1)->fetch();
    }
?>
    <form method="POST" style="margin-left: 50px;">
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Sửa khách hàng</label><br>
                <input type="text" class="form-control" name="id" value="<?php echo $kq1['id_kh'] ?>" disabled placeholder="Tự động tăng"><br>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label" >User</label>
                <input type="text" class="form-control" value="<?php echo $kq1['user'] ?>" name="user" required>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label" >Email</label>
                <input type="text" class="form-control" value="<?php echo $kq1['email'] ?>" name="email" required>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label" >Phone</label>
                <input type="text" class="form-control" value="<?php echo $kq1['phone'] ?>" name="phone" required>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label" >Address</label>
                <input type="text" class="form-control" value="<?php echo $kq1['address'] ?>" name="address" required>
            </div>
                
            <input type="submit" name="btn" value="Update">
            <input type="reset" value="Nhập lại">
            <a href="index.php?act=voucher" style="color: white; text-decoration: none;"><input type="button" value="Danh sách"></a>
            <?php
                if (isset($_POST["btn"])) {
                    $tenkh = $_POST["user"];
                    $emailkh = $_POST['email'];
                    $phonekh = $_POST['phone'];
                    $addresskh = $_POST['address'];
                    $conn->query("UPDATE khachhang SET user='$tenkh',email='$emailkh',phone='$phonekh',address='$addresskh' WHERE id_kh =$suakhachhang");
                    echo "<script>location.href='index.php?act=listkh'</script>";
                }
            ?>
    </form>