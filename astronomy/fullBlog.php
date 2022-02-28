<!DOCTYPE html>
<!-- Website template by freewebsitetemplates.com -->
<html>
<head>
	<meta charset="UTF-8">
	<title>Blog - Astronomy Website Template</title>
	<link rel="stylesheet" href="css/style.css" type="text/css">
</head>
<body>
	<div id="header">
		<div class="wrapper clearfix">
			<div id="logo">
				<a href="Trang1.php"><img src="images/logo.png" alt="LOGO"></a>
			</div>
			<ul id="navigation">
				<li>
					<a href="Trang1.php">Home</a>
				</li>
				<li>
					<a href="about.php">About</a>
				</li>
				<li class="selected">
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
	<div id="contents">
		<div class="wrapper clearfix">
			<div id="sidebar">
				<ul>
					<li>
						<a href="blog.php"><img src="images/earth-small.jpg" alt="Img" height="154" width="213"></a>
					</li>
					<li>
						<a href="blog.php"><img src="images/spaceshuttle-closeup.jpg" alt="Img" height="154" width="213"></a>
					</li>
				</ul>
				<div class="click-here">
					<h1>Lorem Ipsum Dolor!</h1>
					<a href="Trang1.php" class="btn1">Click Here!</a>
				</div>
			</div>
			<div class="main">
			<?php 
					include ('control.php');
					$getdata = new data();
                    $id_blog = $_GET['content']; // lấy giá trị content truyền từ trang blog sang
					$select_blog = $getdata->select_blog_id($id_blog); //goi function select_blog_id trong class data
			?>
				<h1>Blog</h1>
				<ul class="list">
					<?php
						foreach ($select_blog as $se)
							
						?>
					<li>
						<span class="time">
							<?php 
								echo $se['Date'];
							?>
						</span>
						<h4>
							<?php 
								echo $se['title'];
							?>
						</h4>
						<p>
							<?php 
								echo $se['S_Content'];
							?>
						</p>
                        <p>
							<?php 
								echo $se['L_content'];
							?>
						</p>
						<a href="blog.php" class="more">Back&gt;&gt;</a>
					</li>

				</ul>
				<ul class="pagination">
					<li>
						<a href="blog.php">&lt;&lt;</a>
					</li>
					<li>
						<a href="blog.php">First</a>
					</li>
					<li class="selected">
						<a href="blog.php">1</a>
					</li>
					<li>
						<a href="blog.php">2</a>
					</li>
					<li>
						<a href="blog.php">3</a>
					</li>
					<li>
						<a href="blog.php">4</a>
					</li>
					<li>
						<a href="blog.php">5</a>
					</li>
					<li>
						<a href="blog.php">6</a>
					</li>
					<li>
						<a href="blog.php">7</a>
					</li>
					<li>
						<a href="blog.php">8</a>
					</li>
					<li>
						<a href="blog.php">9</a>
					</li>
					<li>
						<a href="blog.php">10</a>
					</li>
					<li>
						<a href="blog.php">11</a>
					</li>
					<li>
						<a href="blog.php">12</a>
					</li>
					<li>
						<a href="blog.php">13</a>
					</li>
					<li>
						<a href="blog.php">14</a>
					</li>
					<li>
						<a href="blog.php">15</a>
					</li>
					<li>
						<a href="blog.php">16</a>
					</li>
					<li>
						<a href="blog.php">17</a>
					</li>
					<li>
						<a href="blog.php">18</a>
					</li>
					<li>
						<a href="blog.php">19</a>
					</li>
					<li>
						<a href="blog.php">20</a>
					</li>
					<li>
						<a href="blog.php">Last</a>
					</li>
					<li>
						<a href="blog.php">&gt;&gt;</a>
					</li>
				</ul>
				<!-- /.pagination -->
			</div>
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