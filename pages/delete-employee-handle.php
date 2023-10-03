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


        $folderPath = "../assets/files/" . $employeeCode; // Đường dẫn tới thư mục
        if (is_dir($folderPath)) {
            deleteDirectory($folderPath); // Gọi hàm xoá thư mục và thư mục con
        }

        header("location: list-employee.php");
        // truy vet
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $id_account = $_SESSION['account_id'];
        $name_account = $_SESSION['username'];
        $action = "Delete employee";
        $timestamp = date("Y-m-d H:i:s");
        $log_sql ="INSERT INTO tb_log (id_account, name_account, action, timestap) VALUES ($id_account, '$name_account','$action', '$timestamp') ";
        mysqli_query($conn, $log_sql);

    } else {
        header("location: list-employee.php");
    }
} else {
    header("location: list-employee.php");
}

function deleteDirectory($dir)
{
    if (!is_dir($dir)) {
        return false;
    }

    $files = array_diff(scandir($dir), array('.', '..'));
    foreach ($files as $file) {
        if (is_dir("$dir/$file")) {
            deleteDirectory("$dir/$file");
        } else {
            unlink("$dir/$file");
        }
    }

    return rmdir($dir);
}
