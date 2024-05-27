<?php
// Process the form submission to add a new book to the database
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $title = $_POST["title"];
    $author = $_POST["author"];
    $price = $_POST["price"];

    // Assuming you have a database connection
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "bookstore";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Insert the new book into the database
    $sql = "INSERT INTO books (title, author, price) VALUES ('$title', '$author', $price)";

    if ($conn->query($sql) === TRUE) {
        // Set a session variable to indicate successful book addition
        session_start();
        $_SESSION['book_added'] = true;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}

// Redirect back to the catalogue.php page
header("Location: catalogue.php");
exit();
?>
