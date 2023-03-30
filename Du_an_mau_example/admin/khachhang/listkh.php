<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 " style="color: #91ad41;font-size: 25px;font-weight: bold;">Khách hàng</h6>

    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table " id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>Tên khách hàng</th>
                        <th>Ảnh đại diện</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th>Phân quyền</th>
                        <th>Sửa</th>
                        <th>Xóa</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $kq = $conn->query("SELECT * FROM khachhang");
                    $i=1;
                    foreach ($kq as $key => $value) {
                    ?>
                        <tr>
                            <td><?php echo $i++ ?></td>
                            <td><?php echo $value['user'] ?></td>
                            <td> <img src="../img/<?php echo $value['avt'] ?>" width="50px" height="50px"></td>
                            <td><?php echo $value['email'] ?></td>
                            <td><?php echo $value['phone'] ?></td>
                            <td><?php echo $value['address'] ?></td>
                            <?php 
                            $phanquyen=$value['id_role'];
                            $kqdm=$conn->query("SELECT name FROM phanquyen WHERE id_role IN(SELECT id_role FROM khachhang WHERE id_role=$phanquyen)")->fetch();
                            ?>
                            <td><?php echo$kqdm['name']  ?></td>
                            <th> <a href="index.php?act=suakh&suakh=<?php echo $value['id_kh'] ?>"> <button style="border-radius: 5px;border: none;padding:5px;background-color: #6ECB63;color:#fff;">Sửa</button> </a> </th>
                            <th> <a href="index.php?act=xoakh&xoakh=<?php echo $value['id_kh'] ?>"> <button style="border-radius: 5px;border: none;padding:5px;background-color: #e62d20;color:#fff;" onclick="return confirm('Bạn có chắc chắn muốn xóa không !')">Xóa</button> </a> </th>
                        </txoar>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>