import express from "express"

const port = 3000

const app = express()

app.get("/inicio_sesion", (req,res) => {
    console.table(req.query)
    res.json(req.query)
})

app.listen(port, ()=>{
    console.log("Servidor escuchando en: ", port)
})
