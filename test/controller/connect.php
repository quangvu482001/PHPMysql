<?php 
    $sever = 'localhost';
    $user = 'root';
    $pass = '';
    $database = 'facebook';

    $conn = mysqli_connect($sever, $user, $pass, $database);
    mysqli_query($conn, 'set names "utf8" '); //utf8: Write VietNamese
?>