import express from "express"

const router = express.Router()

router.get("/login", (req, res) => {
    res.send("Inicia sesión")
})
router.post("/login", (req, res) => {
    const {username, password} = req.body
    res.send(`Hola, ${username}, tu contraseña es ${password}`)
})

export default router


