<?php
// Include database connection file
include_once "db_connection.php";

// Fetch all employees from the database
$sql = "SELECT * FROM employees";
$result = mysqli_query($conn, $sql);

// If the delete button is clicked
if(isset($_GET['delete'])){
    $id = $_GET['delete'];

    // Delete employee record from the database
    $sql = "DELETE FROM employees WHERE id=$id";
    mysqli_query($conn, $sql);

    // Redirect to the same page after deletion
    header('location: employee_records.php');
}

// If the edit button is clicked
if(isset($_GET['edit'])){
    $id = $_GET['edit'];

    // Fetch the employee record based on the ID
    $sql = "SELECT * FROM employees WHERE id=$id";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $name = $row['name'];
    $email = $row['email'];
    $position = $row['position'];

    // Display a form for editing the employee record
    echo "<form action='employee_records.php' method='POST'>";
    echo "<input type='hidden' name='id' value='$id'>";
    echo "Name: <input type='text' name='name' value='$name'><br>";
    echo "Email: <input type='text' name='email' value='$email'><br>";
    echo "Position: <input type='text' name='position' value='$position'><br>";
    echo "<input type='submit' name='update' value='Update'>";
    echo "</form>";
}

// If the update button is clicked
if(isset($_POST['update'])){
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $position = $_POST['position'];

    // Update the employee record in the database
    $sql = "UPDATE employees SET name='$name', email='$email', position='$position' WHERE id=$id";
    mysqli_query($conn, $sql);

    // Redirect to the same page after update
    header('location: employee_records.php');
}
?>
