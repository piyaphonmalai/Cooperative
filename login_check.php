<?php
session_start();
include 'connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    $sql = "SELECT * FROM users WHERE username = '$username'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $status = $row['status'];

        if ($status == '0') {
            // เปลี่ยนไปยังหน้าผู้ใช้ทั่วไป
            $_SESSION["role"] = 'user';
        } elseif ($status == '1') {
            // เปลี่ยนไปยังหน้าผู้ดูแลระบบ
            $_SESSION["role"] = 'admin';
        } else {
            // บทบาทไม่ถูกต้องหรือไม่ได้กำหนด
            $_SESSION["Error"] = "บทบาทผู้ใช้ไม่ถูกต้อง";
            header("location:login.php");
            exit();
        }

        if (password_verify($password, $row['password'])) {
            $_SESSION["username"] = $row['username'];
            $_SESSION["email"] = $row['email'];

            // Redirect ไปยังหน้าที่ถูกต้องตามบทบาท
            if ($_SESSION["role"] === 'user') {
                header("location:user.php");
            } elseif ($_SESSION["role"] === 'admin') {
                header("location:admin.php");
            }

            exit();
        } else {
            $_SESSION["Error"] = "รหัสผ่านไม่ถูกต้อง";
            header("location:login.php");
            exit();
        }
    } else {
        $_SESSION["Error"] = "ไม่พบชื่อผู้ใช้";
        header("location:login.php");
        exit();
    }
}

mysqli_close($conn);
?>
