import express from "express"
import routerLogin from "./routes/loginRoutes.mjs"
import { router as routerData} from "./routes/dataRoutes.mjs"
import { logger } from "./middlewares/logging.mjs"


const PORT = 3000
const app = express()

app.use(express.json())
app.use(express.urlencoded({extended:true}))
app.use(logger)
app.use("/api", routerData)
app.use(routerLogin)

app.listen(PORT, ()=>console.log("INICIAMOS", PORT))