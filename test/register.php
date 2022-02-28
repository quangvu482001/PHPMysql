

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
            crossorigin="anonymous"/>
        <link rel="stylesheet" href="./style/style.css">
        <title>Facebook register</title>
    </head>
    <body>
        <header>
            <!-- <nav class="navbar navbar-expand-sm bg-dark justify-content-center">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link 1</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link 2</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link 3</a>
                    </li>
                </ul>
            </nav> -->
        </header>
        <main>
            <div class="container main_login">
                <div class="row">
                    <div class="col-sm-12">
                        <h1 class="text-center">Facebook register</h1>
                    </div>
                </div>
                <form method="post">
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" id="txtemail" placeholder="Enter email" name="txtemail"/>
                    </div>
                    <div class="form-group">
                        <label for="pwd">Password:</label>
                        <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="txtpass"/>
                    </div>
                    <div class="form-group">
                        <label for="cpwd">Repeat Password:</label>
                        <input type="password" class="form-control" id="cpwd" placeholder="Repeat password" name="txtConfirmPass"/>
                    </div>
                    <input type="submit" class="btn btn-primary" name="submit" value="Submit"></input>
                </form>
                <!-- code php -->
                <?php 
                include('./controller/control.php');
                $get_data = new data(); //call data from class data from control.php
                if(isset($_POST['submit'])){
                    $name = $_POST['txtemail'];
                    $pass = $_POST['txtpass'];
                    $rpass = $_POST['txtConfirmPass'];

                    $checkEmail = $get_data -> checkEmail($_POST['txtemail']);
                    if ($checkEmail > 0) {
                        echo "<script>alert('Email da ton tai')</script>";
                        // header('location: register.php');
                    }else {
                        if($pass != $rpass){
                            echo "<script>alert('Mat khau nhap lai khong dung.')</script>";
                        }else{
                            $insert = $get_data -> insert_regis($_POST['txtemail'], $_POST['txtpass']); // -> call function in_contact from class data

                            if($insert){
                                // echo "<script>alert('Your message has been sent successfully.')</script>";
                                header('location:login.php');
                            }else{
                                echo "<script>alert('Your message has not been sent successfully.')</script>";
                            }
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