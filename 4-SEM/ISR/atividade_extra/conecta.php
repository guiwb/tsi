<?php
$host = 'sql300.infinityfree.com';
$dbname = 'if0_40304922_atividade_extra';
$username = 'if0_40304922';
$password = '0wwO8uP766IbCf';

try {
  $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}
