<?php
if (isset($_GET['masua'])) {
    $sualienhe = $_GET['masua'];
    $kq = $conn->query("SELECT * FROM lienhe WHERE id = $sualienhe")->fetch();
}
?>
<div class="form" style="padding:  40px ;">
    <form action="" style="margin-bottom: 120px;"  method="POST">
        <div class="mb-3">
            <input type="hidden" class="form-control" value="<?php echo $kq['id'] ?>" disabled placeholder="Tự động tăng"><br>

            <label for="exampleInputPassword1" class="form-label">Tên</label>
            <input type="text" class="form-control" value="<?php echo $kq['name'] ?>" name="tenlh" required disabled>

            <label for="exampleInputPassword1" class="form-label">Email</label>
            <input type="text" class="form-control" value="<?php echo $kq['email'] ?>" name="emaillh" disabled required>

            <label for="exampleInputPassword1" class="form-label">Title</label>
            <input type="text" class="form-control" value="<?php echo $kq['title'] ?>" name="titlelh" required>

            <label for="exampleInputPassword1" class="form-label">Note</label>
            <input type="text" class="form-control" value="<?php echo $kq['note'] ?>" name="notelh" required>


        </div>
        <input type="submit" name="update" value="Update" style="background-color:#6ECB63 ;color:#fff;border:none;padding:8px;border-radius:5px">
        <input type="reset" value="Nhập lại" style="background-color:#6ECB63 ;color:#fff;border:none;padding:8px;border-radius:5px">
        <a href="index.php?act=listlh" style="color: white; text-decoration: none;"><input style="background-color:#6ECB63 ;color:#fff;border:none;padding:8px;border-radius:5px" type="button" value="Danh sách"></a>
        <?php
        if (isset($_POST["update"])) {
            $ten = $_POST["tenlh"];
            $mail = $_POST["emaillh"];
            $tieude = $_POST["titlelh"];
            $noidung = $_POST["notelh"];
            $conn->query("UPDATE lienhe SET  title='$tieude', note='$noidung' WHERE id =$sualienhe");
            echo "<script>location.href='index.php?act=listlh'</script>";
        }
        ?>
    </form>
</div>