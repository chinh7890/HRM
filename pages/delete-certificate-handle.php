<?php
session_start();
include('../connect.php');


// XOA CERTIFICATE
if (isset($_POST['certificate_id']) && isset($_POST['employee_id'])) {
    $id = $_POST['employee_id'];
    $cer_id = $_POST['certificate_id'];

    // Lấy thông tin mã nhân viên từ CSDL
    $sql_select = "SELECT  tb_certificate.certificate, tb_employee.employee_code
    FROM  tb_certificate, tb_employee
    WHERE tb_employee.employee_id =  tb_certificate.employee_id AND tb_certificate.certificate_id=$cer_id";
    $result = mysqli_query($conn, $sql_select);
    $row = mysqli_fetch_assoc($result);
    if ($row) {
        $employeeCode = $row['employee_code'];
        $certificateName = $row['certificate'];


        $filePath = "../assets/files/" . $employeeCode . "/Certificate/" . $certificateName; // Đường dẫn tới thư mục

        $del_success = unlink($filePath);
        if ($del_success) {
            $sql = "DELETE FROM  tb_certificate  WHERE tb_certificate.certificate_id=$cer_id;";
            $res = mysqli_query($conn, $sql);
            header("location: list-employee.php");
        } else {
            header("location: list-employee.php");
        }
    } else {
        header("location: list-employee.php");
    }
} else {
    header("location: list-employee.php");
}
