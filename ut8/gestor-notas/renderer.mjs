const $ = (selector) => document.querySelector(selector)
const $nuevaNotaBtn = $("#add-note")
const $notasContainer = $(".notas")



$nuevaNotaBtn.addEventListener("click", (event) => {
    // se abre una ventana de escritura
    console.log("Botón clicado")
    window.api.abrirEditor()
})

const renderNotas = (notas) => {
    $notasContainer.innerHTML = ""
    notas.forEach(nota => {
        const div = document.createElement("div")
        div.className = "nota"
        div.innerHTML = `
            <h3>${nota.titulo}</h3>
            <p>${nota.texto}</p>
            <small>${nota.fecha}</small>
        `
        $notasContainer.appendChild(div)
    })
}
window.api.onNotesUpdated(renderNotas)