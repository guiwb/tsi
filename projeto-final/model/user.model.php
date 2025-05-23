<?php
include_once 'database/connection.php';

class UserModel
{
  static function findByEmail($email)
  {
    global $pdo;

    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ? AND deleted_at IS NULL");
    $stmt->execute([$email]);
    return $stmt->fetch();
  }
}
