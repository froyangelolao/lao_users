<?php

require_once 'dbconfig.php';


$id = $_GET['id']?? '';


if (empty($id) ||!is_numeric($id)) {
    header("location:../index.php?error=invalid_id");
    exit;
}


$stmt = $conn->prepare("DELETE FROM users WHERE id = :id");
$stmt->bindParam(':id', $id, PDO::PARAM_INT);
$stmt->execute();


header("location:../index.php");
exit;