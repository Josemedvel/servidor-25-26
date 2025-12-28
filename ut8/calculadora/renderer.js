const $ = (selector) => document.querySelector(selector)
const $$ = (selector) => document.querySelectorAll(selector)

$botones = $$("button")
$pantalla = $("#pantalla")

$botones.forEach(b => {
    b.addEventListener("click", pulsado)
});

function pulsado(event){
    //console.log(event.target)
    const simbolo = event.target.innerHTML
    if(simbolo == "C"){ // limpiar expresión
        $pantalla.innerHTML = ""
    }else if(simbolo == "="){ // calculamos el resultado
        const expresion = $pantalla.innerHTML.replaceAll("x", "*")
        let resultado = ""
        try{
            resultado = eval(expresion)
            console.log(typeof resultado, resultado)
        }catch(error){
            resultado = `ERROR:${error}`
        }
        $pantalla.innerHTML = resultado
    }else{ // cualquier otra cosa, es un número u operador normal
        $pantalla.innerHTML += simbolo
    }
}
