<?php
$servidor = "postgres_db";
 $porta = 5432;
 $bd = "aula";
 $usuario = "guiwb";
 $senha_banco = 123;

$conexao=pg_connect("host=$servidor port=$porta dbname=$bd user=$usuario password=$senha_banco");

if(!$conexao) {
 die("Não foi possível se conectar ao banco de dados.");
}