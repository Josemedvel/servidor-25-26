export class Task{
    constructor({id, texto, created_at}) {
        this.id = id
        this.texto = texto
        this.created_at = created_at
    }

    printBasico(){
        console.log(`ID:${this.id}, TEXTO:${this.texto}, CREADO_EN: ${this.created_at}`)
    }
}
