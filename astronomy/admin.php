<?php
        // session_start();
		include("control.php");
		$getdata = new data();
		$select = $getdata -> select_all_admin();
        // or empty()
        // if($_SESSION['username'] == ""){
        //     // new chua login ->goi loigin.php
        //     // header("Location:login.php");
        // }else {
        //     echo "<h1>Hello" .$_SESSION['']."<a href='logout.php'";
        // }
?>
<!DOCTYPE html>
<!-- Website template by freewebsitetemplates.com -->
<html>
<head>
	<meta charset="UTF-8">
	<title>Astronomy Website Template</title>
	<link rel="stylesheet" href="css/style.css" type="text/css">
	<style>
	table {
		font-family: arial, sans-serif;
		border-collapse: collapse;
		width: 100%;
		color:#fff;
		font-weight:700;
	}
	td, th {
		border: 1px solid #dddddd;
		text-align: left;
		padding: 8px;
	}
	tr:nth-child(even) {
		background-color: #ccc;
	}
</style>
</head>
<body>
	<div id="header">
		<div class="wrapper clearfix">
			<div id="logo">
				<a href="Trang1.php"><img src="images/logo.png" alt="LOGO"></a>
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
				<li>
					<a href="login.php">Login</a> <span style="color:#fff;">/</span>
					<a href="logout.php">Logout</a>
				</li>
			</ul>
		</div>
	</div>

	<div id="contents">
		<div id="adbox">
			<table>
				<tr>
					<td>ID</td>
					<td>username</td>
					<td>Province</td>
					<td>Email</td>
					<td>Avartar</td>
					<td>Gender</td>
					<td>Hobbby</td>
				</tr>
				<?php
				foreach ($select as $se) {
				?>
				<tr>
					<td><?php echo($se['ID_regis']); ?></td>
					<td><?php echo($se['name_regis']); ?></td>
					<td><?php echo($se['province']) ?></td>
					<td><?php echo($se['email']) ?></td>
					<td><?php echo($se['file']) ?></td>
					<td><?php echo($se['gender']) ?></td>
					<td><?php echo($se['hobby']) ?></td>
				</tr>
				<?php 
					}
				?>
			</table>
		</div>
	</div>
	<div id="footer">
		<ul id="featured" class="wrapper clearfix">
			<li>
				<img src="images/astronaut.jpg" alt="Img" height="204" width="220">
				<h3><a href="blog.php">Category 1</a></h3>
				<p>
					Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque nec mi tortor. Phasellus commodo semper vehicula.
				</p>
			</li>
			<li>
				<img src="images/earth.jpg" alt="Img" height="204" width="220">
				<h3><a href="blog.php">Category 2</a></h3>
				<p>
					Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque nec mi tortor. Phasellus commodo semper vehicula.
				</p>
			</li>
			<li>
				<img src="images/spacecraft-small.jpg" alt="Img" height="204" width="220">
				<h3><a href="blog.php">Category 3</a></h3>
				<p>
					Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque nec mi tortor. Phasellus commodo semper vehicula.
				</p>
			</li>
			<li>
				<img src="images/space-shuttle.jpg" alt="Img" height="204" width="220">
				<h3><a href="blog.php">Category 4</a></h3>
				<p>
					Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque nec mi tortor. Phasellus commodo semper vehicula.
				</p>
			</li>
		</ul>
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

</body>
</html>
