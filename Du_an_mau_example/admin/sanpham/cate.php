<div class="card shadow mb-4">
    <div class="card-header py-3">
    <h6 class="m-0 "  style="color: #91ad41;font-size: 25px;font-weight: bold;">Danh mục sản phẩm</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table " id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>Tên danh muc</th>
                        <th>Sửa</th>
                        <th>Xóa</th>
                </thead>
                <tbody>
                    <?php
                        $sql = "SELECT *FROM danhmuc ORDER BY id_dm desc";
                        $kq = $conn->query($sql);
                        foreach ($kq as $key => $value) {
                    ?>        
                        <tr>
                        <td><?php echo $value['id_dm'] ?></td>
                        <td><?php echo $value['name'] ?></td>
                        <th> <a href="index.php?act=suacate&masua=<?php echo $value['id_dm'] ?>"> <button style="border-radius: 5px;border: none;padding:5px;background-color: #6ECB63;color:#fff;">Sửa</button> </a> </th>
                        <th> <a href="index.php?act=xoacate&maxoa=<?php echo $value['id_dm'] ?>"> <button style="border-radius: 5px;border: none;padding:5px;background-color: #e62d20;color:#fff;" onclick="return confirm('Bạn có chắc chắn muốn xóa không !')">Xóa</button> </a> </th>
                    </tr>
                            
                    <?php    }
                    ?>
                
                </tbody>
                <a href="index.php?act=addcate" style="text-decoration: none;"><button style="color:white;background-color: #6ECB63; border: none;padding: 8px;margin-bottom: 30px;border-radius: 5px;">Thêm danh mục</button></a>
            </table>
        </div>
    </div>
</div>
<!-- <div class="card shadow mb-4">
    <div class="card-header py-3">
    <h6 class="m-0 "  style="color: #91ad41;font-size: 25px;font-weight: bold;">Danh mục sản phẩm</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table " id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>Tên sản phẩm</th>
                        <th>Sửa</th>
                        <th>Xóa</th>
                </thead>
                <tbody>
                    <tr>
                        <td>Tiger Nixon</td>
                        <td>System Architect</td>
                        <th> <a href="index.php?act=suacate"> <button style="border-radius: 5px;border: none;padding:5px;background-color: #6ECB63;color:#fff;">Sửa</button> </a> </th>
                        <th> <a href="index.php?act=xoacate"> <button style="border-radius: 5px;border: none;padding:5px;background-color: #e62d20;color:#fff;" onclick="return confirm('Bạn có chắc chắn muốn xóa không !')">Xóa</button> </a> </th>
                    </tr>
                </tbody>
                <a href="index.php?act=addcate" style="text-decoration: none;"><button style="color:white;background-color: #6ECB63; border: none;padding: 8px;margin-bottom: 30px;border-radius: 5px;">Thêm danh mục</button></a>
            </table>
        </div>
    </div>
</div> -->
