<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .main{
            width: 100%;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
    </style>
</head>
<body>
   <div class="main">
    <form method="post">
        <div class="box1">
            <label for="">TITLE</label>
            <input type="text" name="txttitle" id="">
            <label for="">DATE</label>
            <input type="date" name="txtdate" id="">
        </div>
        <div class="box2">
            <label for="">Sort_Content</label>
            <textarea name="txtSContent" id="" cols="50" rows="10"></textarea>
        </div>
        <div class="box3">
            <label for="">Long_Content</label>
            <textarea name="txtLContent" id="" cols="50" rows="10"></textarea>
        </div>
        <input type="submit" value="Submit" name="btn_submit">
    </form>

    <?php 
    include('control.php');
    $get_data = new data(); //call data from class data from control.php

    if(isset($_POST['btn_submit'])){
        $insert = $get_data -> in_blog($_POST['txttitle'], $_POST['txtdate'], $_POST['txtSContent'], $_POST['txtLContent']);

        if($insert){
            header('location: admin_blog.php');
        }else{
            echo "<script>alert('Your blog has not been sent successfully.')</script>";
        }
    }
?>
</body>
</html>
