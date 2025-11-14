import os from "os"
console.log(os.platform())

let num = 3
const numero = 1
const apellidos = 'medina'
console.log(numero + apellidos)
let array = new Array(1,2,3)
let array_2 = [1,2,3]
console.log(array_2)

/*for(let i = 0; i < array_2.length; i++){
    console.log(array_2[i])
}*/
function cada_numero(num){
    console.log(num)
}
array.forEach(num => {
    console.log(num)
    console.log(-num)
})
array_2.forEach(cada_numero)


function saludo(){
    console.log("hola")
}
setInterval(saludo, 1000)
set