<?php
include("valida_sessao.php");

if (isset($_SESSION["error_message"])) {
    echo $_SESSION["error_message"];
    unset($_SESSION["error_message"]);
}
?>

<html>

<head>
    <title>Login </title>
</head>

<body>
    <form name="acesso" action="efetua_login.php" method="post">
        <label> Email: <input type="text" name="email"> </label>
        <label> Senha: <input type="password" name="senha"> </label>
        <input type="submit" name="botao" value="Enviar" />
    </form>
</body>

</html>