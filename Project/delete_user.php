<?php 
	require_once("db.php");
    require_once("auth.php"); 
    if (isset($_POST['user_id'])) {
     $user_id = $_POST['user_id'];
     $sth = $db->prepare("DELETE *FROM user where id_user = $user_id");
     $sth->execute();
     echo '<script> alert("Data Succesfully Deleted");</script>';
     header("location:retrieve_user.php");
 }
 ?>

