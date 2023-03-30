<div class="form" style="padding:  40px ;">

    <?php
    if (isset($_GET['suatt'])) {
        $masua = $_GET['suatt'];
        $query = "SELECT * FROM tintuc WHERE id_tintuc='$masua'";
        $stmt = $conn->prepare($query);
        $stmt->execute();
        $product = $stmt->fetch();
    }
    ?>
    <h4 style="padding: 20px;">Sửa bài viết</h4>
    <form method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <input type="hidden" class="form-control" value="<?php echo $product['id_tintuc'] ?>" name="matin">
            <label for="exampleInputPassword1" class="form-label">Tên tiêu đề</label>
            <input type="text" class="form-control" name="tieude" value="<?php echo $product['title'] ?>" require>
            <label for="exampleInputPassword1" class="form-label">Nội dụng bài viết</label>
            <input type="text" class="form-control" name="noidung" value="<?php echo $product['content'] ?>" require>
            <label for="exampleInputPassword1" class="form-label">Ảnh</label>
            <input type="file" class="form-control" name="img" value="<?php echo $product['img'] ?>" require>
            <label for="exampleInputPassword1" class="form-label">Ngày đăng</label>
            <input type="text" class="form-control" name="ngaydang" value="<?php echo $product['ngaydang'] ?>" require>
        </div>
        <input type="submit" name="update" value="UpDate">
        <input type="reset" value="Nhập lại">
        <a href="index.php?id=listsp" style="color: white; text-decoration: none;"><input type="button" value="Danh sách"></a>
    </form>
    <?php
    if (isset($_POST['update'])) {
        $matin = $_POST['matin'];
        $title = $_POST['tieude'];
        $content = $_POST['noidung'];
        $img = $_FILES['img']['name'];
        $link = $_FILES['img']['tmp_name'];
        move_uploaded_file($link, '../img/' . $img);
        $ngaydang = $_POST['ngaydang'];

        if (empty($img) ) {
            $kq = $conn->prepare("UPDATE tintuc SET title='$title',content='$content',ngaydang='$ngaydang' WHERE id_tintuc=$matin");
            if ($kq->execute()) {
                echo "<script>location.href='index.php?act=listpost'</script>";
            } else {
                echo "Không thêm được";
            }
        } else {
            $kq = $conn->prepare("UPDATE tintuc SET title='$title',content='$content',img='$img',ngaydang='$ngaydang' WHERE id_tintuc=$matin");
            if ($kq->execute()) {
                echo "<script>location.href='index.php?act=listpost'</script>";
            } else {
                echo "Không thêm được";
            }
        }
    }
    ?>

</div>