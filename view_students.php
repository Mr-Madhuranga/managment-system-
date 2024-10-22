<?php
include('includes/db_connect.php');

$sql = "SELECT * FROM students";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Students</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <header>
        <div class="container">
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="add_student.php">Add Student</a></li>
            </ul>
        </div>
    </header>

    <div class="container">
        <h1>View Students</h1>
        <table border="1" cellpadding="10">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Course</th>
                <th>Age</th>
                <th>Gender</th>
                <th>Actions</th>
            </tr>

            <?php
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>".$row['id']."</td>
                            <td>".$row['name']."</td>
                            <td>".$row['email']."</td>
                            <td>".$row['course']."</td>
                            <td>".$row['age']."</td>
                            <td>".$row['gender']."</td>
                            <td>
                                <a href='update_student.php?id=".$row['id']."'>Edit</a> |
                                <a href='delete_student.php?id=".$row['id']."'>Delete</a>
                            </td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='7'>No students found</td></tr>";
            }
            ?>

        </table>
    </div>
</body>
</html>

<?php
$conn->close();
?>
