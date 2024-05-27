<!-- buy.php -->

<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION["username"])) {
    // Redirect to the login page if not logged in
    header("Location: login.html");
    exit();
}

// Assuming you have a database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bookstore";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $bookId = $_GET["id"];

    // Retrieve book details
    $sql = "SELECT * FROM books WHERE id = '$bookId'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Display purchase information
        echo "<h2>Thank you, " . $_SESSION["username"] . "!</h2>";
        echo "<p>You have purchased: " . $row["title"] . " by " . $row["author"] . " for $" . $row["price"] . "</p>";
    } else {
        echo "Book not found";
    }
}

$conn->close();
?>
