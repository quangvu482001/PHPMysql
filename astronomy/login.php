
<?php 
        session_start();
        include("./control.php");
        $get_data = new data();
        $select = $get_data->select_role();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
    <title>Form login</title>
    <link rel="stylesheet" href="./css/login_php.css">
</head>
<body>
    <div id="wrapper">
        <form method="post" id="form-login">
            <h1 class="form-heading">Form Login</h1>
            <div class="form-group">
                <i class="far fa-user"></i>
                <input type="text" class="form-input" placeholder="Enter user name" name="txtuser">
            </div>
            <div class="form-group">
                <i class="fas fa-key"></i>
                <input type="password" class="form-input" placeholder="Enter password" name="txtpw" >
                
            </div>
            <input type="submit" value="Login" class="form-submit" name="sbm">
            <div class="forgot_pass">
                <span class="regis">Don't have a account yet? <a href="register.php">Register now</a></span> <br>
                <span class="forgot">Forgot Password <a href="forgot_pass.php">Reset your Password</a></span>
            </div>
        </form>
    </div>
    

    <?php 
        if(isset($_POST['sbm'])){
            if(empty($_POST['txtuser']) || empty($_POST['txtpw'])){
                echo "<script>alter('Thong tin k0 duoc de trong')</script>";
            }else{
                $login = $get_data -> login($_POST['txtuser'],$_POST['txtpw']);
                if ($login == 1) {
                   if($e["role"] == 1){
                    $_SESSION['username'] = $_POST['txtuser'];
                    header("location:admin.php");
                    // echo "<script>alert('Login success')</script>";
                   }else{
                       header("location:admin_user.php");
                   }
                }else {
                    echo "<script>alert('Login fail')</script>";
                }
            }
        }
    ?> 
</body>
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="js/app.js"></script>
</html>
    
