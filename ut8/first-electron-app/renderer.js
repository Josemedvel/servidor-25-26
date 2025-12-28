const $ = selector => document.querySelector(selector)

const $button = $("#sumarBtn")
const $count = $("#count")

$button.addEventListener("click", ()=>{
    const count = parseInt($count.innerHTML)
    $count.innerHTML = count + 1 
})