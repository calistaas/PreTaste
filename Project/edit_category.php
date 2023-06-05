<?php
    require_once("db.php");
    require_once("auth.php"); 
 ?>


 <?php 
    if (isset($_GET['edit'])) {
     $cat_id = $_GET['id_cat'];
     $sth = $db->prepare("SELECT *FROM categories where id_cat = $cat_id");
 ?>

  <?php 
    if(isset($_POST['save'])){
        $id_cat =$cat_id;
        $cat_name = $_POST['cat_name'];
        $cat_desc = $_POST['cat_desc'];

    
        $query = "UPDATE categories SET cat_name=:cat_name, cat_desc=:cat_desc WHERE id_cat=:id_cat LIMIT 1";
        $statement = $db->prepare($query);

        $data = [
            ':cat_name' => $cat_name,
            ':cat_desc' => $cat_desc,
            ':id_cat' => $id_cat
        ];
        $query_execute = $statement->execute($data);
        echo "<script> alert('Data Successfully Updated'); window.location.href='retrieve_category.php';  </script>";
        
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
<?php 
    $sth->execute();
     $result = $sth->fetch(PDO::FETCH_ASSOC);   
     }
 ?>
<div class="container">

    <form action="" method="POST">

        <div class="row">

            <div class="col">

                <h3 class="title">Edit Category Data</h3>
                <div class="inputBox">
                    <span>Category Name:</span>
                    <input type="text" name="cat_name" value="<?=$result["cat_name"]?>"/>
                </div>
                <div class="inputBox">
                    <span>Category Description :</span>
                    <input type="text" name="cat_desc" value="<?=$result["cat_desc"]?>"/>
                </div>
                

            </div>
    
        </div>
        <input type="submit" name="save" class="submit-btn">
        <input type="submit" name="cancel" value="cancel" class="submit-btn" style="background-color: grey;">
    </form>
</div> 
<?php if (isset($_POST['cancel'])){
    header("Location: retrieve_category.php");}
?>   
    
</body>
</html>