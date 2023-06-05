<?php

require_once("db.php");

if(isset($_POST['register'])){

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
    if($saved) header("Location: login.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="stylesheet" href="assets/css/acc.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <title>PreTaste: Find Your Own Taste</title>
</head>
<body>
    <section class="side">
        <img src="./images/img.svg" alt="">
    </section>

    <section class="main">
        <div class="login-container">
            <p class="title">Hallo,There!</p>
            <div class="separator"></div>
            <p class="welcome-message">Already Have an Account?
                    <a href="login.php">Login Here</a>
                </p>

           
            <form action="" method="POST" class="login-form">
                <div class="form-control">
                    <input type="text" name="email" placeholder="Email">
                    <i class="fas fa-envelope"></i>
                </div>
                <div class="form-control">
                    <input type="text" name="username" placeholder="Username">
                    <i class="fas fa-user"></i>
                </div>
                <div class="form-control">
                    <input type="password" name="password" placeholder="Password">
                    <i class="fas fa-lock"></i>
                </div>

                <button class="submit" name="register">Register</button>
            </form>
        </div>
    </section>
    
</body>
</html>