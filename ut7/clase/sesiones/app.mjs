import express from "express"
import cookieParser from "cookie-parser"
import session from "express-session"

const PORT = 3000
const app = express()


app.use(session({
	secret: "Cadena muy secreta",
	resave: false, // no guardar la cookie de nuevo si no hay cambio
	saveUninitialized: true, // guardarla sin inicializar
	cookie: {maxAge: 1000 * 60 * 30} // 30 minutos
}))

app.get("/establecer-sesion", (req, res) => {
    req.session.datos = {nombre: "Mario", email: "mario_bros@gmail.com"}
    res.send("Sesion escrita")
})

app.get("/cambiar-email/:nuevo_email", (req, res) => {
    const nuevoEmail = req.params.nuevo_email
    req.session.datos.email = nuevoEmail
    res.redirect("/leer-sesion")
})

app.get("/leer-sesion", (req, res) => {
    const {datos} = req.session
    res.json(datos)
})

app.listen(PORT, () => {
    console.log("ESCUCHANDO EN", PORT)
})