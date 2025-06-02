function classify() {
    const num = Number(document.querySelector("input[name=number]").value);

    document.getElementById("result").innerHTML = `
        <p>É par: ${num % 2 === 0}<p>
        <p>Classificação: ${num === 0 ? 'zero' : num > 0 ? 'positivo' : 'negativo'}<p>
    `;
}