<?php
session_start();
require_once 'connect.php';
if (isset($_COOKIE["user"])) {
    $selectTT = "SELECT password FROM tb_admin WHERE username='" . $_COOKIE["user"] . "'";
    $result = mysqli_query($conn, $selectTT);
    $row = mysqli_fetch_assoc($result);
}

?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/libs/css/style.css">
    <link rel="stylesheet" href="assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        html,
        body {
            background: linear-gradient(45deg, rgba(66, 183, 245, 0.8) 0%, rgba(66, 245, 189, 0.4) 100%);
            height: 100%;

        }

        body {

            display: -ms-flexbox;
            display: flex;
            -ms-flex-align: center;
            align-items: center;
            padding-top: 40px;
            padding-bottom: 40px;
            opacity: 0, 5;
        }

        button#togglePassword {
            background-color: white;
            color: black;
            border: 1px solid #d2d2e4;
        }

        button#togglePassword:focus {
            color: #71748d;
            background-color: #fff;
            border-color: #a7a7f0;
            outline: 0;
            box-shadow: 0 0 0 0.2rem rgba(214, 214, 255, .75);
        }
        .description {
            text-align: center;
            display: block;
            line-height: 25px;
            font-size: 2rem;
            margin-top: 10px;
        }
    </style>
</head>

<body>
    <!-- ============================================================== -->
    <!-- login page  -->
    <!-- ============================================================== -->
    <div class="splash-container">
        <div class="card ">
            <div class="card-header text-center"><img class="logo-img" src="assets/images/logo.png" alt="logo"></a><span
                    class="splash-description">
                    <h1 class="description">Human Resource Management</h1>
                </span>

            </div>
            <div class="card-body">
                <form action="login-handle.php" method="POST">
                    <div class="form-group">
                        <input class="form-control form-control-lg" name="username" type="text" placeholder="User Name"
                            Required="" autocomplete="off" value="<?php
                            if (isset($_COOKIE["user"])) {
                                echo $_COOKIE["user"];
                            }
                            // if (isset($_SESSION["username"])) {
                            //     echo $_SESSION["username"];
                            // } ?>">
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <input class="form-control form-control-lg" name="password" type="password"
                                placeholder="Password" id="password" Required="" value="<?php
                                if (isset($row["password"])) {
                                    echo $row["password"];
                                } ?>">
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary" type="button" id="togglePassword"><i
                                        class="fa fa-eye"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="custom-control custom-checkbox">
                            <input class="custom-control-input" type="checkbox" name="remember">
                            <span class="custom-control-label">Remember Me</span>

                        </label>
                    </div>
                    <button type="submit" class="btn btn-primary btn-lg btn-block" name="submit">Sign in</button>

                </form>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const togglePassword = document.querySelector('#togglePassword');
            const passwordInput = document.querySelector('#password');

            togglePassword.addEventListener('click', function () {
                const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
                passwordInput.setAttribute('type', type);
                togglePassword.querySelector('i').classList.toggle('fa-eye');
                togglePassword.querySelector('i').classList.toggle('fa-eye-slash');
            });
        });
    </script>
    <!-- ============================================================== -->
    <!-- end login page  -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
    <script src="../assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <script srt="../hrm/assets/libs/js/main-js.js"></script>
</body>

</html>