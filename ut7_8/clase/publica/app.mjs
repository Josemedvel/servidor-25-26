import express from "express"
import path from "path"

const PORT = 3000
const app = express()
const dirname = path.resolve(".")


app.use(express.static(path.join(dirname, "clase", "publica", "public")))

app.listen(PORT, () => console.log("ESCUCHANDO EN", PORT))