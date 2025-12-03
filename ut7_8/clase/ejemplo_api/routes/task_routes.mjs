import express from "express"
import taskController from "../controllers/task_controller.mjs"

const router = new express.Router()

router.post("/crear", taskController.crearPost)
router.get("/buscar-por-id/:id", taskController.buscarTareaPorId)

export default router