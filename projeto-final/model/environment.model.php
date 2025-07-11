<?php
include_once 'database/connection.php';

class EnvironmentModel
{
    static function getFirst(): mixed
    {
        global $pdo;

        $stmt = $pdo->prepare("SELECT * FROM environments where deleted_at IS NULL LIMIT 1");
        $stmt->execute();
        return $stmt->fetch();
    }

    static function update(string $id, string $name, string $description): void
    {
        global $pdo;

        $stmt = $pdo->prepare("UPDATE environments SET name = ? WHERE id = ?");
        $stmt->execute([$name, $description, $id]);
    }
}
