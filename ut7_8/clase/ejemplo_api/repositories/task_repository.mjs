import pool from "../config/database.mjs"

async function crearPost(textoTarea){
    const client = await pool.connect()
    let result = ""
    try{
        await client.query(`INSERT INTO tareas (texto) VALUES ('${textoTarea}')`)
    }catch(err){
        console.error("Error en la creación del post",err.message)
        result = err.message
    }finally{
        client.release()
    }
    return result
}

export default {
    crearPost: crearPost
}