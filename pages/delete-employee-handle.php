<?php
session_start();
include('../connect.php');

if (isset($_POST['employee_id'])) {
    $id = $_POST['employee_id'];
    $sql = "DELETE FROM tb_employee WHERE employee_id=$id;";
    $res = mysqli_query($conn, $sql);
    header("location: ./list-employee.php");
} else {
    header("location: ./pages/list-employee.php");
}
?>