<?php
// session_start();
// var_dump($_SESSION);die;
isset($_SESSION['cart']) ? $_SESSION['cart'] : $_SESSION['cart'] = [];
$cart = $_SESSION['cart'];
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="../css-model/css/cart.css">
  <!--Font Awesome CDN Link-->
  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
  <!-- <link rel="stylesheet" href="css/bootstrap.min.css"> -->
  <!-- <link rel="stylesheet" href="css/style.css"> -->

</head>

<body>
  <div class="wapper">
    <div class="text-banner">
      <h1>Giỏ hàng</h1>
    </div>

    <section class="pro-cart">
      <form action="" method="POST">
        <div class="name-cart">
          <div class="sp1">
            <span>Sản phẩm</span>
          </div>
          <div class="sp2">
            <span>Đơn giá</span>
          </div>
          <div class="sp2">
            <span>Số lượng</span>

          </div>
          <div class="sp2">
            <span>Số tiền</span>

          </div>
          <div class="sp2">
            <span>Thao tác</span>
          </div>
        </div>

        <?php
        $i = 1;
        $total = 0;
        foreach ($cart as $key) {
        ?>
          <div class="san_pham">
            <div class="cate1">
              <div class="img-sp">
                <img src="../img/<?= $key['product_img'] ?>" alt="">
              </div>
              <div class="name-sp">
                <span><?= $key['product_name'] ?></span>
              </div>
            </div>
            <div class="cate2">
              <div class="price-sp">
                <span class="no-line"><?= number_format($key['product_price'])  ?>đ</span>
              </div>
              <div class="spinner">
                <div class="prev dec button">-</div>
                <div class="next inc button">+</div>

                <input type="number" id="quantity" name="" class="number-spinner input-filed" value="<?= $key['product_number'] ?>" min="1">
              </div>
              <div class="price-price total-price">
                <span id="price"><?= number_format($key['product_price'] * $key['product_number']) ?>đ</span>
              </div>
              <div class="thao-tac">
                <a style="text-decoration: none;" href="xoacart.php?id=<?php echo $key['id'] ?>"><span style=" color:red" onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm khỏi giỏ hàng không')">Xóa</span></a>
              </div>
            </div>
          </div>
        <?php
          $total += $key['product_price'] * $key['product_number'];
        }
        ?>

        <div class="tong-sp">
          <div class="mua-hang">
            <span style="font-size: 23px;">Tổng tiền hàng: </span> <span style="margin-left: 580px;font-size: 23px;" class="sp-tt"><?= number_format($total) ?>đ</span>
          </div>
        </div>
        <div class="btn_tt">
          <a href="index.php?act=sanpham" style="text-decoration: none;padding:10px;color:#fff; background-color: #86f10b;border-radius: 5px;">Tiếp tự mua hàng</a>
          <?php
          if (isset($_SESSION['user'])) {
          ?>
            <button style="border: none;border-radius: 5px;"><a href="index.php?act=checkout" style="text-decoration: none;padding:10px;color:#fff; background-color: #86f10b;">Thanh toán</a></button>
          <?php
          } else {
          ?>
            <button style="border: none;border-radius: 5px;"><a href="index.php?act=dangnhap" onclick="return confirm('Bạn phải đăng nhập để thanh toán!')" style="text-decoration: none;padding:10px;color:#fff; background-color: #86f10b;">Thanh toán</a></button>
          <?php
          }
          ?>
        </div>
      </form>
    </section>
  </div>
</body>

<script>
  var incerementButton = document.getElementsByClassName('inc');
  var decerementButton = document.getElementsByClassName('dec');

  // console.log(incerementButton);
  // console.log(decerementButton);

  //inc
  for (var i = 0; i < incerementButton.length; i++) {
    var button = incerementButton[i];
    button.addEventListener('click', function(event) {
      var buttonClicked = event.target;
      // console.log(buttonClicked);
      var input = buttonClicked.parentElement.children[2];
      // console.log(input);
      var inputValue = input.value;
      // console.log(inputValue);
      var newValue = parseInt(inputValue) + 1;
      // console.log(newValue);
      input.value = newValue;
    })
  }
  //dec
  for (var i = 0; i < decerementButton.length; i++) {
    var button = decerementButton[i];
    button.addEventListener('click', function(event) {
      var buttonClicked = event.target;
      // console.log(buttonClicked);
      var input = buttonClicked.parentElement.children[2];
      // console.log(input);
      var inputValue = input.value;
      // console.log(inputValue);
      var newValue = parseInt(inputValue) - 1;
      // console.log(newValue);
      // input.value = newValue;
      if (newValue >= 0) {
        input.value = newValue;
      } else {
        input.value = 0;

      }
    })
  }
</script>

</html>


<!-- ========================================================================================================== -->