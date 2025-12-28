import express from "express"

const router = express.Router()

router.get("/login", (req, res) => {
    res.send("Bienvenido al login")
})

export default router