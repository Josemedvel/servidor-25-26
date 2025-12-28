import express from "express"
import {Pool} from "pg"

const app = express()
const PORT = 3000

const pool = new Pool({
    user: process.env.DB_USER,
    host: process.env.DB_HOST,
    database: process.env.DB_NAME,
    password: process.env.DB_PASSWORD,
    port: process.env.DB_PORT,
    max: 20, // este es nuestro máximo de conexiones
    idleTimeoutMillis: 30000,
    connectionTimeoutMillis: 2000,
})

app.get("/", async (req, res) => {
    await pool.query("")
})