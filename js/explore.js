
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

$('.slider2').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: false,
    fade: true,
    asNavFor: '.slider1'
});
$('.slider1').slick({
    slidesToShow: 3,
    slidesToScroll: 1,
    asNavFor: '.slider2',
    dots: false,
    arrows: true,
});

