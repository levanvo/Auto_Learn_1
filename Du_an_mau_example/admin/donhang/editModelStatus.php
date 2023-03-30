<?php
if (isset($_GET['id_dh'])) {
    $id_dh = $_GET['id_dh'];
    $sql = "SELECT * FROM donhang WHERE id_dh=$id_dh";
    $kq = $conn->query($sql)->fetch();
    $statusOrder = $kq['id_tt'];

    $sqlstt = "SELECT * FROM trangthaidonhang";
    $kqstt = $conn->query($sqlstt)->fetchAll();

    // var_dump($kqstt);die;

    if (isset($_POST['btn_status'])) {
        $status = $_POST['status'];
        $sqlupdate = "UPDATE donhang SET id_tt=$status WHERE id_dh=$id_dh";
        $kqupdate=$conn->prepare($sqlupdate);
        $kqupdate->execute();
    echo "<script>location.href='index.php?act=listdh'</script>";
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
    <h2>Trạng thái đơn hàng</h2>
    <form action="" method="POST" style="margin: 50px;">
        <select class="form-select" aria-label="Default select example" name="status" style="width: 400px;margin-bottom: 20px;">
            <?php
            foreach ($kqstt as $key) {
            ?>
                <option <?php if ($key['id_tt'] == $kq['id_tt']) {
                            echo 'selected';
                        } ?> value="<?= $key['id_tt'] ?>"><?= $key['trangthai'] ?></option>
            <?php
            }
            ?>
        </select>
        <button type="submit" class="btn btn-success" name="btn_status">xác nhận</button>
    </form>
</body>

</html>