import express from "express"
import taskController from "../controllers/task_controller.mjs"

const router = new express.Router()

router.post("/crear", taskController.crearPost)

export default router