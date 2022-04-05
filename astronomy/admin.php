<?php
        session_start();
		include("control.php");
		$getdata = new data();
		$select = $getdata -> select_all_admin();
?>
<?php
        if($_SESSION['username'] == ""){
            // new chua login ->goi loigin.php
            header("Location:login.php");
        }else {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="./css/admin.css">
</head>
<body>
    <div class="wrapper">
        <div class="ad_header">
            <div class="ad_header_left">
                <div class="ad_header-logo">
                    <h2>LOGO ADMIN</h2>
                </div>
                <div class="ad_header-nav">
                    <ul>
                        <li><a href="Trang1.php">Vào trang web</a></li>
                        <li><a href="#">Liên hệ</a></li>
                        <li><a href="#">Trợ giúp</a></li>
                        <li><a href="logout.php">Đăng xuất</a></li>
                    </ul>
                </div>
            </div>
            <div class="ad_header-name" style="display:flex;width:200px">
                <div class="ad_text_headerL">
                    <span>Xin chao </span>
                    <?php 	
                        foreach($select as $se){
                            if($_SESSION['username'] == $se['name_regis']){
                                echo ($se['name_regis']);
                                $avatar = $se['file'];
                            }
                        }
                    ?>
                </div>
				<img class="imgAD" width="50px" height="50px" src="./images/<?php echo $avatar; ?>" style="border-radius:50%">
            </div>
        </div>
        <div class="ad_main" >
            <div class="main_nav">
                <ul>
                    <li><i class='bx bxs-home-heart icon_ad'></i><a href="admin.php">Trang chủ Admin</a></li>
                    <li><i class='bx bx-spreadsheet icon_ad'></i><a href="admin_user.php">Quản trị người dùng</a></li>
                    <li><i class='bx bx-spreadsheet icon_ad'></i><a href="admin_blog.php">Quản trị nội dung</a></li>
                </ul>
            </div>

            <div class="main_content" style="background-color: #020a13;height: 100%;width: 80%;color:#fff;margin:0 auto;">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Corporis exercitationem assumenda magni numquam quibusdam animi, tenetur beatae fuga repellendus enim itaque atque quia, aliquid, nam blanditiis nulla sint ducimus ipsam.</p>
            </div>
        </div>
        <div class="ad_footer">
            <h2>Bản quyền thuộc về ENoNhimsCarp</h2>
        </div>
    </div>
</body>
</html>
<?php 
    }
?>