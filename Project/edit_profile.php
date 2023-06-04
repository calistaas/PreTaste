<?php 
      require_once("db.php");
      require_once("auth.php"); 
?>

<?php 
    
     $user_id = $_SESSION['user']['id_user'];
     $sth = $db->prepare("SELECT *FROM user where id_user = $user_id");
     $sth->execute();
     $result = $sth->fetch(PDO::FETCH_ASSOC);   

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">

   <title>user profile update</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="assets/css/update_user_profile.css">

</head>
<body>


<section class="update-profile-container">
   <form action="" method="POST" >
      <img src="#" alt="">
      <div class="flex">
         <div class="inputBox">
            <span>Username : </span>
            <input type="text" name="username" class="box" value="<?=$result['username']?>">
            <span>Email : </span>
            <input type="email" name="email" class="box" placeholder="enter your email" value="<?=$result['email']?>">
            <span>profile pic : </span>
          <!--   <input type="hidden" name="old_image" value="#">
            <input type="file" name="image" class="box" accept="image/jpg, image/jpeg, image/png"> -->
         </div>
      </div>
      <div class="flex-btn">
         <input type="submit" value="update profile" name="update" class="btn">
         <a href="user_page.php" class="option-btn">go back</a>
      </div>
   </form>

</section>
<?php 
    if(isset($_POST['update'])){
      echo "hai hai";
        $id_user =$user_id;
           $username = $_POST['username'];
        $email = $_POST['email'];

    
        $query = "UPDATE user SET username=:username, email=:email WHERE id_user=:id_user LIMIT 1";
        $statement = $db->prepare($query);

        $data = [
            ':username' => $username,
            ':email' => $email,
            ':id_user' => $id_user
        ];
        $query_execute = $statement->execute($data);
    }
 ?>
</body>
</html>