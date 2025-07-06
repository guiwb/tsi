<?php
include_once 'database/connection.php';

class WorkoutModel
{
    static function getTotalWorkouts(): int
    {
        global $pdo;

        $stmt = $pdo->prepare("SELECT COUNT(*) FROM workouts WHERE deleted_at IS NULL");
        $stmt->execute();
        return $stmt->fetchColumn();
    }

    static function findById(string $id): mixed
    {
        global $pdo;

        $stmt = $pdo->prepare("SELECT * FROM workouts WHERE id = ? AND deleted_at IS NULL");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    static function list(int $offset, int $limit): array
    {
        global $pdo;

        $stmt = $pdo->prepare("SELECT * FROM workouts WHERE deleted_at IS NULL ORDER BY created_at DESC LIMIT ? OFFSET ?");
        $stmt->execute([$limit, $offset]);
        return $stmt->fetchAll();
    }

    static function create(string $name, string $description, DateTime $scheduled_at, string $coach_id, string $environment_id): string
    {
        global $pdo;

        $stmt = $pdo->prepare("INSERT INTO workouts (name, description, scheduled_at, coach_id, environment_id) VALUES (?, ?, ?, ?, ?) RETURNING id");
        $stmt->execute([$name, $description, $scheduled_at->format('Y-m-d H:i:s'), $coach_id, $environment_id]);

        return $stmt->fetchColumn();
    }

    static function update(string $id, string $name, string $description, DateTime $scheduled_at): void
    {
        global $pdo;

        $stmt = $pdo->prepare("UPDATE workouts SET name = ?, description = ?, scheduled_at = ?, updated_at = NOW() WHERE id = ?");
        $stmt->execute([$name, $description, $scheduled_at->format('Y-m-d H:i:s'), $id]);
    }

    static function delete(string $id): void
    {
        global $pdo;

        $pdo->beginTransaction();
        try {
            $stmt = $pdo->prepare("UPDATE workouts SET deleted_at = NOW() WHERE id = ?");
            $stmt->execute([$id]);

            $stmt = $pdo->prepare("UPDATE workout_teams SET deleted_at = NOW() WHERE workout_id = ?");
            $stmt->execute([$id]);

            $pdo->commit();
        } catch (Exception $e) {
            $pdo->rollBack();
            throw $e;
        }
    }

    static function addTeam(string $workout_id, string $team_id): void
    {
        global $pdo;

        $stmt = $pdo->prepare("INSERT INTO workout_teams (workout_id, team_id) VALUES (?, ?)");
        $stmt->execute([$workout_id, $team_id]);
    }

    static function removeTeam(string $workout_id, string $team_id): void
    {
        global $pdo;

        $stmt = $pdo->prepare("UPDATE workout_teams SET deleted_at = NOW() WHERE workout_id = ? AND team_id = ?");
        $stmt->execute([$workout_id, $team_id]);
    }
}
