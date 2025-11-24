import express from "express"
import cookieParser from "cookie-parser"

const PORT = 3000
const app = express()

app.use(express.json())
app.use(express.urlencoded({extended: true}))
app.use(cookieParser())

app.get("/cookie", (req, res) => {
    res.cookie("hola", "mundo", {expires:0})
    .send("Cookie escrita")
})

app.get("/leer-cookie", (req,res) => {
    const cookies = req.cookies
    console.table(cookies)
    if(!cookies.hola){
        return res.redirect("/")
    }
    res.send(`Cookie leída ${cookies.hola}`)
})

app.get("/", (req, res) => {
    if(req.params.error){
        return res.send(`HA HABIDO UN ERROR:${req.params.error}`)
    }
    res.send("Bienvenido a la página principal")
})

app.listen(PORT, (req, res) => {
    console.log("SERVIDOR ESCUCHANDO EN", PORT)
})