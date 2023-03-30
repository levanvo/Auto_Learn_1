<?php
if (isset($_GET['masua'])) {
    $suacate = $_GET['masua'];
    // echo $suacate;
    $kq = $conn->query("SELECT * FROM danhmuc WHERE id_dm = $suacate")->fetch();
    // var_dump($kq) ;
}
?>
<div class="form" style="padding:  40px ;">
    <form action="" style="margin-bottom: 120px;"  method="POST">
        <div class="mb-3">
            <input type="hidden" class="form-control" value="<?php echo $kq['id_dm'] ?>" disabled placeholder="Tự động tăng"><br>
            <label for="exampleInputPassword1" class="form-label">Tên loại</label>
            <input type="text" class="form-control" value="<?php echo $kq['name'] ?>" name="tendanhmuc" required>
        </div>
        <input type="submit" name="update" value="Update" style="background-color:#6ECB63 ;color:#fff;border:none;padding:8px;border-radius:5px">
        <input type="reset" value="Nhập lại" style="background-color:#6ECB63 ;color:#fff;border:none;padding:8px;border-radius:5px">
        <a href="index.php?act=listcate" style="color: white; text-decoration: none;"><input style="background-color:#6ECB63 ;color:#fff;border:none;padding:8px;border-radius:5px" type="button" value="Danh sách"></a>
        <?php
        if (isset($_POST["update"])) {
            $tendanhmuc = $_POST["tendanhmuc"];
            $conn->query("UPDATE danhmuc SET name='$tendanhmuc' WHERE id_dm =$suacate");
            echo "<script>location.href='index.php?act=listcate'</script>";
        }
        ?>
    </form>
</div>