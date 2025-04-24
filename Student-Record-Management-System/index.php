<?php include("db.php");?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Record Management System</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <h2>Add Student</h2>
    <form action="insert.php" method="POST">
    <input type="number" name="roll_no" placeholder="Roll No" required><br>
    <input type="text" name="name" placeholder="Name" required><br>
    <input type="text" name="class" placeholder="Class" required><br>
    <input type="number" name="marks" placeholder="Marks" required><br>
    <input type="submit" value="Add Student">
    </form>

    <h2>All students</h2>
    <table>
        <tr>
            <th>Roll no</th>
            <th>Name</th>
            <th>Class</th>
            <th>Marks</th>
        </tr>

        <?php
    $sql = "SELECT * FROM students ORDER BY roll_no";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
      while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
                <td>{$row['roll_no']}</td>
                <td>{$row['name']}</td>
                <td>{$row['class']}</td>
                <td>{$row['marks']}</td>
              </tr>";
      }
    } else {
      echo "<tr><td colspan='4'>No records found</td></tr>";
    }
    ?> 
    </table>
</body>
</html>