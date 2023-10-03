<?php
session_start();

require_once '../login-handle.php';
require_once './404.php';
if (isset($_SESSION['success-import'])) {
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $id_account = $_SESSION['account_id'];
    $name_account = $_SESSION['username'];
    $action = "Import file";
    $timestamp = date("Y-m-d H:i:s");
    $log_sql = "INSERT INTO tb_log (id_account, name_account, action, timestap) VALUES ($id_account, '$name_account','$action', '$timestamp') ";
    mysqli_query($conn, $log_sql);
}
if (isset($_SESSION["notify-add"]) == 1) {
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $id_account = $_SESSION['account_id'];
    $name_account = $_SESSION['username'];
    $action = "Add employee";
    $timestamp = date("Y-m-d H:i:s");
    $log_sql = "INSERT INTO tb_log (id_account, name_account, action, timestap) VALUES ($id_account, '$name_account','$action', '$timestamp') ";
    mysqli_query($conn, $log_sql);
}
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Employee List</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="../assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/libs/css/style.css">
    <link rel="stylesheet" href="../assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <link rel="stylesheet" type="text/css" href="../assets/vendor/datatables/css/dataTables.bootstrap4.css">
    <link rel="stylesheet" type="text/css" href="../assets/vendor/datatables/css/buttons.bootstrap4.css">
    <link rel="stylesheet" type="text/css" href="../assets/vendor/datatables/css/select.bootstrap4.css">
    <link rel="stylesheet" type="text/css" href="../assets/vendor/datatables/css/fixedHeader.bootstrap4.css">
    <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
</head>
<style>
    #btn {
        margin-bottom: 10px;
        border: #e6e6f2 solid 0.1px;
    }

    th {
        text-align: center;
    }

    th,
    td {
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        width: 10px;
        /* Điều chỉnh chiều rộng tùy ý */
    }


    /* Hide the second column */
    /* td:nth-child(3),
    th:nth-child(3),
    td:nth-child(5),
    th:nth-child(5),
    td:nth-child(12),
    th:nth-child(12),
    td:nth-child(13),
    th:nth-child(13),
    td:nth-child(14),
    th:nth-child(14),
    td:nth-child(16),
    th:nth-child(16),
    td:nth-child(17),
    th:nth-child(17),
    td:nth-child(25),
    th:nth-child(25),
    td:nth-child(26),
    th:nth-child(26),
    td:nth-child(27),
    th:nth-child(27) {
        display: none;
} */

    /* Ẩn các nút Copy, Print, Excel và ColVis */
    .dataTables_wrapper .dt-buttons .buttons-pdf,
    .dataTables_wrapper .dt-buttons .buttons-print,
    .dataTables_wrapper .dt-buttons .buttons-excel,
    .dataTables_wrapper .dt-buttons .buttons-colvis {
        display: none;
    }

    .import:hover {
        color: #e6e6f2;
    }

    /* Giao diện chọn column để export */
    #modal-content-export {
        width: 500px;
        height: 700px;
        overflow: auto;
        font-size: 20px;
    }

    #select_column {
        font-size: 100px;
    }

    #select_allcolumn,
    #select_default {
        font-size: 100px;
    }

    .modal-body>label {
        font-size: 18px;
    }

    #lable_default {
        font-size: 18px;
    }

    #title_selections {
        font-size: 23px;
        color: #5969ff;
    }
</style>

</head>

<body>
    <?php
    if (isset($_SESSION["notify-add"]) && $_SESSION["notify-add"] == "1") {
        echo "<script type='text/javascript'>toastr.success('Add Employee Successfully')</script>";
        unset($_SESSION["notify-add"]);
    }
    if (isset($_SESSION["success-import"]) && $_SESSION["success-import"] == "1") {
        echo "<script type='text/javascript'>toastr.success('Import Employees Successfully')</script>";
        unset($_SESSION["success-import"]);
    }
    if (isset($_SESSION["error-import"]) && $_SESSION["error-import"] = "1") {
        echo "<script type='text/javascript'>toastr.error('The file is not in the correct format or the data already exists')</script>";
        unset($_SESSION["error-import"]);
    }
    ?>
    <!-- ============================================================== -->
    <!-- main wrapper -->
    <!-- ============================================================== -->
    <div class="dashboard-main-wrapper">
        <!-- ============================================================== -->
        <!-- navbar -->
        <!-- ============================================================== -->
        <div class="dashboard-header">
            <nav class="navbar navbar-expand-lg bg-white fixed-top">
                <a class="navbar-brand" href="../index.php">Ventech</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse " id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto navbar-right-top">

                        <!-- <li class="nav-item dropdown notification">
                            <a class="nav-link nav-icons" href="#" id="navbarDropdownMenuLink1" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false"><i class="fas fa-fw fa-bell"></i> <span
                                    class="indicator"></span></a>
                            <ul class="dropdown-menu dropdown-menu-right notification-dropdown">
                                <li>
                                    <div class="notification-title"> Notification</div>
                                    <div class="notification-list">
                                        <div class="list-group">
                                            <a href="#" class="list-group-item list-group-item-action active">
<div class="notification-info">
                                                    <div class="notification-list-user-img"><img
                                                            src="../assets/images/avatar-2.jpg" alt=""
                                                            class="user-avatar-md rounded-circle"></div>
                                                    <div class="notification-list-user-block"><span
                                                            class="notification-list-user-name">Jeremy
                                                            Rakestraw</span>accepted your invitation to join the team.
                                                        <div class="notification-date">2 min ago</div>
                                                    </div>
                                                </div>
                                            </a>
                                            <a href="#" class="list-group-item list-group-item-action">
                                                <div class="notification-info">
                                                    <div class="notification-list-user-img"><img
                                                            src="../assets/images/avatar-3.jpg" alt=""
                                                            class="user-avatar-md rounded-circle"></div>
                                                    <div class="notification-list-user-block"><span
                                                            class="notification-list-user-name">
                                                            John Abraham</span>is now following you
                                                        <div class="notification-date">2 days ago</div>
                                                    </div>
                                                </div>
                                            </a>
                                            <a href="#" class="list-group-item list-group-item-action">
                                                <div class="notification-info">
                                                    <div class="notification-list-user-img"><img
                                                            src="../assets/images/avatar-4.jpg" alt=""
                                                            class="user-avatar-md rounded-circle"></div>
                                                    <div class="notification-list-user-block"><span
                                                            class="notification-list-user-name">Monaan Pechi</span> is
                                                        watching your main repository
                                                        <div class="notification-date">2 min ago</div>
                                                    </div>
                                                </div>
</a>
                                            <a href="#" class="list-group-item list-group-item-action">
                                                <div class="notification-info">
                                                    <div class="notification-list-user-img"><img
                                                            src="../assets/images/avatar-5.jpg" alt=""
                                                            class="user-avatar-md rounded-circle"></div>
                                                    <div class="notification-list-user-block"><span
                                                            class="notification-list-user-name">Jessica
                                                            Caruso</span>accepted your invitation to join the team.
                                                        <div class="notification-date">2 min ago</div>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="list-footer"> <a href="#">View all notifications</a></div>
                                </li>
                            </ul>
                        </li> -->

                        <li class="nav-item dropdown nav-user">
                            <a class="nav-link nav-user-img" href="#" id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="../assets/images/avatar-1.jpg" alt="" class="user-avatar-md rounded-circle"></a>
                            <div class="dropdown-menu dropdown-menu-right nav-user-dropdown" aria-labelledby="navbarDropdownMenuLink2">
                                <div class="nav-user-info">
                                    <?php
                                    if (isset($_SESSION['username'])) {
                                        $username = $_SESSION['username'];
                                        echo $username;
                                    }
                                    ?>
                                </div>
                                <a class="dropdown-item" href="#"><i class="fas fa-user mr-2"></i>Account</a>
                                <a class="dropdown-item" href="#"><i class="fas fa-cog mr-2"></i>Setting</a>
                                <a class="dropdown-item" href="./logout.php"><i class="fas fa-power-off mr-2"></i>Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <!-- ============================================================== -->
        <!-- end navbar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- left sidebar -->
        <!-- ============================================================== -->
        <div class="nav-left-sidebar sidebar-dark" id="sidebar">
            <div class="menu-list">
                <nav class="navbar navbar-expand-lg navbar-light">

                    <a class="d-xl-none d-lg-none" href="#">Dashboard</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav flex-column">
                            <li class="nav-divider">
                                Menu
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="./list-employee.php">Employee List</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="./manager-account.php">Manager Accounts</a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>

        <!-- ============================================================== -->
        <!-- end left sidebar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- wrapper  -->
        <!-- ============================================================== -->
        <div class="dashboard-wrapper">
            <div class="container-fluid  dashboard-content">
                <!-- ============================================================== -->
                <!-- pageheader -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="page-header">
                            <h2 class="pageheader-title">Employee List</h2>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- end pageheader -->
                <!-- ============================================================== -->
                <div class="row">

                    <!-- ============================================================== -->
                    <!-- data table  -->
                    <!-- ============================================================== -->
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-body">

                                <?php
                                if ($_SESSION['role'] != 'user') {

                                ?>
                                    <a href="./add-test.php" class="btn btn-outline-primary">+ Add</a>
                                    <a href="" data-toggle="modal" data-target="#importModal" class="btn btn-outline-primary "><i class="fas fa-file"></i> Import</a>
                                    <a href="" data-toggle="modal" data-target="#checkcolmodal" class="btn btn-outline-primary"><i class=" fas fa-arrow-down"></i> Export</a>
                                <?php
                                }
                                ?>
                                <div class="table-responsive ">
                                    <table id="example" class="table table-striped table-bordered second" style="width:100%">
                                        <thead>
                                            <?php
                                            if ($_SESSION['role'] != 'user') {
                                            ?>
                                                <th>Actions</th>
                                            <?php
                                            }
                                            ?>
                                            <th>Employee Code</th>
                                            <th>Photo</th>
                                            <th>First Name</th>
                                            <th>Last Name</th>

                                            <th>English Name</th>
                                            <th>Gender</th>
                                            <th>Marital Status</th>
                                            <th>Date of Birth</th>
                                            <th>National</th>
                                            <th>Military Service</th>
                                            <th>Passport Number</th>
                                            <th>Date of Issue</th>
                                            <th>Date of Expiry</th>
                                            <th>Place of Issue</th>
                                            <th>CICN</th>
                                            <th>Date of Issue</th>
                                            <th>Place of Issue</th>
                                            <th>Place of Residence</th>
                                            <th>Permanent Address</th>
                                            <th>Health Checkup Date</th>
                                            <th>Type Contract</th>
                                            <th>Job Tilte</th>
                                            <th>Job Category</th>
                                            <th>Team</th>
                                            <th>Start Date</th>
                                            <th>Contract Duration</th>
                                            <th>End Date</th>
                                            <th>E-mail</th>
                                            <th>Country</th>
                                            <th>Location</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            require_once("../connect.php");
                                            $sql = "SELECT
                                                 tb_employee.employee_id,
                                                 tb_employee.employee_code,
                                                 tb_employee.photo,
                                                 tb_employee.first_name,
                                                 tb_employee.last_name,
                                               
                                                 tb_employee.english_name,
                                                 tb_employee.gender,
                                                 tb_employee.marital_status,
                                                 tb_employee.date_of_birth,
                                                 tb_employee.national_name,
                                                 tb_employee.military_service,
                                                 tb_employee.health_checkup_date,
                                                 tb_address.phone_number,
                                                 tb_address.place_of_residence,
                                                 tb_address.permanent_address,
                                                 tb_address.email,
                                                 tb_citizen_identity.cccd_number,
                                                 tb_citizen_identity.date_of_issue_cccd,
                                                 tb_citizen_identity.place_of_issue_cccd,
                                                 tb_passport.pass_number,
                                                 tb_passport.date_of_issue,
                                                 tb_passport.date_of_expiry,
                                                 tb_passport.place_of_issue,
                                                 tb_type_contract.type_contract_name,
                                                 tb_job_title.job_title_name,
                                                 tb_job_category.job_category_name,
                                                 tb_team.team_name,
                                                 tb_position.position_name,
                                                tb_level.level_name,
                                                 tb_country.country_name,
                                                 tb_location.location_name,
                                                 tb_contract.start_date,
                                                 tb_contract.contract_duration,
                                                 tb_contract.end_date
                                             FROM
                                                 tb_employee,
                                                 tb_address,
                                                 tb_citizen_identity,
                                                 tb_passport,
                                                 tb_type_contract,
                                                 tb_job_title,
                                                 tb_job_category,
                                                 tb_team,
                                                 tb_position,
                                                 tb_level,
                                                 tb_country,
                                                 tb_location,
                                                 tb_contract
                                             WHERE
                                                 tb_employee.employee_id = tb_address.employee_id AND tb_employee.employee_id = tb_citizen_identity.employee_id AND tb_employee.employee_id = tb_passport.employee_id AND tb_employee.employee_id = tb_contract.employee_id AND tb_employee.job_title_id = tb_job_title.job_title_id AND tb_employee.job_category_id = tb_job_category.job_category_id AND tb_employee.team_id = tb_team.team_id AND tb_employee.position_id = tb_position.position_id AND tb_employee.country_id = tb_country.country_id AND tb_employee.level_id = tb_level.level_id AND tb_employee.location_id = tb_location.location_id AND tb_contract.type_contract_id = tb_type_contract.type_contract_id;";
                                            $result = $conn->query($sql);
                                            while ($row = $result->fetch_assoc()) {
                                            ?>
                                                <tr>
                                                    <?php
                                                    if ($_SESSION['role'] != 'user') {

                                                    ?>

                                                        <td>
                                                            <div class="btn-group ml-auto">
                                                                <a href="./profile.php?id=<?php echo $row["employee_id"] ?>" class="btn btn-sm btn-outline-light"><i class="far fa-edit"></i></a>

                                                                <a data-toggle="modal" data-target="#exampleModal" data-id="<?php echo $row['employee_id']; ?>" class="btn btn-sm btn-outline-light"><i class="far fa-trash-alt"></i></a>

                                                            </div>
                                                        </td>

                                                    <?php
                                                    }
                                                    ?>
                                                    <td id="text-format-0"><?php
                                                                            echo $row["employee_code"];


                                                                            // echo $row["employee_code"] 
                                                                            ?></td>



                                                    <td>
                                                        <img src="../assets/files/<?php echo $row['employee_code']; ?>/Photo/<?php echo $row['photo']; ?>" alt="avatar" style="width: 100px; height: 100px;">
                                                    </td>
                                                    <!-- -->
                                                    <td>
                                                        <?php
                                                        echo $row["first_name"];


                                                        ?>
                                                    </td>
                                                    <td>
                                                        <?php
                                                        echo $row["last_name"];
                                                        ?>

                                                    </td>


                                                    <td><?php echo $row["english_name"]; ?></td>
                                                    <td><?php
                                                        if ($row["gender"] == 1) {
                                                            echo "Male";
                                                        } else {
                                                            echo "Female";
                                                        }
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <?php
                                                        if ($row["marital_status"] == 1) {
                                                            echo "Married";
                                                        } else {
                                                            echo "Single";
                                                        }
                                                        ?>
                                                    </td>
                                                    <td><?php echo $row["date_of_birth"] ?></td>
                                                    <td><?php echo $row["national_name"] ?></td>
                                                    <td>
                                                        <?php
                                                        if ($row["military_service"] == 1) {
                                                            echo "Done";
                                                        } else {
                                                            echo "No yet";
                                                        }
                                                        ?>
                                                    </td>
                                                    <td id="pass-number"><?php

                                                                            echo $row["pass_number"];

                                                                            ?></td>
                                                    <td><?php echo $row["date_of_issue"] ?></td>
                                                    <td><?php echo $row["date_of_expiry"] ?></td>
                                                    <td><?php echo $row["place_of_issue"] ?></td>
                                                    <td><?php echo $row["cccd_number"] ?></td>
                                                    <td><?php
                                                        echo $row["date_of_issue_cccd"]
                                                        ?></td>

                                                    <td id="text-format-17"><?php

                                                                            echo $row["place_of_issue_cccd"]

                                                                            ?></td>

                                                    <td><?php


                                                        $employeeResidence = $row["place_of_residence"];
                                                        if (strlen($employeeResidence) > 20) {
                                                            $shortenedResidence = substr($employeeResidence, 0, 10) . "...";
                                                            echo '<span class="shortened-content">' . $shortenedResidence . '</span>';
                                                            echo '<span class="full-content" style="display: none;">' . $employeeResidence . '</span>';
                                                            echo '<button style="border: none; background-color: none;" onclick="toggleContent(this)">Xem thêm</button>';
                                                        } else {
                                                            echo $employeeResidence;
                                                        }


                                                        ?></td>

                                                    <td><?php

                                                        $employeeAddress = $row["permanent_address"];
                                                        if (strlen($employeeAddress) > 20) {
                                                            $shortenedAddress = substr($employeeAddress, 0, 10) . "...";
                                                            echo '<span class="shortened-content">' . $shortenedAddress . '</span>';
                                                            echo '<span class="full-content" style="display: none;">' . $employeeAddress . '</span>';
                                                            echo '<button style="border: none; background-color: none;" onclick="toggleContent(this)">Xem thêm</button>';
                                                        } else {
                                                            echo $employeeAddress;
                                                        }


                                                        ?></td>
                                                    <td><?php echo $row["health_checkup_date"] ?></td>
                                                    <td id="contact-name"><?php
                                                                            echo $row["type_contract_name"];

                                                                            ?></td>

                                                    <td><?php echo $row["job_title_name"] ?></td>
                                                    <td><?php echo $row["job_category_name"] ?></td>
                                                    <td><?php echo $row["team_name"] ?></td>
                                                    <td><?php echo $row["start_date"] ?></td>

                                                    <td><?php echo $row["contract_duration"] ?></td>
                                                    <td><?php echo $row["end_date"] ?></td>
                                                    <td><?php echo $row["email"] ?></td>
                                                    <td><?php echo $row["country_name"] ?></td>
                                                    <td><?php echo $row["location_name"] ?></td>



                                                </tr>
                                            <?php } ?>

                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <?php
                                                if ($_SESSION['role'] != 'user') {
                                                ?>
                                                    <th>Actions</th>
                                                <?php
                                                }
                                                ?>
                                                <th>Employee Code</th>

                                                <th>Photo</th>

                                                <th>First Name</th>
                                                <th>Last Name</th>

                                                <th>English Name</th>
                                                <th>Gender</th>
                                                <th>Marital Status</th>
                                                <th>Date of Birth</th>
                                                <th>National</th>
                                                <th>Military Service</th>
                                                <th>Passport Number</th>
                                                <th>Date of Issue</th>
                                                <th>Date of Expiry</th>
                                                <th>Place of Issue</th>
                                                <th>CICN</th>
                                                <th>Date of Issue</th>
                                                <th>Place of Issue</th>
                                                <th>Place of Residence</th>
                                                <th>Permanent Address</th>
                                                <th>Health Checkup Date</th>
                                                <th>Type Contract</th>
                                                <th>Job Tilte</th>
                                                <th>Job Category</th>
                                                <th>Team</th>
                                                <th>Start Date</th>
                                                <th>Contract Duration</th>
                                                <th>End Date</th>
                                                <th>E-mail</th>
                                                <th>Country</th>
                                                <th>Location</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                                <!-- CERTIFICATE LIST -->
                                <br><br>
                                <h2>Certificate List</h2>
                                <div id="cover_table" class="table-responsive ">
                                    <table id="example_certificate" class="table table-striped table-bordered second" style="width:100%">
                                        <thead>
                                            <th>Actions</th>
                                            <th>Employee Code</th>
                                            <th>Last Name</th>
                                            <th>First Name</th>
                                            <th>English Name</th>
                                            <th>Number of Certificate</th>
                                            <th>Certificates</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            require_once("../connect.php");
                                            $sql = "SELECT
                                                 tb_employee.employee_id,                                               
                                                 tb_employee.employee_code,   
                                                 tb_employee.last_name,
                                                 tb_employee.first_name,                                 
                                                 tb_employee.english_name,                                                         
                                                 tb_certificate.certificate,
                                                 tb_certificate.certificate_id,
                                                 COUNT(certificate_id) as count_certificate
                                             FROM
                                                  tb_employee,
                                                  tb_certificate
                                             WHERE
                                                 tb_employee.employee_id =  tb_certificate.employee_id
                                            GROUP BY  tb_employee.employee_code, tb_employee.last_name,  tb_employee.first_name,  tb_employee.english_name ";
                                            $result = $conn->query($sql);
                                            while ($row = $result->fetch_assoc()) {

                                                // những tín chỉ của người đó
                                                $sql_cer = "SELECT tb_certificate.certificate FROM tb_certificate WHERE employee_id=" . $row['employee_id'] . "";
                                                $result_cer = $conn->query($sql_cer);
                                            ?>
                                                <tr>
                                                    <td>
                                                        <div class="btn-group ml-auto">
                                                            <a href="./profile.php?id=<?php echo $row["employee_id"] . '#PersonalProfile' ?>" class="btn btn-sm btn-outline-light"><i class="far fa-edit"></i></a>

                                                            <!-- <a data-toggle="modal" data-target="#exampleModalcer" data-id="<?php echo $row['employee_id']; ?> " data-cerid="<?php echo $row['certificate_id']; ?> " class="btn btn-sm btn-outline-light"><i class="far fa-trash-alt"></i></a> -->
                                                        </div>
                                                    </td>
                                                    <td><?php echo $row["employee_code"] ?></td>
                                                    <td><?php echo $row["last_name"] ?></td>
                                                    <td><?php echo $row["first_name"] ?></td>
                                                    <td><?php echo $row["english_name"] ?></td>
                                                    <td><?php echo $row['count_certificate'] ?></td>
                                                    <td>
                                                        <div id="cover_cers">
                                                            <p id='title_cers'>Display Certificates</p>
                                                            <div id="contain_cers">
                                                                <?php while ($row_cer = $result_cer->fetch_assoc()) {
                                                                    $CertidicateFile = "../assets/files/" . $row["employee_code"] . "/Certificate/" . $row_cer["certificate"] . "";
                                                                ?>
                                                                    <a id="each_cer" href="<?php echo $CertidicateFile; ?>" download> <?php echo $row_cer["certificate"]; ?> </a><br><?php } ?>
                                                            </div>

                                                        </div>
                                                    </td>

                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>Actions</th>
                                                <th>Employee Code</th>
                                                <th>Last Name</th>
                                                <th>First Name</th>
                                                <th>English Name</th>
                                                <th>Number of Certificate</th>
                                                <th>Certificates</th>

                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- end data table  -->
                    <!-- ============================================================== -->
                </div>
                <!-- ============================================================== -->
                <!-- end basic table  -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <div class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <!-- <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                            Copyright © -----------. All rights reserved. Dashboard by <a
                                href="https://colorlib.com/wp/">Colorlib</a>.
                        </div> -->
                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                            <div class="text-md-right footer-links d-none d-sm-block">
                                <a href="javascript: void(0);">About</a>
                                <a href="javascript: void(0);">Support</a>
                                <a href="javascript: void(0);">Contact Us</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- end footer -->
            <!-- ============================================================== -->
        </div>

        <!-- Modal -->
        <!-- Xoa employee -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Confirm Deletion</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Are you sure you want to delete this employee?
                    </div>
                    <div class="modal-footer">
                        <form method="POST" action="delete-employee-handle.php">
                            <input type="hidden" name="employee_id" id="employeeIdInput">
                            <button type="submit" class="btn btn-danger">Delete</button>
                            <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
                        </form>
                        <!-- </div>
                            <input type="hidden" name="employee_id" id="employeeIdInput">
                            <button type="submit" class="btn btn-danger">Delete</button>
<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        </form> -->

                    </div>
                </div>
            </div>
        </div>
        <!-- ADD EMPLOYEE -->
        <div class="modal fade" id="importModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="importModalLabel">Import</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="POST" action="add-employees-handle.php" enctype="multipart/form-data">
                        <div class="modal-body">
                            <input type="file" name="excel_file" id="excel-file" accept=".xlsx, .xls">
                        </div>
                        <div class="modal-footer">

                            <button type="submit" class="btn btn-danger">Upload</button>
                            <button type="button" class="btn btn-dark " data-dismiss="modal">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Xoa certificate -->
        <div class="modal fade" id="exampleModalcer" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Confirm Deletion</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Are you sure you want to delete this certificate?
                    </div>
                    <div class="modal-footer">
                        <form method="POST" action="delete-certificate-handle.php">
                            <input type="hidden" name="employee_id" id="employeeIdInput">
                            <input type="hidden" name="certificate_id" id="certificateInput">
                            <button type="submit" class="btn btn-danger">Delete</button>
                            <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>

        <!-- check column want to export -->

        <div class="modal fade" id="checkcolmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content" id="modal-content-export">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Export Column Selection</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- <input type="checkbox" id="select_default" name="select_default" value="" onchange="toggleCheckboxes_default(this)">
                    <label id="lable_default" for="select_all">Default</label><br> -->

                        <input type="checkbox" id="select_allcolumn" name="select_all" value="" onchange="toggleCheckboxes(this)">
                        <label for="select_all">Select all</label><br>

                        <hr>
                        <label id="title_selections" for="">Personal Details</label><br>
                        <input type="checkbox" id="select_column" name="employee_code" value="tb_employee.employee_code" onchange="updateCheckboxValues(this)">
                        <label for="employee_code">Employee Code</label><br>
                        <input type="checkbox" id="select_column" name="photo" value="tb_employee.photo" onchange="updateCheckboxValues(this)">
                        <label for="employee_name">Photo</label><br>
                        <input type="checkbox" id="select_column" name="last_name" value="tb_employee.last_name" onchange="updateCheckboxValues(this)">
                        <label for="employee_name">Last Name</label><br>
                        <input type="checkbox" id="select_column" name="first_name" value="tb_employee.first_name" onchange="updateCheckboxValues(this)">
                        <label for="employee_name">First Name</label><br>
                        <input type="checkbox" id="select_column" name="english_name" value="tb_employee.english_name" onchange="updateCheckboxValues(this)">
                        <label for="employee_name">English Name</label><br>
                        <input type="checkbox" id="select_column" name="gender" value="tb_employee.gender" onchange="updateCheckboxValues(this)">
                        <label for="gender">Gender</label><br>
                        <input type="checkbox" id="select_column" name="marital_status" value="tb_employee.marital_status" onchange="updateCheckboxValues(this)">
                        <label for="marital_status">Marital Status</label><br>
                        <input type="checkbox" id="select_column" name="military_service" value="tb_employee.military_service" onchange="updateCheckboxValues(this)">
                        <label for="military_service">Military Service</label><br>
                        <input type="checkbox" id="select_column" name="date_of_birth" value="tb_employee.date_of_birth" onchange="updateCheckboxValues(this)">
                        <label for="date_of_birth">Date of Birth</label><br>
                        <input type="checkbox" id="select_column" name="national" value="tb_employee.national_name" onchange="updateCheckboxValues(this)">
                        <label for="national">National</label><br>

                        <hr>
                        <label id="title_selections" for="">Contact Detail</label><br>
                        <input type="checkbox" id="select_column" name="phone_number" value="tb_address.phone_number" onchange="updateCheckboxValues(this)">
                        <label for="Phone Number">Passport Number</label><br>
                        <input type="checkbox" id="select_column" name="passport_number" value="tb_passport.pass_number" onchange="updateCheckboxValues(this)">
                        <label for="passport_number">Passport Number</label><br>
                        <input type="checkbox" id="select_column" name="date_of_issue_pp" value="tb_passport.date_of_issue" onchange="updateCheckboxValues(this)">
                        <label for="passport_number">Date of Issue of Passport </label><br>
                        <input type="checkbox" id="select_column" name="place_of_issue_pp" value="tb_passport.place_of_issue" onchange="updateCheckboxValues(this)">
                        <label for="passport_number">Place of Issue of Passport</label><br>
                        <input type="checkbox" id="select_column" name="date_of_expiry" value="tb_passport.date_of_expiry" onchange="updateCheckboxValues(this)">
                        <label for="passport_number">Date of Expiry</label><br>
                        <input type="checkbox" id="select_column" name="CICN" value="tb_citizen_identity.cccd_number" onchange="updateCheckboxValues(this)">
                        <label for="CICN">CICN</label><br>
                        <input type="checkbox" id="select_column" name="date_of_issue_CICN" value="tb_citizen_identity.date_of_issue_cccd" onchange="updateCheckboxValues(this)">
                        <label for="CICN">Date of Issue of CICN</label><br>
                        <input type="checkbox" id="select_column" name="place_of_issue_CICN" value="tb_citizen_identity.place_of_issue_cccd" onchange="updateCheckboxValues(this)">
                        <label for="passport_number">Place of Issue of CICN</label><br>
                        <input type="checkbox" id="select_column" name="place_of_residence" value="tb_address.place_of_residence" onchange="updateCheckboxValues(this)">
                        <label for="place_of_residence">Place of Residence</label><br>
                        <input type="checkbox" id="select_column" name="permanent_address" value="tb_address.permanent_address" onchange="updateCheckboxValues(this)">
                        <label for="permanent_address">Permanent Address</label><br>
                        <input type="checkbox" id="select_column" name="health_checkup_date" value="tb_employee.health_checkup_date" onchange="updateCheckboxValues(this)">
                        <label for="health_checkup_date">Health Checkup Date</label><br>


                        <hr>
                        <label id="title_selections" for="">Job Detail</label><br>
                        <input type="checkbox" id="select_column" name="job_tilte" value="tb_job_title.job_title_name" onchange="updateCheckboxValues(this)">
                        <label for="job_tilte">Job Tilte</label><br>
                        <input type="checkbox" id="select_column" name="position" value="tb_position.position_name" onchange="updateCheckboxValues(this)">
                        <label for="type_contract">Position</label><br>
                        <input type="checkbox" id="select_column" name="job_category" value="tb_job_category.job_category_name" onchange="updateCheckboxValues(this)">
                        <label for="job_category">Job Category</label><br>
                        <input type="checkbox" id="select_column" name="team" value="tb_team.team_name" onchange="updateCheckboxValues(this)">
                        <label for="team">Team</label><br>
                        <input type="checkbox" id="select_column" name="level" value="tb_level.level_name" onchange="updateCheckboxValues(this)">
                        <label for="team">Level</label><br>
                        <input type="checkbox" id="select_column" name="start_date" value="tb_contract.start_date" onchange="updateCheckboxValues(this)">
                        <label for="team">Start Date</label><br>
                        <input type="checkbox" id="select_column" name="type_contract" value="tb_type_contract.type_contract_name" onchange="updateCheckboxValues(this)">
                        <label for="type_contract">Type Contract</label><br>
                        <input type="checkbox" id="select_column" name="contract_duration" value="tb_contract.contract_duration" onchange="updateCheckboxValues(this)">
                        <label for="type_contract">Contract Duration</label><br>
                        <input type="checkbox" id="select_column" name="e-mail" value="tb_address.email" onchange="updateCheckboxValues(this)">
                        <label for="e-mail">E-mail</label><br>
                        <input type="checkbox" id="select_column" name="country" value="tb_country.country_name" onchange="updateCheckboxValues(this)">
                        <label for="country">Country</label><br>
                        <input type="checkbox" id="select_column" name="location" value="tb_location.location_name" onchange="updateCheckboxValues(this)">
                        <label for="location">Location</label><br>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" id="selection_export" class="btn btn-primary">Export</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- XU LY XOA EMPLOYEE -->
        <script>
            var deleteButtons = document.querySelectorAll('[data-target="#exampleModal"]');
            deleteButtons.forEach(function(button) {
                button.addEventListener('click', function() {
                    var employeeId = this.getAttribute('data-id');
                    document.getElementById('employeeIdInput').value = employeeId;
                });
            });
        </script>

        <!-- XU LY XOA CERTIFICATE -->
        <script>
            var deleteButtons = document.querySelectorAll('[data-target="#exampleModalcer"]');
            deleteButtons.forEach(function(button) {
                button.addEventListener('click', function() {
                    var employeeId = this.getAttribute('data-id');
                    var dataCerId = this.getAttribute('data-cerid');
                    document.getElementById('employeeIdInput').value = employeeId;
                    document.getElementById('certificateInput').value = dataCerId;

                });
            });
        </script>

        <!-- Xử lý chọn nhiều column để export -->
        <script>
            var checkedValues = [];
            //xử lý check tất cả
            function toggleCheckboxes(source) {
                var checkboxes = document.querySelectorAll('#select_column');

                for (var i = 0; i < checkboxes.length; i++) {
                    checkboxes[i].checked = source.checked;
                    updateCheckboxValues(checkboxes[i]);
                }
            }

            // function toggleCheckboxes_default(source) {
            //     var checkboxes = document.querySelectorAll('#select_column');
            //     var checkall = document.getElementById('select_allcolumn')
            //     console.log(source.checked)
            //     checkall.disabled = source.checked;
            //     for (var i = 0; i < checkboxes.length; i++) {
            //         // checkboxes[i].checked =false;
            //         checkboxes[i].disabled = source.checked;
            //     }
            // }

            // xử lý đưa value của checkbox vào array checkedValues
            function updateCheckboxValues(checkbox) {
                if (checkbox.checked) {

                    checkedValues.push(checkbox.value);
                } else {
                    var index = checkedValues.indexOf(checkbox.value);
                    if (index !== -1) {
                        checkedValues.splice(index, 1);
                    }
                }
            }

            //xử lý button export
            var button = document.getElementById("selection_export");

            button.addEventListener("click", function() {
                var checkboxes = document.querySelectorAll('#select_column');
                var flag_haveselection = false;
                for (var i = 0; i < checkboxes.length; i++) {
                    if (checkboxes[i].checked == false) {
                        flag_haveselection = false;
                    } else {
                        flag_haveselection = true;
                        break;
                    }
                }
                // var checkdefault = document.getElementById('select_default');
                var checkall = document.getElementById('select_allcolumn');
                // if (checkdefault.checked) {
                //     window.location.href = "export-excel.php?checkdefault=true";
                // } 
                if (flag_haveselection === false && checkall.checked === false) {

                    type = 'text/javascript' > toastr.error('There are no columns to export');
                } else {
                    window.location.href = "export-excel.php?listcolumn=" + checkedValues;
                }

            });
        </script>




    </div>
    <!-- ============================================================== -->
    <!-- end main wrapper -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
    <script>
        // function showFullContent() {
        //     var shortenedName = document.getElementById('place_of_residence');
        //     var fullContent = document.getElementById('read-more');
        //     var readMoreButton = document.getElementById('read-more-button');

        //     if (shortenedName.style.display === 'none') {
        //         shortenedName.style.display = 'inline';
        //         fullContent.style.display = 'none';
        //         readMoreButton.innerHTML = 'Xem thêm';
        //     } else {
        //         shortenedName.style.display = 'none';
        //         fullContent.style.display = 'inline';
        //         readMoreButton.innerHTML = 'Thu gọn';
        //     }
        // }
        // Xử lý sự kiện khi nhấn nút xem thêm
        function toggleContent(button) {
            var parentTd = button.parentNode;
            var shortenedContent = parentTd.querySelector('.shortened-content');
            var fullContent = parentTd.querySelector('.full-content');

            if (shortenedContent.style.display === 'none') {
                shortenedContent.style.display = 'inline';
                fullContent.style.display = 'none';
                button.innerHTML = 'Xem thêm';
            } else {
                shortenedContent.style.display = 'none';
                fullContent.style.display = 'inline';
                button.innerHTML = 'Thu gọn';
            }
        }
    </script>

    <!-- <script>

        function viewMore(button) {
        // lấy id của the cha
        var tdElement = button.parentNode;
        var tdId = tdElement.id;
        // lay du lieu 
        var inputElement = document.getElementById("content");
        var inputValue = inputElement.value;
        // Lấy phần tử chứa dữ liệu
        var dataElement = document.getElementById(tdId);

        // Thay đổi hiển thị dữ liệu
        dataElement.innerHTML = "<?php echo $content; ?>";
        
        // Ẩn nút "Xem hết"
        document.getElementById("viewMoreButton").style.display = "none";

        }
    </script> -->
    <script src="../assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <script src="../assets/vendor/slimscroll/jquery.slimscroll.js"></script>
    <script src="../assets/vendor/multi-select/js/jquery.multi-select.js"></script>
    <script src="../assets/libs/js/main-js.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="../assets/vendor/datatables/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
    <script src="../assets/vendor/datatables/js/buttons.bootstrap4.min.js"></script>
    <script src="../assets/vendor/datatables/js/data-table.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.colVis.min.js"></script>
    <script src="https://cdn.datatables.net/rowgroup/1.0.4/js/dataTables.rowGroup.min.js"></script>
    <script src="https://cdn.datatables.net/select/1.2.7/js/dataTables.select.min.js"></script>
    <script src="https://cdn.datatables.net/fixedheader/3.1.5/js/dataTables.fixedHeader.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>

</html>

<?php
// session_destroy();
?>