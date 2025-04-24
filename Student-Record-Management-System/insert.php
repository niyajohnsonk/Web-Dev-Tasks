<?php
include("db.php");

// Check if form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $roll_no = $_POST["roll_no"];
    $name = $_POST["name"];
    $class = $_POST["class"];
    $marks = $_POST["marks"];

    // Basic validation
    if (!empty($roll_no) && !empty($name) && !empty($class) && is_numeric($marks)) {
        // Check for duplicate roll number
        $check = "SELECT * FROM students WHERE roll_no = '$roll_no'";
        $result = mysqli_query($conn, $check);

        if (mysqli_num_rows($result) == 0) {
            $sql = "INSERT INTO students (roll_no, name, class, marks)
                    VALUES ('$roll_no', '$name', '$class', '$marks')";

            if (mysqli_query($conn, $sql)) {
                header("Location: index.php");
                exit();
            } else {
                echo "Error inserting record: " . mysqli_error($conn);
            }
        } else {
            echo "❌ Roll number already exists. <a href='index.php'>Go Back</a>";
        }
    } else {
        echo "❌ Invalid input. <a href='index.php'>Go Back</a>";
    }
}
?>
