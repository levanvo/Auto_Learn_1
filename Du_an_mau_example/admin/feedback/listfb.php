<div class="card shadow mb-4">
    <div class="card-header">
        <h6 class="m-0 "  style="color: #91ad41;font-size: 25px;font-weight: bold;">Danh sách phản hồi</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table " id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Tên tài khoản</th>
                        <th>Tên sản phẩm</th>
                        <th>Nội dung phản hồi</th>
                        <th>Ngày Đăng</th>
                        <th>Xóa</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $sql = "SELECT * FROM phanhoi INNER JOIN khachhang ON phanhoi.id_kh=khachhang.id_kh
                                                        INNER JOIN sanpham ON sanpham.id_sp=phanhoi.id_sp
                                                        ORDER BY ngaydang DESC";
                        $kq = $conn->query($sql);
                        foreach ($kq as $key => $value) {
                    ?>
                        <tr>
                            <td><?php echo$value['user']?></td>
                            <td><?php echo$value['name']?></td>
                            <td><?php echo$value['note_feedback']?></td>
                            <td><?php echo$value['ngaydang']?></td>
                            <th> <a href="index.php?act=xoabl&maxoasp=<?=$value ['id_sp']?>&maxoakh=<?=$value ['id_kh']?>"> <button style="border-radius: 5px;border: none;padding:5px;background-color: #e62d20;color:#fff;" onclick="return confirm('Bạn có chắc chắn muốn xóa không !')">Xóa</button> </a> </th>
                        </tr>
                    <?php       
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>