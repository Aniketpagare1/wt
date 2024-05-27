<?php
// register.php

// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "form_validation";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Get form data
  $username = $_POST["username"];
  $email = $_POST["email"];
  $password = $_POST["password"];

  // Server-side validation
  if (empty($username) || empty($email) || empty($password)) {
    echo "All fields are required.";
    exit;
  }

  // Validate email format
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "Invalid email format.";
    exit;
  }

  // Validate password format (at least one letter and one number)
  if (!preg_match("/^(?=.*[a-zA-Z])(?=.*\d).+$/", $password)) {
    echo "Password must contain at least one letter and one number.";
    exit;
  }

  // Insert user data into the database
  $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";
  if ($conn->query($sql) === TRUE) {
    echo "Registration successful!";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}

// Close connection
$conn->close();
?>
