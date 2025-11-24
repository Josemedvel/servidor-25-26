import express from "express"

// inicialización del server
const PORT = 5000
const app = express()

// gestión de rutas
app.get("/", (req, res) => {
    res.send("hola")
})

app.get("/usuario/:usuario", (req, res) => {
    const user = req.params.usuario
    res.send(`Hola, ${user}`)
})

// escucha
app.listen(PORT, ()=>{
    console.log("EL SERVIDOR ESTÁ ESCUCHANDO EN", PORT)
})