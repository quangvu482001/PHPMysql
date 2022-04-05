<?php
    include('PHPMailer/src/Exception.php');
    include('PHPMailer/src/OAuth.php');
    include('PHPMailer/src/PHPMailer.php');
    include('PHPMailer/src/POP3.php');
    include('PHPMailer/src/SMTP.php');

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

include ('control.php');
$get_data = new data(); //call data from class data from control.php
$err = [];
if(isset($_POST['register'])){
    $name = $_POST['txtname'];
    $pass = $_POST['txtpass'];
    $rpass = $_POST['txtConfirmPass'];

    if(empty($name)){
        $err['name'] = 'Ban chua nhap ten';
    }
    if(empty($pass)){
        $err['pass'] = 'Ban chua nhap pass';
    }

    if($pass != $rpass){
        $err['rpass'] = 'Mat khau nhap lai khong dung';
    }

    if(empty($err)){
        // upload img -> folder images
        $upload = move_uploaded_file($_FILES['choosefile']['tmp_name'], "images/". $_FILES['choosefile']['name']);
            
        // $hobby = implode(', ',$_POST['hobby']);
    $hobby = "";
    foreach ($_POST['hobby'] as $key) {
        $hobby .= $key. " ";
    }
        
        $checkPass = $get_data -> checkPassword($_POST['txtname']);
        if ($checkPass > 0) {
            echo "<script>alert('Ten dang nhap da ton tai')</script>";
            header('location: registration.php');
        }else {
            $insert = $get_data -> in_registration($_POST['txtname'], $_POST['txtpass'], $_POST['slprovince'], $_POST['email'], $_FILES['choosefile']['name'], $_POST['txtgender'], $hobby); // -> call function in_registration from class data
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
                $mail->addAddress($_POST['email'],'x'); //email người nhận ; ô text ng dùng nhập email
                $mail->isHTML(true);
                $mail->Subject = 'Test';
                $mail->Body    = 'wellcome 2022'; //text trên form
                // $mail->AddTo('today, it is raining')    //text trên form
                $mail->send();
                echo 'Message has been sent';
            } catch (Exception $e) {
                echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
            }

            if($insert){
                // echo "<script>alert('Thông tin đã được gửi, vui lòng kiểm tra email.')</script>";
                header("location:login.php");
            }else{
                echo "<script>alert('Your message has not been sent successfully.')</script>";
            }
        }
    }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký thông tin</title>
    <link rel="stylesheet" href="./css/style_update.css">
</head>
<body>
    <div class="container">
        <div class="title">Registration</div>

        <form method="post" enctype="multipart/form-data">
            <!-- type = "text" -->
            <div class="user-detials">
                <div class="input-boxs">
                    <span class="detials">Full Name</span>
                    <input type="text" placeholder="Enter your name" name="txtname">
                    <div class="has-error">
                        <span style="color:red"><?php echo (isset($err['name']))?$err['name']:''  ?></span>
                    </div>
                </div>

                <div class="input-boxs">
                    <span class="detials">Password</span>
                    <input type="password" placeholder="Enter your password" name="txtpass">
                    <div class="has-error">
                        <span style="color:red"><?php echo (isset($err['pass']))?$err['pass']:''  ?></span>
                    </div>
                </div>

                <div class="input-boxs">
                    <span class="detials">Confirm Password</span>
                    <input type="password" placeholder="Confirm your password" name="txtConfirmPass">
                    <div class="has-error">
                        <span style="color:red"><?php echo (isset($err['rpass']))?$err['rpass']:''  ?></span>
                    </div>
                </div>

                <div class="input-boxs">
                    <span class="detials">Select province</span>
                    <select name="slprovince" id="">
                        <option value="Ninh Binh">Ninh Binh</option>
                        <option value="Hai Phong">Hai Phong</option>
                        <option value="Cao Bang">Cao Bang</option>
                    </select>
                </div>

                <div class="input-boxs">
                    <span class="detials">Email</span>
                    <input type="email" name="email" id="">
                </div>

                <div class="input-boxs">
                    <span class="detials">Choosefile</span>
                    <input type="file" name="choosefile" >
                </div>
            </div>
            <!-- end type = "text" -->

            <!-- gender -->
            <div class="gender-detials">
                    <input type="radio" name="txtgender" value="male" id="dot-1">
                    <input type="radio" name="txtgender" value="female" id="dot-2">
                    <input type="radio" name="txtgender" value="orthers" id="dot-3">
                <span class="gender-title">Gender</span>
                <div class="category">
                    <label for="dot-1">
                        <span class="dot one"></span>
                        <span class="gender">Mail</span>
                    </label>
                    <label for="dot-2">
                        <span class="dot two"></span>
                        <span class="gender">Femails</span>
                    </label>
                    <label for="dot-3">
                        <span class="dot three"></span>
                        <span class="gender">Others gender</span>
                    </label>
                </div>
            </div>

            <div class="hobby">
                <input type="checkbox" name="hobby[]" value="Study" id="dot-4">
                <input type="checkbox" name="hobby[]" value="Game" id="dot-5">
                <input type="checkbox" name="hobby[]" value="Music" id="dot-6">
                <span class="hobby-title">Hobby</span>
                <div class="hobby-select">
                    <label for="dot-4">
                        <span class="dot one"></span>
                        <span class="gender">Study</span>
                    </label>
                    <label for="dot-5">
                        <span class="dot two"></span>
                        <span class="gender">Game</span>
                    </label>
                    <label for="dot-6">
                        <span class="dot three"></span>
                        <span class="gender">Music</span>
                    </label>
                </div>
            </div>
            <!-- button -->
            <div class="submit">
                <input type="submit" value="Register" name="register">
            </div>
        </form>
    </div>
</body>
</html>