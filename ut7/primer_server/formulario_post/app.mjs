import express from "express"

let port = 3000
let app = express()

app.use(express.urlencoded({extended : true}))
app.use(express.json())

app.post("/inicio_sesion",(req, res) => {
    const datos = req.body
    console.log(datos)
    if(!datos.name || !datos.password){
        return res.status(400).send("Error: faltan datos de formulario")
    }
    if(datos.name.trim() === '' || datos.password.trim() === ''){
        return res.status(400).send("Error: los valores no pueden estar vacíos")
    }
    const cadena = `La información del usuario es: ${datos.name}, ${datos.password}`;
    res.send(cadena)
})

app.listen(port)