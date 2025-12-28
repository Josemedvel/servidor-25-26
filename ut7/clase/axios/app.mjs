import axios from "axios"

async function getBroma() {
    const respuesta = await axios.get("https://icanhazdadjoke.com/slack")
    if (respuesta) {
        return {
            chiste : respuesta.data.attachments[0].fallback
        }
    }
}
const broma = await getBroma()
console.log(broma)
/*const datos = axios.get("https://icanhazdadjoke.com/slack")
datos.then(response => {
        console.log(response.data.attachments[0].fallback)   
}) 
datos.catch(err => {
    if(err){
        console.error(err.message)
    }
})
*/
