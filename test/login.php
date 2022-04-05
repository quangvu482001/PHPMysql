<?php 
        session_start();
        include("./controller/control.php");
        $get_data = new data();
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <!-- link bootrap 4 -->
        <link
            rel="stylesheet"
            href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
            integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
            crossorigin="anonymous"
        />
        <link rel="stylesheet" href="./style/style.css">
        <title>Facebook Login</title>
    </head>
    <body>
        <main>
            <div class="container main_login">
                <div class="row">
                    <div class="col-sm-12">
                        <h1 class="text-center">Facebook Login</h1>
                    </div>
                </div>
                <form method="post">
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" id="email" placeholder="Enter email" name="txtemail"/>
                    </div>
                    <div class="form-group">
                        <label for="pwd">Password:</label>
                        <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="txtpass"/>
                    </div>
                    <input type="submit" class="btn btn-primary" name="submit1" value="Submit"></input>
                </form>

                <?php 
                    if(isset($_POST['submit1'])){
                        if(empty($_POST['txtemail']) || empty($_POST['txtpass'])){
                            echo "<script>alter('Thong tin k0 duoc de trong')</script>";
                        }else{
                            $login = $get_data -> login($_POST['txtemail'],$_POST['txtpass']);
                            if ($login == 1) {
                                $_SESSION['Email'] = $_POST['txtemail'];
                                header("location:index.php");
                            }else {
                                echo "<script>alert('Email or password incorrect')</script>";
                            }
                        }
                    }
            ?> 
            </div>
        </main>
        <footer>
            <div class="container-fluid footer">
                <div class="row">
                    <div class="col-sm-12">
                        <p>
                            &copy; Copyright 2018 - All Rights Reserved
                        </p>
                    </div>
                </div>
            </div>
        </footer>
    </body>
</html>
