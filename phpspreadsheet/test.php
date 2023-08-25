<?php
// Kết nối cơ sở dữ liệu MySQL
require_once "../connect.php";
// Sử dụng thư viện PhpSpreadsheet để đọc tệp Excel
// Sử dụng thư viện PhpSpreadsheet để đọc tệp Excel
require 'vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\IOFactory;

$excelFile = './test.xlsx';

$spreadsheet = IOFactory::load($excelFile);
$worksheet = $spreadsheet->getActiveSheet();
$data = $worksheet->toArray();
print_r($data);
$skipFirstRow = true; // Bỏ qua dòng đầu
foreach ($data as $row) {
    if ($skipFirstRow) {
        $skipFirstRow = false;
        continue; // Bỏ qua dòng đầu và chuyển sang dòng tiếp theo
    }
    
    $column0 = $row[0];
    $column1 = $row[1];
    $column2 = $row[2];
    $column3 = $row[3];

    $sql = "INSERT INTO `tb_address`( `phone_number`, `place_of_residence`, `permanent_address`, `email`) 
              VALUES ('$column0',' $column1 ',' $column2 ',' $column3')";
    if ($conn->query($sql) !== TRUE) {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}


?>
