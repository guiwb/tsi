<?php
include_once 'model/user.model.php';
include_once 'model/environment.model.php';

class UserController
{
    static function signup(): never
    {
        $email = $_POST['email'] ?? null;
        $password = $_POST['password'] ?? null;
        $name = $_POST['name'] ?? null;
        $confirm_password = $_POST['confirm_password'] ?? null;

        if (!$email || !$password || !$name || !$confirm_password) {
            self::throwError('Todos os campos são obrigatórios!');
        }

        if ($password !== $confirm_password) {
            self::throwError('As senhas não conferem!');
        }

        $user = UserModel::findByEmail($email);

        if ($user) {
            self::throwError('O e-mail já está em uso!');
        }

        $environment_id = EnvironmentModel::getFirst()['id'] ?? null;

        $userId = UserModel::create($name, $email, $password, $environment_id, UserRole::ATHLETE);
        $_SESSION['user'] = UserModel::findById($userId);

        header(header: 'Location: /');
        exit;
    }

    static function list(int $offset, int $limit): array
    {
        global $pdo;

        $stmt = $pdo->prepare("SELECT * FROM users WHERE deleted_at IS NULL ORDER BY created_at DESC LIMIT ? OFFSET ?");
        $stmt->execute([$limit, $offset]);
        return $stmt->fetchAll();
    }

    private static function throwError(string $message): never
    {
        $_SESSION['signup_error'] = $message;
        header('Location: /signup');
        exit;
    }
}
