import {app, BrowserWindow} from "electron"
import path from "path"
import { fileURLToPath } from "url"

const __filename = fileURLToPath(import.meta.url)
const __dirname = path.dirname(__filename)

const crearVentana = () => {
    console.log(path.join(__dirname,"preload.js"))
    const ventana = new BrowserWindow({
        width: 800,
        height: 600,
        minHeight:400,
        minWidth: 600,
        // muy importante estas propiedades
        //contextIsolation: true hace que no se pueda acceder a Node.js directamente desde el renderer, solo se accede a lo
        //      que se exponga desde el contextBridge
        //nodeIntegration: false hace que no se pueda usar require en renderer
        //sandbox:false hace que el preload pueda usar módulos de Node.js
        webPreferences: {
            preload: path.join(__dirname,"preload.mjs"),
            contextIsolation:true,
            nodeIntegration: false,
            sandbox:false
        }
    })
    ventana.loadFile("index.html")
}


app.whenReady().then(()=>{
    crearVentana()
})