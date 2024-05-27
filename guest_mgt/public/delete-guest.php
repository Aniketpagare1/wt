<?php
require '../config/db.php';
require '../src/GuestService.php';

$guestService = new GuestService($mysqli);

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    if ($guestService->deleteGuest($id)) {
        echo "<p>Guest deleted successfully!</p>";
    } else {
        echo "<p>Failed to delete guest.</p>";
    }
}

header('Location: view-guests.php');
?>
