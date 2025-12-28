async function cuenta(){
    for(let i = 0; i < 99; i++){
        console.log(i);
    }
    return 10;
}

let valor = cuenta();
valor.then(res => console.log(res))
console.log(valor)

