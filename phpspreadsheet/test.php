<?php
// Kết nối cơ sở dữ liệu MySQL
require_once "../connect.php";
// Sử dụng thư viện PhpSpreadsheet để đọc tệp Excel
// Sử dụng thư viện PhpSpreadsheet để đọc tệp Excel
require 'vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\IOFactory;

$excelFile = 'E:/THUCTAP/VENTECH/SUPERPROJECT/hrm/phpspreadsheet/files/Employee List.xlsx';

$spreadsheet = IOFactory::load($excelFile);
$worksheet = $spreadsheet->getActiveSheet();
$data = $worksheet->toArray();
// print_r($data);
$skipFirstRow = true; // Bỏ qua dòng đầu
foreach ($data as $row) {
    if ($skipFirstRow) {
        $skipFirstRow = false;
        continue; // Bỏ qua dòng đầu và chuyển sang dòng tiếp theo
    }
    "Employee Code	Photo	Employee Name	English Name	Gender	Marital Status	Date of Birth	
    National	Military Service	Passport Number	Date of Issue	Date of Expiry	Place of Issue	
    CICN	Date of Issue	Place of Issue	Place of Residence	Permanent Address	Health Checkup Date	
    Type Contract	Job Tilte	Job Category	Team Position Level	Start Date	Contract Duration	End Date	
    Phone Number	E-mail	Country	Location
    ";
    $EmployeeCode = $row[0];
    $Photo = $row[1];
    $EmployeeName= $row[2];
    $EnglishName = $row[3];
    $EmployeeGender = $row[4];
    $EmployeeMaritalStatus = $row[5];
    $DateofBirth = $row[6];
    $National = $row[7];
    $EmployeeMilitaryService = $row[8];
    $PassportNumber = $row[9];
    $DateofIssuepp = $row[10];
    $DateofExpirypp = $row[11];
    $PlaceofIssuepp = $row[12];
    $CICN = $row[13];
    $DateofIssuecicn = $row[14];
    $PlaceofIssuecicn = $row[15];
    $PlaceofResidence = $row[16];
    $PermanentAddress = $row[17];
    $HealthCheckupDate = $row[18];
    $TypeContract = $row[19];
    $JobTitle = $row[20];
    $JobCategory = $row[21];
    $Team = $row[22];
    $Position = $row[23];
    $Level = $row[24];
    $StartDate= $row[25];
    $ContractDuration = $row[26];
    $EndDate = $row[27];
    $PhoneNumber = $row[28];
    $Email = $row[29];
    $Country = $row[30];
    $Location = $row[31];
    
    //Level
    $SelectLevelId = "SELECT level_id FROM tb_level WHERE level_name = '".$Level."'";
    $ResultLevelId = mysqli_query($conn,$SelectLevelId);
    $RowLevelId = mysqli_fetch_assoc($ResultLevelId);
    $LevelId = $RowLevelId["level_id"];

    //Country
    $SelectCountryId = "SELECT country_id FROM tb_country WHERE country_name = '".$Country."'";
    $ResultCountryId = mysqli_query($conn,$SelectCountryId);
    $RowCountryId = mysqli_fetch_assoc($ResultCountryId);
    $CountryId = $RowCountryId["country_id"];        
    
     
    //Location
    $SelectLocationId = "SELECT location_id FROM tb_location WHERE location_name = '".$Location."'";
    $ResultLocationId  = mysqli_query($conn,$SelectLocationId );
    $RowLocationId  = mysqli_fetch_assoc($ResultLocationId );
    $LocationId  = $RowLocationId ["location_id"];

    //Position
    $SelectPositionId = "SELECT position_id FROM tb_position WHERE position_name = '".$Position."'";
    $ResultPositionId  = mysqli_query($conn,$SelectPositionId );
    $RowPositionId  = mysqli_fetch_assoc($ResultPositionId );
    $PositionId  = $RowPositionId ["position_id"];

    // $SelectPositionId = "SELECT position_id FROM tb_position WHERE position_name = '".$PositionTemp."'";
    // $ResultPositionId  = mysqli_query($conn,$SelectPositionId );
    // $RowPositionId  = mysqli_fetch_assoc($ResultPositionId );
    // $PositionId  = $RowPositionId ["position_id"];

    //Job Category
    $SelectJobCategoryId = "SELECT job_category_id FROM tb_job_category WHERE job_category_name = '".$JobCategory."'";
    $ResultJobCategoryId  = mysqli_query($conn,$SelectJobCategoryId );
    $RowJobCategoryId  = mysqli_fetch_assoc($ResultJobCategoryId );
    $JobCategoryId  = $RowJobCategoryId ["job_category_id"];

    //Job Title
    $SelectJobTitleId = "SELECT job_title_id FROM tb_job_title WHERE job_title_name = '".$JobTitle."'";
    $ResultJobTitleId  = mysqli_query($conn,$SelectJobTitleId );
    $RowJobTitleId  = mysqli_fetch_assoc($ResultJobTitleId );
    $JobTitleId  = $RowJobTitleId ["job_title_id"];

    //Team
    $SelectTeamId = "SELECT team_id FROM tb_team WHERE team_name = '".$Team."'";
    $ResultTeamId  = mysqli_query($conn,$SelectTeamId );
    $RowTeamId  = mysqli_fetch_assoc($ResultTeamId );
    $TeamId  = $RowTeamId ["team_id"];

    //Type of Contract
    $SelectTypeOfContractId = "SELECT type_contract_id FROM tb_type_contract WHERE type_contract_name = '".$TypeContract."'";
    $ResultTypeOfContractId  = mysqli_query($conn,$SelectTypeOfContractId );
    $RowTypeOfContractId  = mysqli_fetch_assoc($ResultTypeOfContractId );
    $TypeOfContractId  = $RowTypeOfContractId ["type_contract_id"];

    //Employee
    if($EmployeeGender=='Male'){
        $Gender=1;
    }
    else{
        $Gender=0;
    }
    if($EmployeeMaritalStatus=='Married'){
        $MaritalStatus=1;
    }
    else{
        $MaritalStatus=0;
        }
    if($EmployeeMilitaryService=='Done'){
        $MilitaryService=1;
    }
    else{
        $MilitaryService=0;
    }
        
    $InsertEmployee = "INSERT INTO tb_employee(employee_code, photo,
        employee_name, english_name, gender, marital_status, date_of_birth,
        national_name, military_service, team_id, health_checkup_date,
        job_title_id, job_category_id, position_id, level_id, country_id, location_id) 
    VALUES ('".$EmployeeCode."','','".$EmployeeName."','".$EnglishName."',
            '".$Gender."','".$MaritalStatus."','".$DateofBirth."','".$National."','".$MilitaryService."',
            '".$TeamId."','".$HealthCheckupDate."','".$JobTitleId."','".$JobCategoryId."','".$PositionId."',
            '".$LevelId."','".$CountryId."','".$LocationId."')";
    if(mysqli_query ($conn, $InsertEmployee)){  
        echo "insert thành công";
        }
     else{
        echo "insert thất vọng";
        }
    // echo $InsertEmployee;
    $SelectEmployeeId = "SELECT employee_id  FROM tb_employee WHERE  employee_code = '".$EmployeeCode."'";
    $ResultEmployeeId  = mysqli_query($conn,$SelectEmployeeId );
    $RowEmployeeId  = mysqli_fetch_assoc($ResultEmployeeId );
    $EmployeeId  = $RowEmployeeId ['employee_id'];    

    //Passport
    $InsertPassport = "INSERT INTO tb_passport(pass_number, date_of_issue, date_of_expiry, place_of_issue, employee_id) 
    VALUES ('".$PassportNumber."','".$DateofIssuepp."','".$DateofExpirypp."','".$PlaceofIssuepp."','".$EmployeeId."')";
    mysqli_query ($conn, $InsertPassport);

    // $SelectPassportId = "SELECT pass_id FROM tb_passport WHERE pass_number = '".$PassportNumber."'";
    // $ResultPassportId  = mysqli_query($conn,$SelectPassportId );
    // $RowPassportId  = mysqli_fetch_assoc($ResultPassportId );
    // $PassportId  = $RowPassportId ["pass_id"];

    //CICN
    $InsertCICN = "INSERT INTO tb_citizen_identity(cccd_number, date_of_issue_cccd, place_of_issue_cccd, employee_id) 
    VALUES ('".$CICN."','".$DateofIssuecicn."','".$PlaceofIssuecicn."','".$EmployeeId."')";
    mysqli_query ($conn, $InsertCICN);

    // $SelectCICNId = "SELECT cccd_id FROM tb_citizen_identity WHERE cccd_number = '".$CICN."'";
    // $ResultCICNId  = mysqli_query($conn,$SelectCICNId );
    // $RowCICNId  = mysqli_fetch_assoc($ResultCICNId );
    // $CICNId  = $RowCICNId ["cccd_id"];

    //Address
    $InsertAddress = "INSERT INTO tb_address(phone_number, place_of_residence, permanent_address, email, employee_id) 
    VALUES ('".$PhoneNumber."','".$PlaceofResidence."','".$PermanentAddress."','".$Email."','".$EmployeeId."')";
    mysqli_query ($conn, $InsertAddress); 
    
    // $SelectAddressId = "SELECT address_id FROM tb_address WHERE phone_number = '".$PhoneNumber."'";
    // $ResultAddressId  = mysqli_query($conn,$SelectAddressId );
    // $RowAddressId  = mysqli_fetch_assoc($ResultAddressId );
    // $AddressId  = $RowAddressId ["address_id"];

    //Contract
    $InsertContract = "INSERT INTO tb_contract(start_date, contract_duration, end_date, type_contract_id, employee_id) 
    VALUES ('".$StartDate."','".$ContractDuration."','".$EndDate."','".$TypeOfContractId."','".$EmployeeId."')";
    mysqli_query ($conn, $InsertContract);


    


}


?>
