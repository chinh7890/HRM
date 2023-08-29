<?php
session_start();
include('../connect.php');

if (isset($_POST['employee_id'])) {
    $id = $_POST['employee_id'];
    $sql = "DELETE FROM tb_employee WHERE employee_id=$id;";
    $res = mysqli_query($conn, $sql);
    header("location: list-employee.php");

    $folderPath = 'path/to/folder';
    $files = glob($folderPath . '/*.xlsx');
    foreach ($files as $file) {
        if (is_file($file)) {
            unlink($file);
        }
    }

    if (is_dir($folderPath)) {
        rmdir($folderPath); 
    }

    
} else {
    header("location: list-employee.php");
}
?>