<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="/setimo.php" method="POST">
        <label for="nome">Nome</label>
        <input type="text" name="nome" id="nome" required />

        <label for="email">E-mail</label>
        <input type="email" name="email" id="email" required />

        <label for="cpf">CPF</label>
        <input type="text" name="cpf" id="cpf" required />

        <label for="bandeira">Bandeira</label>
        <select name="bandeira" id="bandeira" required>
            <option value="Master">Master</option>
            <option value="Visa">Visa</option>
            <option value="Elo">Elo</option>
            <option value="AmericanExpress">AmericanExpress</option>
        </select>
        
        <button type="submit">Enviar</button>
    </form>

    <script>
        const cpfInput = document.querySelector('input[name=cpf]')

        document.querySelector('form').addEventListener('submit', (event) => {
            const ehValido = validaCPF(cpfInput.value);

            if (!ehValido) {
                cpfInput.setCustomValidity("CPF Inválido!")
                cpfInput.reportValidity()
                event.preventDefault()
            }
        })

        cpfInput.addEventListener('keypress', () => {
            cpfInput.setCustomValidity("")
        })

        function validaCPF(cpf) {
            console.log(cpf)
            cpf = cpf.replace(/[^\d]/g, '');

            if (cpf.length !== 11 || /^(\d)\1{10}$/.test(cpf)) {
                return false;
            }

            let soma = 0, resto;

            for (let i = 0; i < 9; i++) {
                soma += parseInt(cpf[i]) * (10 - i);
            }
            resto = (soma * 10) % 11;
            if (resto === 10 || resto === 11) resto = 0;
            if (resto !== parseInt(cpf[9])) return false;

            soma = 0;
            for (let i = 0; i < 10; i++) {
                soma += parseInt(cpf[i]) * (11 - i);
            }
            resto = (soma * 10) % 11;
            if (resto === 10 || resto === 11) resto = 0;
            if (resto !== parseInt(cpf[10])) return false;

            return true;
        }
    </script>

    <?php
    $nome = isset($_POST['nome']) ? $_POST['nome'] : null;
    $email = isset($_POST['email']) ? $_POST['email'] : null;
    $cpf = isset($_POST['cpf']) ? $_POST['cpf'] : null;
    $bandeira = isset($_POST['bandeira']) ? $_POST['bandeira'] : null;

    if ($nome === null) return;

    echo "<h2>Dados:</h2> Nome: $nome<br> E-mail: $email<br> CPF: $cpf<br> Bandeira: $bandeira";
    ?>
</body>
</html> 