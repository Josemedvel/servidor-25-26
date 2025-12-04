import express from "express"
import rutasTask from "./routes/task_routes.mjs"
import cors from "cors"

const PORT = 3000
const app = express()

app.use(express.json())
app.use(express.urlencoded({extended: true}))
app.use(cors())
app.use(rutasTask)


app.listen(PORT, () => console.log("ESCUCHANDO EN", PORT))