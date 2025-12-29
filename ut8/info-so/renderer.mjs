const $ = (selector) => document.querySelector(selector)
const $info = $("#info")
const $boton = $("button")
$boton.addEventListener("click", ()=>{
    $info.innerHTML = ""
    const lista = document.createElement("ul")
    const platform = document.createElement("li")
    const arch = document.createElement("li")
    const hostname = document.createElement("li")
    const type = document.createElement("li")
    const release = document.createElement("li")
    const totalmem = document.createElement("li")
    const freemem = document.createElement("li")
    const cpus = document.createElement("li")

    platform.innerHTML = `Plataforma: ${window.os.platform()}`
    arch.innerHTML = `Arquitectura: ${window.os.arch()}`
    hostname.innerHTML = `Nombre del sistema: ${window.os.hostname()}`
    type.innerHTML = `Tipo de SO: ${window.os.type()}`
    release.innerHTML = `Versión de kernel: ${window.os.release()}`
    totalmem.innerHTML = `Memoria total: ${window.os.totalmem()/1024}MB`
    freemem.innerHTML = `Memoria libre: ${window.os.freemem()/1024}MB`
    cpus.innerHTML = `Número de núcleos: ${window.os.cpus().length}`

    lista.appendChild(platform)
    lista.appendChild(arch)
    lista.appendChild(hostname)
    lista.appendChild(type)
    lista.appendChild(release)
    lista.appendChild(totalmem)
    lista.appendChild(freemem)
    lista.appendChild(cpus)

    $info.appendChild(lista)

})