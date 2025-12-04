import express from "express"
import TaskController from "../controllers/task_controller.mjs"


const router = new express.Router()

router.get("/buscar-por-id", TaskController.buscarPorId)

export default router