<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css-model/css/product.css">
</head>

<body>
    <?php
    if (isset($_GET['madanhmuc'])) {
        $madm = $_GET['madanhmuc'];
    }
    ?>
    <div class="wapper">
        <div class="text-banner">
            <h1>Danh Mục sản phẩm</h1>
            <form action="">
                <input placeholder="Tìm kiếm..." type="text">
                <button type="submit"><i class="fas fa-search"></i></button>
            </form>
        </div>
        <div class="danh_muc">
            <button><a href="index.php?act=sanpham">Tất cả</a></button>
            <?php
            $stmt = $conn->query("SELECT * FROM danhmuc WHERE id_dm<>$madm");
            foreach ($stmt as $key => $value) {
                # code...
            ?>
                <button><a href="index.php?act=danhmucsanpham&madanhmuc=<?php echo$value['id_dm']?>"><?php echo $value['name'] ?></a></button>
            <?php
            }
            ?>

        </div>
        <?php
        $kqdm = $conn->query("SELECT * FROM danhmuc WHERE id_dm=$madm")->fetch();
        ?>
        <h2 class="tieu_de"><?php echo $kqdm['name']?></h2>
        <div class="product">
            <?php
            $stmt = $conn->query("SELECT * FROM sanpham WHERE id_dm=$madm ORDER BY id_sp LIMIT 0,12");
            foreach ($stmt as $key => $value) {
                # code...
            ?>
                <div class="product-list">
                    <div class="product-row">
                        <a href="index.php?act=ctsp&mact=<?php echo $value['id_sp'] ?>">
                            <img width="253px" src="../img/<?php echo $value['img'] ?>" alt="">
                        </a>
                        <div class="product-text">
                            <span><a href="index.php?act=ctsp&mact=<?php echo $value['id_sp'] ?>"><?php echo $value['name'] ?></a></span><br>
                            <span class="line-text"><?php echo number_format($value['old_price'])  ?>đ</span>
                            <span style="font-size: 20px;font-weight: 600;color:red"><?php echo number_format($value['new_price'])  ?>đ</span>
                        </div>
                    </div>
                    <div class="overlay">
                        <a href=""><i class="fas fa-shopping-cart"></i></a>
                        <a href=""> <i class="fas fa-heart"></i></a>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
</body>

</html>