import express from "express"
import path from "path"

let currentPath = path.resolve(".")
console.log(currentPath)

let port = 3000

let app = express()

app.get("/archivo", (req, res) =>{
    let rutaApp = path.join(currentPath, "app.mjs")
    res.sendFile(rutaApp)
})

app.get("/descarga", (req, res) =>{
    let rutaApp = path.join(currentPath, "app.mjs")
    res.download(rutaApp)
})

app.get("/:funcion/:cliente", (req, res) => {
    let nombreCliente = req.params.cliente
    let funcion = req.params.funcion
    let respuesta = ""
    switch(funcion){
        case "saludo":
            respuesta = `<h1>Bienvenido/a ${nombreCliente}</h1>`
            break;
        case "cuenta":
            let saldo = 0
            if(nombreCliente.length >= 5){
                saldo = 3000
            }else{
                saldo = 5000
            }
            respuesta = `La cuenta de ${nombreCliente} tiene ${saldo}€`
            break;
        default:
            respuesta = `[${funcion}] no es una función aceptada`
    }
    res.send(respuesta)
})

app.get("/info", (req, res) => {
    let datos = {
        'nombre' : 'Valentín',
        'apellidos' : 'Romero Isidoro',
        'telefono' : '631587326',
        'email' : 'valen85@hotmail.com'
    }
    res.json(datos)
})



app.get("/contacto{:s}", (req, res) =>{
    console.log(req)
    let ip = req.ip

    res.send(`contacto desde ${ip}`)
})


app.get('/{*splat}', (req, res)=>{
    console.log("has intentado entrar en la raíz")
    res.sendStatus(200)
})



app.listen(port, () => {
    console.log("Servidor iniciado");
})