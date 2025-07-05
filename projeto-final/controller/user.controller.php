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
        return UserModel::list($offset, $limit);
    }

    static function update(string $id): never
    {
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

        UserModel::update(
            id: $id,
            name: $name,
            role: UserRole::fromString($role),
            password: $password ?: null
        );

        $_SESSION['toast_success'] = "Usuário atualizado com sucesso!";

        header('Location: ' . $_SERVER['HTTP_REFERER'] ?? '/');
        exit;
    }

    static function delete(string $id): never
    {
        $user = UserModel::findById($id);

        if (!$user) {
            self::throwError('Usuário não encontrado!');
        }

        if ($user['id'] === $_SESSION['user']['id']) {
            self::throwError('Você não pode deletar sua própria conta!');
        }

        UserModel::delete($id);

        $_SESSION['toast_success'] = "Usuário deletado com sucesso!";

        header('Location: ' . $_SERVER['HTTP_REFERER'] ?? '/');
        exit;
    }

    static function create(): never
    {
        $name = $_POST['name'] ?? null;
        $email = $_POST['email'] ?? null;
        $password = $_POST['password'] ?? null;
        $confirm_password = $_POST['confirm_password'] ?? null;
        $role = $_POST['role'] ?? null;

        if (!$name || !$email || !$password || !$role) {
            self::throwError('Todos os campos são obrigatórios!');
        }

        if ($password !== $confirm_password) {
            self::throwError('As senhas não conferem!');
        }

        $user = UserModel::findByEmail($email);

        if ($user) {
            self::throwError('O e-mail já está em uso!');
        }

        $userId = UserModel::create($name, $email, $password, $_SESSION['user']['environment_id'], UserRole::fromString($role));

        $_SESSION['toast_success'] = "Usuário criado com sucesso!";

        header('Location: /usuarios');
        exit;
    }

    private static function throwError(string $message): never
    {
        $_SESSION['toast_error'] = $message;
        header('Location: ' . $_SERVER['HTTP_REFERER'] ?? '/');
        exit;
    }
}
