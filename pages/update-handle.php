<?php
session_start();
require_once("../connect.php");
if (!empty($_FILES['file1']) || !empty($_FILES['file']) ) {
       if ($_GET['action'] == "PersonalProfile" && isset($_GET["id"])) {
              //PersonalProfile
              $id = $_GET["id"];
              $sql = "SELECT
                     tb_employee.employee_code
                     FROM
                     tb_employee
                     WHERE
                     employee_id = $id";
              $result = $conn->query($sql);
              while ($row = $result->fetch_assoc()) {
                     $employee_code = $row['employee_code'];
              }
              $targetDir = "../assets/files/" . $employee_code . "/PersonalProfile/";
              $uploadOk = 1;
              $error = "";
              // Lặp qua danh sách tệp đã tải lên
              foreach ($_FILES["file1"]["name"] as $index => $fileName) {
                     $targetFile = $targetDir . basename($fileName);
                     // echo $targetFile;exit;
                     $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

                     // Kiểm tra xem tệp đã tồn tại hay chưa
                     if (file_exists($targetFile)) {
                            $error = "The file already exists.<br>";
                            // exit;
                            $uploadOk = 0;
                     } else {
                            $error = "";
                     }

                     // Kiểm tra kích thước tệp
                     if ($_FILES["file1"]["size"][$index] > 10 * 1024 * 1024) {
                            $error = $error . "The maximum file size permitted is 10 MB.<br>";
                            $uploadOk = 0;
                     } else {
                            $error = $error . '';
                     }

                     // Cho phép tải lên chỉ các loại tệp cụ thể (vd: pdf, docx, jpg)
                     $allowedExtensions = array("pdf", "docx", "doc", "xlsx", "jpg", "png");
                     if (!in_array($imageFileType, $allowedExtensions)) {
                            $error = $error . "Only pdf, docx, doc, xlsx, jpg, png files are supported.";
                            $uploadOk = 0;
                     } else {
                            $error = $error . '';
                     }
                     if ($uploadOk == 0) {
                     } else {
                            if (move_uploaded_file($_FILES["file1"]["tmp_name"][$index], $targetFile)) {
                                   // echo "Tải lên tệp $fileName thành công.<br>";
                                   $filename = mysqli_real_escape_string($conn, $fileName);
                                   $sqlInsert = "INSERT INTO `tb_personal_profile`(`employee_id`, `profile`) VALUES ('$id','$filename')";

                                   if ($conn->query($sqlInsert) === TRUE) {
                                   } else {
                                          // echo "Lỗi khi thêm thông tin tệp vào cơ sở dữ liệu: " . $conn->error . "<br>";
                                   }
                            } else {

                                   // echo "Đã xảy ra lỗi khi tải lên tệp $fileName.<br>";
                            }
                     }
              }
              $out['error'] = $error;
              header('Content-Type: application/json');
              echo json_encode($out);
       }
       if ($_GET['action'] == "Certificate" && isset($_GET["id"])) {
              //PersonalProfile
              $id = $_GET["id"];
              $sql = "SELECT
                            tb_employee.employee_code
                            FROM
                            tb_employee
                            WHERE
                            employee_id = $id";
              $result = $conn->query($sql);
              while ($row = $result->fetch_assoc()) {
                     $employee_code = $row['employee_code'];
              }
              $targetDir = "../assets/files/" . $employee_code . "/Certificate/";
              $uploadOk = 1;
              $error = '';
              // Lặp qua danh sách tệp đã tải lên
              foreach ($_FILES["file"]["name"] as $index => $fileName) {
                     $targetFile = $targetDir . basename($fileName);
                     $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

                     // Kiểm tra xem tệp đã tồn tại hay chưa
                     if (file_exists($targetFile)) {
                            $error = "The file already exists.<br>";
                            // exit;
                            $uploadOk = 0;
                     } else {
                            $error = "";
                     }

                     // Kiểm tra kích thước tệp
                     if ($_FILES["file"]["size"][$index] > 10 * 1024 * 1024) {
                            //   echo "Tệp $fileName quá lớn.<br>";
                            $error = $error . "The maximum file size permitted is 10 MB.<br>";
                            $uploadOk = 0;
                     } else {
                            $error = $error . '';
                     }

                     // Cho phép tải lên chỉ các loại tệp cụ thể (vd: pdf, docx, jpg)
                     $allowedExtensions = array("pdf", "docx", "doc", "xlsx", "jpg", "png");
                     if (!in_array($imageFileType, $allowedExtensions)) {
                            $error = $error . "Only pdf, docx, doc, xlsx, jpg, png files are supported.";
                            $uploadOk = 0;
                     } else {
                            $error = $error . '';
                     }
                     if ($uploadOk == 0) {
                            //   echo "Tải lên tệp $fileName không thành công.<br>";

                     } else {
                            if (move_uploaded_file($_FILES["file"]["tmp_name"][$index], $targetFile)) {
                                   //       echo "Tải lên tệp $fileName thành công.<br>";
                                   $filename = mysqli_real_escape_string($conn, $fileName);

                                   $sqlInsert = "INSERT INTO `tb_certificate`(`employee_id`, `certificate`) VALUES ('$id','$filename')";
                                   if ($conn->query($sqlInsert) === TRUE) {
                                   } else {

                                          //    echo "Lỗi khi thêm thông tin tệp vào cơ sở dữ liệu: " . $conn->error . "<br>";
                                   }
                            } else {

                                   //       echo "Đã xảy ra lỗi khi tải lên tệp $fileName.<br>";
                            }
                     }
              }
              $out['error'] = $error;
              header('Content-Type: application/json');
              echo json_encode($out);
       }
} else {
       $out['error'] = "No new files to upload.";
       header('Content-Type: application/json');
       echo json_encode($out);
}





if (isset($_GET["id"]) && $_GET['action'] == "up") {
       $id = $_GET["id"];
       $PersonalProfile = $_GET['action'];
       $EmployeeCode = $_GET["code"];
       $FullName = $_POST["FullName"]; //
       $EngLishName = $_POST["EngLishName"]; //
       $Gender = $_POST["Gender"]; //
       $National = $_POST["National"]; //
       $MaritalStatus = $_POST["MaritalStatus"]; //
       $MilitaryService = $_POST["MilitaryService"]; //
       $PhoneNumber = $_POST["PhoneNumber"]; //

       $DayOfBirth = $_POST["DateofBirth"]; //

       $Position = $_POST["Position"]; //

       $PassportNumber = $_POST["PassportNumber"]; //
       $DOIpp = $_POST["DateofIssue_pass"]; //
       $POIpp = $_POST["PlaceofIssue_pass"]; //
       $DOEpp = $_POST["DateofExpiry_pass"]; //

       $CICN = $_POST["cicn"]; //
       $DOIcicn = $_POST["DateofIssue_cicn"]; //
       $POIcicn = $_POST["PlaceofIssue_cicn"]; //

       $PlaceOfResidence = $_POST["PlaceofResidence"];
       $PermanentAddress = $_POST["PermanentAddress"];
       $HealthCheckUpDate = $_POST["Health"]; //

       $JobTitle = $_POST["JobTitle"]; //
       $JobCategory = $_POST["JobCategory"]; //
       $Team = $_POST["Team"]; //
       $Level = $_POST["Level"]; //
       $StartDate = $_POST["Startdate"]; //
       $TypeOfContract = $_POST["TypeofContract"]; //

       $ContractDuration = $_POST["ContractDuration"]; //
       $EndDate = $_POST["EndDate"];

       $Email = $_POST["email"]; //
       $Country = $_POST["Country"]; //
       $Location = $_POST["location"]; //

       $FolderName = "../assets/files/" . $EmployeeCode . "/Photo/";
       $oldImageFilePath = $FolderName . $_SESSION["old_photo"];




       //Photo
       if (isset($_FILES['Photo'])) {
              $image = $_FILES['Photo']['name'];
              $image_temp = $_FILES['Photo']['tmp_name'];
              $target = $FolderName . basename($_FILES['Photo']['name']);
              if ($image != "") {
                     unlink($oldImageFilePath);
                     move_uploaded_file($image_temp, "$target");
                     $Photo = basename($_FILES['Photo']['name']);
              } else {
                     $Photo = $_SESSION["old_photo"];
              }
       }
       //Job Title
       $sql = "SELECT job_title_id FROM tb_job_title WHERE job_title_name='$JobTitle'";
       $result = $conn->query($sql);
       while ($row = $result->fetch_assoc()) {
              $JobTitle = $row['job_title_id'];
       }
       //Job Category
       $sql = "SELECT job_category_id FROM tb_job_category WHERE job_category_name='$JobCategory'";
       $result = $conn->query($sql);
       while ($row = $result->fetch_assoc()) {
              $JobCategory = $row['job_category_id'];
       }
       //Team
       $sql = "SELECT team_id FROM tb_team WHERE team_name='$Team'";
       $result = $conn->query($sql);
       while ($row = $result->fetch_assoc()) {
              $Team = $row['team_id'];
       }
       //Level
       $sql = "SELECT level_id FROM tb_level WHERE level_name='$Level'";
       $result = $conn->query($sql);
       while ($row = $result->fetch_assoc()) {
              $Level = $row['level_id'];
       }
       //TypeOfContract
       $sql = "SELECT type_contract_id FROM tb_type_contract WHERE type_contract_name='$TypeOfContract'";
       $result = $conn->query($sql);
       while ($row = $result->fetch_assoc()) {
              $TypeOfContract = $row['type_contract_id'];
       }
       //Country
       $sql = "SELECT country_id FROM tb_country WHERE country_name='$Country'";
       $result = $conn->query($sql);
       while ($row = $result->fetch_assoc()) {
              $Country = $row['country_id'];
       }
       //Location
       $sql = "SELECT location_id FROM tb_location WHERE location_name='$Location'";
       $result = $conn->query($sql);
       while ($row = $result->fetch_assoc()) {
              $Location = $row['location_id'];
       }
       //Location
       $sql = "SELECT position_id FROM tb_position WHERE position_name='$Position'";
       $result = $conn->query($sql);
       while ($row = $result->fetch_assoc()) {
              $Position = $row['position_id'];
       }

       $sql_up1 = " UPDATE
                            `tb_employee`
                     SET
                            `photo` = '$Photo',
                            `employee_name` = '$FullName',
                            `english_name` = '$EngLishName',
                            `gender` = '$Gender',
                            `marital_status` = '$MaritalStatus',
                            `date_of_birth` = '" . formatDateToMySQL($DayOfBirth) . "',
                            `national_name` = '$National',
                            `military_service` = '$MilitaryService',
                            `team_id` = '$Team',
                            `health_checkup_date` = '$HealthCheckUpDate',
                            `job_title_id` = '$JobTitle',
                            `job_category_id` = '$JobCategory',
                            `position_id` = '$Position',
                            `level_id` = '$Level',
                            `country_id` = ' $Country',
                            `location_id` = '$Location'
                     WHERE
                            employee_id='$id'";
       $sql_up2 = "UPDATE
                            `tb_address`
                     SET
                            `phone_number` = '$PhoneNumber',
                            `place_of_residence` = '$PlaceOfResidence',
                            `permanent_address` = '$PermanentAddress',
                            `email` = ' $Email'
                     WHERE
                            employee_id='$id'";

       $sql_up3 = "UPDATE
                            `tb_passport`
                     SET
                            `pass_number` = '$PassportNumber',
                            `date_of_issue` = '" . formatDateToMySQL($DOIpp) . "',
                            `date_of_expiry` = '" . formatDateToMySQL($DOEpp) . "',
                            `place_of_issue` = '$POIpp'
                     WHERE
                            employee_id='$id'";
       $sql_up4 = "UPDATE
                            `tb_citizen_identity`
                     SET
                            `cccd_number` = '$CICN',
                            `date_of_issue_cccd` = '" . formatDateToMySQL($DOIcicn) . "',
                            `place_of_issue_cccd` = '$POIcicn'
                     WHERE
                            employee_id='$id'";
       $sql_up5 = "UPDATE
                     `tb_contract`
              SET
                     `start_date` = '" . formatDateToMySQL($StartDate) . "',
                     `contract_duration` = '$ContractDuration',
                     `end_date` = '" . formatDateToMySQL($EndDate) . "',
                     `type_contract_id` = '$TypeOfContract'
                     
              WHERE
                     `employee_id` = '$id'";
       $conn->query($sql_up1);
       $conn->query($sql_up2);
       $conn->query($sql_up3);
       $conn->query($sql_up4);
       $conn->query($sql_up5);
       header("location: ./profile.php?id=$id");
       $_SESSION['update'] = "1";
}
function formatDateToMySQL($inputDate)
{
       $dateObj = DateTime::createFromFormat('m/d/Y', $inputDate);
       if ($dateObj) {
              return $dateObj->format('Y/m/d');
       } else {
              return "Invalid date format";
       }
}
