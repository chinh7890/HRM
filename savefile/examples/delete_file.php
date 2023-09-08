<?php
// Kết nối tới cơ sở dữ liệu hoặc bất kỳ thao tác cần thiết khác
require_once "../../connect.php";
if (isset($_POST["filename"]) && isset($_POST["employee_code"])&& isset($_POST["id"]) && isset($_GET['action'])) {
    if($_GET['action']=='PersonalProfile'){
        $filename = $_POST["filename"];
        $employeeCode = $_POST["employee_code"];
        $id=$_POST["id"];
        // Xóa tệp từ thư mục trước khi xóa trong CSDL (nếu cần)
        $filePath = "../../assets/files/$employeeCode/PersonalProfile/$filename";
        // echo $filePath;exit;
        if (file_exists($filePath)) {
            unlink($filePath);
        }
        // Thực hiện thao tác xóa trong CSDL (ví dụ: cập nhật bảng dữ liệu)
        // Xóa tệp khỏi cơ sở dữ liệu
        $sql = "DELETE FROM `tb_personal_profile` WHERE `employee_id` = $id and profile='$filename'" ;
        $result = $conn->query($sql);
        
        echo json_encode(["status" => "success"]);
    }elseif($_GET['action']=='Certificate'){
        $filename = $_POST["filename"];
        $employeeCode = $_POST["employee_code"];
        $id=$_POST["id"];
        // Xóa tệp từ thư mục trước khi xóa trong CSDL (nếu cần)
        $filePath = "../../assets/files/$employeeCode/Certificate/$filename";
        // echo $filePath;exit;
        if (file_exists($filePath)) {
            unlink($filePath);
        }
        // Thực hiện thao tác xóa trong CSDL (ví dụ: cập nhật bảng dữ liệu)
        // Xóa tệp khỏi cơ sở dữ liệu
        $sql = "DELETE FROM `tb_certificate` WHERE `employee_id` = $id and certificate='$filename'" ;
        $result = $conn->query($sql);
        
        echo json_encode(["status" => "success"]);
    }
    
} else {
    echo json_encode(["status" => "error", "message" => "Invalid request"]);
}


?>
