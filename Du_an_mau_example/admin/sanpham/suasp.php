<?php
if (isset($_GET['suasp'])) {
    $masua = $_GET['suasp'];
    // $stmt = $conn->query("SELECT * FROM sanpham WHERE id='$masua'")->fetch();
    $query = "SELECT * FROM sanpham WHERE id_sp='$masua'";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    $product = $stmt->fetch();
}
?>
<div class="form" style="padding:  40px ;">

    <h4 style="padding: 20px;">Sửa Sản phẩm</h4>
    <form method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <input type="hidden" class="form-control" value="<?php echo $product['id_sp'] ?>" name="matin">
            <label for="exampleInputPassword1" class="form-label">Tên Sản phẩm</label>
            <input type="text" class="form-control" name="name" value="<?php echo $product['name'] ?>" require>
            <label for="exampleInputPassword1" class="form-label">Ảnh sản phẩm</label>
            <input type="file" class="form-control" name="img" value="<?php echo $product['img'] ?>" require>
            <label for="exampleInputPassword1" class="form-label">Gia cu</label>
            <input type="text" class="form-control" name="giacu" value="<?php echo $product['old_price'] ?>" require>
            <label for="exampleInputPassword1" class="form-label">Gia moi</label>
            <input type="text" class="form-control" name="giamoi" value="<?php echo $product['new_price'] ?>" require>
            <label for="exampleInputPassword1" class="form-label">Mô tả</label>
            <input type="text" class="form-control" name="mota" value="<?php echo $product['description'] ?>" require>
            <label for="exampleInputPassword1" class="form-label">Số lượng</label>
            <input type="text" class="form-control" name="quantity" value="<?php echo $product['quantity'] ?>" require>
            <label for="exampleInputPassword1" class="form-label">Danh mục</label><br>
            <select class="form-select" aria-label="Default select example" name="category" style="width: 1215px;padding :8px;border: solid #ccc 1px;border-radius: 5px;  ">
                <?php
                $categories = $conn->query("SELECT * FROM danhmuc");
                foreach ($categories as $key => $category) {
                ?>
                    <option <?php if ($category['id_dm'] == $product['id_dm']) {
                                echo 'selected';
                            } ?> value="<?php echo $category['id_dm'] ?>"><?php echo $category['name'] ?></option>
                <?php }
                ?>
            </select>
        </div>
        <input type="submit" name="update" value="UpDate">
        <input type="reset" value="Nhập lại">
        <a href="index.php?id=listsp" style="color: white; text-decoration: none;"><input type="button" value="Danh sách"></a>
    </form>
</div>

<?php
if (isset($_POST['update'])) {
    $matin = $_POST['matin'];
    $name = $_POST['name'];
    $img = $_FILES['img']['name'];
    $link = $_FILES['img']['tmp_name'];
    $giacu = $_POST['giacu'];
    $giamoi = $_POST['giamoi'];
    $des = $_POST['mota'];
    $quantity = $_POST['quantity'];
    $cate = $_POST['category'];
    if (empty($img)) {
        $kq = $conn->prepare("UPDATE sanpham 
                                SET name='$name', new_price='$giamoi',old_price='$giacu',description='$des',quantity='$quantity', id_dm=$cate
                                WHERE id_sp='$matin'");
        if ($kq->execute()) {
            echo "<script>location.href='index.php?act=listsp'</script>";
        } else {
            echo "Không thêm được";
        }
    } else {
        move_uploaded_file($link, '../img/' . $img);
        $kq = $conn->prepare("UPDATE sanpham 
                                SET name='$name',img='$img', new_price='$giamoi',old_price='$giacu',description='$des',quantity='$quantity', id_dm=$cate
                                WHERE id_sp='$matin'");
        if ($kq->execute()) {
            echo "<script>location.href='index.php?act=listsp'</script>";
        } else {
            echo "Không thêm được";
        }
    }
}
?>