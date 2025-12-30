import {app, BrowserWindow} from "electron"
import path from "path"

const crearVentana = () => {
    const ventana = new BrowserWindow({
        height: 800,
        width: 600,
        webPreferences: {
            preload: path.join(path.resolve("."), "preload.mjs"),
            contextIsolation: true,
            nodeIntegration: false,
            sandbox: false,
        }
    })
    ventana.loadFile("index.html")
}

app.whenReady().then(() => {
    crearVentana()
})