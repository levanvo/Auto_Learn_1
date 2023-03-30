<div class="card shadow mb-4">
    <div class="card-header">
        <h6 class="m-0 " style="color: #91ad41;font-size: 25px;font-weight: bold;">Danh sách sản phẩm</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table " id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>Tên sản phẩm</th>
                        <th>Ảnh sản phẩm</th>
                        <th>Giá cũ</th>
                        <th>Giá mới</th>
                        <th>Mô tả sản phẩm</th>
                        <th>Số lượng</th>
                        <th>Danh mục sản phẩm</th>
                        <th>Sửa</th>
                        <th>Xóa</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $kq = $conn->query("SELECT * FROM sanpham ORDER BY id_sp DESC");
                    $i = 1;

                    foreach ($kq as $key => $value) {
                    ?>
                        <tr>
                            <td><?php echo $i++ ?></td>
                            <td><?php echo $value['name'] ?></td>
                            <td> <img src="../img/<?php echo $value['img'] ?>" alt="" style="width: 70px;height: 70px;"></td>
                            <td><?php echo number_format($value['new_price'])  ?>đ</td>
                            <td><?php echo number_format($value['old_price'])  ?>đ</td>
                            <td><?php echo $value['description'] ?></td>
                            <td><?php echo $value['quantity'] ?></td>
                            <?php
                            $danhmuc = $value['id_dm'];
                            // $kqdm=$conn->query("SELECT name FROM danhmuc WHERE id_dm IN(SELECT id_dm FROM sanpham WHERE id_dm=$danhmuc)")->fetch();
                            $kqdm = $conn->query("SELECT sanpham.*,danhmuc.* 
                                                FROM sanpham INNER JOIN danhmuc 
                                                ON sanpham.id_dm=danhmuc.id_dm 
                                                WHERE sanpham.id_dm =$danhmuc AND danhmuc.id_dm =$danhmuc")->fetch();
                            ?>
                            <td><?php echo $kqdm['name']  ?></td>
                            <th><a href="index.php?act=suasp&suasp=<?php echo $value['id_sp'] ?>"> <button style="border-radius: 5px;border: none;padding:5px;background-color: #6ECB63;color:#fff;">Sửa</button> </a> </th>
                            <th><a href="index.php?act=xoasp&xoasp=<?php echo $value['id_sp'] ?>"> <button style="border-radius: 5px;border: none;padding:5px;background-color: #e62d20;color:#fff;" onclick="return confirm('Bạn có chắc chắn muốn xóa không !')">Xóa</button> </a> </th>
                        </tr>
                    <?php
                    }
                    ?>

                </tbody>
                <a href="index.php?act=addsp" style="text-decoration: none;"><button style="color:white;background-color: #6ECB63; border: none;padding: 8px;margin-bottom: 30px;border-radius: 5px;">Thêm sản phẩm</button></a>
            </table>
        </div>
    </div>
</div>