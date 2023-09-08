<?php
// Kết nối cơ sở dữ liệu MySQL
require_once "../connect.php";

require 'vendor/autoload.php'; // Đường dẫn đến file autoload.php của PhpSpreadsheet

use PhpOffice\PhpSpreadsheet\IOFactory;

// Đọc file Excel
$spreadsheet = IOFactory::load('E:/THUCTAP/VENTECH/PROJECT/hrm/phpspreadsheet/test.xlsx');

// Lấy danh sách các hình ảnh có trong file
$images = $spreadsheet->getSheetByName('Sheet1')->getDrawingCollection();

foreach ($images as $image) {
    $imagePath = $image->getPath(); // Đây là đường dẫn đến hình ảnh
    echo "direct: " . $imagePath . '<br>';
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>hello</h1>
    <img src="" alt="">
</body>

</html>