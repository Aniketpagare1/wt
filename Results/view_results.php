<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bookstore";

$conn = mysqli_connect($host, $user, $password, $database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


$sql = "SELECT * FROM student_results";
$result = mysqli_query($conn, $sql);


echo "<table border='1'>
    <tr>
        <th>Roll Number</th>
        <th>Subject 1 MSE</th>
        <th>Subject 1 ESE</th>
        <!-- Repeat for other subjects -->
        <th>Total Marks</th>
    </tr>";

while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>
        <td>{$row['roll_number']}</td>
        <td>{$row['subject1_mse']}</td>
        <td>{$row['subject1_ese']}</td>
        <!-- Repeat for other subjects -->
        <td>{$row['total_marks']}</td>
    </tr>";
}

echo "</table>";


mysqli_close($conn);
?>
