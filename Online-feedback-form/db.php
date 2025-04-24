<?php
$host = "localhost";
$user = "root";
$pass = ""; // XAMPP default
$db = "college_db";

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
