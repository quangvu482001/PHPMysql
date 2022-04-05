<?php
		session_start();
		include("control.php");
		$getdata = new data();
		$select = $getdata -> select_id_regis($_GET['edit']); // $_GET['edit'] Lâý DL trùng với ID truyền từ dòng edit của trang web  // Lay id_regis tu url
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="./css/admin.css">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
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
                    </ul>
                </div>
            </div>
            <div class="ad_header-name">
				<?php 	
					foreach($select as $se){
						if($_SESSION['username'] == $se['name_regis']){
							echo $se['name_regis'];
							$avatar = $se['file'];
						}
					}
				?>
				<img width="50px" height="50px" src="./images/<?php echo $avatar; ?>">
                <p>name</p>
            </div>
        </div>
        <div class="ad_main">
            <div class="main_nav">
                <ul>
                    <li><i class='bx bxs-home-heart icon_ad'></i><a href="Trang1.php">Trang chủ Admin</a></li>
                    <li><i class='bx bx-spreadsheet icon_ad'></i><a href="admin.php">Quản trị người dùng</a></li>
                    <li><i class='bx bx-spreadsheet icon_ad'></i><a href="blog.php">Quản trị nội dung</a></li>
                </ul>
            </div>

        <div class="main_content">
		<div class="container">
		<?php
            foreach($select as $se){
        ?>
        <form method="post" enctype="multipart/form-data">
            <div class="user-detials">
                <div class="input-boxs">
                    <span class="detials">Full Name</span>
                    <input type="text" placeholder="Enter your name" name="txtname" value="<?php echo $se['name_regis'] ?>">
                    <div class="has-error">
                        <span style="color:red"><?php echo (isset($err['name']))?$err['name']:''  ?></span>
                    </div>
                </div>

                <!-- <div class="input-boxs">
                    <span class="detials">Select province</span>
                    <select name="slprovince" id="">
                        <option value="Ninh Binh">Ninh Binh</option>
                        <option value="Hai Phong">Hai Phong</option>
                        <option value="Cao Bang">Cao Bang</option>
                    </select>
                </div> -->

                <div class="input-boxs">
                    <span class="detials">Email</span>
                    <input type="email" name="email" id="" value="<?php echo $se['email'] ?>">
                </div>

                <div class="input-boxs">
                    <span class="detials">Choosefile</span>
                    <input type="file" name="choosefile" src="./images/<?php echo $se['file'] ?>">
                </div>
            </div>
            <!-- gender -->
            <div class="gender-detials">
			<input type="radio" name="txtgender" value="male" id="dot-1"
                        <?php if($se['gender'] == "male") echo "checked" ?>>
                    <input type="radio" name="txtgender" value="female" id="dot-2"
                        <?php if($se['gender'] == "female") echo "checked" ?>>
                    <input type="radio" name="txtgender" value="orthers" id="dot-3"
                        <?php if($se['gender'] == "orthers") echo "checked" ?>>
                <span class="gender-title">Gender</span>
                <div class="category">
                    <label for="dot-1">
                        <span class="dot one"></span>
                        <span class="gender">Mail</span>
                    </label>
                    <label for="dot-2">
                        <span class="dot two"></span>
                        <span class="gender">Femails</span>
                    </label>
                    <label for="dot-3">
                        <span class="dot three"></span>
                        <span class="gender">Others gender</span>
                    </label>
                </div>
            </div>
			<div class="hobby">
                <input type="checkbox" name="hobby[]" value="Study" id="dot-4"
                    <?php if(strlen(strstr($se['hobby'],'Study')) > 0) echo "checked" ; ?>
                >
                <input type="checkbox" name="hobby[]" value="Game" id="dot-5"
                    <?php if(strlen(strstr($se['hobby'],'Game')) > 0) echo "checked" ; ?>
                >
                <input type="checkbox" name="hobby[]" value="Music" id="dot-6"
                    <?php if(strlen(strstr($se['hobby'],'Music')) > 0) echo "checked" ; ?>>
                <span class="hobby-title">Hobby</span>
                <div class="hobby-select">
                    <label for="dot-4">
                        <span class="dot one"></span>
                        <span class="gender">Study</span>
                    </label>
                    <label for="dot-5">
                        <span class="dot two"></span>
                        <span class="gender">Game</span>
                    </label>
                    <label for="dot-6">
                        <span class="dot three"></span>
                        <span class="gender">Music</span>
                    </label>
                </div>
            </div>
            <!-- button -->
            <div class="submit">
                <input type="submit" value="Update" name="register">
            </div>
        </form>
		<?php 
        if(isset($_POST['register'])){
				$upload = move_uploaded_file($_FILES['choosefile']['tmp_name'], "images/". $_FILES['choosefile']['name']);
				$hobby = "";
				foreach ($_POST['hobby'] as $key) {
					$hobby .= $key. " ";
				}
				$update_now = $getdata->update_regis($_GET['edit'],$_POST['txtname'],$_POST['email'],$_FILES['choosefile']['name'],$_POST['txtgender'] , $hobby);
				if($update_now){
					header("location:admin.php");
					// echo "<script>window.location.href='admin.php';</script>";
					//echo '<script>alert("CẬp nhật thành công người dùng'.$_POST['txtname'].'")</script>';
				}else{
					echo "<script>alert('Update fail')</script>";
				}
        	}
        ?>
    </div>
            </div>
        </div>
        <div class="ad_footer"></div>
    </div>

	<?php
        }
    ?>
</body>
</html>