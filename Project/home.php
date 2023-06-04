<?php 
		require_once("db.php");
		require_once("auth.php"); 
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>PreTaste: Find Your Own Taste</title>
	<link rel="stylesheet" type="text/css" href="assets/css/home.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />

</head>

<body>

<?php 
include "header.php";
 ?>
   <!-- header section end -->
   <section class="greetings">
   	<h4>Hai, <span><?php echo  $_SESSION["user"]["username"] ?></span>!</h4>
   	<p>Start your day by choosing your desire food.</p>
   </section>
 <!-- Section -->
 <section class="pick-cat">
 	<form method="GET" action="cat.php">
 		<select name="cat"> 
 			<option value="" disabled selected>Select your desire food</option>
 				<?php 
					$stmt = $db->prepare('SELECT * FROM categories');
					$stmt->execute();

					while($row = $stmt->fetch(PDO::FETCH_ASSOC)){?>
    						<option value="<?=$row['id_cat'];?>"><?php echo $row['cat_name']; ?></option>
					<?php 
					}
					?>
			</select>
			<input type="submit" name="pick" value="pick">
 	</form>
 </section>







<script type="text/javascript" src="home.js"></script>
</body>
</html>