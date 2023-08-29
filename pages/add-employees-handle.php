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
    $data = $worksheet->toArray();
    // $drawing = $worksheet->getDrawingCollection()[$key];

    // $zipReader = fopen($drawing->getPath(), 'r');
    // $imageContents = '';
    // while (!feof($zipReader)) {
    //     $imageContents .= fread($zipReader, 1024);
    // }
    // fclose($zipReader);
    // $extension = $drawing->getExtension();

    // echo '<tr align="center">';
    // echo '<td>' . $value[0] . '</td>';
    // echo '<td>' . $value[1] . '</td>';
    // echo '<td><img  height="150px" width="150px"   src="data:image/jpeg;base64,' . base64_encode($imageContents) . '"/></td>';
    // echo '</tr>';
    // exit;



    $firstRow = $data[0]; // Lấy hàng đầu tiên
    $columnCount = count($firstRow); // Số cột là số phần tử trong hàng đầu tiên
    if ($columnCount != 31) {
        $_SESSION["error-import"] = "1";
        header("Location: list-employee.php");
    } else {
        $skipFirstRow = true; // Bỏ qua dòng đầu
        foreach ($data as $row) {
            if ($skipFirstRow) {
                $skipFirstRow = false;
                continue; // Bỏ qua dòng đầu và chuyển sang dòng tiếp theo
            }
            "Employee Code	Employee Name	English Name	Gender	Marital Status	Date of Birth	
            National	Military Service	Passport Number	Date of Issue	Date of Expiry	Place of Issue	
            CICN	Date of Issue	Place of Issue	Place of Residence	Permanent Address	Health Checkup Date	
            Type Contract	Job Tilte	Job Category	Team Position Level	Start Date	Contract Duration	End Date	
            Phone Number	E-mail	Country	Location
            ";

            $EmployeeCode = $row[0];
            $EmployeeName = $row[1];
            $EnglishName = $row[2];
            $EmployeeGender = $row[3];
            $EmployeeMaritalStatus = $row[4];
            $DateofBirth = $row[5];
            $National = $row[6];
            $EmployeeMilitaryService = $row[7];
            $PassportNumber = $row[8];
            $DateofIssuepp = $row[9];
            $DateofExpirypp = $row[10];
            $PlaceofIssuepp = $row[11];
            $CICN = $row[12];
            $DateofIssuecicn = $row[13];
            $PlaceofIssuecicn = $row[14];
            $PlaceofResidence = $row[15];
            $PermanentAddress = $row[16];
            $HealthCheckupDate = $row[17];
            $TypeContract = $row[18];
            $JobTitle = $row[19];
            $JobCategory = $row[20];
            $Team = $row[21];
            $Position = $row[22];
            $Level = $row[23];
            $StartDate = $row[24];
            $ContractDuration = $row[25];
            $EndDate = $row[26];
            $PhoneNumber = $row[27];
            $Email = $row[28];
            $Country = $row[29];
            $Location = $row[30];

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

            // $SelectPositionId = "SELECT position_id FROM tb_position WHERE position_name = '".$PositionTemp."'";
            // $ResultPositionId  = mysqli_query($conn,$SelectPositionId );
            // $RowPositionId  = mysqli_fetch_assoc($ResultPositionId );
            // $PositionId  = $RowPositionId ["position_id"];

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
            VALUES ('" . $EmployeeCode . "','','" . $EmployeeName . "','" . $EnglishName . "',
                    '" . $Gender . "','" . $MaritalStatus . "','" . $DateofBirth . "','" . $National . "','" . $MilitaryService . "',
                    '" . $TeamId . "','" . $HealthCheckupDate . "','" . $JobTitleId . "','" . $JobCategoryId . "','" . $PositionId . "',
                    '" . $LevelId . "','" . $CountryId . "','" . $LocationId . "')";
            echo $InsertEmployee;
            exit;
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
            } else {
                echo "insert thất vọng";
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