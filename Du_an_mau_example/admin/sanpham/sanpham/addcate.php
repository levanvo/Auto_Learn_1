<!-- <div class="form" style="padding:  40px ;">
    <h2 style="color: #91ad41;margin-bottom: 30px;font-weight:600;">Thêm danh mục</h2>
    <form style="margin-bottom: 120px;">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Mã sản danh mục</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Tự động tăng" disabled>
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Tên danh mục</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <button type="submit" class="btn " style="background-color: #91ad41;color:#fff;">Thêm danh mục</button>
    </form>
</div> -->
<div class="form" style="padding:  40px ;">
    <h2 style="color: #91ad41;margin-bottom: 30px;font-weight:600;">Thêm danh mục</h2>
    <form style="margin-bottom: 120px;" action="index.php?act=addcate" method="POST">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Mã sản danh mục</label>
            <input type="text" class="form-control"  name="id" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Tự động tăng" disabled>
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Tên danh mục</label>
            <input type="text" class="form-control" name="tendanhmuc" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <button type="submit" class="btn " style="background-color: #91ad41;color:#fff;" name="btn">Thêm</button>
    </form>
    <?php
        if (isset($_POST['btn'])) {
            $tendanhmuc = $_POST['tendanhmuc'];
            $sql = "INSERT INTO danhmuc VALUE(null,'$tendanhmuc')";
            $kq = $conn->prepare($sql);
            if ($kq->execute()) {
                // header('location:index.php?act=listcate');
                echo "<script>location.href='index.php?act=listcate'</script>";
                
            } else {
                echo "không thêm được !";
            }
        }

    ?>
</div>