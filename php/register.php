<?php

require('dbconfig.php');

$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$gender = $_POST['gender'];

$stmt = $conn->prepare("INSERT INTO users (first_name, last_name, gender)
    VALUES (:first_name, :last_name, :gender)");
$stmt->bindParam(':first_name', $first_name);
$stmt->bindParam(':last_name', $last_name);
$stmt->bindParam(':gender', $gender);
$stmt->execute();

$conn = null;

header("location: ../index.php?");
