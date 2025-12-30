const $ = (selector) => document.querySelector(selector)

const $guardarNotaBtn = $("#save-note")
const $notaH1 = $("#note-heading")
const $notaTextArea = $("#note-text")


$guardarNotaBtn.addEventListener("click", () => {
    const tituloNota = $notaH1.value
    const textoNota = $notaTextArea.value
    if(!tituloNota || !tituloNota.trim() || !textoNota || !textoNota.trim()){
        alert("Los campos no puedes estar vacíos o ser espacios")
        return
    }
    window.api.guardarNota({titulo:tituloNota, texto:textoNota})
})