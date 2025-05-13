<?php
session_start();
$id = isset($_GET['id']) ? $_GET['id'] : null;

if(!$id) return null;
if(in_array($id, $_SESSION['carrinho'])) return null;

$_SESSION['carrinho'][] = $id;
header("Location:produtos.php");
