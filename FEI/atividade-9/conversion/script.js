function compare() {
    const txt1 = convert(document.querySelector("input[name=txt1]").value);
    const txt2 = convert(document.querySelector("input[name=txt2]").value);

    document.getElementById("result").innerHTML = `
        <p>Tipo 1: ${typeof txt1}<p>
        <p>Tipo 2: ${typeof txt2}<p>
        <p>Igualdade: ${txt1 == txt2}<p>
        <p>Igualdade Estrita: ${txt1 === txt2}<p>
    `;
}

function convert(value) {
    if (value === "true" || value === "false") {
        return value === "true";
    } else if (!isNaN(value)) {
        return Number(value);
    } else {
        return String(value);
    }
}