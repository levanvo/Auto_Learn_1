<?php 
session_start();
include '../css-model/model/db.php';
    if(isset($_GET['id_cart']) && !empty($_POST)){
        $id = $_GET['id_cart'];
        $product_number = $_POST['quantity'];
        

        $sql = "SELECT * FROM sanpham WHERE id_sp = $id";
        $kq=$conn->query($sql)->fetch();
        if(!isset($_SESSION['cart'])){
            $cart = [];
            $cart[$id] = [
                'id' => $id,
                'product_name' => $kq['name'],
                'product_img' => $kq['img'],
                'product_price' => $kq['new_price'],
                'product_number' => $product_number,
                'sum_money' => $kq['new_price'] * $product_number,
            ];
        }else{
            $cart = $_SESSION['cart'];
            if(array_key_exists($id,$cart)){
                $so_luong = $cart[$id]['product_number'] + intval($product_number);
                $cart[$id] = [
                    'id' => $id,
                    'product_name' => $kq['name'],
                    'product_img' => $kq['img'],
                    'product_price' => $kq['new_price'],
                    'product_number' => $so_luong,
                    'sum_money' => $kq['new_price'] * $so_luong,
                ];
            }else{
                $cart[$id] = [
                    'id' => $id,
                    'product_name' => $kq['name'],
                    'product_img' => $kq['img'],
                    'product_price' => $kq['new_price'],
                    'product_number' => $product_number,
                    'sum_money' => $kq['new_price'] * $product_number,
                ];
            }
        }
        $_SESSION['cart'] = $cart;

        // var_dump($_SESSION);
        header('Location: index.php?act=cart');
    }else {
        header('Location:index.php?act=sanpham');
        die();
    }

    ?>
    
