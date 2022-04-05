<?php 
        session_start();
        include("./control.php");
        $get_data = new data();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
    <title>Form login</title>
    <link rel="stylesheet" href="./css/forgot_pass.css">
</head>
<body>
    <div id="wrapper">
        <form method="post" id="form-login">
            <h1 class="form-heading">Forgot Password</h1>
            <div class="form-group">
                <i class="fas fa-key"></i>
                <input type="email" class="form-input" placeholder="Enter password" name="txtEmail" >
                <div id="eye">
                    <i class="far fa-eye"></i>
                </div>
            </div>
            <div class="send_mail">
                <input type="submit" value="Send mail" class="form-submit" name="sbm">
            </div>
            <div class="forgot_pass">
                <span class="regis">Don't have a account yet? <a href="register.php">Register now</a></span> <br>
                <span class="forgot">Do you already have a new account?<a href="login.php">Login now</a></span>
            </div>
        </form>
    </div>
    

    <?php 
    //    forgot pass
        if(isset($_POST['sbm'])){
            $email = $_POST['txtEmail'];
            $get_data->forgot_pass($email);
        }
        
    ?> 
</body>
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="js/app.js"></script>
</html>
    
