<?php
session_start();
$id = isset($_GET['id']) ? $_GET['id'] : null;

if($id && isset($_SESSION['carrinho'][$id]) && $_SESSION['carrinho'][$id] == 1) {
    unset($_SESSION['carrinho'][$id]);
} else if (isset($_SESSION['carrinho'][$id]) && $_SESSION['carrinho'][$id] > 1) {
    $_SESSION['carrinho'][$id] = $_SESSION['carrinho'][$id] - 1;
}

header('Location: ' . $_SERVER['HTTP_REFERER']);
