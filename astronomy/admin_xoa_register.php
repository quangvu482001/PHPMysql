<?php 
    include('control.php');
    $getdata = new data();

    // $_GET["delete"]: Lay ID ve de xoa
    $delete = $getdata -> delete_admin_regis($_GET["delete"]);
    if($delete){
        // echo "<script>alert('Xóa thành công');</script>";
        header('location:admin.php');
    }
    else{
        echo "<script>alert('Xóa thất bại');</script>";
    }
