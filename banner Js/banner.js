'use strict';

const images = [
    { 'id': '1', 'url':'./img/banner1.png' },
    { 'id': '2', 'url':'./img/banner2.png' },
    { 'id': '3', 'url':'./img/banner3.png' },

]

const containerItems = document.querySelector('#container-items');

const loadImages = ( images, container ) => {
    images.forEach ( image => {
        container.innerHTML += `
            <div class='itemBanner'>
                <img src='${image.url}'
            </div>
        `
    })
}
////////////////////////////////////////////////////////////
// const ligarAutomatico = () =>{
//     if (interval == null) {
//         interval = setInterval(() => next(items[0]), 1000);
//         automatico.textContent = "Parar";
////////////////////////////////////////////////////////////

loadImages( images, containerItems );

let items = document.querySelectorAll('.itemBanner');

const previous = () => {
    containerItems.appendChild(items[0]);
    items = document.querySelectorAll('.itemBanner');
}

const next = () => {
    const lastItem = items[items.length - 1];
    containerItems.insertBefore( lastItem, items[0] );
    items = document.querySelectorAll('.itemBanner');
}

document.querySelector('#previous').addEventListener('click', next);
document.querySelector('#next').addEventListener('click', previous);