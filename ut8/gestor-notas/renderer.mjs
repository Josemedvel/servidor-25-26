const $ = (selector) => document.querySelector(selector)
const $nuevaNotaBtn = $("#add-note")

$nuevaNotaBtn.addEventListener("click", (event) => {
    // se abre una ventana de escritura
    console.log("Botón clicado")
    window.api.abrirEditor()
})