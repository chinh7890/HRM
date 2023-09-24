<?php
// Kết nối cơ sở dữ liệu MySQL
require_once "../connect.php";

require 'vendor/autoload.php'; // Đường dẫn đến file autoload.php của PhpSpreadsheet

use PhpOffice\PhpSpreadsheet\IOFactory;

$spreadsheet = IOFactory::load('../phpspreadsheet/files/Employee List.xlsx'); // Đường dẫn tới file Excel của bạn

// Lấy danh sách các hình ảnh có trong file Excel
$images = $spreadsheet->getSheet(0)->getDrawingCollection();
foreach ($images as $image) {
    if ($image instanceof PhpOffice\PhpSpreadsheet\Worksheet\MemoryDrawing) {
        ob_start();
        call_user_func($image->getRenderingFunction(), $image->getImageResource());
        $imageData = ob_get_contents();
        ob_end_clean();
        $base64 = 'data:' . $image->getMimeType() . ';base64,' . base64_encode($imageData);

        // $base64 chứa dữ liệu ảnh dưới định dạng base64, bạn có thể sử dụng nó theo nhu cầu

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
        <?php echo '<img src="' . $base64 . '" alt="Excel Image">'; ?>
    </body>

    </html>
<?php
}
?>