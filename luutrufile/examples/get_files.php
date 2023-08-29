<?php
require_once "./connect.php";
if(isset($_GET['id'])&& isset($_GET['action'])){
    $id=$_GET['id'];
    if($_GET['action']=="PersonalProfile"){
        $sql = "SELECT
                tb_personal_profile.profile,
                tb_employee.employee_code
            FROM
                `tb_personal_profile`,
                tb_employee
            WHERE
                tb_employee.employee_id = tb_personal_profile.employee_id 
                AND tb_personal_profile.`employee_id` = $id";
        $result = $conn->query($sql);
    }elseif($_GET['action']=="Certificate"){
        $sql = "SELECT
                    tb_certificate.certificate,
                    tb_employee.employee_code
                FROM
                    tb_certificate,
                    tb_employee
                WHERE
                    tb_employee.employee_id = tb_certificate.employee_id 
                    AND tb_certificate.`employee_id` = $id";
        $result = $conn->query($sql);
    }
}

$data = array();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
}

header('Content-Type: application/json');
echo json_encode($data);
?>
