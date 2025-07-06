<?php
include_once 'database/connection.php';

class TeamModel
{
    static function getTotalTeams(): int
    {
        global $pdo;

        $stmt = $pdo->prepare("SELECT COUNT(*) FROM teams WHERE deleted_at IS NULL");
        $stmt->execute();
        return $stmt->fetchColumn();
    }

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

        $stmt = $pdo->prepare("SELECT *, (select count(*) from team_users where team_id = teams.id AND deleted_at IS NULL) as total_athletes FROM teams WHERE deleted_at IS NULL ORDER BY created_at DESC LIMIT ? OFFSET ?");
        $stmt->execute([$limit, $offset]);
        return $stmt->fetchAll();
    }

    static function listAthletes(string $teamId): array
    {
        global $pdo;

        $stmt = $pdo->prepare("SELECT * FROM users WHERE id IN (SELECT user_id FROM team_users WHERE team_id = ? AND deleted_at IS NULL) AND role = 'ATHLETE' AND deleted_at IS NULL");
        $stmt->execute([$teamId]);
        return $stmt->fetchAll();
    }

    static function listNonAthletes(string $teamId): array
    {
        global $pdo;

        $stmt = $pdo->prepare("SELECT * FROM users WHERE id NOT IN (SELECT user_id FROM team_users WHERE team_id = ? AND deleted_at IS NULL) AND role = 'ATHLETE' AND deleted_at IS NULL");
        $stmt->execute([$teamId]);
        return $stmt->fetchAll();
    }

    static function findAthleteRelation(string $teamId, string $athleteId): mixed
    {
        global $pdo;

        $stmt = $pdo->prepare("SELECT * FROM team_users WHERE team_id = ? AND user_id = ? AND deleted_at IS NULL");
        $stmt->execute([$teamId, $athleteId]);
        return $stmt->fetch();
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

        $pdo->beginTransaction();
        try {
            $stmt = $pdo->prepare("UPDATE teams SET deleted_at = NOW() WHERE id = ?");
            $stmt->execute([$id]);

            $stmt = $pdo->prepare("UPDATE team_users SET deleted_at = NOW() WHERE team_id = ?");
            $stmt->execute([$id]);

            $stmt = $pdo->prepare("UPDATE workout_teams SET deleted_at = NOW() WHERE team_id = ?");
            $stmt->execute([$id]);

            $pdo->commit();
        } catch (Exception $e) {
            $pdo->rollBack();
            throw $e;
        }
    }

    static function addAthlete(string $team_id, string $athlete_id): void
    {
        global $pdo;

        $stmt = $pdo->prepare("INSERT INTO team_users (team_id, user_id) VALUES (?, ?)");
        $stmt->execute([$team_id, $athlete_id]);
    }

    static function removeAthlete(string $team_id, string $athlete_id): void
    {
        global $pdo;

        $stmt = $pdo->prepare("UPDATE team_users SET deleted_at = NOW() WHERE team_id = ? AND user_id = ?");
        $stmt->execute([$team_id, $athlete_id]);
    }
}
