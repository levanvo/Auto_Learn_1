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
    <div class="wapper">
        <div class="text-banner">
            <h1>Tìm kiếm sản phẩm</h1>
            <form action="" method="POST">
                <input placeholder="Tìm kiếm..." type="text" name="search">
                <button type="submit" name="btn_search" style="cursor: pointer;"><i class="fas fa-search"></i></button>
            </form>
        </div>
        <div class="danh_muc">
            <button><a href="index.php?act=sanpham">Tất cả</a></button>
            <?php
            $stmt = $conn->query("SELECT * FROM danhmuc");
            foreach ($stmt as $key => $value) {
            ?>
                <button><a href="index.php?act=danhmucsanpham&madanhmuc=<?php echo $value['id_dm'] ?>"><?php echo $value['name'] ?></a></button>
            <?php
            }
            ?>
        </div>

        <?php
        if (isset($_POST['btn_search'])) {
            $keyword = $_POST['search'];
            $sqlsearch = ("SELECT * FROM sanpham WHERE name LIKE '%$keyword%'");
            $kqsearch = $conn->query($sqlsearch);
        ?>
            <h2 class="tieu_de"> Sản phẩm tìm kiếm được</h2>
            <div class="product">
                <?php
                foreach ($kqsearch as $key => $value) {
                    # code...
                ?>
                    <div class="product-list">
                        <div class="product-row">
                            <a href="index.php?act=ctsp&mact=<?php echo $value['id_sp'] ?>">
                                <img width="253px" src="../img/<?php echo $value['img'] ?>" alt="">
                            </a>
                            <div class="product-text">
                                <span><a href="index.php?act=ctsp&mact=<?php echo $value['id_sp'] ?>"><?php echo $value['name'] ?></a></span><br>
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
            } else {
                ?>
                <h2 class="tieu_de"> Sản phẩm nổi bật</h2>
                <div class="product">
                    <?php
                    $stmt = $conn->query("SELECT * FROM sanpham ORDER BY id_sp LIMIT 0,12");
                    foreach ($stmt as $key => $value) {
                    ?>
                        <div class="product-list">
                            <div class="product-row">
                                <a href="index.php?act=ctsp&mact=<?php echo $value['id_sp'] ?>">
                                    <img width="253px" src="../img/<?php echo $value['img'] ?>" alt="">
                                </a>
                                <div class="product-text">
                                    <span><a href="index.php?act=ctsp&mact=<?php echo $value['id_sp'] ?>"><?php echo $value['name'] ?></a></span><br>
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
                }
                ?>
                </div>
            </div>
</body>

</html>