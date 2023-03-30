<?php 

session_start();
if(isset($_GET['id'])){
    $id = $_GET['id'];
    
    unset($_SESSION['cart'][$id]);
    header('Location: http://localhost/du_an1/views/index.php?act=cart');
}
