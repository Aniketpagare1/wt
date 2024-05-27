<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Management</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 50px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        form {
            margin-bottom: 20px;
        }
        input[type="text"], input[type="email"], input[type="number"] {
            padding: 10px;
            margin: 5px;
            width: 200px;
        }
        input[type="submit"], button {
            padding: 10px 20px;
            margin: 5px;
        }
    </style>
</head>
<body>

<h1>Student Management</h1>

<form action="create.php" method="post">
    <input type="text" name="name" placeholder="Name" required>
    <input type="email" name="email" placeholder="Email" required>
    <input type="number" name="age" placeholder="Age" required>
    <input type="submit" value="Add Student">
</form>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Age</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
    <?php include 'read.php'; ?>
    </tbody>
</table>

</body>
</html>

