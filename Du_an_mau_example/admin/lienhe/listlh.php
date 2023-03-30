<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 " style="color: #91ad41;font-size: 25px;font-weight: bold;">Danh sách liên hệ</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table " id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Title</th>
                        <th>Note</th>
                        <th>Sửa</th>
                        <th>Xóa</th>
                </thead>
                <tbody>
                    <?php
                    $i=1;
                    $sql = "SELECT * FROM lienhe ORDER BY id DESC ";
                    $kq = $conn->query($sql)->fetchAll();
                    foreach ($kq as $key => $value) {
                    ?>
                        <tr>
                            <td><?php echo $i++ ?></td>
                            <td><?php echo $value['name'] ?></td>
                            <td><?php echo $value['email'] ?></td>
                            <td><?php echo $value['title'] ?></td>
                            <td><?php echo $value['note'] ?></td>
                            <th> <a href="index.php?act=sualh&masua=<?php echo $value['id'] ?>"> <button style="border-radius: 5px;border: none;padding:5px;background-color: #6ECB63;color:#fff;">Sửa</button> </a> </th>
                            <th> <a href="index.php?act=xoalh&maxoa=<?php echo $value['id'] ?>"> <button style="border-radius: 5px;border: none;padding:5px;background-color: #e62d20;color:#fff;" onclick="return confirm('Bạn có chắc chắn muốn xóa không !')">Xóa</button> </a> </th>
                        </tr>

                    <?php    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>