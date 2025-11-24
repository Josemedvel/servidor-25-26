import express from "express"
import loginRouter from "./routes/login.mjs"
import registerRouter from "./routes/register.mjs"


const PORT = 3000
const app = express()

app.use("/users", loginRouter)
app.use(registerRouter)

app.get("/{*splat}", (req, res) => {
    res.send("hola")
})

app.listen(PORT, (req, res) => {
    console.log("SERVIDOR ESCUCHANDO EN", PORT)
})