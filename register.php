<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container"> 
        <br />  
        <div class="row">
            <div class="col-md-6 bg-light text-dark">
                <div class="alert alert-primary h4" role="alert">
                    สมัครสมาชิก
                </div>
                <form method="POST" action="insert_register.php">
                    <input type="text" name="username" maxlength="10" class="form-control" required placeholder="Username">
                    <input type="password" name="password" maxlength="10" class="form-control" required placeholder="Password">
                    <input type="text" name="name" class="form-control" required placeholder="ชื่อ - นามสกุล">
                    <input type="text" name="address" class="form-control" required placeholder="ที่อยู่">
                    <input type="text" name="phone" class="form-control" required placeholder="เบอร์โทรศัพท์">
                    <input type="email" name="email" class="form-control" required placeholder="Email">
                    <br />   
                    <input type="submit" name="submit" value="บันทึก" class="btn btn-primary">
                    <input type="reset" name="cancel" value="ยกเลิก" class="btn btn-danger">
                    <br />        
                    <a href="login.php"> เข้าสู่ระบบ </a>
                </form>
            </div>
        </div>
        <script src="js/bootstrap.min.js"></script>
    </div>
</body>
</html>
