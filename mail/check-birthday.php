<?php
require "send-mail.php";
require "../connect.php";
$currentDate = date("m-d");
$currentEnd = date("Y-m-d");

session_start();
$sql = "SELECT tb_contract.end_date,tb_employee.date_of_birth,tb_employee.english_name, tb_employee.last_name, tb_employee.first_name, tb_address.email, tb_employee.employee_id FROM tb_employee, tb_address, tb_contract, tb_type_contract WHERE tb_employee.employee_id = tb_address.employee_id AND tb_employee.employee_id = tb_contract.employee_id AND tb_contract.type_contract_id = tb_type_contract.type_contract_id; 
    ";


$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $mail = new Mailer();
    // Duyệt qua danh sách người dùng và gửi email thông báo
    while ($row = $result->fetch_assoc()) {


        if (date("m-d", strtotime($row['date_of_birth'])) == $currentDate) {
            $name = $row['last_name'] . ' ' . $row['first_name'];
            $gmail = $row['email'];
        
            $mail->checkCBirtday($gmail, $name);
        }
    }
 
}
else
{
    echo "không có sinh nhật";
}
