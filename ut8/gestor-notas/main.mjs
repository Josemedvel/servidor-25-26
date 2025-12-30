import { app, BrowserWindow, ipcMain } from "electron"
import fs from "fs"
import path from "path"

let mainWindow = undefined
let editor = undefined
const rutaNotas = path.join(path.resolve("."), "notas.json")
let notasArray = []

const crearVentanaPrincipal = () => {
    mainWindow = new BrowserWindow({
        height: 800,
        width: 600,
        webPreferences: {
            preload: path.join(path.resolve("."), "preload.mjs"),
            contextIsolation: true,
            nodeIntegration: false,
            sandbox: false,
        }
    })
    conseguirNotas()
    mainWindow.loadFile("index.html").then(() => mainWindow.webContents.send("notes-updated", notasArray))
    mainWindow.on("closed", ()=>{
    mainWindow = undefined
    if(editor){
        editor.close()
    }
})
}

const crearVentanaEditor = () => {
    editor = new BrowserWindow({
        height: 800,
        width: 600,
        parent: mainWindow, // esto hace que el editor sea modal, con respecto la ventana principal
        modal: true,
        show: false,
        webPreferences: {
            preload: path.join(path.resolve("."), "preload.mjs"),
            contextIsolation: true,
            nodeIntegration: false,
            sandbox: false
        }
    })
    editor.loadFile("editor.html")
    editor.once("ready-to-show", () => editor.show())
    editor.on("closed", () => {
        editor = undefined
        if(mainWindow){
            mainWindow.webContents.send("notes-updated", notasArray)
        }
    })
}

const conseguirNotas = () => {
    if(fs.existsSync(rutaNotas)){
        const contenido = fs.readFileSync(rutaNotas, "utf8")
        if(contenido.trim()){
            try{
                notasArray = JSON.parse(contenido)
            }catch(error){
                notasArray = []
            }
        }
    }
}



app.whenReady().then(crearVentanaPrincipal)

ipcMain.on("open-editor", () => {
    if(!editor || editor.isDestroyed()){ // no hay editor
        crearVentanaEditor()
    }else{ // sí lo hay
        editor.show()
    }
})

ipcMain.on("save-note", (event, {titulo, texto}) => {
    const contenido = fs.readFileSync(rutaNotas, "utf8")
    console.log(contenido)
    let notas = []
    try{
        notas = contenido.trim() ? JSON.parse(contenido) : []
    }catch(error){
        notas = []
    }
    notas.push({
        titulo:titulo,
        texto:texto,
        fecha: new Date().toISOString()
    })
    notasArray = notas
    fs.writeFileSync(rutaNotas, JSON.stringify(notas, null, 2), "utf8")
    if(editor && !editor.isDestroyed()){
        editor.close()
    }
    mainWindow.webContents.send("notes-updated", notasArray)
})
