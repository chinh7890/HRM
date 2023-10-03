<?php
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/POP3.php';





use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Mailer
{
    // Khởi tạo đối tượng PHPMailer

    public function checkContract($sub, $body, $gmail, $name)
    {
        try {
            $mail = new PHPMailer(true);
            // Cấu hình thông tin SMTP
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'chinhnguyen6930@gmail.com';
            $mail->Password = 'gggl adoi eoec pgbl';
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;

            // Thiết lập thông tin người gửi và người nhận
            $mail->setFrom('chinhnguyen6930@gmail.com', 'Ventech');
            $mail->addAddress($gmail, $name);
            $mail->CharSet = "utf-8";
            // Thiết lập tiêu đề và nội dung email
            $mail->Subject = $sub;
            $mail->Body = $body;

            // Gửi email
            $mail->send();
            echo 'Email sent successfully!';
        } catch (Exception $e) {
            echo 'Email could not be sent. Error: ', $mail->ErrorInfo;
        }
    }
    public function checkCBirtday($gmail,  $name)
    {
        try {
            $mail = new PHPMailer(true);
            // Cấu hình thông tin SMTP
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'chinhnguyen6930@gmail.com';
            $mail->Password = 'gggl adoi eoec pgbl';
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;

            // Thiết lập thông tin người gửi và người nhận
            // hoang.nm@ventech-asia.com
            $mail->setFrom('chinhnguyen6930@gmail.com', 'Ventech');
            $mail->addAddress($gmail, $name);

            $mail->CharSet = "utf-8";
            // Thiết lập tiêu đề và nội dung email
            $mail->Subject = "Ventech Happy Birth Day";
            $mail->Body = "Hi " . $name . ' ' . "\n Ventech chúc bạn có một ngày sinh nhật thật là vui vẻ.";

            // Gửi email
            $mail->send();
            echo 'Email sent successfully!';
        } catch (Exception $e) {
            echo 'Email could not be sent. Error: ', $mail->ErrorInfo;
        }
    }
}
