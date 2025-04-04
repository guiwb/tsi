const items = document.querySelectorAll("video")

document.addEventListener("dragstart", (e) => {
    e.target.classList.add("dragging")
})

document.addEventListener("dragend", (e) => {
    e.target.classList.remove("dragging")
})

items.forEach((item) => {
    item.addEventListener("dragover", (e) => {
        const dragging = document.querySelector(".dragging")
        const applyAfter = getNewPosition(e.clientX)

        if (applyAfter) {
            applyAfter.insertAdjacentElement("afterend", dragging)
        }
    })
})

function getNewPosition(posX) {
    const cards = document.querySelectorAll("video:not(.dragging)")
    let result

    for (let refer_card of cards) {
        const box = refer_card.getBoundingClientRect()
        const boxCenterX = box.x + box.width / 2

        if (posX >= boxCenterX) result = refer_card
    }

    return result
}

function save(e) {
    e.preventDefault()
    const data = new FormData(e.target)
    const dataObject = Object.fromEntries(data.entries())
    localStorage.formData = JSON.stringify(dataObject)
    alert("Informações recebidas com sucesso!")
    document.querySelector('form').reset()
}