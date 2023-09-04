<?php
    include 'server.php';
    session_start();
    
    $username = $_POST['username'];
    $password = $_POST['password'];

    // เข้ารหัส password ด้วย sha512 
    $password = hash('sha512', $password);

    $sql = "SELECT * FROM user WHERE username_user = '$username' AND password_user = '$password'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);

    if($row){
        $_SESSION["username"] = $row['username_user'];
        $_SESSION["pw"] = $row['password_user'];
        $_SESSION["email"] = $row['email_user'];
        header("location:index.php");
        exit();
    } else {
        $_SESSION["Error"] = "<p>Your username or password is invalid</p>";
        header("location:index.php");
        exit();
    }
?>