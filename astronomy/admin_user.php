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
    <link rel="stylesheet" href="./css/admin_user.css">
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
						<li><a href="logout.php">Đăng xuất</a></li>
                    </ul>
                </div>
            </div>
            <div class="ad_header-name">
				<span>Xin chao </span>
				<?php 	
					foreach($select as $se){
						if($_SESSION['username'] == $se['name_regis']){
							echo ($se['name_regis']);
							$avatar = $se['file'];
						}
					}
				?>
				<img class="imgAD" width="50px" height="50px" src="./images/<?php echo $avatar; ?>">
            </div>
        </div>
        <div class="ad_main">
            <div class="main_nav">
                <ul>
                    <li><i class='bx bx-spreadsheet icon_ad'></i><a href="admin_user.php">Quản trị người dùng</a></li>
                    <li><i class='bx bx-spreadsheet icon_ad'></i><a href="admin_blog.php">Quản trị nội dung</a></li>
                </ul>
            </div>

            <div class="main_content">
			<div id="contents">
		<div id="adbox1" style="margin-bottom:300px;">
			<table>
				<tr>
					<td>ID</td>
					<td>username</td>
					<td>Province</td>
					<td>Email</td>
					<td>Avartar</td>
					<td>Gender</td>
					<td>Hobbby</td>
					<td colspan="2">Tùy chọn</td>
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
					<td class="suaxoa"><a href="admin_sua_register.php?edit=<?php  echo $se['ID_regis']?>">Sửa</a></td>
					<td class="suaxoa"><a href="admin_xoa_register.php?delete=<?php  echo $se['ID_regis']?>" onClick="return confirm('Bạn có chắc chắn muốn xóa không?')">Xóa</a></td>
				</tr>
				<?php 
					}
				?>
			</table>
		</div>
	</div>
            </div>
        </div>
        <div class="ad_footer">
			<h2>Bản quyền thuộc về ENoNhimsCarp</h2>
		</div>
    </div>
	<?php
		}
	?>
</body>
</html>


