<?php
require './vendor/autoload.php';
// $fileName = "example.xxx"; // Thay đổi tên tệp tại đây
// $pathInfo = pathinfo($fileName);
// print_r($pathInfo);
// $extension = $pathInfo['extension'];

// echo $extension; // In ra đuôi tệp (extension)
// exit;


$spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load("E:/THUCTAP/VENTECH/PROJECT/hrm/phpspreadsheet/files/Employee List.xlsx");

$worksheet = $spreadsheet->getActiveSheet();
$worksheetArray = $worksheet->toArray();
array_shift($worksheetArray);

// Specify the directory where you want to save the images
$imageDirectory = "./files/";

// Create the directory if it doesn't exist
if (!file_exists($imageDirectory)) {
    mkdir($imageDirectory, 0777, true);
}

echo '<table style="width:100%"  border="1">';
echo '<tr align="center">';
echo '<td>Sno</td>';
echo '<td>Name</td>';
echo '<td>Image</td>';
echo '</tr>';

foreach ($worksheetArray as $key => $value) {
    $worksheet = $spreadsheet->getActiveSheet();
    $drawing = $worksheet->getDrawingCollection()[$key];

    $zipReader = fopen($drawing->getPath(), 'r');
    $imageContents = '';
    while (!feof($zipReader)) {
        $imageContents .= fread($zipReader, 1024);
    }
    fclose($zipReader);
    $extension = $drawing->getExtension();
    // Generate a unique filename for each image based on the value in the first column
    $abc = $value[0];
    echo $abc;

    $filename = $imageDirectory . $value[0] . '.' . $extension;
    print_r($filename);
    // Save the image to the specified directory
    file_put_contents($filename, $imageContents);

    echo '<tr align="center">';
    echo '<td>' . $value[0] . '</td>';
    echo '<td>' . $value[4] . '</td>';
    echo '<td><img  height="150px" width="150px" src="' . $filename . '"/></td>';
    echo '</tr>';
}
