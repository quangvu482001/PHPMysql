
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
    <style>
      body{
    /* background: url('./images/bg.jpg'); */
    /* background-size: cover;
    background-position-y: -80px;
    font-size: 16px; */
}
#wrapper{
    min-height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
}
#form-login{
    max-width: 400px;
    background: rgba(0, 0, 0 , 0.8);
    flex-grow: 1;
    padding: 30px 30px 40px;
    box-shadow: 0px 0px 17px 2px rgba(255, 255, 255, 0.8);
}
.form-heading{
    font-size: 25px;
    color: #f5f5f5;
    text-align: center;
    margin-bottom: 30px;
}
.form-group{
    border-bottom: 1px solid #fff;
    margin-top: 15px;
    margin-bottom: 20px;
    display: flex;
}
.form-group i{
    color: #fff;
    font-size: 14px;
    padding-top: 5px;
    padding-right: 10px;
}
.form-input{
    background: transparent;
    border: 0;
    outline: 0;
    color: #f5f5f5;
    flex-grow: 1;
}
.form-input::placeholder{
    color: #f5f5f5;
}
#eye i{
    padding-right: 0;
    cursor: pointer;
}
.form-submit{
    background: transparent;
    border: 1px solid #f5f5f5;
    color: #fff;
    width: 100%;
    text-transform: uppercase;
    padding: 6px 10px;
    transition: 0.25s ease-in-out;
    margin-top: 30px;
}
.form-submit:hover{
    border: 1px solid #54a0ff;
}
.forgot_pass{
    color:#fff;
    text-align:center;
    margin-top:15px;
    display: flex;
    align-items: center;
    justify-content: space-between;
}
.forgot_pass a {
    color:#f3558e;
    text-transform: uppercase;
}

    </style>
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
                <div id="eye">
                    <i class="far fa-eye"></i>
                </div>
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
                    $_SESSION['username'] = $_POST['txtuser'];
                    header("location:admin.php");
                    // echo "<script>alert('Login success')</script>";
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
    
