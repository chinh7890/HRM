<?php
session_start();
require_once "../connect.php";
require_once './404.php';
$ErrorStatus = 0;
if (
    isset($_SESSION["Error-EmployeeCode"]) ||
    isset($_SESSION["Error-Email"]) ||
    isset($_SESSION["Error-PhoneNumber"]) ||
    isset($_SESSION["Error-PPNumber"]) ||
    isset($_SESSION["Error-CICN"])
) {
    $ErrorStatus = 1;
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
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Form Validation</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../assets/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/vendor/fonts/circular-std/style.css">
    <link rel="stylesheet" href="../assets/libs/css/style.css">
    <link rel="stylesheet" href="../documentation/css/style.css">
    <link rel="stylesheet" href="../assets/vendor/datepicker/tempusdominus-bootstrap-4.css" />
    <link rel="stylesheet" href="../assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <link rel="stylesheet" href="../assets/vendor/bootstrap-select/css/bootstrap-select.css">

    <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet" />
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
                <a class="navbar-brand" href="../index.html">VENTECH</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse " id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto navbar-right-top">
                        <li class="nav-item dropdown nav-user">
                            <a class="nav-link nav-user-img" href="#" id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="../assets/images/avatar-1.jpg" alt="" class="user-avatar-md rounded-circle"></a>
                            <div class="dropdown-menu dropdown-menu-right nav-user-dropdown" aria-labelledby="navbarDropdownMenuLink2">
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
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
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
        <div class="dashboard-wrapper">
            <div class="container-fluid  dashboard-content">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="page-header">
                            <h2 class="pageheader-title">Form Validations</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-body">
                                <form id="validationform" data-parsley-validate="" novalidate="" action="add-employee-handle.php" method="POST" enctype="multipart/form-data">
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                        <div class="tab-outline">
                                            <ul class="nav nav-tabs" id="myTab2" role="tablist">
                                                <li class="nav-item">
                                                    <a class="nav-link active" id="tab-outline-one" data-toggle="tab" href="#PersonalDetails" role="tab" aria-controls="home" aria-selected="true">Personal Details</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="tab-outline-two" data-toggle="tab" href="#ContactDetail" role="tab" aria-controls="profile" aria-selected="false">Contact Detail</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="tab-outline-three" data-toggle="tab" href="#JobDetail" role="tab" aria-controls="contact" aria-selected="false">Job Detail</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="tab-outline-four" data-toggle="tab" href="#PersonalProfile" role="tab" aria-controls="contact" aria-selected="false">Personal Profile</a>
                                                </li>
                                            </ul>

                                            <div class="tab-content" id="myTabContent2">
                                                <div class="tab-pane fade show active" id="PersonalDetails" role="tabpanel" aria-labelledby="tab-outline-one">
                                                    <div class="card-body">
                                                        <div class="col-12 col-sm-auto mb-3">
                                                            <div class="mx-auto" style="width: 140px;">
                                                                <div class="d-flex justify-content-center align-items-center rounded" style="height: 140px; background-color: rgb(233, 236, 239); ">
                                                                    <image id="image" src="../assets/images/NoImage.jpg" width="140" height="140"></image>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col flex-column flex-sm-row justify-content-between mb-3 justify-content-center">
                                                            <div class="text-center text-sm-left mb-2 mb-sm-0">
                                                                <h4 style="text-align: center;" class="pt-sm-2 pb-1 mb-0 text-nowrap">

                                                                    <div class="mt-2" style=" display:flex; justify-content: center; align-items: center; ">
                                                                        <input style="display: none;" class="crud-user_add-value add_file" type="file" onchange="chooseImage(this)" name="Photo" id="change-photo" accept="image/gif, image/jpeg, image/png">

                                                                        <label class="btn btn-primary" for="change-photo">
                                                                            <i class="fa fa-fw fa-camera"></i>
                                                                            Change
                                                                            Photo</label>
                                                                    </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Employee
                                                            Code</label>
                                                        <div class="col-12 col-sm-8 col-lg-6">
                                                            <input value="<?php
                                                                            if ($ErrorStatus == 1) {
                                                                                echo $_SESSION["EmployeeCode"];
                                                                                unset($_SESSION["EmployeeCode"]);
                                                                            }
                                                                            ?>" type="text" required="" name="EmployeeCode" class="form-control">
                                                            <?php
                                                            if (isset($_SESSION["Error-EmployeeCode"])) {
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
                                                            <input value="<?php
                                                                            if ($ErrorStatus == 1) {
                                                                                echo $_SESSION["FullName"];
                                                                                unset($_SESSION["FullName"]);
                                                                            }
                                                                            ?>" type="text" required="" name="FullName" class="form-control">
                                                        </div>
                                                        <label class="col-3 col-sm-1 col-form-label text-sm-left">English
                                                            Name</label>
                                                        <div class="col-sm-1 col-lg-2">
                                                            <input value="<?php
                                                                            if ($ErrorStatus == 1) {
                                                                                echo $_SESSION["EngLishName"];
                                                                                unset($_SESSION["EngLishName"]);
                                                                            }
                                                                            ?>" type="text" name="EngLishName" class="form-control">
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Gender</label>
                                                        <div class="custom-control  custom-radio " style="margin-left: 15px;padding-left:25px; padding-top:3px;">
                                                            <input <?php
                                                                    if ($ErrorStatus == 1) {
                                                                        if (isset($_SESSION["Gender"])) {
                                                                            if ($_SESSION["Gender"] == 1) {
                                                                                echo "Checked";
                                                                                unset($_SESSION["Gender"]);
                                                                            } else {
                                                                                echo "";
                                                                            }
                                                                        }
                                                                    }
                                                                    ?> value="1" required type="radio" id="customRadio1" name="Gender" class="custom-control-input">
                                                            <label class="custom-control-label" for="customRadio1">Male</label>
                                                        </div>
                                                        <div class="custom-control custom-radio " style="margin-left: 70px;padding-left:25px ;padding-top:3px;">
                                                            <input <?php
                                                                    if ($ErrorStatus == 1) {
                                                                        if (isset($_SESSION["Gender"])) {
                                                                            if ($_SESSION["Gender"] == 0) {
                                                                                echo "Checked";
                                                                                unset($_SESSION["Gender"]);
                                                                            } else {
                                                                                echo "";
                                                                            }
                                                                        }
                                                                    }
                                                                    ?> value="0" type="radio" id="customRadio2" name="Gender" class="custom-control-input">
                                                            <label class="custom-control-label" for="customRadio2">Female</label>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Marital
                                                            Status</label>
                                                        <div class="custom-control  custom-radio " style="margin-left: 15px;padding-left:25px; padding-top:3px;">
                                                            <input <?php
                                                                    if ($ErrorStatus == 1) {
                                                                        if (isset($_SESSION["MaritalStatus"])) {
                                                                            if ($_SESSION["MaritalStatus"] == 0) {
                                                                                echo "Checked";
                                                                                unset($_SESSION["MaritalStatus"]);
                                                                            } else {
                                                                                echo "";
                                                                            }
                                                                        }
                                                                    }
                                                                    ?> value="0" required type="radio" id="customRadio3" name="MaritalStatus" class="custom-control-input">
                                                            <label class="custom-control-label" for="customRadio3">Single</label>
                                                        </div>
                                                        <div class="custom-control custom-radio " style="margin-left: 66px;padding-left:25px ;padding-top:3px;">
                                                            <input <?php
                                                                    if ($ErrorStatus == 1) {
                                                                        if (isset($_SESSION["MaritalStatus"])) {
                                                                            if ($_SESSION["MaritalStatus"] == 1) {
                                                                                echo "Checked";
                                                                                unset($_SESSION["MaritalStatus"]);
                                                                            } else {
                                                                                echo "";
                                                                            }
                                                                        }
                                                                    }
                                                                    ?> value="1" type="radio" id="customRadio4" name="MaritalStatus" class="custom-control-input">
                                                            <label class="custom-control-label" for="customRadio4">Married</label>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Military
                                                            Service</label>
                                                        <div class="custom-control  custom-radio " style="margin-left: 15px;padding-left:25px; padding-top:3px;">
                                                            <input <?php
                                                                    if ($ErrorStatus == 1) {
                                                                        if (isset($_SESSION["MilitaryService"])) {
                                                                            if ($_SESSION["MilitaryService"] == 0) {
                                                                                echo "Checked";
                                                                                unset($_SESSION["MilitaryService"]);
                                                                            } else {
                                                                                echo "";
                                                                            }
                                                                        }
                                                                    }
                                                                    ?> value="0" required type="radio" id="customRadio5" name="MilitaryService" class="custom-control-input">
                                                            <label class="custom-control-label" for="customRadio5">Not yet</label>
                                                        </div>
                                                        <div class="custom-control custom-radio " style="margin-left: 59px;padding-left:25px ;padding-top:3px;">
                                                            <input <?php
                                                                    if ($ErrorStatus == 1) {
                                                                        if (isset($_SESSION["MilitaryService"])) {
                                                                            if ($_SESSION["MilitaryService"] == 1) {
                                                                                echo "Checked";
                                                                                unset($_SESSION["MilitaryService"]);
                                                                            } else {
                                                                                echo "";
                                                                            }
                                                                        }
                                                                    }
                                                                    ?> value="1" type="radio" id="customRadio6" name="MilitaryService" class="custom-control-input">
                                                            <label class="custom-control-label" for="customRadio6">Done</label>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Date of
                                                            Birth</label>
                                                        <div class="input-group date col-12 col-sm-8 col-lg-6" id="datetimepicker42" data-target-input="nearest">
                                                            <input placeholder="mm/dd/yyyy" value="<?php
                                                                                                    if ($ErrorStatus == 1) {
                                                                                                        echo $_SESSION["DayOfBirth"];
                                                                                                        unset($_SESSION["DayOfBirth"]);
                                                                                                    }
                                                                                                    ?>" type="text" class="form-control datetimepicker-input" data-target="#datetimepicker42" name="DayOfBirth" required="" />
                                                            <div class="input-group-append" data-target="#datetimepicker42" data-toggle="datetimepicker">
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

                                                    <div class="form-group row text-right">
                                                        <div class="col col-sm-10 col-lg-9 offset-sm-2 offset-lg-0">
                                                            <button type="button" name="update" class="btn btn-space btn-primary" data-toggle="modal" data-target="#exampleModalCenter">Save</button>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="tab-pane fade" id="ContactDetail" role="tabpanel" aria-labelledby="tab-outline-two">
                                                    <div class="form-group row">
                                                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Phone
                                                            Number</label>
                                                        <div class="col-12 col-sm-8 col-lg-6">
                                                            <input value="<?php
                                                                            if ($ErrorStatus == 1) {
                                                                                echo $_SESSION["PhoneNumber"];
                                                                                unset($_SESSION["PhoneNumber"]);
                                                                            }
                                                                            ?>" data-parsley-type="number" type="tel" required="" data-parsley-minlength="10" name="PhoneNumber" data-parsley-maxlength="10" class="form-control">
                                                            <?php
                                                            if (isset($_SESSION["Error-PhoneNumber"])) {
                                                                echo '
                                                        <div class ="error-notify">
                                                            <span class="error-notify--doc">.</span>
                                                            <span class="error-notify--content">Phone number already exists.</span>
                                                        </div>
                                                        ';
                                                                unset($_SESSION["Error-PhoneNumber"]);
                                                            }
                                                            ?>
                                                        </div>
                                                    </div>
                                                    <div class="">
                                                        <div class="form-group row">
                                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Passport
                                                                Number</label>
                                                            <div class="col-sm-4 col-lg-3 mb-0 mb-sm-0">
                                                                <input value="<?php
                                                                                if ($ErrorStatus == 1) {
                                                                                    echo $_SESSION["PassportNumber"];
                                                                                    unset($_SESSION["PassportNumber"]);
                                                                                }
                                                                                ?>" type="text" name="PassportNumber" class="form-control">
                                                                <?php
                                                                if (isset($_SESSION["Error-PPNumber"])) {
                                                                    echo '
                                                        <div class ="error-notify">
                                                            <span class="error-notify--doc">.</span>
                                                            <span class="error-notify--content">Passport already exists.</span>
                                                        </div>
                                                        ';
                                                                    unset($_SESSION["Error-PPNumber"]);
                                                                }
                                                                ?>
                                                            </div>
                                                            <label class="col-12 col-sm-1 col-form-label text-sm-right">Date of
                                                                Issue</label>
                                                            <div class="input-group date col-sm-1 col-lg-2" id="datetimepicker44" data-target-input="nearest">
                                                                <input placeholder="mm/dd/yyyy" value="<?php
                                                                                                        if ($ErrorStatus == 1) {
                                                                                                            echo $_SESSION["DOIpp"];
                                                                                                            unset($_SESSION["DOIpp"]);
                                                                                                        }
                                                                                                        ?>" type="text" class="form-control datetimepicker-input" data-target="#datetimepicker44" name="DOIpp" />
                                                                <div class="input-group-append" data-target="#datetimepicker44" data-toggle="datetimepicker">
                                                                    <div class="input-group-text"><i class="far fa-calendar-alt"></i>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Place of
                                                                Issue</label>
                                                            <div class="col-sm-4 col-lg-3 mb-0 mb-sm-0">
                                                                <input value="<?php
                                                                                if ($ErrorStatus == 1) {
                                                                                    echo $_SESSION["POIpp"];
                                                                                    unset($_SESSION["POIpp"]);
                                                                                }
                                                                                ?>" type="text" name="POIpp" class="form-control">
                                                            </div>
                                                            <label class="col-12 col-sm-1 col-form-label text-sm-right">Date of
                                                                Expiry</label>
                                                            <div class="input-group date col-sm-1 col-lg-2" id="datetimepicker45" data-target-input="nearest">
                                                                <input placeholder="mm/dd/yyyy" value="<?php
                                                                                                        if ($ErrorStatus == 1) {
                                                                                                            echo $_SESSION["DOEpp"];
                                                                                                            unset($_SESSION["DOEpp"]);
                                                                                                        }
                                                                                                        ?>" type="text" class="form-control datetimepicker-input" data-target="#datetimepicker45" name="DOEpp" />
                                                                <div class="input-group-append" data-target="#datetimepicker45" data-toggle="datetimepicker">
                                                                    <div class="input-group-text"><i class="far fa-calendar-alt"></i>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Citizen identity
                                                            Card Number</label>
                                                        <div class="col-sm-4 col-lg-3 mb-0 mb-sm-0">
                                                            <input value="<?php
                                                                            if ($ErrorStatus == 1) {
                                                                                echo $_SESSION["CICN"];
                                                                                unset($_SESSION["CICN"]);
                                                                            }
                                                                            ?>" type="text" required="" name="CICN" class="form-control">
                                                            <?php
                                                            if (isset($_SESSION["Error-CICN"])) {
                                                                echo '
                                                        <div class ="error-notify">
                                                            <span class="error-notify--doc">.</span>
                                                            <span class="error-notify--content">CICN already exists.</span>
                                                        </div>
                                                        ';
                                                                unset($_SESSION["Error-CICN"]);
                                                            }
                                                            ?>
                                                        </div>
                                                        <label class="col-12 col-sm-1 col-form-label text-sm-right">Date of
                                                            Issue</label>
                                                        <div class="input-group date col-sm-1 col-lg-2" id="datetimepicker46" data-target-input="nearest">
                                                            <input placeholder="mm/dd/yyyy" value="<?php
                                                                                                    if ($ErrorStatus == 1) {
                                                                                                        echo $_SESSION["DOIcicn"];
                                                                                                        unset($_SESSION["DOIcicn"]);
                                                                                                    }
                                                                                                    ?>" type="text" class="form-control datetimepicker-input" data-target="#datetimepicker46" name="DOIcicn" required="" />
                                                            <div class="input-group-append" data-target="#datetimepicker46" data-toggle="datetimepicker">
                                                                <div class="input-group-text"><i class="far fa-calendar-alt"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Place of
                                                            Issue</label>
                                                        <div class="col-sm-4 col-lg-3 mb-0 mb-sm-0">
                                                            <input value="<?php
                                                                            if ($ErrorStatus == 1) {
                                                                                echo $_SESSION["POIcicn"];
                                                                                unset($_SESSION["POIcicn"]);
                                                                            }
                                                                            ?>" type="text" required="" name="POIcicn" class="form-control">
                                                        </div>
                                                    </div>


                                                    <div class="form-group row">
                                                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Place of
                                                            Residence</label>
                                                        <div class="col-12 col-sm-8 col-lg-6">
                                                            <input value="<?php
                                                                            if ($ErrorStatus == 1) {
                                                                                echo $_SESSION["PlaceOfResidence"];
                                                                                unset($_SESSION["PlaceOfResidence"]);
                                                                            }
                                                                            ?>" type="text" name="PlaceOfResidence" required="" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Permanent
                                                            Address</label>
                                                        <div class="col-12 col-sm-8 col-lg-6">
                                                            <input value="<?php
                                                                            if ($ErrorStatus == 1) {
                                                                                echo $_SESSION["PermanentAddress"];
                                                                                unset($_SESSION["PermanentAddress"]);
                                                                            }
                                                                            ?>" type="text" name="PermanentAddress" required="" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Health Check-up
                                                            Date</label>
                                                        <div class="input-group date col-12 col-sm-8 col-lg-6" id="datetimepicker43" data-target-input="nearest">
                                                            <input placeholder="mm/dd/yyyy" value="<?php
                                                                                                    if ($ErrorStatus == 1) {
                                                                                                        echo $_SESSION["HealthCheckUpDate"];
                                                                                                        unset($_SESSION["HealthCheckUpDate"]);
                                                                                                    }
                                                                                                    ?>" type="text" class="form-control datetimepicker-input" data-target="#datetimepicker43" name="HealthCheckUpDate" required="" />
                                                            <div class="input-group-append" data-target="#datetimepicker43" data-toggle="datetimepicker">
                                                                <div class="input-group-text"><i class="far fa-calendar-alt"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="JobDetail" role="tabpanel" aria-labelledby="tab-outline-three">
                                                    <div class="form-group row">
                                                        <div class="form-group row">
                                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Job
                                                                Title</label>
                                                            <div class="col-sm-4 col-lg-1">
                                                                <select class="selectpicker" data-size="7" name="JobTitle" data-width="549px">
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
                                                                <select class="selectpicker" data-size="7" name="JobCategory" data-width="549px">
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
                                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Position</label>
                                                            <div class="col-sm-4 col-lg-1">
                                                                <select class="selectpicker" data-size="7" name="Position" data-width="549px">
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
                                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Team</label>
                                                            <div class="col-sm-4 col-lg-1">
                                                                <select class="selectpicker" name="Team" data-size="7" data-width="549px">
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
                                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Level</label>
                                                            <div class="col-sm-4 col-lg-1">
                                                                <select class="selectpicker" name="Level" data-size="7" data-width="549px">
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
                                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Type of
                                                                Contract</label>
                                                            <div class="col-sm-4 col-lg-3">
                                                                <select class="selectpicker" name="TypeOfContract[]" data-size="5" data-width="275px">
                                                                    <?php
                                                                    $SelectTypeContract = "SELECT type_contract_name FROM tb_type_contract";
                                                                    $ResultTypeContract = mysqli_query($conn, $SelectTypeContract);
                                                                    while ($RowTypeContract = mysqli_fetch_assoc($ResultTypeContract)) {
                                                                        if ($ErrorStatus == 1) {
                                                                            if (isset($_SESSION["TypeOfContract"])) {
                                                                                foreach ($_SESSION["TypeOfContract"] as $pst) {
                                                                                    $TypeContract = $pst;
                                                                                }
                                                                            }
                                                                        }
                                                                        if (isset($TypeContract)) {
                                                                            if ($TypeContract == $RowTypeContract['type_contract_name']) {
                                                                                echo "<option Selected value='" . $RowTypeContract['type_contract_name'] . "'>" . $RowTypeContract['type_contract_name'] . "</option>";
                                                                            } else {
                                                                                echo "<option value='" . $RowTypeContract['type_contract_name'] . "'>" . $RowTypeContract['type_contract_name'] . "</option>";
                                                                            }
                                                                        } else {
                                                                            echo "<option value='" . $RowTypeContract['type_contract_name'] . "'>" . $RowTypeContract['type_contract_name'] . "</option>";
                                                                        }
                                                                    }
                                                                    unset($_SESSION["TypeOfContract"]);
                                                                    ?>
                                                                </select>
                                                            </div>
                                                            <label class="col-12 col-sm-4 col-form-label text-sm-right">Start
                                                                Date</label>
                                                            <div class="input-group date col-sm-1 col-lg-2" id="datetimepicker48" data-target-input="nearest">
                                                                <input placeholder="mm/dd/yyyy" value="<?php
                                                                                                        if ($ErrorStatus == 1) {
                                                                                                            echo $_SESSION["StartDate"];
                                                                                                            unset($_SESSION["StartDate"]);
                                                                                                        }
                                                                                                        ?>" type="text" class="form-control datetimepicker-input" data-target="#datetimepicker48" name="StartDate" required="" />
                                                                <div class="input-group-append" data-target="#datetimepicker48" data-toggle="datetimepicker">
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
                                                                    <?php
                                                                    if ($ErrorStatus == 1) {
                                                                        if (isset($_SESSION["ContractDuration"])) {
                                                                            foreach ($_SESSION["ContractDuration"] as $cd) {
                                                                                $ContractDuration = $cd;
                                                                            }
                                                                        }
                                                                    }
                                                                    $year = ["6 Month", "1 Year", "2 Year", "3 Year", "4 Year", "5 Year"];
                                                                    if (isset($ContractDuration)) {
                                                                        foreach ($year as $x) {
                                                                            if ($x != $ContractDuration) {
                                                                                echo "<option>$x</option>";
                                                                            } else {
                                                                                echo "<option selected>$x</option>";
                                                                            }
                                                                        }
                                                                    } else {
                                                                        foreach ($year as $x) {
                                                                            echo "<option>$x</option>";
                                                                        }
                                                                    }
                                                                    unset($_SESSION["ContractDuration"]);
                                                                    ?>
                                                                </select>
                                                            </div>
                                                            <label class="col-12 col-sm-4 col-form-label text-sm-right">End
                                                                Date</label>
                                                            <div class="input-group date col-sm-1 col-lg-2" id="datetimepicker49" data-target-input="nearest">
                                                                <input placeholder="mm/dd/yyyy" value="<?php
                                                                                                        if ($ErrorStatus == 1) {
                                                                                                            echo $_SESSION["EndDate"];
                                                                                                            unset($_SESSION["EndDate"]);
                                                                                                        }
                                                                                                        ?>" type="text" class="form-control datetimepicker-input" data-target="#datetimepicker49" name="EndDate" required="" />
                                                                <div class="input-group-append" data-target="#datetimepicker49" data-toggle="datetimepicker">
                                                                    <div class="input-group-text"><i class="far fa-calendar-alt"></i>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>




                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-12 col-sm-3 col-form-label text-sm-right">E-Mail</label>
                                                        <div class="col-12 col-sm-8 col-lg-6">
                                                            <input value="<?php
                                                                            if ($ErrorStatus == 1) {
                                                                                echo $_SESSION["Email"];
                                                                                unset($_SESSION["Email"]);
                                                                            }
                                                                            ?>" type="email" required="" name="Email" data-parsley-type="email" class="form-control">
                                                            <?php
                                                            if (isset($_SESSION["Error-Email"])) {
                                                                echo '
                                                        <div class ="error-notify">
                                                            <span class="error-notify--doc">.</span>
                                                            <span class="error-notify--content">Email already exists.</span>
                                                        </div>
                                                        ';
                                                                unset($_SESSION["Error-Email"]);
                                                            }
                                                            ?>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Country</label>
                                                        <div class="col-sm-4 col-lg-3">
                                                            <select class="selectpicker" name="Country[]" data-size="5" data-width="275px">
                                                                <?php
                                                                $SelectCountry = "SELECT country_name FROM tb_country";
                                                                $ResultCountry = mysqli_query($conn, $SelectCountry);
                                                                while ($RowCountry = mysqli_fetch_assoc($ResultCountry)) {
                                                                    if ($ErrorStatus == 1) {
                                                                        if (isset($_SESSION["Country"])) {
                                                                            foreach ($_SESSION["Country"] as $ct) {
                                                                                $Country = $ct;
                                                                            }
                                                                        }
                                                                    }
                                                                    if (isset($Country)) {
                                                                        if ($Country == $RowCountry['country_name']) {
                                                                            echo "<option Selected value='" . $RowCountry['country_name'] . "'>" . $RowCountry['country_name'] . "</option>";
                                                                        } else {
                                                                            echo "<option value='" . $RowCountry['country_name'] . "'>" . $RowCountry['country_name'] . "</option>";
                                                                        }
                                                                    } else {
                                                                        echo "<option value='" . $RowCountry['country_name'] . "'>" . $RowCountry['country_name'] . "</option>";
                                                                    }
                                                                }
                                                                unset($_SESSION["Country"]);
                                                                ?>
                                                            </select>
                                                        </div>
                                                        <label style="padding-right: 2px;" class="col-sm-0 col-form-label text-sm-right">Location</label>
                                                        <div class="col-sm-4 col-lg-3">
                                                            <select class="selectpicker " name="Location[]" data-size="5">
                                                                <?php
                                                                $SelectLocation = "SELECT location_name FROM tb_location";
                                                                $ResultLocation = mysqli_query($conn, $SelectLocation);
                                                                while ($RowLocation = mysqli_fetch_assoc($ResultLocation)) {
                                                                    if ($ErrorStatus == 1) {
                                                                        if (isset($_SESSION["Location"])) {
                                                                            foreach ($_SESSION["Location"] as $lct) {
                                                                                $Location = $lct;
                                                                            }
                                                                        }
                                                                    }
                                                                    if (isset($Location)) {
                                                                        if ($Location == $RowLocation['location_name']) {
                                                                            echo "<option Selected value='" . $RowLocation['location_name'] . "'>" . $RowLocation['location_name'] . "</option>";
                                                                        } else {
                                                                            echo "<option value='" . $RowLocation['location_name'] . "'>" . $RowLocation['location_name'] . "</option>";
                                                                        }
                                                                    } else {
                                                                        echo "<option value='" . $RowLocation['location_name'] . "'>" . $RowLocation['location_name'] . "</option>";
                                                                    }
                                                                }
                                                                unset($_SESSION["Location"]);
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="tab-pane fade" id="PersonalProfile" role="tabpanel" aria-labelledby="tab-outline-four">
                                                    <div class="frame-info">
                                                        <div class="form-group row">
                                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Personal
                                                                Profile</label>
                                                            <div class="col-sm-4 col-lg-3 mb-0 mb-sm-0">
                                                                <input type="file" name="PersonalProfile[]" class="form-control" multiple>
                                                            </div>
                                                            <label class="col-12 col-sm-1 col-form-label text-sm-right">Certificate</label>
                                                            <div class="col-sm-4 col-lg-3 mb-0 mb-sm-0">
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

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

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
    <!-- <script>
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
    </script> -->
    <script>
        var selectElement = document.getElementById("countrySelect");

        // Gọi API để lấy danh sách các quốc gia
        fetch("https://restcountries.com/v3.1/all")
            .then(response => response.json())
            .then(data => {
                // Tìm index của quốc gia "VietNam"
                var inputNation = document.getElementById("National").value;
                var CountryIndex = data.findIndex(country => country.name.common === inputNation);

                // Nếu tìm thấy "Country", đưa nó lên đầu danh sách
                if (CountryIndex !== -1) {
                    var Country_ = data.splice(CountryIndex, 1)[0]; // Xóa "Country" khỏi danh sách và lưu nó vào biến
                    data.unshift(Country_); // Đưa "country" lên đầu danh sách
                }

                data.forEach(country => {
                    var option = document.createElement("option");
                    option.value = country.name.common;
                    option.text = country.name.common;
                    selectElement.appendChild(option);
                });
                $(selectElement).selectpicker('refresh');
            })
            .catch(error => console.error("Error fetching data:", error));
    </script>

    <input id="National" value="<?php
                                foreach ($_SESSION["National"] as $nation)
                                    echo $nation;
                                unset($_SESSION["National"]);
                                ?>" type="hidden" name="">
    <script>
        function chooseImage(fileinput) {
            if (fileinput.files && fileinput.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#image').attr('src', e.target.result);
                }
                reader.readAsDataURL(fileinput.files[0]);
            }
        }
    </script>
</body>

</html>