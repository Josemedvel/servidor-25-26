import express from "express"
import session from "express-session"
import cookieParser from "cookie-parser"


const PORT = 3000
const app = express()

app.use(express.json())
app.use(express.urlencoded({ extended: true }))
app.use(cookieParser())
app.use(session({
    secret: "secreto",
    resave: false,
    saveUninitialized: true,
    cookie: { maxAge: 1000 * 60 * 30 } //30 minutos
}))

app.get("/guardar-nombre", (req, res) => {
    req.session.nombre = "Jose"
    res.send("nombre guardado de forma segura")
})

app.get("/guardar-apellido", (req, res) => {
    req.session.apellido = "Medina"
    res.send("apellido guardado de forma segura")
})

app.get("/leer-session", (req, res) => {
    const datos = req.session
    console.table(datos)
    if(datos.nombre && datos.apellido){
        return res.send(`La información de sesión es:${datos.nombre}, ${datos.apellido}`)
    }
    res.send("Falta información de sesión")
})

app.listen(PORT, () => {
    console.log("SERVIDOR ESCUCHANDO EN", PORT)
})