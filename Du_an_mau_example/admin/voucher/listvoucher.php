
<div class="card shadow mb-4">
    <div class="card-header py-3">
    <h6 class="m-0 "  style="color: #91ad41;font-size: 25px;font-weight: bold;">Mã giảm giá</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table " id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>Mã giảm giá</th>
                        <th>Ngày bắt đầu</th>
                        <th>Ngày kết thúc</th>
                        <th>Tiền được giảm</th>
                        <th>Số lượng</th>
                        <th>Sửa</th>
                        <th>Xóa</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $sql = "SELECT * FROM magiamgia";
                        $kq = $conn->query($sql);
                        $i=1;
                        foreach ($kq as $key => $value) {
                    ?>        
                        <tr>
                            <td><?php echo $i++ ?></td>
                            <td><?php echo $value['code'] ?></td>
                            <td><?php echo $value['startday'] ?></td>
                            <td><?php echo $value['endday'] ?></td>
                            <td><?php echo $value['salemony'] *100  ?>%</td>
                            <td><?php echo $value['quantity'] ?></td>
                            <th> <a href="index.php?act=suavoucher&masua=<?php echo $value['id_vc']?> "> <button style="border-radius: 5px;border: none;padding:5px;background-color: #6ECB63;color:#fff;">Sửa</button> </a> </th>
                            <th> <a href="index.php?act=xoavoucher&maxoa=<?php echo $value['id_vc']?> "> <button style="border-radius: 5px;border: none;padding:5px;background-color: #e62d20;color:#fff;" onclick="return confirm('Bạn có chắc chắn muốn xóa không !')">Xóa</button> </a> </th>
                        </tr>
                    <?php    }
                    ?>
                    
                </tbody>
                <a href="index.php?act=addvoucher" style="text-decoration: none;"><button style="color:white;background-color: #6ECB63; border: none;padding: 8px;margin-bottom: 30px;border-radius: 5px;">Thêm voucher</button></a>
            </table>
        </div>
    </div>
</div>
<!-- <div class="card shadow mb-4">
    <div class="card-header py-3">
    <h6 class="m-0 "  style="color: #91ad41;font-size: 25px;font-weight: bold;">Mã giảm giá</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table " id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>Mã giảm giá</th>
                        <th>Ngày bắt đầu</th>
                        <th>Ngày kết thúc</th>
                        <th>Tiền được giảm</th>
                        <th>Thêm</th>
                        <th>Sửa</th>
                        <th>Xóa</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Tiger Nixon</td>
                        <td>Tiger Nixon</td>
                        <td>Tiger Nixon</td>
                        <td>Tiger Nixon</td>
                        <td>Tiger Nixon</td>
                        <td>System Architect</td>
                        <th> <a href="index.php?act=suavoucher"> <button style="border-radius: 5px;border: none;padding:5px;background-color: #6ECB63;color:#fff;">Sửa</button> </a> </th>
                        <th> <a href="index.php?act=xoavoucher"> <button style="border-radius: 5px;border: none;padding:5px;background-color: #e62d20;color:#fff;" onclick="return confirm('Bạn có chắc chắn muốn xóa không !')">Xóa</button> </a> </th>
                    </tr>
                </tbody>
                <a href="index.php?act=addvoucher" style="text-decoration: none;"><button style="color:white;background-color: #6ECB63; border: none;padding: 8px;margin-bottom: 30px;border-radius: 5px;">Thêm voucher</button></a>
            </table>
        </div>
    </div>
</div> -->