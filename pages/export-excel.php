<?php
require '../phpspreadsheet/vendor/autoload.php';
require '../connect.php';
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;


// Truy vấn dữ liệu từ MySQL
$sql =$sql = "SELECT
       tb_employee.employee_code,
       tb_employee.employee_name,
       tb_employee.english_name,
       tb_employee.gender,
       tb_employee.marital_status,
       tb_employee.date_of_birth,
       tb_employee.national_name,
       tb_employee.military_service,
       tb_passport.pass_number,
       tb_passport.date_of_issue,
       tb_passport.date_of_expiry,
       tb_passport.place_of_issue,
       tb_citizen_identity.cccd_number,
       tb_citizen_identity.date_of_issue_cccd,
       tb_citizen_identity.place_of_issue_cccd,
       tb_address.place_of_residence,
       tb_address.permanent_address,
       tb_employee.health_checkup_date,
       tb_type_contract.type_contract_name,
       tb_job_title.job_title_name,
       tb_job_category.job_category_name,
       tb_team.team_name,
       tb_position.position_name,
       tb_level.level_name,
       tb_contract.start_date,
      
       tb_contract.contract_duration,
       tb_contract.end_date,
       tb_address.phone_number,
       tb_address.email,
       tb_country.country_name,
       tb_location.location_name
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
       tb_employee.employee_id = tb_address.employee_id 
       AND tb_employee.employee_id = tb_citizen_identity.employee_id 
       AND tb_employee.employee_id = tb_passport.employee_id 
       AND tb_employee.employee_id = tb_contract.employee_id 
       AND tb_employee.job_title_id = tb_job_title.job_title_id 
       AND tb_employee.job_category_id = tb_job_category.job_category_id 
       AND tb_employee.team_id = tb_team.team_id 
       AND tb_employee.position_id = tb_position.position_id 
       AND tb_employee.country_id = tb_country.country_id 
       AND tb_employee.level_id = tb_level.level_id 
       AND tb_employee.location_id = tb_location.location_id 
       AND tb_contract.type_contract_id = tb_type_contract.type_contract_id;";
$result = $conn->query($sql);
// Tạo một đối tượng Spreadsheet và tải mẫu từ file Excel
$spreadsheet = IOFactory::load('../excel/Employee List.xlsx');
$worksheet = $spreadsheet->getActiveSheet();

// Điều chỉnh dữ liệu trong mẫu theo dữ liệu từ MySQL

$row = 2; // Ví dụ: Dòng bắt đầu điền dữ liệu là dòng 2
while ($row_data = $result->fetch_assoc()) {
       if($row_data['gender']==1){
              $row_data['gender']="Male";
       }else{
              $row_data['gender']="Female";
       }
       if($row_data['marital_status']==1){
              $row_data['marital_status']="Married";
       }else{
              $row_data['marital_status']="Single";
       }
       if($row_data['military_service']==1){
              $row_data['military_service']="Done";
       }else{
              $row_data['military_service']="Not yet";
       }
    $column = 'A'; // Ví dụ: Cột bắt đầu là cột A
    foreach ($row_data as $value) {
        $worksheet->setCellValue($column . $row, $value);
        $column++;
    }
    $row++;
}
// Lưu file Excel mới vào thư mục
$outputFileName = '../excel/Employee_List.xlsx';
$downloadFileName = 'Employee_List.xlsx'; // Tên file tải về (không chứa "excel")

$writer = new Xlsx($spreadsheet);
$writer->save($outputFileName);

// Đóng kết nối MySQL
$conn->close();

// Chuẩn bị tải file về
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment; filename="' . $downloadFileName . '"');
header('Cache-Control: max-age=0');

// Đọc nội dung file và trả về cho trình duyệt để tải về
readfile($outputFileName);

// Xóa file tạm sau khi đã trả về để tránh tạo nhiều file không cần thiết
unlink($outputFileName);
?>
