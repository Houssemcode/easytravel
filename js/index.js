
let navMenu = document.querySelector('.nav__menu');
let burgerImg = document.querySelector('.brgr');
let closeImg = document.querySelector('.close');

function createBurgerMenu() {
    burgerImg.addEventListener('click', () => {
        burgerImg.style.display = "none";
        closeImg.style.display = "block"
        navMenu.classList.toggle('menu-toggle');
    })
    closeImg.addEventListener('click', () => {
        burgerImg.style.display = "block";
        closeImg.style.display = "none";
        navMenu.classList.toggle('menu-toggle');
    })
}

createBurgerMenu();;