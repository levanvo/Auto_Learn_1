<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css-model/css/voucher.css">
</head>

<body>
    <div class="wapper">
        <div class="text-banner">
            <h1>Siêu khuyến mại</h1>
            <form action="">
                <input placeholder="Tìm kiếm..." type="text">
                <button type="submit"><i class="fas fa-search"></i></button>
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
        <h2 class="tieu_de">Sản phẩm khuyến mại</h2>
        <section class="vocher">
            <div class="product">
                <?php
                $stmt = $conn->query("SELECT * FROM sanpham ORDER BY id_sp LIMIT 0,9");
                foreach ($stmt as $key => $value) {
                ?>
                    <div class="product-list">

                        <div class="product-row">
                            <a href="index.php?act=ctsp&mact=<?php echo $value['id_sp'] ?>">
                                <img width="253px" src="../img/<?php echo $value['img'] ?>" alt="">
                            </a>
                            <div class="product-text">
                                <span style="color: #82ae46;font-size: 20px;font-weight: blod;"><?php echo $value['name'] ?></span><br>
                                <span class="line-text"><?php echo number_format($value['old_price'])  ?></span>
                                <span style="font-size:18px;color: red;font-weight: 600;"><?php echo number_format($value['new_price'])  ?></span>
                            </div>
                            <div class="sale">
                                <div class="iii">
                                    <i width=" 40px" class="fas fa-bookmark"></i>
                                </div>
                                <p>30%</p>
                            </div>
                        </div>
                        <div class="overlay">
                            <a href=""><i class="fas fa-shopping-cart"></i></a>
                            <a href=""> <i class="fas fa-heart"></i></a>
                        </div>

                    </div>
                <?php
                    # code...
                }
                ?>

                <!-- <div class="product-list">
                    <div class="product-row">
                        <img width="252px" src="../img/product-3.jpg" alt="">
                        <div class="product-text">
                            <span><a href="">Đậu bắp</a></span><br>
                            <span class="line-text">$60000</span>
                            <span>$54000</span>
                        </div>
                        <div class="sale">
                            <div class="iii">
                                <i width=" 40px" class="fas fa-bookmark"></i>
                            </div>
                            <p>30%</p>
                        </div>
                    </div>

                    <div class="overlay">
                        <a href=""><i class="fas fa-shopping-cart"></i></a>
                        <a href=""> <i class="fas fa-heart"></i></a>
                    </div>
                </div>
                <div class="product-list">
                    <div class="product-row">
                        <img width="253px" src="../img/product-1.jpg" alt="">

                        <div class="product-text">
                            <span><a href="">Ớt chuông</a></span><br>
                            <span class="line-text">$60000</span>
                            <span>$54000</span>

                        </div>
                        <div class="sale">
                            <div class="iii">
                                <i width=" 40px" class="fas fa-bookmark"></i>
                            </div>
                            <p>30%</p>


                        </div>
                    </div>
                    <div class="overlay">
                        <a href=""><i class="fas fa-shopping-cart"></i></a>
                        <a href=""> <i class="fas fa-heart"></i></a>
                    </div>
                </div>
                <div class="product-list">
                    <div class="product-row">
                        <img width="253px" src="../img/product-4.jpg" alt="">

                        <div class="product-text">
                            <span><a href="">Bắp cải tím</a></span><br>
                            <span class="line-text">$60000</span>
                            <span>$54000</span>

                        </div>
                        <div class="sale">
                            <div class="iii">
                                <i width=" 40px" class="fas fa-bookmark"></i>
                            </div>
                            <p>30%</p>


                        </div>
                    </div>
                    <div class="overlay">
                        <a href=""><i class="fas fa-shopping-cart"></i></a>
                        <a href=""> <i class="fas fa-heart"></i></a>
                    </div>
                </div>
                <div class="product-list">
                    <div class="product-row">
                        <img width="253px" src="../img/product-1.jpg" alt="">

                        <div class="product-text">
                            <span><a href="">Ớt chuông</a></span><br>
                            <span class="line-text">$60000</span>
                            <span>$54000</span>

                        </div>
                        <div class="sale">
                            <div class="iii">
                                <i width=" 40px" class="fas fa-bookmark"></i>
                            </div>
                            <p>30%</p>


                        </div>
                    </div>

                    <div class="overlay">
                        <a href=""><i class="fas fa-shopping-cart"></i></a>
                        <a href=""> <i class="fas fa-heart"></i></a>
                    </div>
                </div>
                <div class="product-list">
                    <div class="product-row">
                        <img width="252px" src="../img/product-3.jpg" alt="">

                        <div class="product-text">
                            <span><a href="">Đậu bắp</a></span><br>
                            <span class="line-text">$60000</span>
                            <span>$54000</span>

                        </div>
                        <div class="sale">
                            <div class="iii">
                                <i width=" 40px" class="fas fa-bookmark"></i>
                            </div>
                            <p>30%</p>


                        </div>
                    </div>

                    <div class="overlay">
                        <a href=""><i class="fas fa-shopping-cart"></i></a>
                        <a href=""> <i class="fas fa-heart"></i></a>
                    </div>
                </div>
                <div class="product-list">
                    <div class="product-row">
                        <img width="253px" src="../img/product-1.jpg" alt="">

                        <div class="product-text">
                            <span><a href="">Ớt chuông</a></span><br>
                            <span class="line-text">$60000</span>
                            <span>$54000</span>

                        </div>
                        <div class="sale">
                            <div class="iii">
                                <i width=" 40px" class="fas fa-bookmark"></i>
                            </div>
                            <p>30%</p>


                        </div>
                    </div>
                    <div class="overlay">
                        <a href=""><i class="fas fa-shopping-cart"></i></a>
                        <a href=""> <i class="fas fa-heart"></i></a>
                    </div>
                </div>
                <div class="product-list">
                    <div class="product-row">
                        <img width="253px" src="../img/product-4.jpg" alt="">

                        <div class="product-text">
                            <span><a href="">Bắp cải tím</a></span><br>
                            <span class="line-text">$60000</span>
                            <span>$54000</span>

                        </div>
                        <div class="sale">
                            <div class="iii">
                                <i width=" 40px" class="fas fa-bookmark"></i>
                            </div>
                            <p>30%</p>


                        </div>
                    </div>
                    <div class="overlay">
                        <a href=""><i class="fas fa-shopping-cart"></i></a>
                        <a href=""> <i class="fas fa-heart"></i></a>
                    </div>
                </div> -->
            </div>
            <div class="seooo">
                <div class="sp-yeu-thich">
                    <ul>
                        <li class="top-dm"><b>Top 5 sản phẩm Mới nhất</b></li>
                        <?php
                        $stement = $conn->query("SELECT * FROM sanpham ORDER BY id_sp DESC LIMIT 5");
                        foreach ($stement as $key => $value) {
                            # code...
                        ?>
                        <li><a href="index.php?act=ctsp&mact=<?php echo $value['id_sp'] ?>"><img width="40px" src="../img/<?php echo $value['img'] ?>" alt=""><span><?php echo $value['name'] ?></span></a></li>
                        <?php
                        }
                        ?>
                    </ul>
                </div>
                <div class="top-blog">
                    <h3>Bài viết gần đây</h3>
                    <div class="blog">
                        <div class="blog-img1 img-5">
                        </div>
                        <div class="noidung-content">
                            <span>19/11/2020 &emsp; <i class="far fa-comment-alt"></i> 3</span>
                            <h3>Toàn năng cũng không kiểm soát được các văn bản mù quáng</h3>
                        </div>
                    </div>
                    <div class="blog">
                        <div class="blog-img6 img-5">
                        </div>
                        <div class="noidung-content">
                            <span>19/11/2020 &emsp; <i class="far fa-comment-alt"></i> 3</span>
                            <h3>Toàn năng cũng không kiểm soát được các văn bản mù quáng</h3>
                        </div>
                    </div>
                    <div class="blog">
                        <div class="blog-img3 img-5">
                        </div>
                        <div class="noidung-content">
                            <span>19/11/2020 &emsp; <i class="far fa-comment-alt"></i> 3</span>
                            <h3>Toàn năng cũng không kiểm soát được các văn bản mù quáng</h3>
                        </div>
                    </div>
                    <div class="blog">
                        <div class="blog-img4 img-5">
                        </div>
                        <div class="noidung-content">
                            <span>19/11/2020 &emsp; <i class="far fa-comment-alt"></i> 3</span>
                            <h3>Toàn năng cũng không kiểm soát được các văn bản mù quáng</h3>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</body>

</html>