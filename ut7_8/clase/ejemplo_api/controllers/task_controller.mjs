import RepoTask from "../repositories/task_repository.mjs"

async function crearPost(req, res){
    const datosPost = req.body.tarea
    if(datosPost){
        const error = await RepoTask.crearPost(datosPost)
        // ha terminado
        if(error){
            res.status(500).send("Error en el repositorio: ", error)
        }else{
            res.sendStatus(200)
        }
    }else{
        res.json({
            resultado: "Error",
            erro: "No se ha enviado el texto de la tarea"
        })
    }
}


export default {
    crearPost: crearPost
}