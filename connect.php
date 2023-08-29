<?php
//    $conn = new mysqli("localhost","root","new_password","HRM");

   $conn = new mysqli("localhost","root","","hrm_database");
//    $conn = new mysqli("localhost","root","","qlns");

 
// Kiểm tra kết nối
    if ($conn->connect_error) {
        die("Kết nối thất vọng: " . $conn->connect_error);
    }
    // echo "Kết nối thành công";
?>
