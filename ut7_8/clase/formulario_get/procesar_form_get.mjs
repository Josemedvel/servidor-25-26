import express from "express"

const PORT = 3000
const app = express()


app.get("/procesar-login", (req, res) => {
    const {username, password, number} = req.query
    if(!username || !password || !number){
        return res.status(500).send("Faltan datos")
    }
    console.log(username.trim(), password.trim(), number)
    
    const valorNumero = Number(number)
    if(isNaN(valorNumero)){
        return res.status(500).send("No es un número")
    }

    if(!username.trim() || !password.trim()){
        return res.status(500).send("No pueden ser datos vacíos")
    }
    res.send(`Hola ${username}, tu contraseña es ${password}, el cuadrado del número es ${valorNumero**2} `)
})

app.listen(PORT, ()=> {
    console.log("Iniciamos")
})