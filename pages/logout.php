<?php
    include('../connect.php');
    session_destroy();
    header('location:'.SITEURL.'login.php');
?>