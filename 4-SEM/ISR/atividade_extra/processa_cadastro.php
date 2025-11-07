<?php
session_start();
include 'conecta.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $name = $_POST['name'];
  $email = $_POST['email'];

  $stmt = $conn->prepare("SELECT COUNT(*) FROM users WHERE email = :email");
  $stmt->bindParam(':email', $email);
  $stmt->execute();
  $count = $stmt->fetchColumn();

  if ($count > 0) {
    $_SESSION['error'] = "Email já cadastrado.";
    header('Location: cadastro.php');
    exit();
  }

  $stmt = $conn->prepare("INSERT INTO users (name, email) VALUES (:name, :email)");
  $stmt->bindParam(':name', $name);
  $stmt->bindParam(':email', $email);
  $stmt->execute();

  header('Location: index.php');
  exit();
}
