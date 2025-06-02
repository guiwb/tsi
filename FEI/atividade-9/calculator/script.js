function calculate() {
    const num1 = parseFloat(document.querySelector("input[name=num1]").value);
    const num2 = parseFloat(document.querySelector("input[name=num2]").value);
    const operation = document.querySelector("select[name=operation]").value;

    if (!num1 || !num2) {
        alert("Por favor, insira números válidos");
        return;
    }

    let result;

    switch (operation) {
        case "add":
            result = num1 + num2;
            break;
        case "subtract":
            result = num1 - num2;
            break;
        case "multiply":
            result = num1 * num2;
            break;
        case "divide":
            if (num2 === 0) {
                alert("Não é possível dividir por zero");
                return;
            }
            result = num1 / num2;
            break;
        default:
            alert("Selecione uma operação válida");
            return;
    }

    document.getElementById("result").innerText = `Resultado: ${result}`;
}