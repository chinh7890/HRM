<?php
require '../phpspreadsheet/vendor/autoload.php';
require '../connect.php';

use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;
use PhpOffice\PhpSpreadsheet\Style\Alignment;

$spreadsheet = new Spreadsheet();
$worksheet = $spreadsheet->getActiveSheet();

if (isset($_GET['listcolumn'])) {
       $list_column = $_GET['listcolumn'];
}
// $array_column = str_split($list_column);
$list_column = explode(",", $list_column);


$column_sorted = array(
       "tb_employee.employee_code", "tb_employee.photo", "tb_employee.employee_name", "tb_employee.english_name", "tb_employee.gender", "tb_employee.marital_status", "tb_employee.military_service", "tb_employee.date_of_birth",
       "tb_employee.national_name", "tb_address.phone_number", "tb_passport.pass_number", "tb_passport.date_of_issue", "tb_passport.place_of_issue",
       "tb_passport.date_of_expiry", "tb_citizen_identity.cccd_number", "tb_citizen_identity.date_of_issue_cccd", "tb_citizen_identity.place_of_issue_cccd",
       "tb_address.place_of_residence", "tb_address.permanent_address", "tb_employee.health_checkup_date", "tb_job_title.job_title_name", "tb_position.position_name",
       "tb_job_category.job_category_name", "tb_team.team_name", "tb_level.level_name", "tb_contract.start_date", "tb_type_contract.type_contract_name", "tb_contract.contract_duration",
       "tb_address.email", "tb_country.country_name", "tb_location.location_name"
);

// Hàm sắp xếp tùy chỉnh để xác định thứ tự
function customSort($a, $b)
{
       global $column_sorted;
       $pos_a = array_search($a, $column_sorted);
       $pos_b = array_search($b, $column_sorted);

       if ($pos_a === false && $pos_b === false) {
              return 0; // Giữ nguyên thứ tự của các giá trị không có trong danh sách $column_sorted
       } elseif ($pos_a === false) {
              return 1; // Đưa các giá trị không có trong danh sách $column_sorted lên sau
       } elseif ($pos_b === false) {
              return -1; // Đưa các giá trị không có trong danh sách $column_sorted lên trước
       } else {
              return $pos_a - $pos_b;
       }
}

// Sắp xếp mảng sử dụng hàm sắp xếp tùy chỉnh
usort($list_column, 'customSort');
$string_column = implode(', ', $list_column);


// Truy vấn dữ liệu từ MySQL
$sql = "SELECT
       $string_column
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

// chuyển cột liên kết thành cột thường
$searchTerms = [
       'tb_employee.', 'tb_address.',
       'tb_citizen_identity.',
       'tb_passport.',
       'tb_type_contract.',
       'tb_job_title.',
       'tb_job_category.',
       'tb_team.',
       'tb_position.',
       'tb_level.',
       'tb_country.',
       'tb_location.',
       'tb_contract.',
];
$columData = str_replace($searchTerms, '', $list_column);
$columnname = array(
       "Employee Code", "Photo", "Employee Name", "English Name", "Gender", "Marital Status", "Military Service", "Date of Birth",
       "National Name", "Phone Number", "Passport Number", "Date of Issue", "Place of Issue", "Date of Expiry", "CICN", "Date of Issue", "Place of Issue",
       "Place of Residence", "Permanent Address", "Health Checkup Date", "Job Title", "Position",
       "Job Category", "Team", "Level", "Start Date", "Type Contract", "Contract Duration", "Email", "Country", "Location"
);
$combinedArray = array_combine($column_sorted, $columnname);
$listColumnToExport = [];

foreach ($list_column as $key => $value) {
       $column = $combinedArray[$value];
       $listColumnToExport[] = $column;
}

$columnIndex = 'A';
foreach ($listColumnToExport as $column) {
       $worksheet->setCellValue($columnIndex . '1', $column);
       $worksheet->getStyle($columnIndex . '1')->getFont()->setBold(true);
       $worksheet->getColumnDimension($columnIndex)->setWidth(15);
       $worksheet->getStyle($columnIndex . '1')->getFont()->setSize(12);
       $columnIndex++;
}

$row = 2; // Ví dụ: Dòng bắt đầu điền dữ liệu là dòng 2
while ($row_data = $result->fetch_assoc()) {
       $column = 'A';
       foreach ($columData as $column_name) {
              $value = $row_data[$column_name];
              if (isset($row_data['gender']) && $row_data['gender'] == 1) {
                     $row_data['gender'] = "Male";
              } else {
                     $row_data['gender'] = "Female";
              }
              if (isset($row_data['marital_status']) && $row_data['marital_status'] == 1) {
                     $row_data['marital_status'] = "Married";
              } else {
                     $row_data['marital_status'] = "Single";
              }
              if (isset($row_data['military_service']) && $row_data['military_service'] == 1) {
                     $row_data['military_service'] = "Done";
              } else {
                     $row_data['military_service'] = "Not yet";
              }
              if ($column_name === "photo") {
                     $Photo_path = "../assets/files/" . $row_data['employee_code'] . "/Photo/" . $value;
                     $drawing = new Drawing();
                     $drawing->setName($value);
                     $drawing->setDescription($value);
                     $drawing->setPath($Photo_path); // Đường dẫn đến tệp hình ảnh
                     $drawing->setCoordinates($column . $row); // Vị trí cột và hàng để đặt hình ảnh
                     $drawing->setWidth(100); // Đặt chiều rộng (đơn vị là pixel)
                     $drawing->setHeight(100); // Đặt chiều cao (đơn vị là pixel)
                     $worksheet->getColumnDimension($column)->setWidth(23); // Thiết lập chiều rộng cho cột A
                     $worksheet->getRowDimension($row)->setRowHeight(88); // Thiết lập chiều cao cho hàng 1
                     $worksheet->getStyle($column)->getAlignment()->setHorizontal('center');
                     $worksheet->getStyle($column)->getAlignment()->setVertical('center');
                     $drawing->setWorksheet($worksheet);
                     $column++;
                     continue;
              } else {
                     // Đặt giá trị vào ô Excel
                     $worksheet->setCellValue($column . $row, $value);
                     $worksheet->getColumnDimension($column)->setWidth(23); // Thiết lập chiều rộng cho cột A
                     $worksheet->getRowDimension($row)->setRowHeight(88); // Thiết lập chiều cao cho hàng 1
                     $worksheet->getStyle($column)->getAlignment()->setHorizontal('center');
                     $worksheet->getStyle($column)->getAlignment()->setVertical('center');
              }

              $column++; // Di chuyển đến cột tiếp theo
       }

       $row++; // Di chuyển đến hàng tiếp theo
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
