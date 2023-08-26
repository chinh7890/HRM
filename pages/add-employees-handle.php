<?php 
$conn = new mysqli("localhost","root","new_password","taikhoan");
//    $conn = new mysqli("localhost","root","","qlns");

// Kiểm tra kết nối
 if ($conn->connect_error) {
     die("Kết nối thất vọng: " . $conn->connect_error);
 }
 // echo "Kết nối thành công";





require '../phpspreadsheet/vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $targetDirectory = "E:/THUCTAP/VENTECH/SUPERPROJECT/hrm/phpspreadsheet/files/"; // Thay đổi đường dẫn đến thư mục lưu trữ tệp
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
            echo "Lỗi khi upload tệp.";exit;
        }
    }
        // Đọc tệp Excel
        $spreadsheet = IOFactory::load($targetFile);
        $worksheet = $spreadsheet->getActiveSheet();
        $TitleRow = $worksheet->getRowIterator(1, 1)->current();

        // Lặp qua các ô trong dòng đầu tiên
        $cellIterator = $TitleRow->getCellIterator();
        $cellIterator->setIterateOnlyExistingCells(FALSE);
        // Lưu trữ tên trường vào mảng
        $fieldNames = array();
        foreach ($cellIterator as $cell) {
            $fieldNames[] = $cell->getValue();
        }
        
        // In tên trường ra màn hình
        foreach ($fieldNames as $fieldName) {
            echo $fieldName . " ";
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

<form id="upload-form" action="" method="post" enctype="multipart/form-data">
    <input type="file" name="excel_file" id="excel-file" accept=".xlsx, .xls">
    <input type="submit" value="Upload">
</form>

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







