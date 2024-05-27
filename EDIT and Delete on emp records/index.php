<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Records</title>
</head>
<body>
    <h2>Employee Records</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Position</th>
            <th>Action</th>
        </tr>
        <?php
        // Include database connection file
        include_once "db_connection.php";

        // Fetch all employees from the database
        $sql = "SELECT * FROM employees";
        $result = mysqli_query($conn, $sql);

        // Display employee records in a table
        while($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>".$row['id']."</td>";
            echo "<td>".$row['name']."</td>";
            echo "<td>".$row['email']."</td>";
            echo "<td>".$row['position']."</td>";
            echo "<td>";
            echo "<a href='employee_records.php?edit=".$row['id']."'>Edit</a> | ";
            echo "<a href='employee_records.php?delete=".$row['id']."'>Delete</a>";
            echo "</td>";
            echo "</tr>";
        }
        ?>
    </table>
    <a href="add_employee.php">Add New Employee</a>
</body>
</html>
