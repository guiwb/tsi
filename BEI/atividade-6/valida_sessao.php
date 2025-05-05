<?php
session_start();
$route = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$user = isset($_SESSION['user']) ? $_SESSION['user'] : null;

$is_login = strpos($route, 'login.php') !== false;

if ($is_login && !empty($user)) header("Location:index.php");
else if (!$is_login && empty($user)) header("Location:login.php");
?>