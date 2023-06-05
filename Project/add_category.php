<?php

require_once("db.php");

if(isset($_POST['save'])){

    // filter data yang diinputkan
    $cat_name = filter_input(INPUT_POST, 'cat', FILTER_SANITIZE_STRING);
    // enkripsi password
    $cat_desc = filter_input(INPUT_POST, 'cat_desc', FILTER_SANITIZE_STRING);
   


    // menyiapkan query
    $sql = "INSERT INTO categories(cat_name, cat_desc) 
            VALUES (:cat_name, :cat_desc)";
    $stmt = $db->prepare($sql);

    // bind parameter ke query
    $params = array(
        ":cat_name" => $cat_name,
        ":cat_desc" => $cat_desc
    );

    // eksekusi query untuk menyimpan ke database
    $saved = $stmt->execute($params);

    // jika query simpan berhasil, maka user sudah terdaftar
    // maka alihkan ke halaman login
    if($saved) echo "<script> alert('Data Successfully Added'); window.location.href='retrieve_category.php';  </script>";;
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

                <h3 class="title">Add Category Data</h3>
                <div class="inputBox">
                    <span>Category Name :</span>
                    <input type="text" name="cat"/>
                </div>
                <div class="inputBox">
                    <span>Category Description :</span>
                    <input type="text" name="cat_desc"/>
                </div>
            </div>
        <input type="submit" name="save" class="submit-btn">
        <input type="submit" name="cancel" value="cancel" class="submit-btn" style="background-color: grey;">
    </form>
</div>  
<?php if (isset($_POST['cancel'])){
    header("Location: retrieve_user.php");}
?>
    
</body>
</html>