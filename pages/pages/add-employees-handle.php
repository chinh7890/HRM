<?php
session_start();
require_once "../connect.php";
require '../phpspreadsheet/vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $targetDirectory = "../phpspreadsheet/files/"; // Thay đổi đường dẫn đến thư mục lưu trữ tệp
    $targetFile = $targetDirectory . basename($_FILES["excel_file"]["name"]);
    $uploadOk = 1;
    $fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    // Kiểm tra xem tệp có phải là file Excel không
    if ($fileType != "xlsx" && $fileType != "xls") {
        echo "Chỉ chấp nhận file Excel (.xlsx, .xls)";
        $uploadOk = 0;
    }

    // Kiểm tra uploadOk để đảm bảo không có lỗi xảy ra
    if ($uploadOk == 0) {
        echo "Lỗi khi upload tệp.";
    } else {
        if (move_uploaded_file($_FILES["excel_file"]["tmp_name"], $targetFile)) {
            echo "Tệp " . htmlspecialchars(basename($_FILES["excel_file"]["name"])) . " đã được tải lên thành công.";
        } else {
            echo "Lỗi khi upload tệp.";
            exit;
        }
    }
    // Đọc tệp Excel
    $spreadsheet = IOFactory::load($targetFile);
    $worksheet = $spreadsheet->getActiveSheet();
    $highestColumn = $worksheet->getHighestColumn();
    $numberOfColumns = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::columnIndexFromString($highestColumn);
    $worksheetArray = $worksheet->toArray();
    array_shift($worksheetArray);

    if ($numberOfColumns != 32) {
        $_SESSION["error-import"] = "1";
        exit;
        header("Location: list-employee.php"); // Nếu số cột khác 32 (theo format của excel) báo lỗi
    } else {
        foreach ($worksheetArray as $key => $value) {
            $EmployeeCode = $value[0];

            $FolderNamePhoto = "../assets/files/" . $EmployeeCode . "/Photo/";
            if (!file_exists($FolderNamePhoto)) {
                mkdir($FolderNamePhoto, 0777, true);
                echo "Thư mục đã được tạo: $FolderNamePhoto";
            } else {
                echo "Thư mục đã tồn tại: $FolderNamePhoto";
            }

            $FolderNameCertificate = "../assets/files/" . $EmployeeCode . "/Certificate/";
            if (!file_exists($FolderNameCertificate)) {
                mkdir($FolderNameCertificate, 0777, true);
                echo "Thư mục đã được tạo: $FolderNameCertificate";
            } else {
                echo "Thư mục đã tồn tại: $FolderNameCertificate";
            }

            $FolderNamePersonalProfile = "../assets/files/" . $EmployeeCode . "/PersonalProfile/";
            if (!file_exists($FolderNamePersonalProfile)) {
                mkdir($FolderNamePersonalProfile, 0777, true);
                echo "Thư mục đã được tạo: $FolderNamePersonalProfile";
            } else {
                echo "Thư mục đã tồn tại: $FolderNamePersonalProfile";
            }

            // Photo
            $worksheet = $spreadsheet->getActiveSheet();
            var_dump($key);
            $drawing = $worksheet->getDrawingCollection()[$key];
            $zipReader = fopen($drawing->getPath(), 'r');
            $imageContents = '';
            while (!feof($zipReader)) {
                $imageContents .= fread($zipReader, 1024);
            }
            fclose($zipReader);
            $extension = $drawing->getExtension();
            $filename = $FolderNamePhoto . $value[1] . $EmployeeCode . '_Photo' . '.' . $extension;
            file_put_contents($filename, $imageContents);

            $Photo = $EmployeeCode . '_Photo' . '.' . $extension;
            $EmployeeName = $value[2];
            $EnglishName = $value[3];
            $EmployeeGender = $value[4];
            $EmployeeMaritalStatus = $value[5];
            $DateofBirth = $value[6];
            $National = $value[7];
            $EmployeeMilitaryService = $value[8];
            $PassportNumber = $value[9];
            $DateofIssuepp = $value[10];
            $DateofExpirypp = $value[11];
            $PlaceofIssuepp = $value[12];
            $CICN = $value[13];
            $DateofIssuecicn = $value[14];
            $PlaceofIssuecicn = $value[15];
            $PlaceofResidence = $value[16];
            $PermanentAddress = $value[17];
            $HealthCheckupDate = $value[18];
            $TypeContract = $value[19];
            $JobTitle = $value[20];
            $JobCategory = $value[21];
            $Team = $value[22];
            $Position = $value[23];
            $Level = $value[24];
            $StartDate = $value[25];
            $ContractDuration = $value[26];
            $EndDate = $value[27];
            $PhoneNumber = $value[28];
            $Email = $value[29];
            $Country = $value[30];
            $Location = $value[31];
            //Level
            $SelectLevelId = "SELECT level_id FROM tb_level WHERE level_name = '" . $Level . "'";
            $ResultLevelId = mysqli_query($conn, $SelectLevelId);
            $RowLevelId = mysqli_fetch_assoc($ResultLevelId);
            $LevelId = $RowLevelId["level_id"];

            //Country
            $SelectCountryId = "SELECT country_id FROM tb_country WHERE country_name = '" . $Country . "'";
            $ResultCountryId = mysqli_query($conn, $SelectCountryId);
            $RowCountryId = mysqli_fetch_assoc($ResultCountryId);
            $CountryId = $RowCountryId["country_id"];


            //Location
            $SelectLocationId = "SELECT location_id FROM tb_location WHERE location_name = '" . $Location . "'";
            $ResultLocationId  = mysqli_query($conn, $SelectLocationId);
            $RowLocationId  = mysqli_fetch_assoc($ResultLocationId);
            $LocationId  = $RowLocationId["location_id"];

            //Position
            $SelectPositionId = "SELECT position_id FROM tb_position WHERE position_name = '" . $Position . "'";
            $ResultPositionId  = mysqli_query($conn, $SelectPositionId);
            $RowPositionId  = mysqli_fetch_assoc($ResultPositionId);
            $PositionId  = $RowPositionId["position_id"];

            //Job Category
            $SelectJobCategoryId = "SELECT job_category_id FROM tb_job_category WHERE job_category_name = '" . $JobCategory . "'";
            $ResultJobCategoryId  = mysqli_query($conn, $SelectJobCategoryId);
            $RowJobCategoryId  = mysqli_fetch_assoc($ResultJobCategoryId);
            $JobCategoryId  = $RowJobCategoryId["job_category_id"];

            //Job Title
            $SelectJobTitleId = "SELECT job_title_id FROM tb_job_title WHERE job_title_name = '" . $JobTitle . "'";
            $ResultJobTitleId  = mysqli_query($conn, $SelectJobTitleId);
            $RowJobTitleId  = mysqli_fetch_assoc($ResultJobTitleId);
            $JobTitleId  = $RowJobTitleId["job_title_id"];

            //Team
            $SelectTeamId = "SELECT team_id FROM tb_team WHERE team_name = '" . $Team . "'";
            $ResultTeamId  = mysqli_query($conn, $SelectTeamId);
            $RowTeamId  = mysqli_fetch_assoc($ResultTeamId);
            $TeamId  = $RowTeamId["team_id"];

            //Type of Contract
            $SelectTypeOfContractId = "SELECT type_contract_id FROM tb_type_contract WHERE type_contract_name = '" . $TypeContract . "'";
            $ResultTypeOfContractId  = mysqli_query($conn, $SelectTypeOfContractId);
            $RowTypeOfContractId  = mysqli_fetch_assoc($ResultTypeOfContractId);
            $TypeOfContractId  = $RowTypeOfContractId["type_contract_id"];

            //Employee
            if ($EmployeeGender == 'Male') {
                $Gender = 1;
            } else {
                $Gender = 0;
            }
            if ($EmployeeMaritalStatus == 'Married') {
                $MaritalStatus = 1;
            } else {
                $MaritalStatus = 0;
            }
            if ($EmployeeMilitaryService == 'Done') {
                $MilitaryService = 1;
            } else {
                $MilitaryService = 0;
            }

            $InsertEmployee = "INSERT INTO tb_employee(employee_code, photo,
                            employee_name, english_name, gender, marital_status, date_of_birth,
                            national_name, military_service, team_id, health_checkup_date,
                            job_title_id, job_category_id, position_id, level_id, country_id, location_id) 
                        VALUES ('" . $EmployeeCode . "','" . $Photo . "','" . $EmployeeName . "','" . $EnglishName . "',
                                '" . $Gender . "','" . $MaritalStatus . "','" . $DateofBirth . "','" . $National . "','" . $MilitaryService . "',
                                '" . $TeamId . "','" . $HealthCheckupDate . "','" . $JobTitleId . "','" . $JobCategoryId . "','" . $PositionId . "',
                                '" . $LevelId . "','" . $CountryId . "','" . $LocationId . "')";
            if (mysqli_query($conn, $InsertEmployee)) {
                echo "insert thành công";
                // echo $SelectEmployee;
                $SelectEmployeeId = "SELECT employee_id  FROM tb_employee WHERE  employee_code = '" . $EmployeeCode . "'";
                $ResultEmployeeId  = mysqli_query($conn, $SelectEmployeeId);
                $RowEmployeeId  = mysqli_fetch_assoc($ResultEmployeeId);
                $EmployeeId  = $RowEmployeeId['employee_id'];
                //Passport
                $InsertPassport = "INSERT INTO tb_passport(pass_number, date_of_issue, date_of_expiry, place_of_issue, employee_id) 
                        VALUES ('" . $PassportNumber . "','" . $DateofIssuepp . "','" . $DateofExpirypp . "','" . $PlaceofIssuepp . "','" . $EmployeeId . "')";
                mysqli_query($conn, $InsertPassport);

                //CICN
                $InsertCICN = "INSERT INTO tb_citizen_identity(cccd_number, date_of_issue_cccd, place_of_issue_cccd, employee_id) 
                        VALUES ('" . $CICN . "','" . $DateofIssuecicn . "','" . $PlaceofIssuecicn . "','" . $EmployeeId . "')";
                mysqli_query($conn, $InsertCICN);

                //Address
                $InsertAddress = "INSERT INTO tb_address(phone_number, place_of_residence, permanent_address, email, employee_id) 
                        VALUES ('" . $PhoneNumber . "','" . $PlaceofResidence . "','" . $PermanentAddress . "','" . $Email . "','" . $EmployeeId . "')";
                mysqli_query($conn, $InsertAddress);

                //Contract
                $InsertContract = "INSERT INTO tb_contract(start_date, contract_duration, end_date, type_contract_id, employee_id) 
                        VALUES ('" . $StartDate . "','" . $ContractDuration . "','" . $EndDate . "','" . $TypeOfContractId . "','" . $EmployeeId . "')";
                mysqli_query($conn, $InsertContract);
                $_SESSION["success-import"] = "1";
                header("Location: list-employee.php");
                
                // theo vet
                

                
            } else {
                echo "insert thất vọng - " . $EmployeeCode;
                $_SESSION["error-import"] = "1";
                header("Location: list-employee.php");
            }
        }
        
    }
}



// Đóng kết nối CSDL
?>
<!DOCTYPE html>
<html>

<head>
    <title>Upload Excel File</title>
</head>

<body>
    <script>
        document.getElementById("excel-file").addEventListener("change", function(event) {
            const selectedFile = event.target.files[0];
            if (selectedFile) {
                const allowedExtensions = ["xlsx", "xls"];
                const fileExtension = selectedFile.name.split(".").pop().toLowerCase();

                if (!allowedExtensions.includes(fileExtension)) {
                    alert("Chỉ chấp nhận file Excel (.xlsx, .xls)");
                    document.getElementById("excel-file").value = "";
                }
            }
        });
    </script>

</body>

</html>