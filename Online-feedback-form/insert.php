<?php
include("db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $message = trim($_POST['message']);

  if (!empty($name) && !empty($email) && strlen($message) >= 20) {
    $stmt = $conn->prepare("INSERT INTO feedback (name, email, message) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $email, $message);
    $stmt->execute();
    header("Location: index.php");
    exit();
  } else {
    echo "Invalid input. Please fill all fields correctly.";
  }
}
?>
