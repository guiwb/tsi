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

    static function update(string $id): never
    {
        global $pdo;

        $user = UserModel::findById($id);

        if (!$user) {
            self::throwError('Usuário não encontrado!');
        }

        $name = $_POST['name'] ?? null;
        $role = $_POST['role'] ?? null;
        $password = $_POST['password'] ?? null;
        $confirm_password = $_POST['confirm_password'] ?? null;

        if (!$name || !$role) {
            self::throwError('Nome e cargo são obrigatórios!');
        }

        if ($password && $password !== $confirm_password) {
            self::throwError('As senhas não conferem!');
        }

        $stmt = $pdo->prepare("UPDATE users SET name = ?, role = ?, updated_at = NOW() WHERE id = ?");
        $stmt->execute([$name, $role, $id]);

        if ($password) {
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            $stmt = $pdo->prepare("UPDATE users SET password = ? WHERE id = ?");
            $stmt->execute([$hashedPassword, $id]);
        }

        $_SESSION['toast_success'] = "Usuáio atualizado com sucesso!";

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
