<div class="form" style="padding:  40px ;">
    <h2 style="color: #91ad41;margin-bottom: 30px;font-weight:600;">Thêm Voucher</h2>
    <form style="margin-bottom: 120px;" method="POST">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Id voucher</label>
            <input type="text" class="form-control" id="exampleInputEmail1" name="id" aria-describedby="emailHelp" placeholder="Tự động tăng" disabled>
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Mã giảm giá</label>
            <input type="text" class="form-control" id="exampleInputEmail1" name="code" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Ngày bắt đầu</label>
            <input type="text" class="form-control" id="exampleInputEmail1" name="startday" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Ngày kết thúc</label>
            <input type="text" class="form-control" id="exampleInputEmail1" name="endday" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Số tiền giảm(đơn vị %)</label>
            <input type="text" class="form-control" id="exampleInputEmail1" name="salemony" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Số lượng voucher</label>
            <input type="text" class="form-control" id="exampleInputEmail1" name="quantity" aria-describedby="emailHelp">
        </div>
        <button type="submit" class="btn " name="btn" style="background-color: #91ad41;color:#fff;">Thêm Voucher</button>
    </form>
    <?php
    if (isset($_POST['btn'])) {
        $code = $_POST['code'];
        $startday = $_POST['startday'];
        $endday = $_POST['endday'];
        $sale1 = $_POST['salemony'];
        $sale = $sale1 / 100;
        $sl = $_POST['quantity'];

        $sql = "INSERT INTO magiamgia(code,startday,endday,salemony,quantity) 
        VALUES('$code','$startday','$endday','$sale','$sl')";
        $kq = $conn->exec($sql);
        echo "<script>location.href='index.php?act=voucher'</script>";
    }
    ?>
</div>
<!-- <div class="form" style="padding:  40px ;">
    <h2 style="color: #91ad41;margin-bottom: 30px;font-weight:600;">Thêm Voucher</h2>
    <form style="margin-bottom: 120px;">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Id voucher</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Tự động tăng" disabled>
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Mã giảm giá</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Ngày bắt đầu</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Ngày kết thúc</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Số tiền giảm</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Số lượng voucher</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <button type="submit" class="btn " style="background-color: #91ad41;color:#fff;">Thêm Voucher</button>
    </form>
</div> -->