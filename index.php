<?php
session_start();
include 'connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // เข้ารหัส password ด้วย bcrypt 
    $sql = "SELECT * FROM user WHERE username = '$username'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);

        // ตรวจสอบบทบาทของผู้ใช้
        if ($row['role'] == '0') {
            header("location:user.php"); // หากเป็นผู้ใช้ทั่วไป
        } elseif ($row['role'] == '1') {
            header("location:admin.php"); // หากเป็นผู้ดูแลระบบ
        } else {
            // บทบาทไม่ถูกต้องหรือไม่ได้กำหนด
            $_SESSION["Error"] = "บทบาทผู้ใช้ไม่ถูกต้อง";
            header("location:login.php");
            exit();
        }

        // ในส่วนของการตรวจสอบรหัสผ่าน
        if (password_verify($password, $row['password'])) {
            $_SESSION["username"] = $row['username'];
            $_SESSION["email"] = $row['email'];
            exit(); // ไม่ควร redirect ที่นี่ เพราะจะถูกเปลี่ยนเส้นทางในส่วนบทบาท
        } else {
            $_SESSION["Error"] = "รหัสผ่านไม่ถูกต้อง";
            header("location:login.php");
            exit();
        }
    } else {
        // ในส่วนของไม่พบชื่อผู้ใช้
        $_SESSION["Error"] = "ไม่พบชื่อผู้ใช้";
        header("location:login.php");
        exit();
    }
}
mysqli_close($conn);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>หน้าหลัก</title>
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* ปรับแต่งสไตล์ของข้อความ */
        .welcome-message {
            font-size: 24px;
            font-weight: bold;
            text-align: center;
            margin-top: 20px;
        }

        /* ปรับแต่งสไตล์ของลิงก์ */
        .logout-link {
            text-align: center;
            margin-top: 10px;
            display: block;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="alert alert-success welcome-message" role="alert">
            ยินดีต้อนรับผู้ใช้
        </div>
        <a href="logout.php" class="btn btn-danger btn-block logout-link">ออกจากระบบ</a>
    </div>
</body>
</html>
