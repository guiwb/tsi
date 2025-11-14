<?php
include 'conecta.php';

$id = $_POST['id'] ?? null;
$name = $_POST['name'] ?? null;
$email = $_POST['email'] ?? null;

if ($id === null || $name === null || $email === null) {
  $_SESSION['error'] = 'Todos os campos são obrigatórios.';
  header('Location: edicao.php?id=' . urlencode($id));
  exit;
}

$stmt = $conn->prepare("UPDATE users SET name = :name, email = :email WHERE id = :id");
$stmt->bindParam(':name', $name);
$stmt->bindParam(':email', $email);
$stmt->bindParam(':id', $id);
$stmt->execute();
header('Location: index.php');
