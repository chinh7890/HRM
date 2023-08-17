<?php
   $conn = new mysqli("localhost","root","new_password","HRM");

   // Kiểm tra kết nối
    if ($conn->connect_error) {
        die("Kết nối thất bại: " . $conn->connect_error);
    }
    echo "Kết nối thành công";
?>
