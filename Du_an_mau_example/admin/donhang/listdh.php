 <style>
     .btn_edit {
         border: none;
         padding: 5px;
         border-radius: 5px;
         background-color: #91ad41;
         color: #fff;
     }

     .btn_view {
         border: none;
         padding: 5px;
         border-radius: 5px;
         background-color: orange;
         color: #fff;
     }
 </style>
 <div class="card shadow mb-4">
     <div class="card-header py-3">
         <h6 class="m-0 " style="color: #91ad41;font-size: 25px;font-weight: bold;">Đơn hàng</h6>

     </div>
     <div class="card-body">
         <div class="table-responsive">
             <table class="table " id="dataTable" width="100%" cellspacing="0">
                 <thead>
                     <tr>
                         <th>STT</th>
                         <th>Tên khách hàng</th>
                         <th>Phone</th>
                         <th>Email</th>
                         <th>Adress</th>
                         <th>Thời gian</th>
                         <th>Trạng thái</th>
                         <th>Cập nhật Trạng thái</th>
                         <th>Hủy đơn hàng</th>
                         <th>Chi tiết</th>
                     </tr>
                 </thead>
                 <tbody>
                     <?php
                        $i = 1;
                        $kq = $conn->query("SELECT * FROM donhang INNER JOIN trangthaidonhang ON donhang.id_tt = trangthaidonhang.id_tt ORDER BY id_dh DESC");

                        foreach ($kq as $key => $value) {
                            $id_kh = $value['id_kh'];
                            $id_dh = $value['id_dh'];
                        ?>
                         <tr>
                             <td><?php echo $i++;  ?></td>
                             <?php
                                $kqkh = $conn->query("SELECT khachhang.*,donhang.* 
                            FROM khachhang
                            INNER JOIN donhang ON khachhang.id_kh=donhang.id_kh
                            WHERE khachhang.id_kh =$id_kh AND donhang.id_kh =$id_kh")->fetch();
                                ?>
                             <td><?php echo $kqkh['user'] ?></td>
                             <td><?php echo $value['phone'] ?></td>
                             <td><?php echo $kqkh['email'] ?></td>
                             <td><?php echo $value['address'] ?></td>
                             <td><?php echo $value['time'] ?></td>
                             <td><?php
                                    echo $value['trangthai'];
                                    ?></td>
                             <td>
                                 <a href="index.php?act=editStatus&id_dh=<?php echo $value['id_dh'] ?>"><button class="btn_edit">Edit</button></a>
                             </td>
                             <th> <a href="index.php?act=xoadh&id_dh=<?php echo $value['id_dh'] ?>"> <button style="border-radius: 5px;border: none;padding:5px;background-color: #e62d20;color:#fff;" onclick="return confirm('Bạn có chắc chắn muốn xóa không !')">Xóa </button> </a> </th>
                             <td><a href="index.php?act=ctdh&ctdh=<?php echo $value['id_dh'] ?>&idkh=<?php echo $value['id_kh'] ?>"><button class="btn_view">Xem</button></a></td>
                         </tr>
                     <?php
                        }
                        ?>
                 </tbody>
             </table>
             <!-- <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Sửa trạng thái</h5>
                        </div>
                        <div class="modal-body" id="modal-body">

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div> -->
         </div>
     </div>
 </div>
 <!-- <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script>
    $(document).ready(function(){
        $('.id_bill').click(function(e){
            e.preventDefault();
            var id_bill = $(this).data('id');
            // alert(id_bill);
            $.post("editModelStatus.php", {bill_id: id_bill} , function($data){
                $('.modal-body').html($data);
            } );
        });
    });
</script> -->