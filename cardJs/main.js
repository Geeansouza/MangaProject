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
    //,
    // {
    //     id: 4, 
    //     nome: 'Teclado Gamer', 
    //     descricao: "Microfone Kingston HyperX QuadCast USB", 
    //     avaliacao: 3,  
    //     preco: 100.00, 
    //     parcelamento: 'ou 10x de 99.99 sem juros',
    //     imagem: './img/teclado-gamer-standard.png'
    // },
    // {
    //     id: 5, 
    //     nome: 'Mousepad Gamer', 
    //     descricao: "Microfone Kingston HyperX QuadCast USB", 
    //     avaliacao: 3,  
    //     preco: 100.00, 
    //     parcelamento: 'ou 10x de 99.99 sem juros',
    //     imagem: './img/mousepad-gamer.png'
    // },
    // {
    //     id: 6, 
    //     nome: 'Microfone Kingston', 
    //     descricao: "Microfone Kingston HyperX QuadCast USB", 
    //     avaliacao: 5,  
    //     preco: 77.90, 
    //     parcelamento: 'ou 10x de 99.99 sem juros',
    //     imagem: './img/microfone_kingston_hyperx_quadcast.png'
    // },
    // {
    //     id: 7, 
    //     nome: 'Monitor AOC', 
    //     descricao: "Monitor Gamer Curvo 240Hz Full HD 27” AOC", 
    //     avaliacao: 3,  
    //     preco: 2500, 
    //     parcelamento: 'ou 10x de 250 sem juros',
    //     imagem: './img/monitor_gamer_curvo.png'
    // }

]

const definirAvaliacao = (valor) =>{
    const estrelaCheia = valor
    const estrela = 5 - valor

    return "&starf;".repeat(estrelaCheia) + "&star;".repeat(estrela)
    
}

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