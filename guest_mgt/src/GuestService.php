<?php
require_once 'Guest.php';

class GuestService
{
    private $mysqli;

    public function __construct($mysqli)
    {
        $this->mysqli = $mysqli;
    }

    public function addGuest($name, $email, $phone, $visit_date, $visit_time)
    {
        $stmt = $this->mysqli->prepare('INSERT INTO guests (name, email, phone, visit_date, visit_time) VALUES (?, ?, ?, ?, ?)');
        $stmt->bind_param('sssss', $name, $email, $phone, $visit_date, $visit_time);
        return $stmt->execute();
    }

    public function getGuests()
    {
        $result = $this->mysqli->query('SELECT * FROM guests ORDER BY created_at DESC');
        $guests = [];
        while ($row = $result->fetch_assoc()) {
            $guests[] = new Guest($row['id'], $row['name'], $row['email'], $row['phone'], $row['visit_date'], $row['visit_time']);
        }
        return $guests;
    }

    public function deleteGuest($id)
    {
        $stmt = $this->mysqli->prepare('DELETE FROM guests WHERE id = ?');
        $stmt->bind_param('i', $id);
        return $stmt->execute();
    }
}
?>
