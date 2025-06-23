<?php
include_once 'database/connection.php';

enum UserRole
{
  case ADMIN;
  case COACH;
  case ATHLETE;

  public function toString(): string
  {
    return match ($this) {
      self::ADMIN => 'admin',
      self::COACH => 'coach',
      self::ATHLETE => 'athlete',
    };
  }
}

class UserModel
{
  static function findByEmail(string $email): mixed
  {
    global $pdo;

    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ? AND deleted_at IS NULL");
    $stmt->execute([$email]);
    return $stmt->fetch();
  }

  static function findById(string $id): mixed
  {
    global $pdo;

    $stmt = $pdo->prepare("SELECT * FROM users WHERE id = ? AND deleted_at IS NULL");
    $stmt->execute([$id]);
    return $stmt->fetch();
  }

  static function create(string $name, string $email, string $password, string $environment_id, UserRole $role): string
  {
    global $pdo;

    $stmt = $pdo->prepare("INSERT INTO users (name, email, password, environment_id, role) VALUES (?, ?, ?, ?, ?) RETURNING id");
    $stmt->execute([$name, $email, password_hash($password, PASSWORD_DEFAULT), $environment_id, $role->toString()]);

    return $stmt->fetchColumn();
  }
}
