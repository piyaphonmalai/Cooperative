<?php
$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "register_user";

// Create connection
$conn = mysqli_connect($hostname, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
