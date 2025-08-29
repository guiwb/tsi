function check() {
    const txt = document.querySelector("input[name=text]").value;

    const isPalindrome = txt === txt.split("").reverse().join("");

    document.getElementById("result").innerHTML = `
        <p>Comprimento: ${txt.length}<p>
        <p>É palíndromo: ${isPalindrome}<p>
    `;
}