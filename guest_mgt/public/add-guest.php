<?php
include '../templates/header.php';
require '../config/db.php';
require '../src/GuestService.php';

$guestService = new GuestService($mysqli);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $visit_date = $_POST['visit_date'];
    $visit_time = $_POST['visit_time'];

    if ($guestService->addGuest($name, $email, $phone, $visit_date, $visit_time)) {
        echo "<p>Guest added successfully!</p>";
    } else {
        echo "<p>Failed to add guest.</p>";
    }
}
?>

<h2>Add Guest</h2>
<form method="post">
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" required><br>
    <label for="email">Email:</label>
    <input type="email" id="email" name="email"><br>
    <label for="phone">Phone:</label>
    <input type="text" id="phone" name="phone"><br>
    <label for="visit_date">Visit Date:</label>
    <input type="date" id="visit_date" name="visit_date" required><br>
    <label for="visit_time">Visit Time:</label>
    <input type="time" id="visit_time" name="visit_time" required><br>
    <button type="submit">Add Guest</button>
</form>

<?php include '../templates/footer.php'; ?>
