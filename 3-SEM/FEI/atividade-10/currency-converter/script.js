function convert() {
    const num = parseFloat(document.querySelector("input[name=value]").value);

    if (isNaN(num)) {
        document.getElementById("result").textContent = "Por favor, insira um número válido.";
        return;
    }

    const result = num * 5.67;

    document.getElementById("result").textContent = `Valor em Reais: R$ ${result.toFixed(2)}`;
}