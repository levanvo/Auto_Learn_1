<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css-model/css/blog.css">
</head>

<body>
    <div class="text-banner">
        <h1>Nhóm 3 xin chào các bạn nhé !</h1>
        <!-- <form action="">
        <input placeholder="Tìm kiếm..." type="text">
        <button type="submit"><i class="fas fa-search"></i></button>
      </form> -->
    </div>

    <div class="container">
        <section class="content-left">
            <?php
            $stmt = "SELECT * FROM tintuc";
            $kq = $conn->query($stmt);
            foreach ($kq as $key => $value) {
            ?>
                <div class="blog-content">
                    <div class="blog-img1 img-3">
                        <img src="../img/<?php echo $value['img'] ?>" width="210px" height="210px" style="object-fit: cover;" alt="">
                    </div>
                    <div class="noidung">
                        <span><?php echo $value['ngaydang'] ?> &emsp; <i class="far fa-comment-alt"></i> 3</span>
                        <h3><?php echo $value['title'] ?></h3>
                        <p><?php echo $value['content'] ?></p>
                        <button style="cursor: pointer;" type="submit">Đọc thêm</button>
                    </div>
                </div>
            <?php
            }
            ?>

        </section>
        <section class="right-content">
            <div class="timkiem">
                <input type="text" name="" id="" placeholder="Tìm kiếm...">
                <i class="fas fa-search"></i>
            </div>
            <div class="top-blog">
                <h3>Bài viết mới</h3>
                <?php
                $sql = "SELECT * FROM tintuc LIMIT 3";
                $stmt = $conn->query($sql);
                foreach ($stmt as $key => $value) {
                ?>
                    <div class="blog">
                        <div class="blog-img1 img-5">
                            <img src="../img/<?php echo $value['img'] ?>" alt="" style="width: 100px;height: 100px; object-fit: cover;">
                        </div>
                        <div class="noidung-content">
                            <span><?php echo $value['ngaydang'] ?> &emsp; <i class="far fa-comment-alt"></i> 3</span>
                            <h3><?php echo $value['title'] ?></h3>
                        </div>
                    </div>
                <?php
                }
                ?>

            </div>

            <div class="tag" style="margin-left: 55px;">
                <h3>Tag Cloud</h3>
                <button type="submit">Fruits</button>&emsp;
                <button type="submit">Tomatoes</button>&emsp;
                <button type="submit">Mango</button>&emsp; <br><br>
                <button type="submit">Apple</button>&emsp;
                <button type="submit">Carrots</button>&emsp;
                <button type="submit">Orange</button>&emsp; <br><br>
                <button type="submit">Pepper</button>&emsp;
                <button type="submit">Eggplant</button>&emsp;

            </div>

            <div class="bai-viet" style="margin-left: 55px;">
                <h3>Bài viết</h3>
                <p>Cuộc sống hiện đại, đã khiến con người ngày càng trở nên hẹp hòi ích kỉ. Lòng tham lợi ích, tiền bạc đã đẩy những người nông dân “thôn dã tịch điền” đến con đường tạo ra “thực phẩm bẩn” để đáp ứng nhu cầu tồn tại của nhân loại.</p>
            </div>
        </section>
    </div>
</body>

</html>