<?php
		session_start();
		include("control.php");
		$getdata = new data();
		$select = $getdata -> select_id_blog($_GET['edit']); 
		 // $_GET['edit'] Lâý DL trùng với ID truyền từ dòng edit của trang web  // Lay id_regis tu url
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Astronomy Website Template</title>
	<link rel="stylesheet" href="css/style.css" type="text/css">
	<link rel="stylesheet" href="./css/style_update.css">
	<style>
		#header{
			height:80px;
		}
		#logo{
			display:flex;
		}
		#logo p{
			line-height:80px;
		}
		textarea{
			width: 400px;;
			height:150px;
		}
	</style>
</head>
<body>
	<div id="header">
		<div class="wrapper clearfix">
		<div id="logo" style="color: #fff;">
				<p>
					<?php 	
						foreach($select as $se){
							if($_SESSION['username'] == $se['name_regis']){
								echo $se['name_regis'];
								$avatar = $se['file'];
							}
					}
				?>
				</p>
				<img width="50px" height="50px" src="./images/<?php echo $avatar; ?>">
		</div>
			<ul id="navigation">
				<li class="selected">
					<a href="Trang1.php">Home</a>
				</li>
				<li>
					<a href="about.php">About</a>
				</li>
				<li>
					<a href="blog.php">Blog</a>
				</li>
				<li>
					<a href="gallery.php">Gallery</a>
				</li>
				<li>
					<a href="contact.php">Contact Us</a>
				</li>
			</ul>
		</div>
	</div>

	<div id="contents update">
		<!-- register form-->
		<div class="container">
		<?php
            foreach($select as $se){
        ?>
        <form method="post" enctype="multipart/form-data">
        <div class="user-detials">
                <div class="input-boxs">
                    <span class="detials">Title</span>
                    <input type="text"  name="txtTitle" value="<?php echo $se['title'] ?>">
                    <div class="has-error">
                        <span style="color:red"></span>
                    </div>
                </div>

                <div class="input-boxs">
                    <span class="detials">Date</span>
                    <input type="date" name="txtDate" id=""  value="<?php echo $se['Date'] ?>">
                </div>

                <div class="input-boxs">
                    <span class="detials">Sort_Content</span>
					<textarea class="input-boxs textra" name="txtSContent" style="width:100%" >
					<?php echo $se['S_Content'] ?>
					</textarea>
                </div>

				<div class="input-boxs">
                    <span class="detials">Long_Content</span>
					<textarea class="input-boxs textra" name="txtLContent" style="width:100%"  >
					<?php echo $se['L_content'] ?>
					</textarea>
                </div>
				
            <div class="submit">
                <input type="submit" value="Update" name="register">
            </div>
        </form>
		<?php 
        if(isset($_POST['register'])){
            $update_now = $getdata->update_blog($_GET['edit'],$_POST['txtTitle'],$_POST['txtDate'],$_POST['txtSContent'] , $_POST['txtLContent'] );
            if($update_now){
                echo "<script>alert('Update success')</script>";
                echo "<script>window.location.href='admin_user.php';</script>";
            }else{
                echo "<script>alert('Update fail')</script>";
            }
        	}
        ?>
    </div>
	</div>
	<div id="footer">
		<div class="body">
			<div class="wrapper clearfix">
				<div id="links">
					<div>
						<h4>Social</h4>
						<ul>
							<li>
								<a href="http://freewebsitetemplates.com/go/googleplus/" target="_blank">Google +</a>
							</li>
							<li>
								<a href="http://freewebsitetemplates.com/go/facebook/" target="_blank">Facebook</a>
							</li>
							<li>
								<a href="http://freewebsitetemplates.com/go/youtube/" target="_blank">Youtube</a>
							</li>
						</ul>
					</div>
					<div>
						<h4>Heading placeholder</h4>
						<ul>
							<li>
								<a href="Trang1.php">Link Title 1</a>
							</li>
							<li>
								<a href="Trang1.php">Link Title 2</a>
							</li>
							<li>
								<a href="Trang1.php">Link Title 3</a>
							</li>
						</ul>
					</div>
				</div>
				<div id="newsletter">
					<h4>Newsletter</h4>
					<p>
						Sign up for Our Newsletter
					</p>
					<form action="Trang1.php" method="post">
						<input type="text" value="">
						<input type="submit" value="Sign Up!">
					</form>
				</div>
				<p class="footnote">
					© Copyright © 2023.Company name all rights reserved
				</p>
			</div>
		</div>
	</div>
	<?php
        }
    ?>
</body>
</html>