function format() {
    const date = new Date(document.querySelector("input[name=date]").value+"T00:00:00");

    if (!date.getTime()) {
        document.getElementById("result").innerHTML = `
            <p>Data inválida. Por favor, insira uma data válida no formato YYYY-MM-DD.</p>
        `;
        return;
    }

    const dateTimeFormat1 = new Intl.DateTimeFormat("pt-BR");

    document.getElementById("result").innerHTML = `
        <p>Data formatada: ${dateTimeFormat1.format(date)}<p>
    `;
}