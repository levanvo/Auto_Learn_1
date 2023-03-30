<div class="form" style="padding:  40px ;">
    <h2 style="color: #91ad41;margin-bottom: 30px;font-weight:600;">Thêm sản phẩm</h2>
    <form style="margin-bottom: 120px;" enctype="multipart/form-data" method="POST">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Mã sản phẩm</label>
            <input type="text" class="form-control" name="masp" placeholder="Tự động tăng" id="exampleInputEmail1" disabled aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Tên sản phẩm</label>
            <input type="text" class="form-control" name="tensp" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Ảnh</label>
            <input type="file" class="form-control" name="img" id="exampleInputPassword1">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Giá cũ</label>
            <input type="text" class="form-control" name="giacu" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Giá mới</label>
            <input type="text" class="form-control" name="giamoi" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Mô tả</label>
            <input type="text" class="form-control" name="mota" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Số lượng</label>
            <input type="text" class="form-control" name="soluong" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Danh mục</label><br>
            <select class="form-select" aria-label="Default select example" name="danhmuc" style="width: 1080px;padding :8px;border: solid #ccc 1px;border-radius: 5px;  ">
                <?php
                $stmtdm = $conn->query("SELECT * FROM danhmuc");
                // var_dump($)
                foreach ($stmtdm as $key => $value) {
                ?>
                    <option value="<?php echo $value['id_dm'] ?>"><?php echo $value['name'] ?></option>
                <?php
                }
                ?>
            </select>
        </div>
        <button type="submit" name="btn" class="btn " style="background-color: #91ad41;color:#fff;">Thêm</button>
    </form>
</div>
<?php
if (isset($_POST['btn'])) {
    $name = $_POST['tensp'];
    $img = $_FILES['img']['name'];
    $link = $_FILES['img']['tmp_name'];
    move_uploaded_file($link, '../img/' . $img);
    $newprice = $_POST['giamoi'];
    $oldprice = $_POST['giacu'];
    $des = $_POST['mota'];
    $quantity = $_POST['soluong'];
    $danhmuc = $_POST['danhmuc'];

    $sql = "INSERT INTO sanpham(name,img,new_price,old_price,description,quantity,id_dm)
    VALUES('$name','$img',$newprice,$oldprice,'$des','$quantity','$danhmuc')";
    $kq = $conn->exec($sql);
    echo "<script>location.href='index.php?act=listsp'</script>";
}

?>