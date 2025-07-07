<?php
include_once 'database/connection.php';
include_once 'model/user.model.php';

class AthleteModel extends UserModel
{
    static function listAthletesByTeamId(string $teamId, string $search_text): array
    {
        global $pdo;

        if ($search_text) {
            $stmt = $pdo->prepare("SELECT * FROM users WHERE id IN (SELECT user_id FROM team_users WHERE team_id = ? AND deleted_at IS NULL) AND role = 'ATHLETE' AND LOWER(name) LIKE ? AND deleted_at IS NULL");
            $stmt->execute([$teamId, '%' . strtolower($search_text) . '%']);
        } else {
            $stmt = $pdo->prepare("SELECT * FROM users WHERE id IN (SELECT user_id FROM team_users WHERE team_id = ? AND deleted_at IS NULL) AND role = 'ATHLETE' AND deleted_at IS NULL");
            $stmt->execute([$teamId]);
        }

        return $stmt->fetchAll();
    }

    static function listAthletesOutOfTeamId(string $teamId, string $search_text): array
    {
        global $pdo;

        if ($search_text) {
            $stmt = $pdo->prepare("SELECT * FROM users WHERE id NOT IN (SELECT user_id FROM team_users WHERE team_id = ? AND deleted_at IS NULL) AND role = 'ATHLETE' AND LOWER(name) LIKE ? AND deleted_at IS NULL");
            $stmt->execute([$teamId, '%' . strtolower($search_text) . '%']);
        } else {

            $stmt = $pdo->prepare("SELECT * FROM users WHERE id NOT IN (SELECT user_id FROM team_users WHERE team_id = ? AND deleted_at IS NULL) AND role = 'ATHLETE' AND deleted_at IS NULL");
            $stmt->execute([$teamId]);
        }

        return $stmt->fetchAll();
    }
}
