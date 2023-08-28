<?php
require_once("../connect.php");
if (isset($_GET['id'])) {
    $id = $_GET['id'];
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
        tb_employee, tb_address, tb_citizen_identity, tb_passport, tb_type_contract, tb_job_title, tb_job_category,
        tb_team, tb_position, tb_level, tb_country, tb_location, tb_contract
        WHERE
        tb_employee.address_id=tb_address.address_id AND
        tb_employee.cccd_id=tb_citizen_identity.cccd_id AND
        tb_employee.pass_id=tb_passport.pass_id AND
        tb_employee.employee_id=tb_contract.employee_id AND
        tb_employee.job_title_id=tb_job_title.job_title_id AND
        tb_employee.job_category_id=tb_job_category.job_category_id AND
        tb_employee.team_id=tb_team.team_id AND
        tb_employee.position_id=tb_position.position_id AND
        tb_employee.country_id=tb_country.country_id AND
        tb_employee.level_id=tb_level.level_id AND
        tb_employee.location_id=tb_location.location_id AND
        tb_employee.position_id=tb_position.position_id AND
        tb_contract.type_contract_id=tb_type_contract.type_contract_id AND
        tb_employee.employee_id= $id";
}
$result = $conn->query($sql);
while ($row = $result->fetch_assoc()) {
    $employee_code = $row["employee_code"];
    $photo = $row["photo"];
    $employee_name = $row["employee_name"];
    $english_name = $row["english_name"];
    $gender = $row["gender"];
    $phone_number = $row["phone_number"];
    $marital_status = $row["marital_status"];
    $date_of_birth = formatDate($row["date_of_birth"]);
    $national_name = $row["national_name"];
    $military_service = $row["military_service"];
    $pass_number = $row["pass_number"];
    $date_of_issue = formatDate($row["date_of_issue"]);
    $date_of_expiry = formatDate($row["date_of_expiry"]);
    $place_of_issue = $row["place_of_issue"];
    $cccd_number = $row["cccd_number"];
    $date_of_issue_cccd = formatDate($row["date_of_issue_cccd"]);
    $place_of_issue_cccd = $row["place_of_issue_cccd"];
    $place_of_residence = $row["place_of_residence"];
    $permanent_address = $row["permanent_address"];
    $health_checkup_date = formatDate($row["health_checkup_date"]);
    $type_contract_name = $row["type_contract_name"];
    $job_title_name = $row["job_title_name"];
    $job_category_name = $row["job_category_name"];
    $team_name = $row["team_name"];
    $start_date = formatDate($row["start_date"]);
    $contract_duration = $row["contract_duration"];
    $end_date = formatDate($row["end_date"]);
    $email = $row["email"];
    $country_name = $row["country_name"];
    $location_name = $row["location_name"];
    $level_name = $row["level_name"];
    $position_name = $row["position_name"];
}
function formatDate($inputDate)
{
    $dateObj = DateTime::createFromFormat('Y-m-d', $inputDate);
    if ($dateObj) {
        return $dateObj->format('m/d/Y');
    } else {
        return "Invalid date format";
    }
}

session_start();

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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->
</head>
<style>
.frame-info {
    border: 1px solid rgb(209, 209, 209);
    margin-top: 10px;
}
</style>

<body>
    <?php
    if (isset($_SESSION["update"]) && $_SESSION["update"] == "1") {
        echo "<script type='text/javascript'>toastr.success('Update Employee Successfully')</script>";
        unset($_SESSION["update"]);
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
                <a class="navbar-brand" href="../index.html">VENTECH</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse " id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto navbar-right-top">
                        <li class="nav-item dropdown nav-user">
                            <a class="nav-link nav-user-img" href="#" id="navbarDropdownMenuLink2"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img
                                    src="../assets/images/avatar-1.jpg" alt=""
                                    class="user-avatar-md rounded-circle"></a>
                            <div class="dropdown-menu dropdown-menu-right nav-user-dropdown"
                                aria-labelledby="navbarDropdownMenuLink2">
                                <div class="nav-user-info">
                                    <h5 class="mb-0 text-white nav-user-name">
                                        John Abraham</h5>
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
                                <a class="nav-link" href="./list-employee.php">List Employee</a>
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
                            <h2 class="pageheader-title">Update Employee</h2>
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
                                <form id="validationform" action="./update-handle.php?id=<?php echo $id ?>"
                                    method="post" data-parsley-validate="" novalidate="">
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                        <div class="tab-outline">
                                            <ul class="nav nav-tabs" id="myTab2" role="tablist">
                                                <li class="nav-item">
                                                    <a class="nav-link active" id="tab-outline-one" data-toggle="tab"
                                                        href="#PersonalDetails" role="tab" aria-controls="home"
                                                        aria-selected="true">Personal Details</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="tab-outline-two" data-toggle="tab"
                                                        href="#ContactDetail" role="tab" aria-controls="profile"
                                                        aria-selected="false">Contact Detail</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="tab-outline-three" data-toggle="tab"
                                                        href="#JobDetail" role="tab" aria-controls="contact"
                                                        aria-selected="false">Job Detail</a>
                                                </li>
                                            </ul>
                                            <div class="tab-content" id="myTabContent2">
                                                <div class="tab-pane fade show active" id="PersonalDetails"
                                                    role="tabpanel" aria-labelledby="tab-outline-one">
                                                    <div class="card-body">
                                                        <div class="col-12 col-sm-auto mb-3">
                                                            <div class="mx-auto" style="width: 140px;">
                                                                <div class="d-flex justify-content-center align-items-center rounded"
                                                                    style="height: 140px; background-color: rgb(233, 236, 239);">
                                                                    <span
                                                                        style="color: rgb(166, 168, 170); font: bold 8pt Arial;">140x140</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="col flex-column flex-sm-row justify-content-between mb-3 justify-content-center">
                                                            <div class="text-center text-sm-left mb-2 mb-sm-0">
                                                                <h4 style="text-align: center;"
                                                                    class="pt-sm-2 pb-1 mb-0 text-nowrap">
                                                                    <?php echo $employee_name; ?></h4>
                                                                <div class="mt-2"
                                                                    style=" display:flex; justify-content: center; align-items: center; ">
                                                                    <button class="btn btn-primary" type="button">
                                                                        <i class="fa fa-fw fa-camera"></i>
                                                                        <span>Change Photo</span>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label
                                                            class="col-12 col-sm-3 col-form-label text-sm-right">Employee
                                                            Code</label>
                                                        <div class="col-12 col-sm-8 col-lg-6">
                                                            <input disabled type="text" required=""
                                                                value="<?php echo $employee_code ?>" name="EmployeeCode"
                                                                class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Full
                                                            Name</label>
                                                        <div class="col-sm-4 col-lg-3 mb-0 mb-sm-0">
                                                            <input type="text" value="<?php echo $employee_name ?>"
                                                                required="" name="FullName" class="form-control">
                                                        </div>
                                                        <label
                                                            class="col-3 col-sm-1 col-form-label text-sm-left">English
                                                            Name</label>
                                                        <div class="col-sm-1 col-lg-2">
                                                            <input type="text" required=""
                                                                value="<?php echo $english_name ?>" name="EngLishName"
                                                                class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label
                                                            class="col-12 col-sm-3 col-form-label text-sm-right">Gender</label>
                                                        <div class="custom-control  custom-radio "
                                                            style="padding-left:40px; padding-top:5px;">
                                                            <input type="radio" id="customRadio1" value="1" <?php if ($gender == 1) {
                                                                                                                echo "checked";
                                                                                                            } ?>
                                                                name="Gender" class="custom-control-input">
                                                            <label class="custom-control-label"
                                                                for="customRadio1">Male</label>
                                                        </div>
                                                        <div class="custom-control custom-radio "
                                                            style="padding-left:70px ;padding-top:5px;">
                                                            <input type="radio" id="customRadio2" value="0" <?php if ($gender == 0) {
                                                                                                                echo "checked";
                                                                                                            } ?>
                                                                name="Gender" class="custom-control-input">
                                                            <label class="custom-control-label"
                                                                for="customRadio2">Female</label>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label
                                                            class="col-12 col-sm-3 col-form-label text-sm-right">Marital
                                                            Status</label>
                                                        <div class="custom-control  custom-radio"
                                                            style="padding-left:40px; padding-top:5px;">
                                                            <input type="radio" id="customRadio3" value="0" <?php if ($marital_status == 0) {
                                                                                                                echo "checked";
                                                                                                            } ?>
                                                                name="MaritalStatus" class="custom-control-input">
                                                            <label class="custom-control-label"
                                                                for="customRadio3">Single</label>
                                                        </div>
                                                        <div class="custom-control custom-radio "
                                                            style="padding-left:70px ;padding-top:5px;">
                                                            <input type="radio" id="customRadio4" value="1" <?php if ($marital_status == 1) {
                                                                                                                echo "checked";
                                                                                                            } ?>
                                                                name="MaritalStatus" class="custom-control-input">
                                                            <label class="custom-control-label"
                                                                for="customRadio4">Married</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label
                                                            class="col-12 col-sm-3 col-form-label text-sm-right">Military
                                                            Service</label>
                                                        <div class="custom-control  custom-radio"
                                                            style="padding-left:40px; padding-top:5px;">
                                                            <input type="radio" id="customRadio5" <?php if ($military_service == 1) {
                                                                                                        echo "checked";
                                                                                                    } ?> value="1"
                                                                name="MilitaryService" class="custom-control-input">
                                                            <label class="custom-control-label"
                                                                for="customRadio5">Done</label>
                                                        </div>
                                                        <div class="custom-control custom-radio "
                                                            style="padding-left:70px ;padding-top:5px;">
                                                            <input type="radio" id="customRadio6" value="0" <?php if ($military_service == 0) {
                                                                                                                echo "checked";
                                                                                                            } ?>
                                                                name="MilitaryService" class="custom-control-input">
                                                            <label class="custom-control-label" for="customRadio6">No
                                                                yet</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-12 col-sm-3 col-form-label text-sm-right"
                                                            style="padding-left:70px ;">Date of Birth</label>
                                                        <div class="input-group date col-sm-0 col-lg-3"
                                                            id="datetimepicker46" data-target-input="nearest">
                                                            <input type="text" style="  width:150px"
                                                                value="<?php echo $date_of_birth; ?>" name="DateofBirth"
                                                                class="form-control datetimepicker-input"
                                                                data-target="#datetimepicker46" />
                                                            <div class="input-group-append"
                                                                data-target="#datetimepicker46"
                                                                data-toggle="datetimepicker">
                                                                <div class="input-group-text">
                                                                    <i class="far fa-calendar-alt"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label
                                                            class="col-12 col-sm-3 col-form-label text-sm-right">National</label>
                                                        <div class="col-sm-4 col-lg-3">
                                                            <select id="countrySelect" class="selectpicker"
                                                                name="National" data-size="5" data-width="275px">
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <script>
                                                    var selectElement = document.getElementById("countrySelect");
                                                    // Gọi API để lấy danh sách các quốc gia
                                                    fetch("https://restcountries.com/v3.1/all")
                                                        .then(response => response.json())
                                                        .then(data => {
                                                            data.forEach(country => {
                                                                var option = document.createElement(
                                                                    "option");
                                                                option.value = country.name.common;
                                                                option.text = country.name.common;
                                                                selectElement.appendChild(option);
                                                            });
                                                            // Cập nhật lại Bootstrap SelectPicker
                                                            $(selectElement).selectpicker('refresh');
                                                        })
                                                        .catch(error => console.error("Error fetching data:", error));
                                                    </script>

                                                    <div class="form-group row text-right">
                                                        <div class="col col-sm-10 col-lg-9 offset-sm-2 offset-lg-0">
                                                            <button type="button" name="update"
                                                                class="btn btn-space btn-primary" data-toggle="modal"
                                                                data-target="#exampleModalCenter">Save</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="ContactDetail" role="tabpanel"
                                                    aria-labelledby="tab-outline-two">
                                                    <div class="form-group row">
                                                        <label
                                                            class="col-12 col-sm-3 col-form-label text-sm-right">Phone
                                                            Number</label>
                                                        <div class="col-12 col-sm-8 col-lg-6">
                                                            <input data-parsley-type="number" name="PhoneNumber"
                                                                value="<?php echo $phone_number ?>" type="text"
                                                                required="" data-parsley-minlength="10"
                                                                data-parsley-maxlength="10" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="">
                                                        <div class="form-group row">
                                                            <label
                                                                class="col-12 col-sm-3 col-form-label text-sm-right">Passport
                                                                Number</label>
                                                            <div class="col-sm-4 col-lg-3 mb-0 mb-sm-0">
                                                                <input type="text" name="PassportNumber"
                                                                    value="<?php echo $pass_number ?>" required=""
                                                                    class="form-control">
                                                            </div>
                                                            <label
                                                                class="col-12 col-sm-1 col-form-label text-sm-right">Date
                                                                of
                                                                Issue</label>
                                                            <div class="input-group date col-sm-1 col-lg-2"
                                                                id="datetimepicker44" data-target-input="nearest">
                                                                <input type="text"
                                                                    class="form-control datetimepicker-input"
                                                                    value="<?php echo $date_of_issue ?>"
                                                                    name="DateofIssue_pass"
                                                                    data-target="#datetimepicker44" />
                                                                <div class="input-group-append"
                                                                    data-target="#datetimepicker44"
                                                                    data-toggle="datetimepicker">
                                                                    <div class="input-group-text"><i
                                                                            class="far fa-calendar-alt"></i>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label
                                                                class="col-12 col-sm-3 col-form-label text-sm-right">Place
                                                                of
                                                                Issue</label>
                                                            <div class="col-sm-4 col-lg-3 mb-0 mb-sm-0">
                                                                <input type="text" required="" name="PlaceofIssue_pass"
                                                                    value="<?php echo $place_of_issue ?>"
                                                                    class="form-control">
                                                            </div>
                                                            <label
                                                                class="col-12 col-sm-1 col-form-label text-sm-left">Date
                                                                of
                                                                Expiry</label>
                                                            <div class="input-group date col-sm-1 col-lg-2"
                                                                id="datetimepicker45" data-target-input="nearest">
                                                                <input type="text" name="DateofExpiry_pass"
                                                                    value="<?php echo $date_of_expiry ?>"
                                                                    class="form-control datetimepicker-input"
                                                                    data-target="#datetimepicker45" />
                                                                <div class="input-group-append"
                                                                    data-target="#datetimepicker45"
                                                                    data-toggle="datetimepicker">
                                                                    <div class="input-group-text"><i
                                                                            class="far fa-calendar-alt"></i>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="">
                                                        <div class="form-group row">
                                                            <label
                                                                class="col-12 col-sm-3 col-form-label text-sm-right">Citizen
                                                                identity
                                                                Card Number</label>
                                                            <div class="col-sm-4 col-lg-3 mb-0 mb-sm-0">
                                                                <input type="text" required="" name="cicn"
                                                                    value="<?php echo $cccd_number ?>"
                                                                    class="form-control">
                                                            </div>
                                                            <label
                                                                class="col-12 col-sm-1 col-form-label text-sm-right">Date
                                                                of
                                                                Issue</label>
                                                            <div class="input-group date col-sm-1 col-lg-2"
                                                                id="datetimepicker47" data-target-input="nearest">
                                                                <input type="text"
                                                                    value="<?php echo $date_of_issue_cccd ?>"
                                                                    name="DateofIssue_cicn"
                                                                    class="form-control datetimepicker-input"
                                                                    data-target="#datetimepicker47" />
                                                                <div class="input-group-append"
                                                                    data-target="#datetimepicker47"
                                                                    data-toggle="datetimepicker">
                                                                    <div class="input-group-text"><i
                                                                            class="far fa-calendar-alt"></i>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label
                                                                class="col-12 col-sm-3 col-form-label text-sm-right">Place
                                                                of
                                                                Issue</label>
                                                            <div class="col-sm-4 col-lg-3 mb-0 mb-sm-0">
                                                                <input type="text" name="PlaceofIssue_cicn"
                                                                    value="<?php echo $place_of_issue_cccd ?>"
                                                                    required="" class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label
                                                            class="col-12 col-sm-3 col-form-label text-sm-right">Place
                                                            of
                                                            Residence</label>
                                                        <div class="col-12 col-sm-8 col-lg-6">
                                                            <input type="text" required="" name="PlaceofResidence"
                                                                value="<?php echo $place_of_residence ?>"
                                                                class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label
                                                            class="col-12 col-sm-3 col-form-label text-sm-right">Permanent
                                                            Address</label>
                                                        <div class="col-12 col-sm-8 col-lg-6">
                                                            <input type="text" required="" name="PermanentAddress"
                                                                value="<?php echo $permanent_address ?>"
                                                                class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label
                                                            class="col-12 col-sm-3 col-form-label text-sm-right">Health
                                                            Check-up
                                                            Date</label>
                                                        <div class="input-group date col-12 col-sm-8 col-lg-6"
                                                            id="datetimepicker43" data-target-input="nearest">
                                                            <input type="text" name="Health"
                                                                value="<?php echo $health_checkup_date ?>"
                                                                class="form-control datetimepicker-input"
                                                                data-target="#datetimepicker43" />
                                                            <div class="input-group-append"
                                                                data-target="#datetimepicker43"
                                                                data-toggle="datetimepicker">
                                                                <div class="input-group-text"><i
                                                                        class="far fa-calendar-alt"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="JobDetail" role="tabpanel"
                                                    aria-labelledby="tab-outline-three">
                                                    <div class="form-group row">
                                                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Job
                                                            Title</label>
                                                        <div class="col-sm-4 col-lg-1">
                                                            <select class="selectpicker" data-size="7" name="JobTitle"
                                                                data-width="549px">
                                                                <?php
                                                                echo "<option>" . $job_title_name . "</option>";
                                                                $sql = "SELECT job_title_name FROM tb_job_title WHERE NOT job_title_name='$job_title_name'";
                                                                $result = $conn->query($sql);
                                                                while ($row = $result->fetch_assoc()) {
                                                                    echo "<option value='" . $row["job_title_name"] . "'>" . $row['job_title_name'] . "</option>";
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Job
                                                            Category</label>
                                                        <div class="col-sm-4 col-lg-1">
                                                            <select class="selectpicker" data-size="7"
                                                                name="JobCategory" data-width="549px">
                                                                <?php
                                                                echo "<option>" . $job_category_name . "</option>";
                                                                $sql = "SELECT job_category_name FROM tb_job_category WHERE NOT job_category_name='$job_category_name'";
                                                                $result = $conn->query($sql);
                                                                while ($row = $result->fetch_assoc()) {
                                                                    echo "<option>" . $row['job_category_name'] . "</option>";
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label
                                                            class="col-12 col-sm-3 col-form-label text-sm-right">Position</label>
                                                        <div class="col-sm-4 col-lg-1">
                                                            <select class="selectpicker" data-size="7" name="Position"
                                                                data-width="549px">
                                                                <?php
                                                                echo "<option>" . $position_name . "</option>";
                                                                $sql = "SELECT position_name FROM tb_position WHERE NOT position_name='$position_name'";
                                                                $result = $conn->query($sql);
                                                                while ($row = $result->fetch_assoc()) {
                                                                    echo "<option>" . $row['position_name'] . "</option>";
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label
                                                            class="col-12 col-sm-3 col-form-label text-sm-right">Team</label>
                                                        <div class="col-sm-4 col-lg-1">
                                                            <select class="selectpicker" name="Team" data-size="7"
                                                                data-width="549px">
                                                                <?php
                                                                echo "<option>" . $team_name . "</option>";
                                                                $sql = "SELECT team_name FROM tb_team WHERE NOT team_name='$team_name'";
                                                                $result = $conn->query($sql);
                                                                while ($row = $result->fetch_assoc()) {
                                                                    echo "<option>" . $row['team_name'] . "</option>";
                                                                }
                                                                ?>

                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label
                                                            class="col-12 col-sm-3 col-form-label text-sm-right">Level</label>
                                                        <div class="col-sm-4 col-lg-1">
                                                            <select class="selectpicker" data-size="7" name="Level"
                                                                data-width="549px">
                                                                <?php
                                                                echo "<option>" . $level_name . "</option>";
                                                                $sql = "SELECT level_name FROM tb_level WHERE NOT level_name='$level_name'";
                                                                $result = $conn->query($sql);
                                                                while ($row = $result->fetch_assoc()) {
                                                                    echo "<option>" . $row['level_name'] . "</option>";
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label
                                                            class="col-12 col-sm-3 col-form-label text-sm-right">Start
                                                            Date</label>
                                                        <div class="input-group date col-sm-1 col-lg-5"
                                                            id="datetimepicker48" data-target-input="nearest">
                                                            <input type="text" name="Startdate"
                                                                value="<?php echo $start_date ?>"
                                                                class="form-control datetimepicker-input"
                                                                data-target="#datetimepicker48" />
                                                            <div class="input-group-append"
                                                                data-target="#datetimepicker48"
                                                                data-toggle="datetimepicker">
                                                                <div class="input-group-text"><i
                                                                        class="far fa-calendar-alt"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Type
                                                            of Contract</label>
                                                        <div class="col-sm-4 col-lg-3">
                                                            <select class="selectpicker" name="TypeofContract"
                                                                data-size="7" data-width="549px">
                                                                <?php
                                                                echo "<option>" . $type_contract_name . "</option>";
                                                                $sql = "SELECT type_contract_name FROM tb_type_contract WHERE NOT type_contract_name ='$type_contract_name'";
                                                                $result = $conn->query($sql);
                                                                while ($row = $result->fetch_assoc()) {
                                                                    echo "<option>" . $row['type_contract_name'] . "</option>";
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label
                                                            class="col-12 col-sm-3 col-form-label text-sm-right">Contract
                                                            Duration</label>
                                                        <div class="col-sm-4 col-lg-3">
                                                            <select class="selectpicker" name="ContractDuration"
                                                                data-size="5" data-width="275px">
                                                                <?php

                                                                $year = ["6 Month", "1 Year", "2 Year", "3 Year", "4 Year", "5 Year"];
                                                                foreach ($year as $x) {
                                                                    if ($x != $contract_duration) {
                                                                        echo "<option>$x</option>";
                                                                    } else {
                                                                        echo "<option selected>$x</option>";
                                                                    }
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                        <label class="col-12 col-sm-1 col-form-label text-sm-left">End
                                                            Date</label>
                                                        <div class="input-group date col-sm-1 col-lg-2"
                                                            id="datetimepicker49" data-target-input="nearest">
                                                            <input type="text" name="EndDate"
                                                                value="<?php echo $end_date ?>"
                                                                class="form-control datetimepicker-input"
                                                                data-target="#datetimepicker49" />
                                                            <div class="input-group-append"
                                                                data-target="#datetimepicker49"
                                                                data-toggle="datetimepicker">
                                                                <div class="input-group-text">
                                                                    <i class="far fa-calendar-alt"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label
                                                            class="col-12 col-sm-3 col-form-label text-sm-right">E-Mail</label>
                                                        <div class="col-12 col-sm-8 col-lg-6">
                                                            <input type="email" value="<?php echo $email ?>"
                                                                name="email" required="" data-parsley-type="email"
                                                                class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label
                                                            class="col-12 col-sm-3 col-form-label text-sm-right">Country</label>
                                                        <div class="col-sm-4 col-lg-3">
                                                            <select class="selectpicker" data-size="7" name="Country"
                                                                data-width="549px">
                                                                <?php
                                                                echo "<option>" . $country_name . "</option>";
                                                                $sql = "SELECT country_name FROM tb_country WHERE NOT country_name = '$country_name'";
                                                                $result = $conn->query($sql);
                                                                while ($row = $result->fetch_assoc()) {
                                                                    echo "<option>" . $row['country_name'] . "</option>";
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label
                                                            class="col-12 col-sm-3 col-form-label text-sm-right">Location</label>
                                                        <div class="col-sm-4 col-lg-3">
                                                            <select class="selectpicker" name="location" data-size="7"
                                                                data-width="549px">
                                                                <?php
                                                                echo "<option>" . $location_name . "</option>";
                                                                $sql = "SELECT location_name FROM tb_location WHERE NOT location_name= '$location_name'";
                                                                $result = $conn->query($sql);
                                                                while ($row = $result->fetch_assoc()) {
                                                                    echo "<option>" . $row['location_name'] . "</option>";
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label
                                                            class="col-12 col-sm-3 col-form-label text-sm-right">Personal
                                                            Profile</label>
                                                        <div class="col-sm-4 col-lg-3 mb-0 mb-sm-0">
                                                            <input type="file" class="form-control">
                                                        </div>
                                                        <label
                                                            class="col-12 col-sm-1 col-form-label text-sm-right">Certificate</label>
                                                        <div class="col-sm-1 col-lg-2">
                                                            <input type="file" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
                                        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLongTitle">Confirm the
                                                        update</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    Are you sure to update this employee?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                                </div>
                                            </div>
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
                <!-- Button trigger modal -->


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
    (function() {
        'use strict';
        window.addEventListener('load', function() {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('needs-validation');
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
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
    // Lắng nghe sự kiện khi tab được chọn
    $(document).on('shown.bs.tab', 'a[data-toggle="tab"]', function(e) {
        // Lấy href của tab vừa được chọn
        var targetHref = $(e.target).attr('href');
        // Cập nhật URL trình duyệt với href của tab
        window.history.pushState(null, null, targetHref);
    });
    </script>
    <script>
    // Lấy phần địa chỉ sau dấu "#"
    var hash = window.location.hash;

    // Xác định tab cần hiển thị dựa trên đoạn hash trong URL
    if (hash === "#JobDetail") {
        // Hiển thị tab "Job Detail"
        var jobDetailTab = document.querySelector("#tab-outline-three");
        jobDetailTab.click(); // Kích hoạt sự kiện click trên tab
    } else if (hash == "#ContactDetail") {
        var ContactDetail = document.querySelector("#tab-outline-two");
        ContactDetail.click(); // Kích hoạt sự kiện click trên tab
    } else {
        var PersonalDetails = document.querySelector("#tab-outline-one");
        PersonalDetails.click(); // Kích hoạt sự kiện click trên tab
    }
    </script>


</body>

</html>