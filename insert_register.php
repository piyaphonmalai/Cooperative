<?php
    include 'server.php';

    $username = $_POST['username_user'];
    $password = $_POST['password_user'];
    $name = $_POST['name_user'];
    $address = $_POST['address'];
    $phone = $_POST['phone_user'];
    $email = $_POST['email_user'];

    // เข้ารหัส password ด้วย sha512 
    $password = hash('sha512', $password);


    // เพิ่มข้อมูลลงตาราง user
    $sql = "INSERT INTO user (username_user, password_user, name_user, address, phone_user, email_user) 
            VALUES ('$username', '$password', '$name', '$address', '$phone', '$email')";
    
    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo "<script>alert('บันทึกข้อมูลเรียบร้อย');</script>";
        echo "<script>window.location='register.php';</script>";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        echo "<script>alert('บันทึกข้อมูลไม่ได้');</script>";
    }

    mysqli_close($conn);
?>