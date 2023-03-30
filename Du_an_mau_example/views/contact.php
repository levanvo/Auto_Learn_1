<?php
$result = "";
if (isset($_POST['btn_lienhe'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $title = $_POST['title'];
    $note = $_POST['note'];

    $stement = $conn->exec("INSERT INTO lienhe(name,email,title,note)
                            VALUES('$name','$email','$title','$note')");

    if ($stement == 1) {
        echo "<script>alert('Bạn đã gửi phản hồi thành công!')</script>";
        // $result = "Gửi thành công";
        // echo "<script>location.href='index.php?act=trangchu'</script>";
    } else {
        $result = "Gửi k thành công";
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
    <link rel="stylesheet" href="../css-model/css/contact.css">
</head>

<body>
    <div class="wrapper">
        <div class="text-banner">
            <h1>Liên hệ</h1>
            <!-- <form action="">
                <input placeholder="Tìm kiếm..." type="text">
                <button type="submit"><i class="fas fa-search"></i></button>
            </form> -->
        </div>
        <section class="local">
            <div class="box">
                <span>Địa chỉ: </span>
                <p>56, Trịnh Văn Bô, Nam Từ Liêm, Hà Nội</p>
            </div>

            <div class="box">
                <span>Điện thoại: </span>
                <p>+ 1235 2355 98</p>
            </div>

            <div class="box">
                <span>Email: </span>
                <p>info@gmail.com </p>
            </div>

            <div class="box">
                <span>Website: </span>
                <p>Vegafoods.ml</p>
            </div>
        </section>
        <section class="form-lh">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3723.8638558813955!2d105.74459841424536!3d21.03813279283566!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x313454b991d80fd5%3A0x53cefc99d6b0bf6f!2zVHLGsOG7nW5nIENhbyDEkeG6s25nIEZQVCBQb2x5dGVjaG5pYw!5e0!3m2!1svi!2s!4v1636782727288!5m2!1svi!2s" width="580" height="560" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            <div class="form">
                <form method="POST">
                    <input type="text" name="name" placeholder="Tên của bạn"><br><br>
                    <input type="text" name="email" placeholder="Email"><br><br>
                    <input type="text" name="title" placeholder="Tiêu đề"><br><br>
                    <input type="text" name="note" placeholder="Nội dung"><br><br>
                    <?php
                    if (isset($_SESSION['user'])) { ?>
                        <button type="submit" name="btn_lienhe">Gửi ngay</button><br>
                    <?php } else {
                    ?>
                        <button type="submit" onclick="return confirm('Bạn phải đăng nhập để gửi phản hồi!')">
                            <a href="index.php?act=dangnhap" style="text-decoration: none;color: #fff;"> Gửi ngay</a>
                        </button><br>
                    <?php
                    }
                    ?>
                    <span style="color: red; margin-top: 15px;"><?php echo $result ?></span>
                </form>
            </div>
        </section>
    </div>
</body>

</html>