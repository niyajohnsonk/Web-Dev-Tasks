<?php
// Dummy login logic
$valid_email = "user@example.com";
$valid_password = "123456";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if ($email === $valid_email && $password === $valid_password) {
        echo "<span style='color:green;'>✅ Login Successful</span>";
    } else {
        echo "<span style='color:red;'>❌ Invalid email or password</span>";
    }
}
?>
