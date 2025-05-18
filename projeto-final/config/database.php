<?php
$host = "natare_db";
$dbname = "natareapp";
$user = "guiwb";
$password = 123;

try {
  $pdo = new PDO("pgsql:host=$host;dbname=$dbname", $user, $password);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
  die("Não foi possível se conectar ao banco de dados:" . $e->getMessage());
}
