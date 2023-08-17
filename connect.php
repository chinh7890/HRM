<?php
   $conn = new mysqli("localhost","root","","qlns");

   // Kiểm tra kết nối
    if ($conn->connect_error) {
        die("Kết nối thất bại: " . $conn->connect_error);
    }
    echo "Kết nối thành công";
?>
