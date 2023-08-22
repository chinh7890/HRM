<?php
    session_start();
    require_once "../connect.php";
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Form Validation</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="../assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/libs/css/style.css">
    <link rel="stylesheet" href="../documentation/css/style.css">
    <link rel="stylesheet" href="../assets/vendor/datepicker/tempusdominus-bootstrap-4.css" />
    <link rel="stylesheet" href="../assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <link rel="stylesheet" href="../assets/vendor/bootstrap-select/css/bootstrap-select.css">

    <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
</head>
<style>
    .frame-info {
        border: 1px solid rgb(209, 209, 209);
        margin-top: 10px;
    }
</style>

<body>

    <!-- ============================================================== -->
    <!-- main wrapper -->
    <!-- ============================================================== -->
    <div class="dashboard-main-wrapper">
        <!-- ============================================================== -->
        <!-- navbar -->
        <!-- ============================================================== -->
        <div class="dashboard-header">
            <nav class="navbar navbar-expand-lg bg-white fixed-top">
                <a class="navbar-brand" href="../index.html">Ventech</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse " id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto navbar-right-top">
                        <!-- <li class="nav-item">
                            <div id="custom-search" class="top-search-bar">
                                <input class="form-control" type="text" placeholder="Search..">
                            </div>
                        </li>
                        <li class="nav-item dropdown notification">
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
                                                            Chinh</span>is now following you
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
                        </li>
                        <li class="nav-item dropdown connection">
                            <a class="nav-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false"> <i class="fas fa-fw fa-th"></i> </a>
                            <ul class="dropdown-menu dropdown-menu-right connection-dropdown">
                                <li class="connection-list">
                                    <div class="row">
                                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 ">
                                            <a href="#" class="connection-item"><img src="../assets/images/github.png"
                                                    alt=""> <span>Github</span></a>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 ">
                                            <a href="#" class="connection-item"><img src="../assets/images/dribbble.png"
                                                    alt=""> <span>Dribbble</span></a>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 ">
                                            <a href="#" class="connection-item"><img src="../assets/images/dropbox.png"
                                                    alt=""> <span>Dropbox</span></a>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 ">
                                            <a href="#" class="connection-item"><img
                                                    src="../assets/images/bitbucket.png" alt="">
                                                <span>Bitbucket</span></a>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 ">
                                            <a href="#" class="connection-item"><img
                                                    src="../assets/images/mail_chimp.png" alt=""><span>Mail
                                                    chimp</span></a>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 ">
                                            <a href="#" class="connection-item"><img src="../assets/images/slack.png"
                                                    alt=""> <span>Slack</span></a>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="conntection-footer"><a href="#">More</a></div>
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
                                    <h5 class="mb-0 text-white nav-user-name">
                                        Chinh</h5>
                                    <span class="status"></span><span class="ml-2">Available</span>
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
                                <a class="nav-link" href="list-employee.php">List Employee</a>
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
                            <p class="pageheader-text">Proin placerat ante duiullam scelerisque a velit ac porta, fusce
                                sit amet vestibulum mi. Morbi lobortis pulvinar quam.</p>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a>
                                        </li>
                                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Forms</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Form Validations</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- end pageheader -->
                <!-- ============================================================== -->

                <div class="row">
                    <!-- ============================================================== -->
                    <!-- valifation types -->
                    <!-- ============================================================== -->
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-body">
                                <form id="validationform" data-parsley-validate="" novalidate="" action="add-employee-handle.php" method="POST" enctype="multipart/form-data">
                                    <div class="frame-info">
                                        <!-- <div class="card-body">
                                            <div class="user-avatar text-center d-block">
                                                <img style="border-radius: 100%; border: 1px solid #333;"
                                                    src="../documentation/img/logo.png" alt="User Avatar"
                                                    class="rounded-circle user-avatar-xxl">
                                            </div>
                                            <input class="choose-image" type="file" name="" id="">
                                        </div> -->
                                        <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Employee
                                                Code</label>
                                            <div class="col-12 col-sm-8 col-lg-6">
                                                <input type="text" required="" name="EmployeeCode" class="form-control">
                                                <?php
                                                    if(isset($_SESSION["Error-EmployeeCode"])){
                                                        echo '
                                                        <div class ="error-notify">
                                                            <span class="error-notify--doc">.</span>
                                                            <span class="error-notify--content">Employee code already exists.</span>
                                                        </div>
                                                        ';
                                                        unset($_SESSION["Error-EmployeeCode"]);
                                                    }
                                                ?>

                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Full
                                                Name</label>
                                            <div class="col-sm-4 col-lg-3 mb-0 mb-sm-0">
                                                <input type="text" required="" name="FullName" class="form-control">
                                            </div>
                                            <label class="col-12 col-sm-1 col-form-label text-sm-right">English
                                                Name</label>
                                            <div class="col-sm-1 col-lg-2">
                                                <input type="text" name="EngLishName" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Gender</label>
                                            <div class="custom-control  custom-radio " style="margin-left: 15px;padding-left:25px; padding-top:3px;">
                                                <input required type="radio" id="customRadio1" name="Gender" class="custom-control-input">
                                                <label class="custom-control-label" for="customRadio1" >Male</label>
                                            </div>
                                            <div class="custom-control custom-radio " style="margin-left: 70px;padding-left:25px ;padding-top:3px;">
                                                <input type="radio" id="customRadio2" name="Gender" class="custom-control-input">
                                                <label class="custom-control-label" for="customRadio2">Female</label>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Date of
                                                Birth</label>
                                            <div class="input-group date col-12 col-sm-8 col-lg-6" id="datetimepicker4"
                                                data-target-input="nearest">
                                                <input type="text" class="form-control datetimepicker-input"
                                                    data-target="#datetimepicker4" name="DayOfBirth" required=""/>
                                                <div class="input-group-append" data-target="#datetimepicker4"
                                                    data-toggle="datetimepicker">
                                                    <div class="input-group-text"><i class="far fa-calendar-alt"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">National</label>
                                            <div class="col-sm-4 col-lg-3">
                                                <select id="countrySelect" class="selectpicker" name="National[]" data-size="5" data-width="275px">
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Marital Status</label>
                                            <div class="custom-control  custom-radio " style="margin-left: 15px;padding-left:25px; padding-top:3px;">
                                                <input type="radio" id="customRadio3" name="MaritalStatus" class="custom-control-input">
                                                <label class="custom-control-label" for="customRadio3" >Single</label>
                                            </div>
                                            <div class="custom-control custom-radio " style="margin-left: 66px;padding-left:25px ;padding-top:3px;">
                                                <input type="radio" id="customRadio4" name="MaritalStatus" class="custom-control-input">
                                                <label class="custom-control-label" for="customRadio4">Married</label>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Military Service</label>
                                            <div class="custom-control  custom-radio " style="margin-left: 15px;padding-left:25px; padding-top:3px;">
                                                <input type="radio" id="customRadio5" name="MilitaryService" class="custom-control-input">
                                                <label class="custom-control-label" for="customRadio5" >Not yet</label>
                                            </div>
                                            <div class="custom-control custom-radio " style="margin-left: 59px;padding-left:25px ;padding-top:3px;">
                                                <input type="radio" id="customRadio6" name="MilitaryService" class="custom-control-input">
                                                <label class="custom-control-label" for="customRadio6">Done</label>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Place of
                                                Residence</label>
                                            <div class="col-12 col-sm-8 col-lg-6">
                                                <input type="text" name="PlaceOfResidence" required=""
                                                    class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Permanent
                                                Address</label>
                                            <div class="col-12 col-sm-8 col-lg-6">
                                                <input type="text" name="PermanentAddress" required=""
                                                    class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">E-Mail</label>
                                            <div class="col-12 col-sm-8 col-lg-6">
                                                <input type="email" required="" name="Email" data-parsley-type="email"
                                                    class="form-control">
                                            </div>
                                        </div>                                    
                                        <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Phone
                                                Number</label>
                                            <div class="col-12 col-sm-8 col-lg-6">
                                                <input data-parsley-type="number" type="tel" required=""
                                                    data-parsley-minlength="10" name="PhoneNumber" data-parsley-maxlength="10"
                                                    class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Country</label>
                                            <div class="col-sm-4 col-lg-3">
                                                <select class="selectpicker" name="Country[]" data-size="5" data-width="275px">
                                                    <?php
                                                        $SelectCountry = "SELECT country_name FROM tb_country";
                                                        $ResultCountry = mysqli_query($conn,$SelectCountry);
                                                        while($RowCountry = mysqli_fetch_assoc($ResultCountry)){
                                                            echo"<option value='".$RowCountry['country_name']."'>" .$RowCountry['country_name']. "</option>"; }                                                    
                                                    ?>
                                                </select>
                                            </div>
                                            <label style="padding-right: 2px;"
                                                class="col-sm-0 col-form-label text-sm-right">Location</label>
                                            <div class="col-sm-4 col-lg-3">
                                                <select class="selectpicker " name="Location[]" data-size="5">
                                                    <?php
                                                        $SelectLocation = "SELECT location_name FROM tb_location";
                                                        $ResultLocation = mysqli_query($conn,$SelectLocation);
                                                        while($RowLocation = mysqli_fetch_assoc($ResultLocation)){
                                                            echo"<option value='".$RowLocation['location_name']."'>" .$RowLocation['location_name']. "</option>"; }                                                    
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label  class="col-12 col-sm-3 col-form-label text-sm-right">Position</label>
                                            <div class="col-sm-4 col-lg-3">
                                                <select class="selectpicker" name="Position[]" data-size="5" data-width="275px">
                                                    <?php
                                                        $SelectPosition = "SELECT position_name FROM tb_position";
                                                        $ResultPosition = mysqli_query($conn,$SelectPosition);
                                                        while($RowPosition = mysqli_fetch_assoc($ResultPosition)){
                                                            echo"<option value='".$RowPosition['position_name']."'>" .$RowPosition['position_name']. "</option>"; }                                                    
                                                    ?>
                                                </select>
                                            </div>
                                            <label  style="padding-right: 6px;" class="col-sm-0 col-form-label text-sm-right" >Level</label>
                                            <div class="col-sm-4 col-lg-3" >
                                                <select class="selectpicker" name="Level[]" data-size="5" >
                                                    <?php
                                                        $SelectLevel = "SELECT level_name FROM tb_level";
                                                        $ResultLevel = mysqli_query($conn,$SelectLevel);
                                                        while($RowLevel = mysqli_fetch_assoc($ResultLevel)){
                                                            echo"<option value='".$RowLevel['level_name']."'>" .$RowLevel['level_name']. "</option>"; }                                                    
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right" >Job Category</label>
                                            <div class="col-sm-4 col-lg-3">
                                                <select class="selectpicker" name="JobCategory[]" data-size="5" data-width="275px">
                                                    <?php
                                                        $SelectJobCategory = "SELECT job_category_name FROM tb_job_category";
                                                        $ResultJobCategory = mysqli_query($conn,$SelectJobCategory);
                                                        while($RowJobCategory = mysqli_fetch_assoc($ResultJobCategory)){
                                                            echo"<option value='".$RowJobCategory['job_category_name']."'>" .$RowJobCategory['job_category_name']. "</option>"; }                                                    
                                                            ?>
                                                </select>
                                            </div>
                                            <label class="col-sm-0 col-form-label text-sm-right"  >Job Title</label>
                                            <div class="col-sm-4 col-lg-3" >
                                                <select class="selectpicker" name="JobTitle[]" data-size="5" >
                                                    <?php
                                                        $SelectJobTitle = "SELECT job_title_name FROM tb_job_title";
                                                        $ResultJobTitle = mysqli_query($conn,$SelectJobTitle);
                                                        while($RowJobTitle = mysqli_fetch_assoc($ResultJobTitle)){
                                                            echo"<option value='".$RowJobTitle['job_title_name']."'>" .$RowJobTitle['job_title_name']. "</option>"; }                                                    
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right" >Team</label>
                                            <div class="col-sm-4 col-lg-3">
                                                <select class="selectpicker" name="Team[]" data-size="5" data-width="275px">
                                                    <?php
                                                        $SelectTeam = "SELECT team_name FROM tb_team";
                                                        $ResultTeam = mysqli_query($conn,$SelectTeam);
                                                        while($RowTeam = mysqli_fetch_assoc($ResultTeam)){
                                                            echo"<option value='".$RowTeam['team_name']."'>" .$RowTeam['team_name']. "</option>"; }                                                    
                                                            ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Health Check-up
                                                Date</label>
                                            <div class="input-group date col-12 col-sm-8 col-lg-6" id="datetimepicker43"
                                                data-target-input="nearest">
                                                <input type="text" class="form-control datetimepicker-input"
                                                    data-target="#datetimepicker43" name="HealthCheckUpDate"/>
                                                <div class="input-group-append" data-target="#datetimepicker43"
                                                    data-toggle="datetimepicker">
                                                    <div class="input-group-text"><i class="far fa-calendar-alt"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="frame-info">
                                        <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Passport
                                                Number</label>
                                            <div class="col-sm-4 col-lg-3 mb-0 mb-sm-0">
                                                <input type="text" name="PassportNumber" class="form-control">
                                            </div>
                                            <label class="col-12 col-sm-1 col-form-label text-sm-right">Date of
                                                Issue</label>
                                            <div class="input-group date col-sm-1 col-lg-2" id="datetimepicker44"
                                                data-target-input="nearest">
                                                <input type="text" class="form-control datetimepicker-input"
                                                    data-target="#datetimepicker44" name="DOIpp"/>
                                                <div class="input-group-append" data-target="#datetimepicker44"
                                                    data-toggle="datetimepicker">
                                                    <div class="input-group-text"><i class="far fa-calendar-alt" ></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Place of
                                                Issue</label>
                                            <div class="col-sm-4 col-lg-3 mb-0 mb-sm-0">
                                                <input type="text"  name="POIpp" class="form-control">
                                            </div>
                                            <label class="col-12 col-sm-1 col-form-label text-sm-right">Date of
                                                Expiry</label>
                                            <div class="input-group date col-sm-1 col-lg-2" id="datetimepicker45"
                                                data-target-input="nearest">
                                                <input type="text" class="form-control datetimepicker-input"
                                                    data-target="#datetimepicker45" name="DOEpp" />
                                                <div class="input-group-append" data-target="#datetimepicker45"
                                                    data-toggle="datetimepicker">
                                                    <div class="input-group-text"><i class="far fa-calendar-alt"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="frame-info">
                                        <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Citizen identity
                                                Card Number</label>
                                            <div class="col-sm-4 col-lg-3 mb-0 mb-sm-0">
                                                <input type="text" required="" name="CICN" class="form-control">
                                            </div>
                                            <label class="col-12 col-sm-1 col-form-label text-sm-right">Date of
                                                Issue</label>
                                            <div class="input-group date col-sm-1 col-lg-2" id="datetimepicker46"
                                                data-target-input="nearest">
                                                <input type="text" class="form-control datetimepicker-input"
                                                    data-target="#datetimepicker46" name="DOIcicn" required=""/>
                                                <div class="input-group-append" data-target="#datetimepicker46"
                                                    data-toggle="datetimepicker">
                                                    <div class="input-group-text"><i class="far fa-calendar-alt"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Place of
                                                Issue</label>
                                            <div class="col-sm-4 col-lg-3 mb-0 mb-sm-0">
                                                <input type="text" required="" name="POIcicn" class="form-control">
                                            </div>
                                        </div>

                                    </div>
                                    <div class="frame-info">
                                        <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Type of
                                                Contract</label>
                                            <div class="col-sm-4 col-lg-3">
                                                <select class="selectpicker" name="TypeOfContract[]" data-size="5" data-width="275px">
                                                    <?php
                                                        $SelectTypeContract = "SELECT type_contract_name FROM tb_type_contract";
                                                        $ResultTypeContract = mysqli_query($conn,$SelectTypeContract);
                                                        while($RowTypeContract = mysqli_fetch_assoc($ResultTypeContract)){
                                                            echo"<option value='".$RowTypeContract['type_contract_name']."'>" .$RowTypeContract['type_contract_name']. "</option>"; }                                                    
                                                    ?>
                                                </select>
                                            </div>
                                            <label class="col-12 col-sm-1 col-form-label text-sm-right">Start
                                                Date</label>
                                            <div class="input-group date col-sm-1 col-lg-2" id="datetimepicker48"
                                                data-target-input="nearest">
                                                <input type="text" class="form-control datetimepicker-input"
                                                    data-target="#datetimepicker48" name="StartDate" required=""/>
                                                <div class="input-group-append" data-target="#datetimepicker48"
                                                    data-toggle="datetimepicker">
                                                    <div class="input-group-text"><i class="far fa-calendar-alt"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Contract
                                                Duration</label>
                                            <div class="col-sm-4 col-lg-3">
                                                <select class="selectpicker" name="ContractDuration[]" data-size="5" data-width="275px">
                                                    <option value = "6">6 Month</option>
                                                    <option value = "1">1 Year</option>
                                                    <option value = "2">2 Year</option>
                                                    <option value = "3">3 Year</option>
                                                    <option value = "4">4 Year</option>
                                                    <option value = "5">5 Year</option>
                                                </select>
                                            </div>
                                            <label class="col-12 col-sm-1 col-form-label text-sm-right">End
                                                Date</label>
                                            <div class="input-group date col-sm-1 col-lg-2" id="datetimepicker49"
                                                data-target-input="nearest">
                                                <input type="text" class="form-control datetimepicker-input"
                                                    data-target="#datetimepicker49" name="EndDate" required=""/>
                                                <div class="input-group-append" data-target="#datetimepicker49"
                                                    data-toggle="datetimepicker">
                                                    <div class="input-group-text"><i class="far fa-calendar-alt"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="frame-info">
                                        <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Personal
                                                Profile</label>
                                            <div class="col-sm-4 col-lg-3 mb-0 mb-sm-0">
                                                <input type="file" name="PersonalProfile[]" class="form-control" multiple>
                                            </div>
                                            <label
                                                class="col-12 col-sm-1 col-form-label text-sm-right">Certificate</label>
                                            <div class="col-sm-1 col-lg-2">
                                                <input type="file" name="Certificate[]" class="form-control" multiple>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row text-right">
                                        <div class="col col-sm-10 col-lg-9 offset-sm-1 offset-lg-0">
                                            <button type="submit" class="btn btn-space btn-primary" name="add">Add</button>
                                            <button class="btn btn-space btn-secondary">Cancel</button>
                                        </div>
                                    </div>                                    
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- end valifation types -->
                    <!-- ============================================================== -->
                </div>

            </div>
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <div class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                            Copyright © 2018 Concept. All rights reserved. Dashboard by <a
                                href="https://colorlib.com/wp/">Colorlib</a>.
                        </div>
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
    </div>
    <!-- ============================================================== -->
    <!-- end main wrapper -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
    <script src="../assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <script src="../assets/vendor/slimscroll/jquery.slimscroll.js"></script>
    <script src="../assets/vendor/parsley/parsley.js"></script>
    <script src="../assets/libs/js/main-js.js"></script>
    <script src="../assets/vendor/datepicker/datepicker.js"></script>
    <script src="../assets/vendor/datepicker/moment.js"></script>
    <script src="../assets/vendor/datepicker/tempusdominus-bootstrap-4.js"></script>
    <script src="../assets/vendor/bootstrap-select/js/bootstrap-select.js"></script>
    <script>
        $('#form').parsley();
    </script>
    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function () {
            'use strict';
            window.addEventListener('load', function () {
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.getElementsByClassName('needs-validation');
                // Loop over them and prevent submission
                var validation = Array.prototype.filter.call(forms, function (form) {
                    form.addEventListener('submit', function (event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();
    </script>
    <script>
        var selectElement = document.getElementById("countrySelect");

        // Gọi API để lấy danh sách các quốc gia
        fetch("https://restcountries.com/v3.1/all")
            .then(response => response.json())
            .then(data => {
                data.forEach(country => {
                    var option = document.createElement("option");
                    option.value = country.name.common;
                    option.text = country.name.common;
                    selectElement.appendChild(option);
                });
            })
            .catch(error => console.error("Error fetching data:", error));
    </script>
</body>

</html>
