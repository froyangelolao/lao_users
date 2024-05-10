<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registered Users</title>
    <style>
        table {
            margin-top: 2em;
        }
    </style>
    <?php require('php/dbconfig.php'); ?>
</head>

<body>
    <h1>Users</h1>
    <a href="registration.php">
        <button>Register New User</button>
    </a>
    <table border="1" width="100%">
        <thead>
            <tr>
                <th>Name</th>
                <th>Gender</th>
                <th>Actions</th>
                <th>Created At</th>
                <th>Updated At</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $stmt = $conn->prepare("SELECT id, first_name, last_name, gender, created_at, updated_at FROM users");
            $stmt->execute();
            while ($row = $stmt->fetch()) {
                echo "<tr>";
                echo "<td>" .
                    $row["first_name"] . " " . $row["last_name"] .
                    "</td>";
                echo "<td>" .
                    $row["gender"] .
                    "</td>";
                echo "<td>" .
                    "<a href='php/edit.php?id=" . $row["id"] . "'>Edit</a>" .
                    "<a href='php/delete.php?id=" . $row["id"] . "'>Delete</a>" .
                    "</td>";
                echo "<td>" .
                    $row["created_at"] . 
                    "</td>";
                echo "<td>" .
                    $row["updated_at"] . 
                    "</td>";
            }
            ?>
        </tbody>
    </table>
</body>

</html>