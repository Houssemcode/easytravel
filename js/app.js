'use strict'

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

// Input type "range" display

let priceRange = document.querySelector('#range');
let priceDisplay = document.querySelector('.price');

function displayPrice() {
    priceDisplay.textContent = `${priceRange.value}$`;
}
priceRange.addEventListener('change', displayPrice);

// Accordion

let accordionText = document.querySelectorAll('.block__info-faq');
let accordionTitles = document.querySelectorAll('.block__title-accordion');
let activeIcons = document.querySelectorAll('.accordion__block');

accordionTitles.forEach((title) => {
    title.addEventListener('click', () => {
        accordionText.forEach((text) => {
            if (text.getAttribute('data-text') == title.getAttribute('data-text') && text.classList.contains('block__info-hidden')) {
                text.classList.remove('block__info-hidden');
            } else {
                text.classList.add('block__info-hidden');
            }
        })
        changeIcon();
    })
})

function changeIcon() {
    accordionText.forEach((text) => {
        if (text.classList.contains('block__info-hidden')) {
            activeIcons.forEach((icon) => {
                if (text.getAttribute('data-text') == icon.getAttribute('data-text')) {
                    icon.classList.remove('hidden');
                }
            })
        } else {
            activeIcons.forEach((icon) => {
                if (text.getAttribute('data-text') == icon.getAttribute('data-text')) {
                    icon.classList.add('hidden');
                }
            })
        }
    })
}

// Filter

let book = document.querySelectorAll('.tour');
let checkboxes = document.querySelectorAll('.tools__input');
let filterBtn = document.querySelector('.tools__btn');
let resetBtn = document.querySelector('.reset');

function displayTourbyDestination() {
    book.forEach((tour) => {
        for (let i = 0; i < checkboxes.length; i++) {
            if (checkboxes[i].checked === true) {
                if (checkboxes[i].getAttribute('data-destination') != tour.getAttribute('data-destination')) {
                    tour.classList.add('hidden-tour');
                }
                else {
                    tour.classList.remove('hidden-tour');
                }
            }
        }
    })
}

function filterTour() {
    for (let checkbox of checkboxes) {
        book.forEach((tour) => {
            if (checkbox.checked) {
                if (checkbox.getAttribute('data-destination') != tour.getAttribute('data-destination')) {
                    tour.classList.add('hidden-tour');
                }
                else if (checkbox.getAttribute('data-destination') == tour.getAttribute('data-destination')) {
                    tour.classList.remove('hidden-tour');
                }
            }
            else if (!checkbox.checked) {
                if (checkbox.getAttribute('data-destination') == tour.getAttribute('data-destination')) {
                    tour.classList.add('hidden-tour');
                }
            }
        })
    }
}

filterBtn.addEventListener('click', () => {
    displayTourbyDestination();
})

resetBtn.addEventListener('click', () => {
    book.forEach((tour) => {
        tour.classList.remove('hidden-tour')
    })
    checkboxes.forEach((checkbox) => {
        checkbox.checked = false;
    })
})


















