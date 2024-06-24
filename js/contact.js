'use strict'

let navMenu = document.querySelector('.nav__menu');
let burgerImg = document.querySelector('.brgr');
let closeImg = document.querySelector('.close');
let body = document.body;

function createBurgerMenu() {
    burgerImg.addEventListener('click', () => {
        burgerImg.style.display = "none";
        closeImg.style.display = "block"
        navMenu.classList.toggle('menu-toggle');
        body.style.overflow = 'hidden';
    })
    closeImg.addEventListener('click', () => {
        burgerImg.style.display = "block";
        closeImg.style.display = "none";
        navMenu.classList.toggle('menu-toggle');
        body.style.overflow = 'visible';
    })
}

createBurgerMenu();;

// weather api

let apiKey = 'e4f1f2cd3ed2af5a1256401b774b0061';
let url = 'https://api.openweathermap.org/data/2.5/';

let cityInput = document.querySelector('.input');
let cityBtn = document.getElementById('cityBtn');
let locationData = document.querySelector('.location');
let weatherData = document.querySelector('.temp');

let cityInputValue;
let chosenCity;
let chosenCountry;
let temperature;
let state;

function fetchWeather() {
    fetch(`${url}weather?q=${cityInputValue}&units=metric&appid=${apiKey}`)
        .then((response) => {
            return response.json()
        })
        .then((data) => {
            let { name, main, sys, weather } = data;
            chosenCity = name;
            temperature = main.temp.toFixed();
            chosenCountry = sys.country;
            state = weather[0].main;
            locationData.textContent = `${chosenCity}`;
            weatherData.textContent = `${temperature}° C  |  ${state}`;
            toggleWeatherImg();
        })
}

let weatherSection = document.querySelector('.weather');

function toggleWeatherImg() {
    if (state == 'Clouds') {
        weatherSection.classList.toggle('clouds');
    } else if (state == 'Clear') {
        weatherSection.classList.toggle('clear');
    } else if (state == 'Rain') {
        weatherSection.classList.toggle('rain');
    }
}

cityBtn.addEventListener('click', (e) => {
    e.preventDefault();
    cityInputValue = cityInput.value;
    fetchWeather();
    cityInput.value = '';
    toggleWeatherImg();
});

let today = new Date();
let months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
let monthName = months[today.getMonth()];
let date = `${today.getDate()} ${monthName} ${today.getFullYear()}`;
let dateString = document.querySelector('.date');
dateString.innerText = `${date}`;

// Form validation and Sending form data

let emailInput = document.querySelector('#email');
let formInputs = document.querySelectorAll('.form__input');
let textarea = document.querySelector('textarea');
let messageBtn = document.querySelector('.form__btn');
let form = document.getElementById('contactform');
let mailFormat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;

function validateForm() {
    if (emailInput.value == '') {
        emailInput.classList.toggle('error');
        emailInput.setAttribute('placeholder', 'This field is required!');
    } else if (!emailInput.value.match(mailFormat)) {
        emailInput.classList.toggle('error');
        emailInput.setAttribute('placeholder', 'Invalid email Addres!');
    }
    else {
        emailInput.setAttribute('placeholder', 'Email');
        emailInput.classList.remove('error');
    }
}

function clearForm() {
    formInputs.forEach((item) => {
        item.value = '';
    })
    textarea.value = '';
}

async function sendData() {
    let formData = new FormData(form);
    let response = await fetch('form.php', {
        method: 'POST',
        body: formData
    })
    if (response.ok) {
        let result = await response.json();
        console.log(result.message);
    }
}

messageBtn.addEventListener('click', (e) => {
    e.preventDefault();
    validateForm();
    saveUserData();
    sendData();
    clearForm();
})

//Form Data in Local Storage

let mailValue;
let msgValue;

function saveUserData() {
    mailValue = emailInput.value;
    msgValue = textarea.value;
    if (emailInput.value !== '') {
        localStorage.message = msgValue;
        localStorage.email = mailValue;
    }
};


