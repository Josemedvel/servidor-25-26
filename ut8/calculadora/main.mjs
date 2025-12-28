import {app, BrowserWindow} from "electron"

const showCalculator = () => {
    const calculator = new BrowserWindow({
        width: 600,
        height: 600,
        minWidth: 600,
        minHeight: 600,
        resizable:false
    })
    calculator.loadFile("calculadora.html")
}


app.on("ready", ()=>{
    showCalculator()
})