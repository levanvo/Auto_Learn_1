<div class="card shadow mb-4">
    <div class="card-header">
        <h6 class="m-0 "  style="color: #91ad41;font-size: 25px;font-weight: bold;">Danh sách Bài Viết</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table " id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>Tiêu Đề</th>
                        <th>Nội dung</th>
                        <th>Ảnh</th>
                        <th>Ngày đăng</th>
                        <th>Sửa</th>
                        <th>Xóa</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    $kq = $conn->query("SELECT * FROM tintuc ORDER BY id_tintuc");
                    foreach ($kq as $key => $value) {
                    ?>
                        <tr>
                            <td><?php echo $value['id_tintuc']?></td>
                            <td><?php echo $value['title'] ?></td>
                            <td><?php echo $value['content'] ?></td>
                            <td> <img src="../img/<?php echo $value['img'] ?>" alt="" width="50px" height="50px"></td>
                            <td><?php echo $value['ngaydang'] ?></td>
                            <th><a href="index.php?act=suatt&suatt=<?php echo $value['id_tintuc'] ?>"> <button style="border-radius: 5px;border: none;padding:5px;background-color: #6ECB63;color:#fff;">Sửa</button> </a> </th>
                            <th><a href="index.php?act=xoatt&xoatt=<?php echo $value['id_tintuc'] ?>"> <button style="border-radius: 5px;border: none;padding:5px;background-color: #e62d20;color:#fff;" onclick="return confirm('Bạn có chắc chắn muốn xóa không !')">Xóa</button> </a> </th>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
                <a href="index.php?act=addpost" style="text-decoration: none;"><button style="color:white;background-color: #6ECB63; border: none;padding: 8px;margin-bottom: 30px;border-radius: 5px;">Thêm bài viết</button></a>
            </table>
        </div>
    </div>
</div>