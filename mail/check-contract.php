<?php
require "send-mail.php";
require "../connect.php";
$currentDate = date("m-d");
$currentEnd = date("Y-m-d");
// lấy ngày trước ngày hiện tại 2 ngày
$previousEndDate = date("Y-m-d", strtotime("-2 days", strtotime($currentEnd)));


$sql = "SELECT tb_contract.end_date,tb_employee.date_of_birth,tb_employee.english_name, tb_employee.last_name, tb_employee.first_name, tb_address.email, tb_employee.employee_id FROM tb_employee, tb_address, tb_contract, tb_type_contract WHERE tb_employee.employee_id = tb_address.employee_id AND tb_employee.employee_id = tb_contract.employee_id 
    AND tb_contract.type_contract_id = tb_type_contract.type_contract_id
    AND DATE_SUB(tb_contract.end_date, INTERVAL 2 DAY) = '$currentEnd'; 
    ";


$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $mail = new Mailer();
    // Duyệt qua danh sách người dùng và gửi email thông báo
    while ($row = $result->fetch_assoc()) {

        $name = $row['last_name'] . ' ' . $row['first_name'];
        $to = $row['email'];
        $subject = "Thông báo sắp hết hạn hợp đồng";
        $message = "Hi " . $row['english_name'] . "\n Bạn sắp hết hạn hợp đồng!";

        $mail->checkContract($subject, $message, $to, $name);
    }
}


?>

