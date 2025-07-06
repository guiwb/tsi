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

  public static function fromString(string $role): self
  {
    return match ($role) {
      'admin' => self::ADMIN,
      'coach' => self::COACH,
      'athlete' => self::ATHLETE
    };
  }
}

class UserModel
{
  static function getTotalUsers(): int
  {
    global $pdo;

    $stmt = $pdo->prepare("SELECT COUNT(*) FROM users WHERE deleted_at IS NULL");
    $stmt->execute();
    return $stmt->fetchColumn();
  }

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

  static function list(int $offset, int $limit): array
  {
    global $pdo;

    $stmt = $pdo->prepare("SELECT * FROM users WHERE deleted_at IS NULL ORDER BY created_at DESC LIMIT ? OFFSET ?");
    $stmt->execute([$limit, $offset]);
    return $stmt->fetchAll();
  }

  static function create(string $name, string $email, string $password, string $environment_id, UserRole $role): string
  {
    global $pdo;

    $stmt = $pdo->prepare("INSERT INTO users (name, email, password, environment_id, role) VALUES (?, ?, ?, ?, ?) RETURNING id");
    $stmt->execute([$name, $email, password_hash($password, PASSWORD_DEFAULT), $environment_id, $role->toString()]);

    return $stmt->fetchColumn();
  }

  static function update(string $id, string $name, UserRole $role, ?string $password = null): void
  {
    global $pdo;

    if ($password) {
      $stmt = $pdo->prepare("UPDATE users SET name = ?, role = ?, password = ?, updated_at = NOW() WHERE id = ?");
      $stmt->execute([$name, $role->toString(), password_hash($password, PASSWORD_DEFAULT), $id]);
    } else {
      $stmt = $pdo->prepare("UPDATE users SET name = ?, role = ?, updated_at = NOW() WHERE id = ?");
      $stmt->execute([$name, $role->toString(), $id]);
    }
  }

  static function delete(string $id): void
  {
    global $pdo;

    $pdo->beginTransaction();
    try {
      $stmt = $pdo->prepare("UPDATE users SET deleted_at = NOW() WHERE id = ?");
      $stmt->execute([$id]);

      $stmt = $pdo->prepare("UPDATE team_users SET deleted_at = NOW() WHERE user_id = ?");
      $stmt->execute([$id]);

      $pdo->commit();
    } catch (Exception $e) {
      $pdo->rollBack();
      throw $e;
    }
  }
}
