<?php
include_once 'database/connection.php';

class TeamModel
{
    static function findById(string $id): mixed
    {
        global $pdo;

        $stmt = $pdo->prepare("SELECT * FROM teams WHERE id = ? AND deleted_at IS NULL");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    static function list(int $offset, int $limit): array
    {
        global $pdo;

        $stmt = $pdo->prepare("SELECT *, (select count(*) from team_users where team_id = teams.id) as total_athletes FROM teams WHERE deleted_at IS NULL ORDER BY created_at DESC LIMIT ? OFFSET ?");
        $stmt->execute([$limit, $offset]);
        return $stmt->fetchAll();
    }

    static function create(string $name, string $coach_id, string $environment_id): string
    {
        global $pdo;

        $stmt = $pdo->prepare("INSERT INTO teams (name, coach_id, environment_id) VALUES (?, ?, ?) RETURNING id");
        $stmt->execute([$name, $coach_id, $environment_id]);

        return $stmt->fetchColumn();
    }

    static function update(string $id, string $name): void
    {
        global $pdo;

        $stmt = $pdo->prepare("UPDATE teams SET name = ?, updated_at = NOW() WHERE id = ?");
        $stmt->execute([$name, $id]);
    }

    static function delete(string $id): void
    {
        global $pdo;

        $stmt = $pdo->prepare("UPDATE teams SET deleted_at = NOW() WHERE id = ?");
        $stmt->execute([$id]);
    }

    static function addUser(string $team_id, string $user_id): void
    {
        global $pdo;

        $stmt = $pdo->prepare("INSERT INTO team_users (team_id, user_id) VALUES (?, ?)");
        $stmt->execute([$team_id, $user_id]);
    }

    static function removeUser(string $team_id, string $user_id): void
    {
        global $pdo;

        $stmt = $pdo->prepare("UPDATE team_users SET deleted_at = NOW() WHERE team_id = ? AND user_id = ?");
        $stmt->execute([$team_id, $user_id]);
    }
}
