function calculate() {
    const date = new Date(document.querySelector("input[name=birthday]").value);
    const age = new Date().getFullYear() - date.getFullYear();

    if(isNaN(age) || age < 0) {
        document.getElementById("result").innerHTML = `
            <p>Data inválida. Por favor, insira uma data de nascimento válida.<p>
        `;
        return;
    }

    document.getElementById("result").innerHTML = `
        <p>Sua idade é: ${age}<p>
    `;
}