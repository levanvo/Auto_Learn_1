<?php
try {
    $db = "mysql:host=localhost;dbname=nhom3-duan1;charset=utf8";
    $username = "root";
    $password = '';

    $conn = new PDO($db, $username, $password);
    // echo "kết nối thành công!";
} catch (PDOException $e) {
    # code...
    echo 'lỗi kết nối !';
}



    
// }
