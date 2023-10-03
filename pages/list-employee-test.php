<?php
session_start();
require_once '../login-handle.php';
require_once './404.php';
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
    td:nth-child(3),
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
    }

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

    #modal-content-export {
        width: 500px;
        height: 700px;
        overflow: auto;
        font-size: 20px;
    }

    #select_column {
        font-size: 100px;
    }

    #select_allcolumn {
        font-size: 100px;
    }

    .modal-body>label {
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
                                <a href="./add-employee.php" class="btn btn-outline-primary">+ Add</a>
                                <a href="" data-toggle="modal" data-target="#importModal" class="btn btn-outline-primary "><i class="fas fa-file"></i> Import</a>
                                <a href="" data-toggle="modal" data-target="#checkcolmodal" class="btn btn-outline-primary"><i class=" fas fa-arrow-down"></i> Export</a>

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
                <!-- add employees -->
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
                                <input type="checkbox" id="select_allcolumn" name="select_all" value="" onchange="toggleCheckboxes(this)">
                                <label for="select_all">Select all</label><br>

                                <hr>
                                <label id="title_selections" for="">Personal Details</label><br>
                                <input type="checkbox" id="select_column" name="employee_code" value="tb_employee.employee_code" onchange="updateCheckboxValues(this)">
                                <label for="employee_code">Employee Code</label><br>
                                <input type="checkbox" id="select_column" name="photo" value="tb_employee.photo" onchange="updateCheckboxValues(this)">
                                <label for="employee_name">Photo</label><br>
                                <input type="checkbox" id="select_column" name="employee_name" value="tb_employee.employee_name" onchange="updateCheckboxValues(this)">
                                <label for="employee_name">Employee Name</label><br>
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

                <script>
                    var deleteButtons = document.querySelectorAll('[data-target="#exampleModal"]');
                    deleteButtons.forEach(function(button) {
                        button.addEventListener('click', function() {
                            var employeeId = this.getAttribute('data-id');
                            document.getElementById('employeeIdInput').value = employeeId;
                        });
                    });
                </script>

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

                    function toggleCheckboxes(source) {
                        var checkboxes = document.querySelectorAll('#select_column');

                        for (var i = 0; i < checkboxes.length; i++) {
                            checkboxes[i].checked = source.checked;
                            updateCheckboxValues(checkboxes[i]);
                        }
                    }

                    //xử lý đưa value của checkbox vào array checkedValues
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
                        //  console.log("export-excel.php?listcolumn="+checkedValues);
                        window.location.href = "export-excel-test.php?listcolumn=" + checkedValues;

                    });
                </script>



            </div>
            <!-- ============================================================== -->
            <!-- end main wrapper -->
            <!-- ============================================================== -->
            <!-- Optional JavaScript -->

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

</body>

</html>

<?php
// session_destroy();
?>