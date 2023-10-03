<?php
session_start();
require "../connect.php";
function formatDateTime($Datetime)
{
    $timestamp = strtotime($Datetime);
    $dateTimeFormat = date("Y-m-d", $timestamp); // Định dạng lại theo Y-m-d
    return $dateTimeFormat;
}
if (isset($_POST['add'])) {
    $EmployeeCode = $_POST["EmployeeCode"];
    $FirstName = $_POST["FirstName"];
    $LastName = $_POST["LastName"];
    $EngLishName = $_POST["EngLishName"];
    $Gender = $_POST["Gender"];
    $National = $_POST["National"]; //
    $MaritalStatus = $_POST["MaritalStatus"];
    $MilitaryService = $_POST["MilitaryService"];
    $PhoneNumber = $_POST["PhoneNumber"];
    $Email = $_POST["Email"];
    $DayOfBirth = formatDateTime($_POST["DayOfBirth"]);
    $PlaceOfResidence = $_POST["PlaceOfResidence"];
    $PermanentAddress = $_POST["PermanentAddress"];
    $Level = $_POST["Level"]; //
    $Country = $_POST["Country"]; //
    $Position = $_POST["Position"]; //
    $location_name = $_POST["Location"]; //
    $JobCategory = $_POST["JobCategory"]; //
    $JobTitle = $_POST["JobTitle"]; //
    $Team = $_POST["Team"]; //
    $HealthCheckUpDate = formatDateTime($_POST["HealthCheckUpDate"]);
    $PassportNumber = $_POST["PassportNumber"];
    $DOIpp = formatDateTime($_POST["DOIpp"]);
    $POIpp = $_POST["POIpp"];
    $DOEpp = formatDateTime($_POST["DOEpp"]);
    $CICN = $_POST["CICN"];
    $DOIcicn = formatDateTime($_POST["DOIcicn"]);
    $POIcicn = $_POST["POIcicn"];
    $type_contract_name = $_POST["TypeOfContract"]; //
    $StartDate = formatDateTime($_POST["StartDate"]);
    $ContractDuration = $_POST["ContractDuration"]; //
    $EndDate = formatDateTime($_POST["EndDate"]);


    //Photo
    $FolderName = "../assets/files/" . $EmployeeCode . "/Photo/";
    if (!file_exists($FolderName)) {
        mkdir($FolderName, 0777, true);
        echo "Thư mục đã được tạo: $FolderName";
    } else {
        echo "Thư mục đã tồn tại: $FolderName";
    }

    if (isset($_FILES['Photo'])) {
        $image = $_FILES['Photo']['name'];
        $image_temp = $_FILES['Photo']['tmp_name'];
        $target = $FolderName . basename($_FILES['Photo']['name']);
        move_uploaded_file($image_temp, "$target");
    }
    $Photo = basename($_FILES['Photo']['name']);

    foreach ($_POST as $field => $value) {
        // Lưu dữ liệu từ POST vào session
        $_SESSION[$field] = $value;
    }


    $SelectEmployee1 = "SELECT * FROM tb_employee WHERE employee_code = '" . $EmployeeCode . "'";
    $ResultEmployee1 = mysqli_query($conn, $SelectEmployee1);
    if (mysqli_num_rows($ResultEmployee1) > 0) {
        $_SESSION["Error-EmployeeCode"] = "1";
    }

    $SelectEmployee2 = "SELECT * FROM tb_address WHERE email = '" . $Email . "'";
    $ResultEmployee2 = mysqli_query($conn, $SelectEmployee2);
    if (mysqli_num_rows($ResultEmployee2) > 0) {
        $_SESSION["Error-Email"] = "1";
    }

    $SelectEmployee3 = "SELECT * FROM tb_address WHERE phone_number = '" . $PhoneNumber . "'";
    $ResultEmployee3 = mysqli_query($conn, $SelectEmployee3);
    if (mysqli_num_rows($ResultEmployee3) > 0) {
        $_SESSION["Error-PhoneNumber"] = "1";
    }

    $SelectEmployee4 = "SELECT * FROM tb_passport WHERE pass_number = '" . $PassportNumber . "' AND pass_number != '' ";
    $ResultEmployee4 = mysqli_query($conn, $SelectEmployee4);
    if (mysqli_num_rows($ResultEmployee4) > 0) {
        $_SESSION["Error-PPNumber"] = "1";
    }

    $SelectEmployee5 = "SELECT * FROM tb_citizen_identity WHERE cccd_number = '" . $CICN . "'";
    $ResultEmployee5 = mysqli_query($conn, $SelectEmployee5);
    if (mysqli_num_rows($ResultEmployee5) > 0) {
        $_SESSION["Error-CICN"] = "1";
    }

    if (
        isset($_SESSION["Error-EmployeeCode"]) ||
        isset($_SESSION["Error-Email"]) ||
        isset($_SESSION["Error-PhoneNumber"]) ||
        isset($_SESSION["Error-PPNumber"]) ||
        isset($_SESSION["Error-CICN"])
    ) {
        header("Location: add-test.php");
    } else {
        //National
        foreach ($National as $nt) {
            $NationalTemp = $nt;
        }

        //level

        // foreach ($Level as $lv) {
        //     $LevelTemp = $lv;    
        // }

        $SelectLevelId = "SELECT level_id FROM tb_level WHERE level_name = '" . $Level . "'";
        $ResultLevelId = mysqli_query($conn, $SelectLevelId);
        $RowLevelId = mysqli_fetch_assoc($ResultLevelId);
        $LevelId = $RowLevelId["level_id"];

        //country
        foreach ($Country as $ct) {
            $CountryTemp = $ct;
        }
        $SelectCountryId = "SELECT country_id FROM tb_country WHERE country_name = '" . $CountryTemp . "'";
        $ResultCountryId = mysqli_query($conn, $SelectCountryId);
        $RowCountryId = mysqli_fetch_assoc($ResultCountryId);
        $CountryId = $RowCountryId["country_id"];

        //Location
        foreach ($location_name as $lct) {
            $LocationTemp = $lct;
        }
        $SelectLocationId = "SELECT location_id FROM tb_location WHERE location_name = '" . $LocationTemp . "'";
        $ResultLocationId  = mysqli_query($conn, $SelectLocationId);
        $RowLocationId  = mysqli_fetch_assoc($ResultLocationId);
        $LocationId  = $RowLocationId["location_id"];

        //Position
        foreach ($Position as $pos) {
            $PositionTemp = $pos;
        }
        $SelectPositionId = "SELECT position_id FROM tb_position WHERE position_name = '" . $PositionTemp . "'";
        $ResultPositionId  = mysqli_query($conn, $SelectPositionId);
        $RowPositionId  = mysqli_fetch_assoc($ResultPositionId);
        $PositionId  = $RowPositionId["position_id"];

        //Position
        foreach ($Position as $Position) {
            $PositionTemp = $Position;
        }
        $SelectPositionId = "SELECT position_id FROM tb_position WHERE position_name = '" . $PositionTemp . "'";
        $ResultPositionId  = mysqli_query($conn, $SelectPositionId);
        $RowPositionId  = mysqli_fetch_assoc($ResultPositionId);
        $PositionId  = $RowPositionId["position_id"];

        //Job Category
        foreach ($JobCategory as $jc) {
            $JobCategoryTemp = $jc;
        }
        $SelectJobCategoryId = "SELECT job_category_id FROM tb_job_category WHERE job_category_name = '" . $JobCategoryTemp . "'";
        $ResultJobCategoryId  = mysqli_query($conn, $SelectJobCategoryId);
        $RowJobCategoryId  = mysqli_fetch_assoc($ResultJobCategoryId);
        $JobCategoryId  = $RowJobCategoryId["job_category_id"];

        //Job Title
        foreach ($JobTitle as $JobTitle) {
            $JobTitleTemp = $JobTitle;
        }
        $SelectJobTitleId = "SELECT job_title_id FROM tb_job_title WHERE job_title_name = '" . $JobTitleTemp . "'";
        $ResultJobTitleId  = mysqli_query($conn, $SelectJobTitleId);
        $RowJobTitleId  = mysqli_fetch_assoc($ResultJobTitleId);
        $JobTitleId  = $RowJobTitleId["job_title_id"];

        //Team
        foreach ($Team as $Team) {
            $TeamTemp = $Team;
        }
        $SelectTeamId = "SELECT team_id FROM tb_team WHERE team_name = '" . $TeamTemp . "'";
        $ResultTeamId  = mysqli_query($conn, $SelectTeamId);
        $RowTeamId  = mysqli_fetch_assoc($ResultTeamId);
        $TeamId  = $RowTeamId["team_id"];

        //TypeOfContract
        foreach ($type_contract_name as $toc) {
            $TypeOfContractTemp = $toc;
        }
        $SelectTypeOfContractId = "SELECT type_contract_id FROM tb_type_contract WHERE type_contract_name = '" . $TypeOfContractTemp . "'";
        $ResultTypeOfContractId  = mysqli_query($conn, $SelectTypeOfContractId);
        $RowTypeOfContractId  = mysqli_fetch_assoc($ResultTypeOfContractId);
        $TypeOfContractId  = $RowTypeOfContractId["type_contract_id"];

        //ContractDuration 
        // foreach ($ContractDuration as $cd) {
        //     $ContractDurationTemp = $cd;
        // }


        //Employee

        $InsertEmployee = "INSERT INTO tb_employee(employee_code, photo,
            first_name, last_name, english_name, gender, marital_status, date_of_birth,
            national_name, military_service, team_id, health_checkup_date,
            job_title_id, job_category_id, position_id, level_id, country_id, location_id) 
            VALUES ('" . $EmployeeCode . "','" . $Photo . "','" . $FirstName . "', '" . $LastName . "','" . $EngLishName . "',
            '" . $Gender . "','" . $MaritalStatus . "','" . $DayOfBirth . "','" . $NationalTemp . "','" . $MilitaryService . "',
            '" . $TeamId . "','" . $HealthCheckUpDate . "','" . $JobTitleId . "','" . $JobCategoryId . "','" . $PositionId . "',
            '" . $LevelId . "','" . $CountryId . "','" . $LocationId . "')";

        if (mysqli_query($conn, $InsertEmployee)) {
            echo "insert thành công";
        } else {
            echo "insert thất vọng";
        }
        echo $InsertEmployee;
        $SelectEmployeeId = "SELECT employee_id  FROM tb_employee WHERE  employee_code = '" . $EmployeeCode . "'";
        $ResultEmployeeId  = mysqli_query($conn, $SelectEmployeeId);
        $RowEmployeeId  = mysqli_fetch_assoc($ResultEmployeeId);
        $EmployeeId  = $RowEmployeeId['employee_id'];

        //Passport
        $InsertPassport = "INSERT INTO tb_passport(pass_number, date_of_issue, date_of_expiry, place_of_issue, employee_id) 
            VALUES ('" . $PassportNumber . "','" . $DOIpp . "','" . $DOEpp . "','" . $POIpp . "','" . $EmployeeId . "')";
        mysqli_query($conn, $InsertPassport);



        //CICN
        $InsertCICN = "INSERT INTO tb_citizen_identity(cccd_number, date_of_issue_cccd, place_of_issue_cccd, employee_id) 
            VALUES ('" . $CICN . "','" . $DOIcicn . "','" . $POIcicn . "','" . $EmployeeId . "')";
        mysqli_query($conn, $InsertCICN);


        //Address
        $InsertAddress = "INSERT INTO tb_address(phone_number, place_of_residence, permanent_address, email, employee_id) 
            VALUES ('" . $PhoneNumber . "','" . $PlaceOfResidence . "','" . $PermanentAddress . "','" . $Email . "','" . $EmployeeId . "')";
        mysqli_query($conn, $InsertAddress);


        //Contract
        $InsertContract = "INSERT INTO tb_contract(start_date, contract_duration, end_date, type_contract_id, employee_id) 
            VALUES ('" . $StartDate . "','" . $ContractDuration . "','" . $EndDate . "','" . $TypeOfContractId . "','" . $EmployeeId . "')";
        mysqli_query($conn, $InsertContract);


        //Personal Profile
        $FolderName = "../assets/files/" . $EmployeeCode . "/Personal-Profile/";
        if (!file_exists($FolderName)) {
            mkdir($FolderName, 0777, true);
            echo "Thư mục đã được tạo: $FolderName";
        } else {
            echo "Thư mục đã tồn tại: $FolderName";
        }

        if (isset($_FILES['PersonalProfile'])) {
            $PersonalProfile = $_FILES['PersonalProfile']['name'];
            foreach ($PersonalProfile as $key => $name) {
                $targetFilePersonalProfile = $FolderName . basename($name);
                move_uploaded_file($_FILES['PersonalProfile']["tmp_name"][$key], $targetFilePersonalProfile);
                $PersonalProfileName = $name;
                $InsertPersonalProfile = "INSERT INTO tb_personal_profile(employee_id, profile) 
                    VALUES ('" . $EmployeeId . "','" . $PersonalProfileName . "')";
                mysqli_query($conn, $InsertPersonalProfile);
            }
        }

        //Certificate
        $FolderName = "../assets/files/" . $EmployeeCode . "/Certificate/";
        if (!file_exists($FolderName)) {
            mkdir($FolderName, 0777, true);
            echo "Thư mục đã được tạo: $FolderName";
        } else {
            echo "Thư mục đã tồn tại: $FolderName";
        }

        if (isset($_FILES['Certificate'])) {
            $Certificate = $_FILES['Certificate']['name'];
            foreach ($Certificate as $key => $name) {
                $targetFileCertificate = $FolderName . basename($name);
                move_uploaded_file($_FILES["Certificate"]["tmp_name"][$key], $targetFileCertificate);
                $CertificateName = $name;
                $InsertCertificate = "INSERT INTO tb_certificate(employee_id, certificate) 
                    VALUES ('" . $EmployeeId . "','" . $CertificateName . "')";
                mysqli_query($conn, $InsertCertificate);
            }
        }



        $_SESSION["notify-add"] = "1";
        header("Location: list-employee.php");
    }
}
