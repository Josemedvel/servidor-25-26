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

async function buscarTareaPorId(id){
    const client = await pool.connect()
    let result = ""
    try{
        result = await client.query(`SELECT * FROM tareas WHERE id=${id}`)
    }catch(err){
        console.error("Error en la creación del post",err.message)
        result = err.message
    }finally{
        client.release()
    }
    return result.rows
}


export default {
    crearPost,
    buscarTareaPorId
}