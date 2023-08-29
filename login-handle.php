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
            session_start();
            $_SESSION['username'] = $username;
            $_SESSION['loggedin'] = true;
            header('location: ./index.php');
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