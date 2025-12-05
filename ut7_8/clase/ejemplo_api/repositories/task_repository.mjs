import pool from "../config/database.mjs"
import { Task } from "../models/task_model.mjs"

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
    let task = undefined
    let result = ""
    try{
        result = await client.query(`SELECT * FROM tareas WHERE id=${id}`)
    }catch(err){
        console.error("Error en la búsqueda de la tarea",err.message)
        result = err.message
    }finally{
        client.release()
    }
    if(result && result.rows[0]){
        console.log(result.rows[0])
        task = new Task(result.rows[0])
    }
    return task
}

async function buscarTareas(){
    const client = await pool.connect()
    let tasks = undefined
    let result = ""
    try{
        result = await client.query("SELECT * FROM tareas")
    }catch(err){
        console.error("Error en la búsqueda de las tareas",err.message)
        result = err.message
    }finally{
        client.release()
    }
    if(result && result.rows){
        tasks = result.rows.map((e) => new Task(e))
    }
    return tasks
}



export default {
    crearPost,
    buscarTareaPorId,
    buscarTareas
}