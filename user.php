<?php
session_start();

// ตรวจสอบว่ามีเซสชันของผู้ใช้หรือไม่
if (isset($_SESSION['username']) && isset($_SESSION['email'])) {
    // เนื้อหาหน้า User ที่นี่
    ?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>หน้า User</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </head>
    <body>
        <h1>ยินดีต้อนรับสู่หน้า User</h1>
        <!-- เพิ่มเนื้อหาหน้า User ที่นี่ -->
        <a href="logout.php" class="btn btn-danger btn-block logout-link">ออกจากระบบ</a>
    </body>
    </html>

    <?php
} else {
    // ถ้าไม่มีเซสชัน ให้ไปที่หน้า Login
    header("location:login.php");
    exit();
}
?>
