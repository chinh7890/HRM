<?php
//    $conn = new mysqli("localhost","root","new_password","HRM");
//    $conn = new mysqli("localhost","root","","qlns");
    define('SITEURL', 'http://localhost:8080/hrm/');
    $conn = new mysqli("localhost","root","","hrm_database");
   
// Kiểm tra kết nối
    if ($conn->connect_error) {
        die("Kết nối thất vọng: " . $conn->connect_error);
    }
    // echo "Kết nối thành công";
?>
