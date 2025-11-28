import express from "express"
import session from "express-session"
import path from "path"

const PORT = 3000
const app = express()

app.use(session({
    secret: "Cadena muy secreta",
	resave: false, // no guardar la cookie de nuevo si no hay cambio
	saveUninitialized: true, // guardarla sin inicializar
	cookie: {maxAge: 1000 * 60 * 30} // 30 minutos
}))

app.set("view engine", "ejs")
app.set("views", path.join(path.resolve("."), "clase", "uso_vistas", "views"))

app.get("/nuevo-nombre/:nombre", (req, res) => {
    const {nombres} = req.session
    const nombre = req.params.nombre
    if(!nombres){
        req.session.nombres = [nombre]
    }else{
        req.session.nombres.push(nombre)
    }
    res.redirect("/tabla")
})


app.get("/tabla", (req, res) => {
    if(!req.session.nombres){
        req.session.nombres = []
    }
    const nombres = req.session.nombres
    res.render("tabla.ejs", {nombres: nombres})
})

app.get("/gatos", (req, res) => {
    const rutasGatos = [
        "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQybjWJCtN9n2hjeJNz_uEw_OyuFMKL5qc9FQ&s",
        "https://i.pinimg.com/736x/a3/02/8c/a3028ca2d8b5583dc4773a65bd1b55d7.jpg",
        "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSsOkDpL1o7uYAVkwWx8H7B5223-9DktKmNlA&s"
    ]
    res.render("partials/carrusel.ejs", {fotos: rutasGatos})
})

app.listen(PORT, () => {
    console.log("ESCUCHANDO EN", PORT)
})