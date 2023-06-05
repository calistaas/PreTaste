<?php

require_once("db.php");

if(isset($_POST['save'])){

    // filter data yang diinputkan
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    // enkripsi password
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $role  = "user";


    // menyiapkan query
    $sql = "INSERT INTO user (username, email, password, role) 
            VALUES (:username, :email, :password, :role)";
    $stmt = $db->prepare($sql);

    // bind parameter ke query
    $params = array(
        ":username" => $username,
        ":password" => $password,
        ":email" => $email,
        ":role" => $role

    );

    // eksekusi query untuk menyimpan ke database
    $saved = $stmt->execute($params);

    // jika query simpan berhasil, maka user sudah terdaftar
    // maka alihkan ke halaman login
    if($saved) echo "<script> alert('Data Successfully Added'); window.location.href='retrieve_user.php';  </script>";;
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

                <h3 class="title">Add User Data</h3>
                <div class="inputBox">
                    <span>username :</span>
                    <input type="text" name="username"/>
                </div>
                <div class="inputBox">
                    <span>email :</span>
                    <input type="email" name="email"/>
                </div>
               <div class="inputBox">
                    <span>password :</span>
                    <input type="password" name="password"/>
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