<?php
include_once 'model/team.model.php';

class TeamController
{
    static function list(int $offset, int $limit): array
    {
        return TeamModel::list($offset, $limit);
    }

    static function update(string $id): never
    {
        $team = TeamModel::findById($id);

        if (!$team) {
            self::throwError('Equipe não encontrada!');
        }

        $name = $_POST['name'] ?? null;

        if (!$name) {
            self::throwError('Nome é obrigatório!');
        }

        TeamModel::update(
            id: $id,
            name: $name,
        );

        $_SESSION['toast_success'] = "Equipe atualizada com sucesso!";

        header('Location: /equipes');
        exit;
    }

    static function delete(string $id): never
    {
        $team = TeamModel::findById($id);

        if (!$team) {
            self::throwError('Equipe não encontrada!');
        }

        TeamModel::delete($id);

        $_SESSION['toast_success'] = "Equipe deletada com sucesso!";

        header('Location: ' . $_SERVER['HTTP_REFERER'] ?? '/');
        exit;
    }

    static function create(): never
    {
        $name = $_POST['name'] ?? null;

        if (!$name) {
            self::throwError('Nome é obrigatório!');
        }

        $teamId = TeamModel::create($name, $_SESSION['user']['id'], $_SESSION['user']['environment_id']);

        $_SESSION['toast_success'] = "Equipe criada com sucesso!";

        header('Location: /equipes');
        exit;
    }

    static function addAthlete(string $teamId, string $athleteId): never
    {
        $user = UserModel::findById($athleteId);

        if (!$user || $user['role'] !== UserRole::ATHLETE->toString()) {
            self::throwError('Atleta não encontrado!');
        }

        $relation = TeamModel::findAthleteRelation($teamId, $athleteId);

        if ($relation) {
            self::throwError('Atleta já está na equipe!');
        }

        TeamModel::addAthlete($teamId, $athleteId);

        $_SESSION['toast_success'] = "Atleta adicionado à equipe com sucesso!";

        header('Location: ' . $_SERVER['HTTP_REFERER'] ?? '/');
        exit;
    }

    static function removeAthlete(string $teamId, string $athleteId): never
    {
        $relation = TeamModel::findAthleteRelation($teamId, $athleteId);

        if (!$relation) {
            self::throwError('Atleta não encontrado na equipe!');
        }

        TeamModel::removeAthlete($teamId, $athleteId);

        $_SESSION['toast_success'] = "Atleta removido da equipe com sucesso!";

        header('Location: ' . $_SERVER['HTTP_REFERER'] ?? '/');
        exit;
    }

    private static function throwError(string $message): never
    {
        $_SESSION['toast_error'] = $message;
        header('Location: ' . $_SERVER['HTTP_REFERER'] ?? '/');
        exit;
    }
}
