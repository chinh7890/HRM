<?php
    session_start();
    require_once '../login-handle.php';
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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
</head>
<style>
    #btn {
        margin-bottom: 10px;
        border: #e6e6f2 solid 0.1px;
    }
    th{
        text-align: center;
    }
    /* Hide the second column */
    td:nth-child(3),th:nth-child(3),
    td:nth-child(5),th:nth-child(5),
    td:nth-child(12),th:nth-child(12),
    td:nth-child(13),th:nth-child(13),
    td:nth-child(14),th:nth-child(14),
    td:nth-child(16),th:nth-child(16),
    td:nth-child(17),th:nth-child(17),
    td:nth-child(25),th:nth-child(25),
    td:nth-child(26),th:nth-child(26),
    td:nth-child(27),th:nth-child(27) {
        display: none;
    }
    .dataTables_wrapper .dt-buttons .buttons-pdf,
    .dataTables_wrapper .dt-buttons .buttons-print {
    display: none;
}

    </style>

</head>

<body>
    <?php
        if(isset($_SESSION["notify-add"]) && $_SESSION["notify-add"] == "1"){
            echo "<script type='text/javascript'>toastr.success('Add Employee Successfully')</script>";
            unset($_SESSION["notify-add"]);
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
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
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
                            <a class="nav-link nav-user-img" href="#" id="navbarDropdownMenuLink2"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img
                                    src="../assets/images/avatar-1.jpg" alt=""
                                    class="user-avatar-md rounded-circle"></a>
                            <div class="dropdown-menu dropdown-menu-right nav-user-dropdown"
                                aria-labelledby="navbarDropdownMenuLink2">
                                <div class="nav-user-info">
                                        <?php 
                                        if( isset($_SESSION['username'])) {
                                            $username = $_SESSION['username'];
                                            echo $username; }
                                            ?>
                                </div>
                                <a class="dropdown-item" href="#"><i class="fas fa-user mr-2"></i>Account</a>
                                <a class="dropdown-item" href="#"><i class="fas fa-cog mr-2"></i>Setting</a>
                                <a class="dropdown-item" href="#"><i class="fas fa-power-off mr-2"></i>Logout</a>
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
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
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
                                <a href="./add-employee.php" class="btn btn-outline-primary" id="btn">+ Add</a>
                                <a data-toggle="modal" data-target="#importModal" class="btn btn-outline-primary" id="btn">+ Import</a>
                                <div class="table-responsive ">
                                    <table id="example" class="table table-striped table-bordered second"
                                        style="width:100%">
                                        <thead>
                                                <th>Actions</th>
                                                <th>Employee Code</th>
                                                <th>Photo</th>
                                                <th>Employee Name</th>
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
                                                 tb_employee.employee_name,
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
                                                        <td>
                                                            <div class="btn-group ml-auto">
                                                            <a href="./profile.php?id=<?php echo $row["employee_id"]?>" class="btn btn-sm btn-outline-light"><i class="far fa-edit"></i></a>
                                                            <a data-toggle="modal" data-target="#exampleModal" data-id="<?php echo $row['employee_id']; ?>" class="btn btn-sm btn-outline-light"><i class="far fa-trash-alt"></i></a>
                                                            </div>
                                                        </td>
                                                        <td><?php echo $row["employee_code"]?></td>
                                                        <td><?php echo $row["photo"]?></td>
                                                        <td><?php echo $row["employee_name"]?></td>
                                                        <td><?php echo $row["english_name"]?></td>
                                                        <td><?php 
                                                            if($row["gender"]==1){
                                                                echo "Male";
                                                            }else{
                                                                echo "Female";
                                                            }
                                                            ?>
                                                        </td>
                                                        <td>
                                                            <?php 
                                                                if($row["marital_status"]==1){
                                                                    echo "Married";
                                                                }else{
                                                                    echo "Single";
                                                                }
                                                            ?>
                                                        </td>
                                                        <td><?php echo $row["date_of_birth"]?></td>
                                                        <td><?php echo $row["national_name"]?></td>
                                                        <td>
                                                            <?php
                                                                if($row["military_service"]==1){
                                                                    echo "Done";
                                                                }else{
                                                                    echo "No yet";
                                                                }
                                                             ?>
                                                        </td>
                                                        <td><?php echo $row["pass_number"]?></td>
                                                        <td><?php echo $row["date_of_issue"]?></td>
                                                        <td><?php echo $row["date_of_expiry"]?></td>
                                                        <td><?php echo $row["place_of_issue"]?></td>
                                                        <td><?php echo $row["cccd_number"]?></td>
                                                        <td><?php echo $row["date_of_issue_cccd"]?></td>
                                                        <td><?php echo $row["place_of_issue_cccd"]?></td>
                                                        <td><?php echo $row["place_of_residence"]?></td>
                                                        <td><?php echo $row["permanent_address"]?></td>
                                                        <td><?php echo $row["health_checkup_date"]?></td>                                                        
                                                        <td><?php echo $row["type_contract_name"]?></td>

                                                        <td><?php echo $row["job_title_name"]?></td>
                                                        <td><?php echo $row["job_category_name"]?></td>
                                                        <td><?php echo $row["team_name"]?></td>                                                        
                                                        <td><?php echo $row["start_date"]?></td>

                                                        <td><?php echo $row["contract_duration"]?></td>
                                                        <td><?php echo $row["end_date"]?></td>
                                                        <td><?php echo $row["email"]?></td>                                                        
                                                        <td><?php echo $row["country_name"]?></td>
                                                        <td><?php echo $row["location_name"]?></td>



                                                    </tr>
                                                    <?php }?>
                                                    
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>Actions</th>
                                                <th>Employee Code</th>
                                                <th>Photo</th>
                                                <th>Employee Name</th>
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
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="importModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="importModalLabel">Import</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                                <input type="file"  class="form-control">
                        </div>
                        <div class="modal-footer">
                            <form method="POST" action="">
                                <button type="submit" class="btn btn-danger">Upload</button>
                                <button type="button" class="btn btn-dark " data-dismiss="modal">Cancel</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

<script>
    var deleteButtons = document.querySelectorAll('[data-target="#exampleModal"]');
    deleteButtons.forEach(function (button) {
        button.addEventListener('click', function () {
            var employeeId = this.getAttribute('data-id');
            document.getElementById('employeeIdInput').value = employeeId;
        });
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
    session_destroy();
?>