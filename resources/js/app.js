import './bootstrap';
let luna = document.getElementById('luna')

    luna.addEventListener('click', cambioDeColor)

function cambioDeColor(){
    const element = document.documentElement
    element.classList.toggle('dark')
}


