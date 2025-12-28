let a = 10;
/*export function suma(a, b){
    console.log(a + b);
}
export {a}
*/
function suma(a, b){
    console.log(a + b);
}
function resta(a, b){
    console.log(a - b);
}
export default {
    "a" : a,
    "adicion": suma,
    "sustraer": resta
}