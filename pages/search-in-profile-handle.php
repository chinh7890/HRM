<?php
session_start();
include('../connect.php');
if(isset($_POST['search_input']))
{
    $id = $_GET['id'];
    $profile_employee=$_POST['search_input'];
    $sql_select = "SELECT employee_id FROM tb_employee 
    WHERE (employee_code LIKE '%$profile_employee%') OR  
          (last_name LIKE '%$profile_employee%') OR
          (first_name LIKE '%$profile_employee%') OR
          (english_name LIKE '%$profile_employee%')";
    $result = mysqli_query($conn, $sql_select);
    $row = mysqli_fetch_assoc($result);
    if($row)
    {
        header("location: profile.php?id=".$row['employee_id']."");
        $_SESSION['error_search']=false;
    }
    else{
        $_SESSION['error_search']=true;
        header("location: profile.php?id=".$id);
    }
}



