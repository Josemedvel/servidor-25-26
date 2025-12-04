import express from "express"
import path from "path"
import taskRoutes from "./routes/task_routes.mjs"

const PORT = 3001
const app = express()
const actualRoute = path.resolve(".")


app.set("view engine", "ejs")
app.set("views", path.join(actualRoute, "clase", "ejemplo_web", "views"))

app.use(express.static(path.join(actualRoute, "clase", "ejemplo_web","public")))
app.use(taskRoutes)

app.listen(PORT, ()=>console.log("ESCUCHANDO EN", PORT))