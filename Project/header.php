<?php 
		require_once("db.php");
		require_once("auth.php"); 
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="assets/css/header.css">
</head>
<body>
		<nav>
		
			<ul>
				<li><a href="home.php">Home</a></li>
				<li><a href="#">Like</a></li>

			</ul>
				<?php echo '<img  style="border-radius: 50%;width: 60px;margin-right: 15px;"" src="data:image;base64,' . base64_encode($_SESSION["user"]['user_img']).'" onclick = "toggleMenu()">'; ?>		
			<div class="sub-menu-wrap" id="subMenu">
				<div class="sub-menu">
					<div class="user-info">
						<?php echo '<img  style="border-radius: 50%;width: 60px;margin-right: 15px;"" src="data:image;base64,' . base64_encode($_SESSION["user"]['user_img']).'" onclick = "toggleMenu()">'; ?>	
						<h2><?php echo  $_SESSION["user"]["username"] ?></h2>
					</div>
					<hr>
					<a href= edit_profile.php class="sub-menu-link">
						<img src="assets/img/profile.png">
						<p>Profile</p>
						<span>></span>
					</a>
					<a href="#" class="sub-menu-link">
						<img src="assets/img/logout.png" onclick="openPopup()">
						<p onclick="openPopup()">Logout</p>
						<span>></span>
					</a>
				</div>
			</div>
		</nav>


	<div class="popup" id="popup">
		<img src="assets/img/image-logout.png">
		<h2>Log Out</h2>
		<p>Are you sure to logout?</p>
		<form action="logout.php" method="POST">
			<button type="button"  name= "cancel" style="background:#E83711;" onclick="closePopup()" >Cancel</button>
			<button type="submit"  name="logout" class="logout-btn">Log Out</button>
		</form>

	</div>
	<script type="text/javascript" src="assets/js/header.js"> </script>

	

</body>
</html>