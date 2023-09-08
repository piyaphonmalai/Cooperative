<?php
session_start();
session_destroy(); // ทำลาย Session
header("location: login.php");
exit();
?>
