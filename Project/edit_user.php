<?php
    require_once("db.php");
    /*require_once("auth.php"); */
 ?>

<?php 
    if (isset($_GET['user_id'])) {
     $user_id = $_GET['user_id'];
     $sth = $db->prepare("SELECT *FROM user where id_user = $user_id");
     $sth->execute();
     $result = $sth->fetch(PDO::FETCH_ASSOC);   
     } 

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- custom css file link  -->
    <link rel="stylesheet" href="assets/css/edit_user.css">

</head>
<body>

<div class="container">

    <form action="" method="POST">

        <div class="row">

            <div class="col">

                <h3 class="title">Edit User's Data</h3>
                <div class="inputBox">
                    <span>username :</span>
                    <input type="text" name="username" value="<?=$result["username"]?>"/>
                </div>
                <div class="inputBox">
                    <span>email :</span>
                    <input type="email" name="email" value="<?=$result["email"]?>"/>
                </div>
                

            </div>
            <div class="col">
               
                <div class="inputBox">
                    <span>name on card :</span>
                    <input type="text" placeholder="mr. john deo">
                </div>
                
                <div class="flex">
                    <div class="inputBox">
                        <span>exp year :</span>
                        <input type="number" placeholder="2022">
                    </div>
                
                </div>

            </div>
    
        </div>
        <input type="submit" name="save" class="submit-btn">
    </form>

<?php 
    if(isset($_POST['save'])){
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
  


</div>    
    
</body>
</html>