<?php
include '../templates/header.php';
require '../config/db.php';
require '../src/GuestService.php';

$guestService = new GuestService($mysqli);
$guests = $guestService->getGuests();
?>

<h2>Guest List</h2>
<table>
    <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Visit Date</th>
            <th>Visit Time</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($guests as $guest): ?>
        <tr>
            <td><?= htmlspecialchars($guest->name) ?></td>
            <td><?= htmlspecialchars($guest->email) ?></td>
            <td><?= htmlspecialchars($guest->phone) ?></td>
            <td><?= htmlspecialchars($guest->visit_date) ?></td>
            <td><?= htmlspecialchars($guest->visit_time) ?></td>
            <td>
                <a href="delete-guest.php?id=<?= $guest->id ?>">Delete</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php include '../templates/footer.php'; ?>
