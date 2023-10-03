<?php 
    session_start();
    require_once("../connect.php");
    if($_POST)
    {   $id = $_GET['id'];
        $username = $_POST['username'];
        $role = $_POST['role'];
        $sql = "UPDATE tb_admin SET username = '$username', role = '$role' WHERE account_id = $id";
        // echo $sql;
        $conn->query($sql);
        if($conn)
        {
            $_SESSION['success_message'] = "success";
            header("location: ./manager-account.php?id=$id");
            
        }
        else
        {
            $_SESSION['error_message'] = "success";
            header("location: ./update-account.php?id=$id");
        }
    }
?>