<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container text-center">
        <div class="row">
            <div class="col-md-6 bg-light text-dark">
                <br>
                <div class="alert alert-primary h4" role="alert">
                    ลงชื่อเข้าใช้
                </div>
                <form method="POST" action="login_check.php">
                    <input type="text" name="username" class="form-control" required placeholder="Username">
                    <input type="password" name="password" class="form-control" required placeholder="Password">
                    <br>

                    <?php
                    if (isset($_SESSION["Error"])) {
                      echo "<div class='text-danger'>";
                      echo $_SESSION["Error"];
                      echo "</div>";
                      unset($_SESSION["Error"]); // ล้างข้อความผิดพลาดหลังจากแสดง
                  }
                  
                    ?>

                    <input type="submit" name="submit" value="เข้าสู่ระบบ" class="btn btn-primary">
                </form>
                <br>
                <a href="register.php"> สมัครสมาชิก </a>
            </div>
        </div>
        <script src="js/bootstrap.min.js"></script>
    </div>
</body>
</html>
