import './bootstrap';
let luna = document.getElementById('luna')

    luna.addEventListener('click', cambioDeColor)


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