<?php
$host = 'localhost';
$db = 'guest_management';
$user = 'root'; // Your MySQL username
$pass = ''; // Your MySQL password

$mysqli = new mysqli($host, $user, $pass, $db);

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}
?>
