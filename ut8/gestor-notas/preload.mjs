import { contextBridge, ipcRenderer } from "electron";

contextBridge.exposeInMainWorld("api", {
    abrirEditor: () => ipcRenderer.send("open-editor"),
    guardarNota: ({titulo, texto}) => ipcRenderer.send("save-note", {titulo, texto})
})