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
}
