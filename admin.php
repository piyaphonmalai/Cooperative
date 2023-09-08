<?php
session_start();

// ตรวจสอบคีย์ "role" ใน $_SESSION
if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin') {
    // อนุญาตให้เข้าถึงเนื้อหาของหน้านี้
} else {
    // ถ้าบทบาทไม่ถูกต้อง หรือไม่ได้กำหนด
    echo "คุณไม่มีสิทธิ์ในการเข้าถึงหน้านี้";
    exit();
}

// ตรวจสอบว่ามีเซสชันของผู้ใช้และเช็คบทบาท
if (isset($_SESSION['username']) && isset($_SESSION['email'])) {
    if ($_SESSION['role'] === 'admin') {
        // อนุญาตให้เข้าถึงเนื้อหาของหน้านี้
    } else {
        // ถ้าบทบาทไม่ถูกต้อง หรือไม่ได้กำหนด
        echo "คุณไม่มีสิทธิ์ในการเข้าถึงหน้านี้";
        exit();
    }
} else {
    // ถ้าไม่มีเซสชัน ให้ไปที่หน้า Login
    header("location:login.php");
    exit();
}

// เนื้อหาหน้า Admin ที่นี่
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>หน้า Admin</title>
</head>
<body>
    <h1>ยินดีต้อนรับสู่หน้า Admin</h1>
    <!-- เพิ่มเนื้อหาหน้า Admin ที่นี่ -->
    <a href="logout.php" class="btn btn-danger btn-block logout-link">ออกจากระบบ</a>
</body>
</html>
