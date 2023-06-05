<?php 
	require_once("db.php");
    require_once("auth.php"); 
 ?>

<!DOCTYPE html>
<html lang="en" >

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PreTaste:Admin</title>
    <link rel="stylesheet" href="assets/css/table.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
</head>

<body>
    <main class="table">
        <section class="table__header">
            <h1>Category Data</h1>
                <a href="add_category.php"><button style="background-color: #2D83D4;">Add Data</button></a>
      
        </section>
        <section class="table__body">
        	<?php  
					$sth = $db->prepare("SELECT *FROM categories");
					$sth->execute();
		?>
            <table>
                <thead>
                    <tr>
                        <th> No.</th>
                        <th> Category</th>
                        <th> Description</th>
                        <th> Edit</th>
                        <th>Delete</th>                        
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    	<?php 
                    	$num = 1;
                    	while($row = $sth->fetch(PDO::FETCH_ASSOC)){
                    	 ?>
                        <td> <?php echo $num; ?></td>
                        <td> <?php echo $row['cat_name']; ?></td>
                        <td> <?php echo $row['cat_desc']; ?></td>    
                        <td>
                            <form method="GET" action="edit_category.php">
                               <input type="hidden" name="id_cat" value="<?=$row["id_cat"]?>">
                               <button type="submit" name="edit" style="background-color: #2DD46E;">Edit</button>
                            </form>
                     
                     </td>
                     <td>
                           <form method="POST" action="">
                                <input type="hidden" name="id_cat" value="<?=$row["id_cat"]?>">
                                <button type="submit" name="delete" style="background-color: #EA3C33;">Delete</button>
                           </form>
                        </td>
                        
                        </tr>
                       <?php 
                        	$num++;
                   			}
                        ?>
                    </tr>
                </tbody>
            </table>
        </section>
    </main>

    <?php 
    if (isset($_POST['delete'])) {
     $cat_id = $_POST['id_cat'];
     $sth = $db->prepare("DELETE FROM categories where id_cat = '$cat_id'");
     $sth->execute();
      echo "<script> alert('Data Successfully Deleted')</script>";
 }
     ?>
</body>

</html>