<?php
$host = "postgres_db";
$dbname = "aula";
$user = "guiwb";
$password = 123;

try {
    $pdo = new PDO("pgsql:host=$host;dbname=$dbname", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Não foi possível se conectar ao banco de dados:" . $e->getMessage());
}
