<?php
include 'conecta.php';

$id = $_GET['id'] ?? null;

if ($id === null) {
  header('Location: index.php');
  exit;
}

$stmt = $conn->prepare("DELETE FROM users WHERE id = :id");
$stmt->bindParam(':id', $id);
$stmt->execute();
header('Location: index.php');
