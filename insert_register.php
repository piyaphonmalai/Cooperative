<?php
session_start();
include 'connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);

    // เช็คว่า username ซ้ำหรือไม่
    $checkUsername = "SELECT * FROM users WHERE username = '$username'";
    $result = mysqli_query($conn, $checkUsername);
    if (mysqli_num_rows($result) > 0) {
        // ถ้ามี username ซ้ำแล้ว
        echo "<script>alert('Username นี้มีอยู่แล้ว');</script>";
        echo "<script>window.location='register.php';</script>";
        exit(); // ออกจากโปรแกรมเพื่อป้องกันการทำงานต่อ
    }

    // เข้ารหัสรหัสผ่านด้วย bcrypt
    $passwordHash = password_hash($password, PASSWORD_BCRYPT);

    // เพิ่มข้อมูลลงในตาราง user
    $sql = "INSERT INTO users (username, password, name, address, phone, email, status) 
            VALUES ('$username', '$passwordHash', '$name', '$address', '$phone', '$email', '0')";
    
    if (mysqli_query($conn, $sql)) {
        // ถ้าเพิ่มข้อมูลสำเร็จ
        echo "<script>alert('บันทึกข้อมูลเรียบร้อย');</script>";
        echo "<script>window.location='login.php';</script>";
    } else {
        // ถ้าเกิดข้อผิดพลาดในการเพิ่มข้อมูล
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        echo "<script>alert('บันทึกข้อมูลไม่ได้');</script>";
    }
}

mysqli_close($conn);
?>
