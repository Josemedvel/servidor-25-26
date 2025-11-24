import express from "express"

export const router = express.Router()

router.get("/cinco", (req, res) => {
    res.send(5)
})
router.get("/saludo", (req, res) => {
    res.send("Buenas tardes")
})
