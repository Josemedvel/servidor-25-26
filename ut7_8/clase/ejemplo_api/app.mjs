import express from "express"
import rutasTask from "./routes/task_routes.mjs"
import cors from "cors"

const PORT = 3000
const app = express()

app.use(express.json())
app.use(express.urlencoded({extended: true}))
const cors_config = {
    method : ["POST", "PUT", "GET", "DELETE"],
    origin: 'http://127.0.0.1:3001'
 }
app.use(cors(cors_config))
app.use(rutasTask)


app.listen(PORT, () => console.log("ESCUCHANDO EN", PORT))