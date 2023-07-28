import './bootstrap';
let luna = document.getElementById('luna')

    luna.addEventListener('click', cambioDeColor)

    
let categories = [
    { name: 'Coches', icon: `<i class="bi bi-car"></i>` },
    { name: 'Motos', icon: `<i class="fa fa-motorcycle"></i>` },
    { name: 'Hogar', icon: `<i class="fa fa-socks"></i>` },
    { name: 'Electrónica', icon: `<i class="fa fa-dumbbell"></i>` },
    { name: 'Moviles', icon: `<i class="fa fa-leaf"></i>` },
    { name: 'Ordenadores', icon: `<i class="fa fa-bed"></i>` },
]

let contenedorCategories= document.querySelector('.lista_categorias')

function cambioDeColor(){
    const element = document.documentElement
    element.classList.toggle('dark')
}





categories.forEach(element =>{
    let article= document.createElement('article')

    article.classList.add('main_article')

    article.innerHTML= `
    ${element.icon}
    <h4>${element.name}</h4>
    <span>${element.count} anuncios</span>
    `
    contenedorCategories.appendChild(article)
})