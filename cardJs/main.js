'use strict'

const bd = [
    {
        id: 1, 
        nome: 'Fullmetal Alchemist Vol.1',  
        preco: 32.90,
        vol: 'Vol.1', 
        imagem: './img/fullmetalVol1.png'
    },
    {
        id: 2, 
        nome: 'Chaisaw men Vol.1',  
        preco: 27.50,
        vol: 'Vol.1',  
        imagem: './img/chaisawManVol1.png'
    },
    {
        id: 3, 
        nome: 'Black Clover Vol.24',  
        preco: 27.50,
        vol: 'Vol.24', 
        imagem: './img/BlackCloverVol24.png'
     }

]
const criarCard = (produtos) => {
    
    const card = document.createElement('div')
    card.classList.add('card')
    card.innerHTML= 
    `
    <div class="card">
    <div class="card-imagem-container">
    <img src="${produtos.imagem}" alt="Manga" class="card-image">
    </div class="textCardStyle">
    <span class="card-nome">
        ${produtos.nome}
    </span>
    <span class="card-preco">
        ${produtos.preco}
    </span>
    
 
    `

    return card
}

const carregarProdutos = (produtos) => {
    const container = document.querySelector('.cardStyle')
    const cards = produtos.map(criarCard)

    container.replaceChildren(...cards)
}

carregarProdutos(bd)