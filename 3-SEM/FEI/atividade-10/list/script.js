function add() {
    const list = document.querySelector("ul");
    const li = document.createElement("li");
    const value = document.querySelector("input[name=value]").value;

    if(!value) {
        alert("Informe um valor para o item");
        return;
    }

    li.id = `item-${list.children.length + 1}`;
    li.innerHTML = `
        <input type="checkbox" id="${li.id}-checkbox" oninput="check('${li.id}')" />
        <label for="${li.id}-checkbox">${value}</label>
        <button onclick="remove('${li.id}')">Remover</button>
    `;
    list.appendChild(li);

    document.querySelector("input[name=value]").value = "";
}

function remove(id) {
    document.getElementById(id).remove();
}

function cleanup() {
    document.querySelector("ul").innerHTML = "";
}

function check(id) {
    document.getElementById(id).classList.toggle("checked");
}