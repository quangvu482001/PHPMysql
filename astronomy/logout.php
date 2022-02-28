<?php 
    session_start();
    // huy session
    session_destroy();
    header('location:login.php');
?>