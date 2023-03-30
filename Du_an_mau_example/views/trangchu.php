<section class="section1">

    <div class="icon-color ">
        <img src="../img/ship.jpg" alt="">

        <div class="media-body">
            <h3 class="heading">Free Shipping</h3>
            <span>On order over $100</span>
        </div>
    </div>
    <div class="icon-color">
        <img src="../img/shipq.jpg" alt="">

        <div class="media-body">
            <h3 class="heading">Free Shipping</h3>
            <span>On order over $100</span>
        </div>
    </div>

    <div class="icon-color">
        <img src="../img/quary.jpg" alt="">

        <div class="media-body">
            <h3 class="heading">Free Shipping</h3>
            <span>On order over $100</span>
        </div>
    </div>
    <div class="icon-color">
        <img src="../img/customer.jpg" alt="">

        <div class="media-body">
            <h3 class="heading">Free Shipping</h3>
            <span>On order over $100</span>
        </div>
    </div>
</section>
<div id="section2">
    <section class="section2">

        <div class="section-grid">
            <div class="grid-grid">
                <img src="../img/fruit.jpg" alt="">
                <div class="text">
                    <h2><a href="">Vegetables</a></h2>
                </div>

            </div>
            <div class="grid-grid">
                <img src="../img/veget.jpg" alt="">
                <div class="text">
                    <h2><a href="">Juices</a></h2>
                </div>

            </div>
        </div>

        <div class="section-grid">
            <div class="grid-grid-center">

                <div class="text-center">
                    <h2>Vegetables</h2>
                    <p>Bảo vệ sức khỏe mọi nhà</p>
                    <button class=" animate__animated animate__heartBeat  animate__infinite" type="submit">Mua ngay</button>
                </div>
                <img width="350px" src="../img/rau_cu.jpg" alt="">

            </div>



        </div>

        <div class="section-grid">
            <div class="grid-grid">
                <img src="../img/juice.jpg" alt="">
                <div class="text">
                    <h2><a href="">Fruits</a></h2>
                </div>

            </div>
            <div class="grid-grid">
                <img src="../img/dried.jpg" alt="">

                <div class="text">
                    <h2><a href="">Drieds</a></h2>
                </div>
            </div>
        </div>
    </section>
</div>

<section class="section3 ">
    <div class="text animate__animated animate__fadeInUp ">
        <h3>Sản phẩm nổi bật</h3>
        <h1>Sản phẩm của chúng tôi</h1>
        <p>Trái cây sạch, tươi, hữu cơ như táo, cam, nho...Nguồn gốc rõ ràng. Không chất bảo quản. Dinh
            dưỡng cao. Mua trái cây online tươi, giá ưu đãi ngay!</p>
    </div>
    <div class="product">
        <?php
        $ssms = "SELECT * FROM sanpham";
        $kq = $conn->query($ssms)->rowCount();
        // item perpage
        $limit = isset($_GET['limit']) ? $_GET['limit'] : 8;
        // page 
        $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
        $offset = ($current_page - 1) * $limit;
        $totalPage = ceil($kq / $limit);

        $stmt = $conn->query("SELECT * FROM sanpham  LIMIT $limit OFFSET $offset");
        foreach ($stmt as $key => $value) {
            $old_price = $value['old_price'];
            $new_price = $value['new_price'];
            # code...
        ?>
            <div class="product-list">
                <a href="index.php?act=ctsp&mact=<?php echo $value['id_sp'] ?>" style="text-decoration: none;">
                    <div class="product-row" style="height: 400px;">
                        <img width="253px" src="../img/<?php echo $value['img'] ?>" alt="">
                        <div class="product-text">
                            <span style="font-size: 20px;color:#91ad41;"><?php echo $value['name'] ?></span><br>
                            <?php
                            if ($old_price > $new_price) {
                            ?>
                                <span class="line-text"><?php echo number_format($value['old_price']) ?></span>
                                <span style="color: red;font-size: 20px;font-weight: bold;"><?php echo number_format($value['new_price']) ?>đ</span>
                        </div>
                        <div class="sale">
                            <div class="iii">
                                <i width=" 40px" class="fas fa-bookmark"></i>
                            </div>
                            <p>Sale</p>
                        </div>
                    <?php
                            } else {
                    ?>
                        <span style="color: red;font-size: 20px;font-weight: bold;"><?php echo number_format($value['new_price']) ?>đ</span>
                    </div>
                <?php
                            }
                ?>
            </div>
            </a>
            <div class="overlay">
                <a href=""><i class="fas fa-shopping-cart"></i></a>
                <a href=""> <i class="fas fa-heart"></i></a>
            </div>
    </div>
<?php
        }
?>
</div>
<?php
include 'pagination.php';
?>
</section>
<section class="section4">
    <div class="img-bg3"></div>
    <div class="section4-text">
        <h3>Giá tốt nhất cho bạn</h3>
        <h2 class="mb-1">Ưu đãi trong ngày</h2>
        <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p>
        <span class="mb-2">Rau chân vịt</span><br>
        <span style="text-decoration-line: line-through; color:gray">12000đ </span>
        <span> còn 6000đ</span>
        <div class="time">
            <div class="item">
                <p>Ngày</p>
                <span id="days">Ngày</span>
            </div>
            <div class="item">
                <p>Giờ</p>
                <span id="hours">Giờ</span>
            </div>
            <div class="item">
                <p>Phút</p>
                <span id="minutes">Phút</span>
            </div>
            <div class="item">
                <p>Giây</p>
                <span id="seconds">Giây</span>
            </div>
        </div>

    </div>
</section>
<section class="section5">
    <div class="text">
        <h3>Về chúng tôi</h3>
        <h2>Các nhà cung cấp thực phẩm</h2>
        <p>Xa xa, đằng sau những ngọn núi chữ, xa những quốc gia Vokalia và <br> Consonantia, có những văn
            tự mù mịt. Tách biệt họ sống trong</p>
    </div>

    <div class="swiper mySwiper">
        <div class="swiper-wrapper">
            <?php
            $stement = $conn->query("SELECT * FROM khachhang WHERE id_role=1");
            foreach ($stement as $key => $value) {
            ?>
                <div class="swiper-slide">
                    <div class="content">
                        <img src="../img/<?php echo $value['avt'] ?>" alt=""><br>
                        <span>Xa xa, đằng sau những ngọn núi chữ, xa những quốc gia Vokalia và Consonantia, có
                            những văn tự mù mịt.</span><br>
                        <h2><?php echo $value['user'] ?></h2>
                        <p>Email:<?php echo $value['email'] ?></p>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
        <div class="swiper-pagination"></div>
    </div>
    <menu></menu>
</section>
</div>
<section class="section6">
    <p style="font-size: 20px;">Hotline</p>
    <h2 style="font-size: 50px;"> + 1235 235 598</h2>
    <p>Chúng tôi cam kết 100% các sản phẩm có nguồn gốc xuất xứ rõ ràng, sạch, an toàn và đảm bảo chất lượng
        ngon nhất.</p>
</section>
