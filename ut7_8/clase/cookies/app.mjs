import express from "express"
import cookieParser from "cookie-parser"

const PORT = 3000
const app = express()

app.use(cookieParser())

app.get("/leer-cookie", (req, res) => {
    const valCookie = req.cookies["hola"]
    const valDatos = req.cookies["datos"]
    res.json(valDatos)
})

app.get("/borrar-cookie", (req, res) => {
    res.cookie("datos", "", {maxAge:0})
    .send("cookie borrada")
})

app.get("/escribir-cookie", (req, res) => {
    res.cookie("hola", "mundo", {expire:0})
    .cookie("datos", {nombre:'Fernando', apellidos:'Ortega'}, {maxAge: 3600 * 1000 * 2})
    .send("Cookie guardada")
})


app.listen(PORT, () => console.log("ESCUCHANDO EN", PORT))