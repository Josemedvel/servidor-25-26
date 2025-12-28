import RepoTask from "../repositories/task_repository.mjs"

async function crearPost(req, res) {
    const datosPost = req.body.tarea
    if (datosPost) {
        const error = await RepoTask.crearPost(datosPost)
        // ha terminado
        if (error) {
            res.status(500).send("Error en el repositorio: ", error)
        } else {
            res.sendStatus(200)
        }
    } else {
        res.json({
            resultado: "Error",
            erro: "No se ha enviado el texto de la tarea"
        })
    }
}

async function buscarTareaPorId(req, res) {
    const id = req.params.id

    if (id && id.trim()) {
        const numId = Number(id)
        if (!isNaN(numId)) {
            const tarea = await RepoTask.buscarTareaPorId(numId)
            // ha terminado
            if (!tarea) {
                res.status(500).send("Error en el repositorio: no se ha encontrado tareas con ese id")
            } else {
                tarea.printBasico()
                res.json(tarea)
            }
        }else{
            res.status(500).send("El id de la tarea debe ser un entero positivo")
        }
    }else{
        res.status(500).send("No se ha enviado el id de la tarea")
    }
}

async function buscarTareas(req, res){
    const resultado = await RepoTask.buscarTareas()
    if(resultado){
        res.json(resultado)
    }else{
        res.status(500).send("Error en el repositorio: no se ha encontrado tareas")
    }
}


    export default {
        crearPost,
        buscarTareaPorId,
        buscarTareas
    }