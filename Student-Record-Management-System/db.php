<?php
$host = "localhost";
$user = "root";
$password = "";
$db = "student_db";

$conn = mysqli_connect($host, $user, $password, $db);

if(!$conn){
    die("Connection failed: " . mysqli_connect_error());
}

// If you need to return the connection to be used in other files
return $conn;
?>