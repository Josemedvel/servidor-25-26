import axios from "axios"

class TaskController{
    constructor(){
        this.client = axios.create(
            {
                baseURL: "http://localhost:3000"
            }
        )
    }
    buscarPorId = async (req, res) => {
        const {id} = req.query
        
        if(!id || !id.trim()){
            return res.status(400).send("Falta el parámetro id")
        }
        
        try {
            const datos = await this.client.get(`/buscar-por-id/${id}`)
            if(datos.data){
                console.log(datos.data)
                res.render("tarea.ejs", {tarea: datos.data})
            } else {
                res.status(404).send("No se encontró la tarea")
            }
        } catch (error) {
            console.error("Error al consumir la API:", error.message)
            res.status(500).send("Error al obtener la tarea")
        }
    }

    buscarTareas = async (req, res) => {
        try{
            const datos = await this.client.get("/tareas")
            if(datos.data){
                res.render("tareas.ejs", {tareas: datos.data})
            }else{
                res.status(404).send("No se han encontrado tareas")
            }
        }catch(error){
            console.error("Error al consumir la API:", error.message)
            res.status(500).send("Error al buscar todas las tareas")
        }
    }
}

export default new TaskController()