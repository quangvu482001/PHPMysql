<?php
        session_start();
		include("control.php");
		$getdata = new data();
		$select = $getdata -> select_all_blog();
?>
<?php
        if($_SESSION['username'] == ""){
            header("Location:login.php");
        }else {

			// better coments
			// chi ho tro cmt trong php
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
                    <li><i class='bx bxs-home-heart icon_ad'></i><a href="admin.php">Trang chủ Admin</a></li>
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
					<td>Title</td>
					<td>Date</td>
					<td>S_Content</td>
					<td>L_Content</td>
					<td colspan="2">Tùy chọn</td>
				</tr>
				<?php
				foreach ($select as $se) {
				?>
				<tr>
					<td><?php echo($se['ID']); ?></td>
					<td><?php echo($se['title']); ?></td>
					<td><?php echo($se['Date']); ?></td>
					<td><?php echo($se['S_Content']) ?></td>
					<td><?php echo($se['L_content']) ?></td>
					<td class="suaxoa"><a href="admin_sua_blog.php?edit=<?php  echo $se['ID']?>">Sửa</a></td>
					<td class="suaxoa"><a href="admin_xoa_blog.php?delete=<?php  echo $se['ID']?>" onClick="return confirm('Bạn có chắc chắn muốn xóa không?')">Xóa</a></td>
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



