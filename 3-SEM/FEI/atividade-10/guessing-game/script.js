let RANDOM_NUM = Math.floor(Math.random() * 100) + 1;

function guess() {
    const num = parseInt(document.querySelector("input[name=value]").value);

    if (isNaN(num)) {
        alert("Por favor, insira um número válido.");
        return;
    }

    if (num === RANDOM_NUM) {
        document.getElementById("result").textContent = "Parabéns! Você acertou!";
        document.getElementById("reset").style.display = "inline";
        document.getElementById("guess").style.display = "none";
    } else if (num < RANDOM_NUM) {
        document.getElementById("result").textContent = "Tente um número maior!";
        document.querySelector("input[name=value]").value = "";
    } else {
        document.getElementById("result").textContent = "Tente um número menor!";
        document.querySelector("input[name=value]").value = "";
    }

}

function reset() {
    RANDOM_NUM = Math.floor(Math.random() * 100) + 1;
    document.getElementById("reset").style.display = "none";
    document.getElementById("guess").style.display = "inline";
    document.getElementById("result").textContent = "";
    document.querySelector("input[name=value]").value = "";
}