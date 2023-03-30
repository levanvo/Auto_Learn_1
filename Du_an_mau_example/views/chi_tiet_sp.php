<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="../css-model/css/chi_tiet_sp.css">

</head>

<body>
  <div class="wapper">
    <div class="text-banner">
      <h1>Sản phẩm chi tiết</h1>
      <!-- <form action="">
        <input placeholder="Tìm kiếm..." type="text">
        <button type="submit"><i class="fas fa-search"></i></button>
      </form> -->
    </div>
    <?php
    if (isset($_GET['mact'])) {
      $mact = $_GET['mact'];
      $kq = $conn->query("SELECT * FROM sanpham WHERE id_sp=$mact")->fetch();
      // var_dump($kq);die;
      $iddm = $kq['id_dm'];
      // echo $kq['id_sp'];die;
    }

    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $dateNow = date('d/m/Y');
    $id_pr = $kq['id_sp'];
    ?>
    <section class="product_ct">
      <a href="index.php?act=ctsp&mact=<?php echo $kq['id_sp'] ?>" style="text-decoration: none;">
        <div class="product-img">
          <img width="400px" src="../img/<?php echo $kq['img'] ?>" alt="" style="margin:0 110px">
        </div>
      </a>
      <div class="noi_dung">
        <h2><?php echo $kq['name'] ?></h2>
        <span><b>Tình trạng: </b></span> <span class="trang_thai"><?php if ($kq['quantity'] == 0) {
                                                                    echo "Hết hàng";
                                                                  ?>
        </span>
        <span><b>&emsp; Số lượng:</b> </span> <?php echo $kq['quantity'] ?> <br>
        <span class="price"><?php echo number_format($kq['new_price'])  ?>₫</span> &emsp; <span class="price-old"><?php echo number_format($kq['old_price'])  ?>₫</span><br>
        <span><b> Chất lượng: </b></span>5.0 &emsp; <i class="far fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i> <br>
        <span><b>Khối lượng: </b></span> <span>1 kg</span><br>
        <!-- <span><b>Số lượng:&emsp; </b></span><input type="number" min="0" value="1"><br> -->
        <button onclick="return confirm('Sản phẩm đã hết hàng!')"> <a href="index.php?act=sanpham" style="text-decoration: none;color: #fff;"> Thêm vào giỏ hàng</a></button><br>
        Gọi đặt mua: <span style="color: #82ae46">19006750</span> để nhanh chóng đặt hàng
      <?php
                                                                  } else {
                                                                    echo "Còn hàng";
      ?>
        </span>
        <span><b>&emsp; Số lượng:</b> </span> <?php echo $kq['quantity'] ?> <br>
        <span class="price"><?php echo number_format($kq['new_price'])  ?>₫</span> &emsp; <span class="price-old"><?php echo number_format($kq['old_price'])  ?>₫</span><br>
        <span><b> Chất lượng: </b></span>5.0 &emsp; <i class="far fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i> <br>
        <span><b>Khối lượng: </b></span> <span>1 kg</span><br>
        <span><b>Số lượng:&emsp; </b></span>

        <form method="POST" action="cart2.php?id_cart=<?= $kq['id_sp'] ?>">
          <input style="padding: 10px;" type="number" min="1" max="<?php echo $kq['quantity'] ?>" name="quantity" value="1"><br>
          <button type="submit" name="btn" class="btn-sb" style="float: none;"> Thêm vào giỏ hàng</button><br>
        </form>
        Gọi đặt mua: <span style="color: #82ae46">19006750</span> để nhanh chóng đặt hàng
      <?php
                                                                  } ?>

      </div>



      <div class="side-bar-right">
        <div class="nav-dm">
          <ul>
            <li class="danh_muc"><b>Danh mục sản phẩm</b></li>
            <?php
            $kqdm = $conn->query("SELECT * FROM danhmuc");
            foreach ($kqdm as $key => $value) {
            ?>
              <li><a href="index.php?act=danhmucsanpham&madanhmuc=<?php echo $value['id_dm'] ?>"><?php echo $value['name'] ?></a></li>
            <?php
            }
            ?>
          </ul>
        </div>
        <div class="sp-yeu-thich">
          <ul>
            <li class="danh_muc"><b>Top 5 sản phẩm mới nhất</b></li>
            <?php
            $stement = $conn->query("SELECT * FROM sanpham ORDER BY id_sp DESC LIMIT 5");
            foreach ($stement as $key => $value) {
            ?>
              <li><a href="index.php?act=ctsp&mact=<?php echo $value['id_sp'] ?>"><img width="40px" src="../img/<?php echo $value['img'] ?>" alt=""><span><?php echo $value['name'] ?></span></a></li>
            <?php
            }
            ?>

          </ul>
        </div>
      </div>

    </section>
    <section class="wrapper-tab">
      <div class="tabs">
        <ul class="nav-tabs">
          <li class="active"><a href="#menu_1">Mô tả sản phẩm</a></li>
          <li><a href="#menu_2">Phản hồi khách hàng</a></li>
        </ul>
        <div class="tab-content">
          <div id="menu_1" class="tab-content-item">
            <h1><?php echo $kq['name'] ?></h1>
            <?php echo $kq['description'] ?>

            <div class="img-tab">
              <img src="../img/<?php echo $kq['img'] ?>" alt="">
            </div>
            <p> <?php echo $kq['description'] ?></p>
          </div>
          <div id="menu_2" class="tab-content-item">
            <h1>Nhận xét</h1>
            <?php
            if (!isset($_SESSION['user'])) {
            ?>
              <form>
                <div class="comment">
                  <img width="70px" height="50px" src="../img/dried.jpg" alt="">
                  <input type="text" name="cmt" placeholder="Thêm phản hồi.."><br>
                </div>
                <button type="submit" onclick="return confirm('Bạn phải đăng nhập để bình luận!')">Gửi đi</button>
              </form>
            <?php
            } else {
            ?>
              <form method="POST">
                <div class="comment">
                  <img width="70px" height="50px" src="../img/<?php echo $stmt['avt'] ?>" alt="">
                  <input type="text" name="cmt" placeholder="Thêm phản hồi.."><br>
                </div>
                <button type="submit" name="btn"> Gửi đi</button>
              </form>
            <?php
              // echo $id_kh;
              // echo $id_pr;
              if (isset($_POST['btn'])) {
                $cmt = $_POST['cmt'];
                $sqlcmt = "INSERT INTO phanhoi (id_kh,id_sp,note_feedback,ngaydang) 
                            VALUES($id_kh,$id_pr,'$cmt','$dateNow')";
                $kqcmt = $conn->exec($sqlcmt);
                // header('location: ' . $_SERVER['HTTP_REFERER']);
                // header("Location: http://localhost/du_an1/views/index.php?act=ctsp&mact=$id_pr");
                echo "<script>location.href='index.php?act=ctsp&mact=$id_pr'</script>";
              }
            }
            ?>
            <div class="form-kh-preview">
              <h1>Các phản hồi khác</h1>
              <?php
              $kqph = $conn->query("SELECT * FROM phanhoi 
                                  JOIN sanpham ON phanhoi.id_sp = sanpham.id_sp
                                  JOIN khachhang ON phanhoi.id_kh=khachhang.id_kh
                                  WHERE phanhoi.id_sp=$id_pr");
              foreach ($kqph as $key) {
                $id_user = $key['id_kh'];
                $sqluser = "SELECT * FROM khachhang WHERE id_kh=$id_user";
                $kquser = $conn->query($sqluser)->fetch();
                # code...
              ?>
                <div class="kh-pr">
                  <div class="">
                    <img width="70px" src="../img/<?php echo $kquser['avt'] ?>" alt="">
                  </div>
                  <div class="tt-kh">
                    <span><b><?php echo $kquser['user'] ?> </b></span> &emsp; <i class="far fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i> &emsp; <span style="color: gray"><?php echo $key['ngaydang'] ?></span><br>
                    <span><?php echo $key['note_feedback'] ?></span>
                  </div>
                </div>
              <?php
              }
              ?>
            </div>

          </div>
        </div>
      </div>
    </section>
    <section class="sp_lienquan">
      <h1>Các sản phẩm liên quan</h1>
      <div class="product">
        <?php
        $stmtdm = $conn->query("SELECT * FROM sanpham WHERE id_sp <> $mact 
        AND id_dm=$iddm ORDER BY id_sp DESC LIMIT 0,4");
        foreach ($stmtdm as $key => $value) {
          # code...
        ?>
          <div class="product-list">

            <a href="index.php?act=ctsp&mact=<?php echo $value['id_sp'] ?>" style="text-decoration: none;">
              <div class="product-row">
                <img width="253px" src="../img/<?php echo $value['img']  ?>" alt="">
                <div class="product-text">
                  <span style="color: #82ae46;font-size: 20px;font-weight: bold;"><?php echo $value['name'] ?></span><br>
                  <span class="line-text"><?php echo number_format($value['old_price'])  ?>đ</span>
                  <span style="color: red;font-size: 20px;font-weight: 600;"><?php echo number_format($value['new_price'])   ?>đ</span>
                </div>
              </div>
              <div class="overlay">
                <a href="#"><i class="fas fa-shopping-cart"></i></a>
                <a href="#"> <i class="fas fa-heart"></i></a>
              </div>
            </a>

          </div>
        <?php
        }
        ?>
      </div>
    </section>
  </div>
</body>
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script>
  $(document).ready(function() {
    $('.tab-content-item').hide();
    $('.tab-content-item:first-child').fadeIn();
    $('.nav-tabs li').click(function() {
      //active nav tabs
      $('.nav-tabs li').removeClass('active');
      $(this).addClass('active');

      //Show tab-content item
      let id_tab_content = $(this).children('a').attr('href');
      // alert(id_tab_content);
      $('.tab-content-item').hide();
      $(id_tab_content).fadeIn();
      return false;
    });
  });
</script>

</html>