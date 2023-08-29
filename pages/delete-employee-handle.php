<?php
session_start();
include('../connect.php');

if (isset($_POST['employee_id'])) {
    $id = $_POST['employee_id'];

    // Lấy thông tin mã nhân viên từ CSDL
    $sql_select = "SELECT employee_code FROM tb_employee WHERE employee_id=$id;";
    $result = mysqli_query($conn, $sql_select);
    $row = mysqli_fetch_assoc($result);

    if ($row) {
        $employeeCode = $row['employee_code'];
        $sql = "DELETE FROM tb_employee WHERE employee_id=$id;";
        $res = mysqli_query($conn, $sql);


        $folderPath = "C:/wamp/www/hrm/assets/images/files" . $employeeCode; // Đường dẫn tới thư mục
        if (is_dir($folderPath)) {
            $files = scandir($folderPath);
            foreach ($files as $file) {
                if ($file !== '.' && $file !== '..') {
                    if (is_dir($folderPath . '/' . $file)) {
                    } else {
                        unlink($folderPath . '/' . $file);
                    }
                }
            }
            rmdir($folderPath);
        }

        header("location: list-employee.php");
    } else {
        header("location: list-employee.php");
    }
} else {
    header("location: list-employee.php");
}

?>