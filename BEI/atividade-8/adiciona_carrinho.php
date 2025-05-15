<?php
session_start();
$id = isset($_GET['id']) ? $_GET['id'] : null;

if($id) {
    $_SESSION['carrinho'][$id] = isset($_SESSION['carrinho'][$id]) ? $_SESSION['carrinho'][$id] + 1 : 1;
}

header('Location: ' . $_SERVER['HTTP_REFERER']);
