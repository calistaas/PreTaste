<?php 
	require_once("db.php");
	require_once("auth.php"); 
	if(isset($_GET['cat'])){
	$_SESSION['id_cat']= $_GET['cat'];
	$sth = $db->prepare("SELECT  * from categories where id_cat = " . $_SESSION['id_cat']);
	$sth->execute();
/* Fetch all of the remaining rows in the result set */
	$result = $sth->fetch(PDO::FETCH_ASSOC);;
}
 	

 ?>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>PreTaste: Find Your Own Taste</title>
	<link rel="stylesheet" type="text/css" href="assets/css/cat.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />

</head>

<body>
	<?php include "header.php";?>
   <div class="category">
   	<h2><?php echo $result['cat_name'];?></h2>
   	<p><?php  echo $result['cat_desc'];?></p>
   </div>


<!-- recipe section start here-->
<section id="recipe" class="section-p1">
	<div class="pro-container">
		<?php 
					$sth = $db->prepare("SELECT *FROM food where id_cat=". $_SESSION['id_cat']);
					$sth->execute();
					while($row = $sth->fetch(PDO::FETCH_ASSOC)){
		?>

			<div class="pro">
					<a href="detail.php?food_id=<?=$row['id_food'];?>"><img src="assets/img/f1.jpg"></a>
						<div class="des">
							<span><?php echo $result['cat_name']; ?></span>
									<h5><?php  echo $row['food_name'];?></h5>
										<i class="far fa-clock"></i>
											<span><?php echo $row['food_time'] . " " .$row['time_unit']; ?></span>
					</div>
					<a href="detail.php?food_id=<?=$row['id_food'];?>"><i class="far fa-eye eye"></i></a>
			</div>
		<?php  
		} 
	?>
	</div>

</section>
<!-- recipe section end here -->



<script type="text/javascript" src="home.js"></script>
</body>
</html>