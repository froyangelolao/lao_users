<?php

require('dbconfig.php');

$id = $_POST['id'];
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$gender = $_POST['gender'];

$stmt = $conn->prepare("UPDATE users SET first_name = :first_name, last_name = :last_name, gender = :gender, updated_at = NOW() WHERE id = :id");
$stmt->bindParam(':id', $id, PDO::PARAM_INT);
$stmt->bindParam(':first_name', $first_name, PDO::PARAM_STR);
$stmt->bindParam(':last_name', $last_name, PDO::PARAM_STR);
$stmt->bindParam(':gender', $gender, PDO::PARAM_STR);
$stmt->execute();

if ($stmt->rowCount() > 0) {
    header("location: ../index.php?success=1");
} else {
    header("location: ../index.php?error=1");
}
exit;

?>