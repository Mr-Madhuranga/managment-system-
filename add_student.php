<?php
include('includes/db_connect.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $course = $_POST['course'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];

    $sql = "INSERT INTO students (name, email, course, age, gender) 
            VALUES ('$name', '$email', '$course', '$age', '$gender')";

    if ($conn->query($sql) === TRUE) {
        echo "New student added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Student</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <header>
        <div class="container">
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="view_students.php">View Students</a></li>
            </ul>
        </div>
    </header>

    <div class="container">
        <h1>Add Student</h1>
        <form action="add_student.php" method="POST">
            <label for="name">Name:</label>
            <input type="text" name="name" required>

            <label for="email">Email:</label>
            <input type="email" name="email" required>

            <label for="course">Course:</label>
            <input type="text" name="course" required>

            <label for="age">Age:</label>
            <input type="text" name="age" required>

            <label for="gender">Gender:</label>
            <select name="gender" required>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
            </select>

            <input type="submit" value="Add Student">
        </form>
    </div>
</body>
</html>

