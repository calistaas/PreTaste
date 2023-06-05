<?php
	require_once("db.php");
    require_once("auth.php"); 
 ?>

<?php 
	if (isset($_GET['food_id'])) {
 	 $_SESSION['id_food'] = $_GET['food_id'];
 	 $sth = $db->prepare("SELECT *FROM food where id_food =" . $_SESSION['id_food'] );
	 $sth->execute();
	 $result = $sth->fetch(PDO::FETCH_ASSOC); 	
	 } 

 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>PreTaste: Find Your Own Taste</title>
	<link rel="stylesheet" type="text/css" href="assets/css/detail.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />

</head>

<body>
	<?php include "header.php";?>
<section id="prodetails" class="section-p1">
	<div class="single-pro-img">
		<img src="img/f1.jpg" width="100%" id="MainImg">
	</div>

	<div class="single-pro-details">
		<h6>Food Detail</h6>
		<h4><?php echo $result['food_name']; ?></h4>
		<i class="far fa-clock"></i>
		<span><?php echo $result['food_time'] . " " .$result['time_unit'];; ?></span>
		<h4>About Cook</h4>
		<span><?php echo $result['food_desc']; ?></span>
		<br>
		<br>
		
		<div class="restaurant">
			<h4>Find The Food Here</h4>
			<?php 
					$sth = $db->prepare("SELECT restaurant.res_name FROM restaurant INNER JOIN recom ON restaurant.id_res = recom.id_res WHERE recom.id_food = '" . 
						$_SESSION['id_food'] ."'");
					$sth->execute();
					while($row = $sth->fetch(PDO::FETCH_ASSOC)){
		?>
			<div class="restaurant-grid">
				<div class="restaurant-img">
					<p><?php echo $row['res_name']; ?></p>
					<!-- <img src="img/res/ph.png"> -->
				</div>
		</div>
		<?php  
		} 
	?>

	</div>
		<?php 
			$stm = $db->prepare("SELECT ingridient.ing_name, recipe.measurement, recipe.unit FROM ingridient INNER JOIN recipe ON ingridient.id_ing = recipe.id_ing WHERE  recipe.id_food = '" . $_SESSION['id_food'] ."'");
			$stm->execute();

			$stmt = $db->prepare("SELECT steps.desc_step FROM steps WHERE id_food = '" . $_SESSION['id_food']."'");
			$stmt->execute();
	 	?>
</section>
	<section class="recipe">
		<h4>How To Cook</h4>
		<div class="recipe-det">
			<div class="recipe-ingridient">
				<h4>Ingridients</h4>
  					<?php 
  						while($row = $stm->fetch(PDO::FETCH_ASSOC)){
  					?>
  					    <p><?php echo $row['measurement'] . " " .$row['unit']. " " .$row['ing_name']; ?></p>
  					 <?php 
  						}
  					 ?>
			</div>
			<div class="recipe-methods">
				<h4>Steps</h4>
				<?php 
						$i = 1;
  						while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
  					?>
  					    <p><?php echo $i. ". " .$row['desc_step']; ?></p>
  					   
  					 <?php 
  					  $i++;
  						}
  					 ?>
			</div>
		</div>
</section>

<section class="comment-box">
	<h4>Leave Your Comment</h4>
	<form action="" method="POST">
		<input type="" name="email" value="<?php echo  $_SESSION["user"]["email"] ?>" disabled>

		<textarea name="comment" placeholder="Type your comment..."></textarea>
		<button type="submit" name="submit-comment">Send Comment</button>
	</form>

	<?php 
	if(isset($_POST['submit-comment'])){
        $id_user = $_SESSION["user"]["id_user"] ;
        $id_food = $_SESSION['id_food'];
        $comment = $_POST['comment'];

    
       $sql = "INSERT INTO review (id_user, id_food, comment) 
              VALUES (:id_user, :id_food, :comment)";
    	$stmt = $db->prepare($sql);

    	// bind parameter ke query
    	$params = array(
        ":id_user" => $id_user,
        ":id_food" => $id_food,
        ":comment" => $comment
    	);

    	// eksekusi query untuk menyimpan ke database
    	$saved = $stmt->execute($params);
    }
	 ?>
<?php 	
		$stm = $db->prepare("SELECT user.email, review.comment, review.comment_time FROM user JOIN review ON user.id_user = review.id_user WHERE  review.id_food = '" . $_SESSION['id_food'] ."ORDER BY review.comment_time DESC'" );
		$stm->execute();
		$count = $stm->rowCount();		
 ?>
 	<h4>Comments <?php 	echo $count; ?> </h4>
</section>
 <?php 
  	while($row = $stm->fetch(PDO::FETCH_ASSOC)){
  ?>
<section class="container">
	<div class="comment">
	<h2><?php 	echo $row["email"]; ?></h2>
	<small><?php 	echo $row['comment_time']; ?></small>
	<p><?php 	echo $row["comment"]; ?>.</p>
</div>
</section>
<?php 	
}
 ?>

</body>
</html>