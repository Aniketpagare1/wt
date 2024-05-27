<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Employee</title>
</head>
<body>
    <h2>Add New Employee</h2>
    <form action="add_employee.php" method="POST">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required><br><br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>
        <label for="position">Position:</label>
        <input type="text" id="position" name="position" required><br><br>
        <input type="submit" value="Add Employee" name="submit">
    </form>

    <?php
    // Include database connection file
    include_once "db_connection.php";

    // If the form is submitted
    if(isset($_POST['submit'])){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $position = $_POST['position'];

        // Insert new employee record into the database
        $sql = "INSERT INTO employees (name, email, position) VALUES ('$name', '$email', '$position')";
        if (mysqli_query($conn, $sql)) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
    ?>
</body>
</html>
