<?php 

    include('PHPMailer/src/Exception.php');
    include('PHPMailer/src/OAuth.php');
    include('PHPMailer/src/PHPMailer.php');
    include('PHPMailer/src/POP3.php');
    include('PHPMailer/src/SMTP.php');

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
            $mail = new PHPMailer(true);
            try {
                $mail->isSMTP();                                            // Set mailer to use SMTP
                $mail->SMTPDebug = 2;                                       // Enable verbose debug output
                $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
                $mail->SMTPAuth = true;                                     // Enable SMTP authentication
                $mail->Username = 'quangvu123van@gmail.com';
                $mail->Password = '123456quang';
                $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted  Mã hóa trong quá trình gửi mail
                $mail->Port = 587;                                          // TCP port to connect to
        
                $mail->charset = 'UTF-8';
                $mail->setFrom('quangvu123van@gmail.com');   //email người gửi
                $mail->addAddress('vanyellow1211@gmail.com','Van'); //email người nhận ; ô text ng dùng nhập email
                $mail->isHTML(true);
                $mail->Subject = 'Test';
                $mail->Body    = 'wellcome 2022'; //text trên form
                // $mail->AddTo('today, it is raining')    //text trên form
                $mail->send();
                echo 'Message has been sent';
            } catch (Exception $e) {
                echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
            }
        
        ?>
</body>
</html>