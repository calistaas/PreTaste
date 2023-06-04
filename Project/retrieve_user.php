<?php 
	require_once("db.php");
 ?>
<!DOCTYPE html>
<html lang="en" title="Coding design">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Responsive HTML Table With Pure CSS - Web Design/UI Design</title>
    <link rel="stylesheet" href="assets/css/table.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
</head>

<body>
    <main class="table">
        <section class="table__header">
            <h1>User's Data</h1>
            <div class="input-group">
                <input type="search" placeholder="Search Data...">
                <img src="images/search.png" alt="">
            </div>
            <div class="export__file">
                <label for="export-file" class="export__file-btn" title="Export File"></label>
                <input type="checkbox" id="export-file">
                <div class="export__file-options">
                    <label>Export As &nbsp; &#10140;</label>
                    <label for="export-file" id="toPDF">PDF <img src="images/pdf.png" alt=""></label>
                    <label for="export-file" id="toJSON">JSON <img src="images/json.png" alt=""></label>
                    <label for="export-file" id="toCSV">CSV <img src="images/csv.png" alt=""></label>
                    <label for="export-file" id="toEXCEL">EXCEL <img src="images/excel.png" alt=""></label>
                </div>
            </div>
        </section>
        <section class="table__body">
        	<?php 
					$sth = $db->prepare("SELECT *FROM user");
					$sth->execute();
		?>
            <table>
                <thead>
                    <tr>
                        <th> No.</th>
                        <th> User</th>
                        <th> Email</th>
                        <th> Action</th>
                        
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    	<?php 
                    	$num = 1;
                    	while($row = $sth->fetch(PDO::FETCH_ASSOC)){
                    	 ?>
                        <td> <?php echo $num; ?></td>
                        <td> <img src="#" alt=""><?php echo $row['username']; ?></td>
                        <td> <?php echo $row['email']; ?></td>
                        <td><a href="edit_user.php?user_id=<?=$row['id_user'];?>"><i class="fas fa-edit icon" style="color: #0cc093;"></i></a><i class="fas fa-trash-alt icon" style="color: #f03333;"></i></td>
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
</body>

</html>