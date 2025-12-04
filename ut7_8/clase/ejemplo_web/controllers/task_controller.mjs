import axios from "axios"

class TaskController{
    constructor(){
        this.client = axios.create(
            {
                baseURL: "http://localhost:3000"
            }
        )
    }
    async buscarPorId(req, res){
        const {id} = req.query
        if(id.trim()){
            const datos = await axios.get(`http://localhost:3000/buscar-por-id/${id}`)
            if(datos.data){
                console.log(datos)
                res.render("tarea.ejs", {tarea: datos.data})
            }else{
                res.sendStatus(404)
            }
        }else{
            res.sendStatus(304)
        }
    }
}

export default new TaskController()