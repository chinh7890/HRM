<?php
    include('../connect.php');
    session_start();
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $id_account = $_SESSION['account_id'];
    $name_account = $_SESSION['username'];
    $action = "Logged out";
    $timestamp = date("Y-m-d H:i:s");
    $log_sql ="INSERT INTO tb_log (id_account, name_account, action, timestap) VALUES ($id_account, '$name_account','$action', '$timestamp') ";
    mysqli_query($conn, $log_sql);

    session_destroy();
    header('location: ../login.php');
?>