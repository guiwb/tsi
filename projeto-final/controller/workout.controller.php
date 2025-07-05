<?php
include_once 'model/workout.model.php';

class WorkoutController
{
    static function list(int $offset, int $limit): array
    {
        return WorkoutModel::list($offset, $limit);
    }

    static function update(string $id): never
    {
        $workout = WorkoutModel::findById($id);

        if (!$workout) {
            self::throwError('Treino não encontrado!');
        }

        $name = $_POST['name'] ?? null;
        $description = $_POST['description'] ?? null;
        $scheduled_at = $_POST['scheduled_at'] ?? null;

        if (!$name || !$description || !$scheduled_at) {
            self::throwError('Nome, descrição e data são obrigatórios!');
        }

        WorkoutModel::update(
            id: $id,
            name: $name,
            description: $description,
            scheduled_at: new DateTime($scheduled_at),
        );

        $_SESSION['toast_success'] = "Treino atualizado com sucesso!";

        header('Location: /treinos');
        exit;
    }

    static function delete(string $id): never
    {
        $workout = WorkoutModel::findById($id);

        if (!$workout) {
            self::throwError('Treino não encontrado!');
        }

        WorkoutModel::delete($id);

        $_SESSION['toast_success'] = "Treino deletado com sucesso!";

        header('Location: ' . $_SERVER['HTTP_REFERER'] ?? '/');
        exit;
    }

    static function create(): never
    {
        $name = $_POST['name'] ?? null;
        $description = $_POST['description'] ?? null;
        $scheduled_at = $_POST['scheduled_at'] ?? null;

        if (!$name || !$description || !$scheduled_at) {
            self::throwError('Todos os campos são obrigatórios!');
        }

        WorkoutModel::create(
            name: $name,
            description: $description,
            scheduled_at: new DateTime($scheduled_at),
            coach_id: $_SESSION['user']['id'],
            environment_id: $_SESSION['user']['environment_id']
        );

        $_SESSION['toast_success'] = "Treino criado com sucesso!";

        header('Location: /treinos');
        exit;
    }

    private static function throwError(string $message): never
    {
        $_SESSION['toast_error'] = $message;
        header('Location: ' . $_SERVER['HTTP_REFERER'] ?? '/');
        exit;
    }
}
