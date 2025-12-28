import fs from "fs"
const miPromesa = new Promise((resolve, reject) => {
    setTimeout(()=>{resolve("Terminado")}, 2000)
})
console.log(miPromesa)
miPromesa.then(res => console.log(res))

let archivo = fs.readFile("modulo.mjs",'utf8', (data, err) => {
    if(err){
        console.error(err)
    }else{
        return data
    }
})
console.log(archivo)