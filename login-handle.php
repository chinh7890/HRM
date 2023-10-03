<?php
require_once 'connect.php';

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password']; 
    $sql = "SELECT * FROM tb_admin WHERE username='" . $username . "' AND password='" . $password . "'";
    // echo $sql;
    // exit();
    $res = mysqli_query($conn, $sql);
    if ($res) {
        $count = mysqli_num_rows($res);
        if ($count > 0) {
            if (isset($_POST['remember'])) {
                setcookie("user", $username, time() + (86400 * 30));
                setcookie("remember", "checked", time() + (86400 * 30));
            } else {
                setcookie("user", "", -1);
                setcookie("remember", "", -1);
            }

            $row = mysqli_fetch_assoc($res);
            $role = $row['role'];
            $account_id = $row['account_id'];
            session_start();
            $_SESSION['account_id'] = $account_id;
            $_SESSION['username'] = $username;
            $_SESSION['loggedin'] = true;
            $_SESSION['role'] = $role;
            header('location: ./index.php');
            // theo vet
            date_default_timezone_set('Asia/Ho_Chi_Minh');
            $id_account = $_SESSION['account_id'];
            $name_account = $_SESSION['username'];
            $action = "Logged";
            $timestamp = date("Y-m-d H:i:s");
            $log_sql ="INSERT INTO tb_log (id_account, name_account, action, timestap) VALUES ($id_account, '$name_account','$action', '$timestamp') ";
            mysqli_query($conn, $log_sql);
            exit();
        }
        else {
            setcookie("user", "", -1);
            setcookie("remember", "", -1);
            session_start();
            $_SESSION["username"] = $_POST["username"];
            $_SESSION["notify"] = "Sai tên đăng nhập hoặc mật khẩu!";
            $_SESSION["login"] = "2";
            header('location: ./login.php');
        }
        
    } 
    else { 
             
    }
}
?>