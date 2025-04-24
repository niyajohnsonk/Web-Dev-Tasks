<?php include("db.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Feedback Form</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>

  <h2>Submit Feedback</h2>
  <form action="insert.php" method="POST">
    <input type="text" name="name" placeholder="Your Name" required><br>
    <input type="email" name="email" placeholder="Your Email" required><br>
    <textarea name="message" placeholder="Your Feedback (min 20 chars)" required></textarea><br>
    <input type="submit" value="Submit Feedback">
  </form>

  <h2>All Feedback</h2>
  <table>
    <tr>
      <th>Name</th>
      <th>Email</th>
      <th>Message</th>
      <th>Submitted At</th>
    </tr>
    <?php
    $query = "SELECT * FROM feedback ORDER BY submitted_at DESC LIMIT 5";
    $result = mysqli_query($conn, $query);
    while ($row = mysqli_fetch_assoc($result)) {
      echo "<tr>
              <td>{$row['name']}</td>
              <td>{$row['email']}</td>
              <td>{$row['message']}</td>
              <td>{$row['submitted_at']}</td>
            </tr>";
    }
    ?>
  </table>

</body>
</html>
