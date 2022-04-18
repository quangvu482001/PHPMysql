<?php
		session_start();
		include("control.php");
		$getdata = new data();
		$select = $getdata -> select_id_blog($_GET['edit']); // $_GET['edit'] Lâý DL trùng với ID truyền từ dòng edit của trang web  // Lay id_regis tu url
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Astronomy Website Template</title>
	<!-- <link rel="stylesheet" href="css/style.css" type="text/css"> -->
	<!-- <link rel="stylesheet" href="./css/style_update.css"> -->
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
	</div>

	<div class="main">
    <form method="post">
        <div class="box1">
            <label for="">TITLE</label>
            <input type="text" name="txttitle" id="" value="<?php echo $se['title'] ?>">
            <label for="">DATE</label>
            <input type="date" name="txtdate" id="" value="<?php echo $se['Date'] ?>">
        </div>
        <div class="box2">
            <label for="">Sort_Content</label>
            <textarea name="txtSContent" id="" cols="50" rows="10"><?php echo $se['S_Content'] ?></textarea>
        </div>
        <div class="box3">
            <label for="">Long_Content</label>
            <textarea name="txtLContent" id="" cols="50" rows="10"><?php echo $se['L_content'] ?></textarea>
        </div>
        <input type="submit" value="Submit" name="btn_submit">
    </form>
		<?php 
        if(isset($_POST['btn_submit'])){
				$update = $getdata->update_blog($_GET['edit'],$_POST['txttitle'],$_POST['txtdate'],$_POST['txtSContent'],$_POST['txtLContent']);
				if($update){
					// echo "<script>alert('Update success')</script>";
					echo "<script>window.location.href='admin_blog.php';</script>";
					// header("location:admin_blog.php");
				}else{
					echo "<script>alert('Update fail')</script>";
				}
        	}
        ?>
</body>
</html>