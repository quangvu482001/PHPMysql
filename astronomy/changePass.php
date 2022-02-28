
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
    <title>ChangePass</title>
    <style>
      body{
    /* background: url('./images/bg.jpg');
    background-size: cover;
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
            <h1 class="form-heading">Change Password</h1>
            <div class="form-group">
                <i class="far fa-user"></i>
                <input type="text" class="form-input" placeholder="User" name="txtuser">
            </div>

            <div class="form-group">
                <i class="far fa-user"></i>
                <input type="password" class="form-input" placeholder="Old Password" name="txtOldPass">
            </div>
            <div class="form-group">
                <i class="fas fa-key"></i>
                <input type="password" class="form-input" placeholder="New Passowrd " name="txtNewPass" >
                <div id="eye">
                    <i class="far fa-eye"></i>
                </div>
            </div>
            <!-- <div class="form-group">
                <i class="fas fa-key"></i>
                <input type="password" class="form-input" placeholder="Confirm Password" name="txtcpw" >
                <div id="eye">
                    <i class="far fa-eye"></i>
                </div>
            </div> -->
            <input type="submit" value="Change password" class="form-submit" name="changepass">
            <div class="forgot_pass">
                <a href="logout.php">Logout</a>
            </div>
        </form>
    </div>
        <?php
            if(isset($_POST['changepass']))
        {
            $name_regis=$_POST['txtuser'];
            // $oldpass=md5($_POST['txtOldPass']);
            $oldpass=($_POST['txtOldPass']);
            $newpassword=($_POST['txtNewPass']);
            $sql= "SELECT * FROM register where name_regis = '".$name_regis."' AND pass_regis = '".$oldpass."' LIMIT 1";

            $row=mysqli_query($conn,$sql);
            $count=mysqli_num_rows($row) ;
            if($count>0)
            {
            $sql_update=mysqli_query($conn,"UPDATE register SET pass_regis='".$newpassword."'");
            // echo '<p style="color:red">Mật khẩu đã được thay đổi</p>';
            header("location:login.php");
            }
            else
            {
                echo '<p style="color:red">Mật khẩu cũ không đúng</p>';
            }
            }
        ?>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
</body>
</html>
