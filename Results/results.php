<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bookstore";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$student_id = isset($_GET['id']) ? $_GET['id'] : null;

if ($student_id === null) {
    die("Invalid student ID");
}

$sql = "SELECT * FROM student_results WHERE id = $student_id";
$result = mysqli_query($conn, $sql);

if (!$result) {
    die("Error: " . $sql . "<br>" . mysqli_error($conn));
}

$row = mysqli_fetch_assoc($result);

mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Marksheet</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <header>
            <h1>VIT University</h1>
            <p>Academic Session: 2023</p>
        </header>
        <section class="marksheet">
            <h2>Student Marksheet</h2>
            <?php if ($row): ?>
            <div class="student-info">
                <p><strong>Roll Number:</strong> <?php echo $row['roll_number']; ?></p>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>Subject</th>
                        <th>MSE</th>
                        <th>ESE</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Design and Analysis of Algorithm</td>
                        <td><?php echo isset($row['subject1_mse']) ? $row['subject1_mse'] : 'N/A'; ?></td>
                        <td><?php echo isset($row['subject1_ese']) ? $row['subject1_ese'] : 'N/A'; ?></td>
                    </tr>

                    <tr>
                        <td>Web Technology</td>
                        <td><?php echo isset($row['subject2_mse']) ? $row['subject2_mse'] : 'N/A'; ?></td>
                        <td><?php echo isset($row['subject2_ese']) ? $row['subject2_ese'] : 'N/A'; ?></td>
                    </tr>

                    <tr>
                        <td>Computer Networks</td>
                        <td><?php echo isset($row['subject3_mse']) ? $row['subject3_mse'] : 'N/A'; ?></td>
                        <td><?php echo isset($row['subject3_ese']) ? $row['subject3_ese'] : 'N/A'; ?></td>
                    </tr>

                    <tr>
                        <td>Software Design and Modeling</td>
                        <td><?php echo isset($row['subject4_mse']) ? $row['subject4_mse'] : 'N/A'; ?></td>
                        <td><?php echo isset($row['subject4_ese']) ? $row['subject4_ese'] : 'N/A'; ?></td>
                    </tr>
                    

                </tbody>
            </table>
            <div class="total">
                <p><strong>Total Marks:</strong> <?php echo isset($row['total_marks']) ? $row['total_marks'] : 'N/A'; ?></p>
            </div>
            <?php else: ?>
            <p class="error">No data found for the provided student ID.</p>
            <?php endif; ?>
        </section>
        <footer>
            <p>&copy; 2023 VIT University. All rights reserved.</p>
        </footer>
    </div>
</body>
</html>

