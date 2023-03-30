<div class="form" style="padding:  40px ;">
    <h2 style="color: #91ad41;margin-bottom: 30px;font-weight:600;">Thêm bài viết</h2>
    <form style="margin-bottom: 120px;" enctype="multipart/form-data" method="POST">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Tiêu đề</label>
            <input type="text" class="form-control" name="tieude" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Content</label>
            <input type="text" class="form-control" name="content" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Ảnh</label>
            <input type="file" class="form-control" name="img" id="exampleInputPassword1">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Ngày đăng</label>
            <input type="text" class="form-control" name="ngaydang" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <button type="submit" class="btn" name="themmoi" style="background-color: #91ad41;color:#fff;">Thêm Bài viết</button>
    </form>
    <?php
    if (isset($_POST['themmoi'])) {
        $tentieude = $_POST['tieude'];
        $noidung = $_POST['content'];
        $img = $_FILES['img']['name'];
        $link = $_FILES['img']['tmp_name'];
        move_uploaded_file($link, '../img/' . $img);
        $ngaydang = $_POST['ngaydang'];

        $sql = "INSERT INTO tintuc(title,content,img,ngaydang)
                VALUES ('$tentieude','$noidung','$img','$ngaydang')";
        $kq = $conn->exec($sql);
        if ($kq == 1) {
            echo "<script>location.href='index.php?act=listpost'</script>";
        } else {
            echo "khong them duoc";
        }
    }
    ?>

</div>