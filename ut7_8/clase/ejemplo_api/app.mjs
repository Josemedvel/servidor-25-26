import express from "express"
import rutasTask from "./routes/task_routes.mjs"

const PORT = 3000
const app = express()

app.use(express.json())
app.use(express.urlencoded({extended: true}))
app.use(rutasTask)


app.listen(PORT, () => console.log("ESCUCHANDO EN", PORT))