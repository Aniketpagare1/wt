<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bookstore";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$roll_number = mysqli_real_escape_string($conn, $_POST['roll_number']);
$subject1_mse = $_POST['subject1_mse'];
$subject1_ese = $_POST['subject1_ese'];
$subject2_mse = $_POST['subject2_mse'];
$subject2_ese = $_POST['subject2_ese'];
$subject3_mse = $_POST['subject3_mse'];
$subject3_ese = $_POST['subject3_ese'];
$subject4_mse = $_POST['subject4_mse'];
$subject4_ese = $_POST['subject4_ese'];

$total_marks = ($subject1_mse * 0.3) + ($subject1_ese * 0.7);
$total_marks += ($subject2_mse * 0.3) + ($subject2_ese * 0.7);
$total_marks += ($subject3_mse * 0.3) + ($subject3_ese * 0.7);
$total_marks += ($subject4_mse * 0.3) + ($subject4_ese * 0.7);

$sql = "INSERT INTO student_results (roll_number, subject1_mse, subject1_ese, subject2_mse, subject2_ese, subject3_mse, subject3_ese, subject4_mse, subject4_ese, total_marks)
        VALUES ('$roll_number', $subject1_mse, $subject1_ese, $subject2_mse, $subject2_ese, $subject3_mse, $subject3_ese, $subject4_mse, $subject4_ese, $total_marks)";

if (mysqli_query($conn, $sql)) {
    
    header("Location: results.php?id=" . mysqli_insert_id($conn));

    exit(); 
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>
