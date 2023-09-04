<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register</title>

    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    
</head>
  <body>
    <div class="container"> 
        <!-- Register -->
        <br />  
        <div class="row">
            <div class="col-md-6 bg-light text-dark">

        <div class="alert alert-primary h4" role="alert">
                    สมัครสมาชิก
        </div>
        
        <form method="POST" action="insert_register.php">
        Username <input type="text" name="username_user" maxlength="10" class="form-control" required>
        Password <input type="password" name="password_user" maxlength="10" class="form-control" required>
        ชื่อ - นามสกุล <input type="text" name="name_user" class="form-control" required>
        ที่อยู่ <input type="address" name="address" class="form-control" required>
        เบอร์โทรศัพท์ <input type="number" name="phone_user" class="form-control" required>
        Email <input type="Email" name="email_user" class="form-control" required>
        <br />   
        <input type="submit" name="submit" value="บันทึก" class="btn btn-primary">
        <input type="reset" name="cancel" value="ยกเลิก" class="btn btn-danger">
        <br />        
        <a href="login.php"> เข้าสู่ระบบ </a>
        </form>

        </div>
    </div>
    

        <script src="js/bootstrap.min.js"></script>

  </body>
</html>