<?php
require_once "../../connect.php";
session_start();
if (isset($_GET['id']) && isset($_GET['action']) && $_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_GET['id'];
    $sql = "SELECT
                tb_employee.employee_code
            FROM
                tb_employee
            WHERE
                employee_id = $id";
    $result = $conn->query($sql);
    while ($row = $result->fetch_assoc()) {
        $employee_code = $row['employee_code'];
    }

    if ($_GET['action'] == "PersonalProfile") {
        $targetDir = "../../assets/files/" . $employee_code . "/PersonalProfile/";
        $uploadOk = 1;
        // Lặp qua danh sách tệp đã tải lên
        foreach ($_FILES["file"]["name"] as $index => $fileName) {
            $targetFile = $targetDir . basename($fileName);
            $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

            // Kiểm tra xem tệp đã tồn tại hay chưa
            if (file_exists($targetFile)) {
                echo "Tệp $fileName đã tồn tại.<br>";
                $_SESSION['loi']='1';
                $uploadOk = 0;
            }

            // Kiểm tra kích thước tệp
            if ($_FILES["file"]["size"][$index] > 5 * 1024 * 1024) {
                echo "Tệp $fileName quá lớn.<br>";
                $_SESSION['loi']='1';
                $uploadOk = 0;
            }

            // Cho phép tải lên chỉ các loại tệp cụ thể (vd: pdf, docx, jpg)
            $allowedExtensions = array("pdf", "docx", "doc", "xlsx", "jpg");
            if (!in_array($imageFileType, $allowedExtensions)) {
                echo "Không được phép tải lên tệp $fileName vì định dạng không hợp lệ.<br>";
                $_SESSION['loi']='1';
                $uploadOk = 0;
            }
            if ($uploadOk == 0) {
                echo "Tải lên tệp $fileName không thành công.<br>";
                $_SESSION['loi']='1';
            } else {
                if (move_uploaded_file($_FILES["file"]["tmp_name"][$index], $targetFile)) {
                    echo "Tải lên tệp $fileName thành công.<br>";
                    $filename = mysqli_real_escape_string($conn, $fileName);
                    $sqlInsert = "INSERT INTO `tb_personal_profile`(`employee_id`, `profile`) VALUES ('$id','$filename')";
                    
                    if ($conn->query($sqlInsert) === TRUE) {
                        header("location: ../../pages/upload-file.php?id=$id");
                        $_SESSION['loi']='0';
                    } else {
                        $_SESSION['loi']='1';
                        echo "Lỗi khi thêm thông tin tệp vào cơ sở dữ liệu: " . $conn->error . "<br>";
                    }
                } else {
                    $_SESSION['loi']='1';
                    echo "Đã xảy ra lỗi khi tải lên tệp $fileName.<br>";
                }
            }
        }
    } elseif ($_GET['action'] == "Certificate") {
        $targetDir = "../../assets/files/" . $employee_code . "/Certificate/";
        $uploadOk = 1;
        // Lặp qua danh sách tệp đã tải lên
        foreach ($_FILES["file"]["name"] as $index => $fileName) {
            $targetFile = $targetDir . basename($fileName);
            $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

            // Kiểm tra xem tệp đã tồn tại hay chưa
            if (file_exists($targetFile)) {
                echo "Tệp $fileName đã tồn tại.<br>";
                $_SESSION['loi']='1';
                $uploadOk = 0;
            }

            // Kiểm tra kích thước tệp
            if ($_FILES["file"]["size"][$index] > 5 * 1024 * 1024) {
                echo "Tệp $fileName quá lớn.<br>";
                $_SESSION['loi']='1';
                $uploadOk = 0;
            }

            // Cho phép tải lên chỉ các loại tệp cụ thể (vd: pdf, docx, jpg)
            $allowedExtensions = array("pdf", "docx", "doc", "xlsx", "jpg");
            if (!in_array($imageFileType, $allowedExtensions)) {
                echo "Không được phép tải lên tệp $fileName vì định dạng không hợp lệ.<br>";
                $uploadOk = 0;
                $_SESSION['loi']='1';
            }
            if ($uploadOk == 0) {
                echo "Tải lên tệp $fileName không thành công.<br>";
                $_SESSION['loi']='1';
            } else {
                if (move_uploaded_file($_FILES["file"]["tmp_name"][$index], $targetFile)) {
                    echo "Tải lên tệp $fileName thành công.<br>";
                    $filename = mysqli_real_escape_string($conn, $fileName);

                    $sqlInsert = "INSERT INTO `tb_certificate`(`employee_id`, `certificate`) VALUES ('$id','$filename')";
                    if ($conn->query($sqlInsert) === TRUE) {
                        header("location: ../../pages/upload-file.php?id=$id");
                        $_SESSION['loi']='0';
                    } else {
                        $_SESSION['loi']='1';
                        echo "Lỗi khi thêm thông tin tệp vào cơ sở dữ liệu: " . $conn->error . "<br>";
                    }
                } else {
                    $_SESSION['loi']='1';
                    echo "Đã xảy ra lỗi khi tải lên tệp $fileName.<br>";

                }
            }
        }
    }
}
header("location: ../../pages/upload-file.php?id=$id");
