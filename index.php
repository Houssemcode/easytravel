<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@500;600&family=Work+Sans:wght@400;500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/style.css">
    <title>Easy Travel</title>
    <link rel="mask-icon" href="./img/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    </head>
<body>
    <header class="header">
        <nav class="header__nav nav">
            <div class="nav__logo">
                <a href="./index.php"><img src="./img/easytravel.png" alt=""></a>
            </div>
            <ul class="nav__menu menu">
                <li class="menu__item"><a href="./index.php" class="menu__link">Home</a></li>
                <li class="menu__item"><a href="./index.php#section_about" class="menu__link" id="about">About</a></li>
                <li class="menu__item"><a href="./explore.php" class="menu__link">Explore</a></li>
                <li class="menu__btn"><button class="nav__btn" onclick="window.location.href='login.php'">Login</button></li>
            </ul>
            <button class="burger__btn">
                <img src="./img/burger.svg" alt="" class="brgr">
                <img src="./img/close.svg" alt="" class="close">
            </button>
        </nav>
        <div class="header__banner banner">
            <h1 class="banner__title">Explore new places</h1>
            <h1 class="banner__title">with <b>EASY TRAVEL</b></h1>
            <p class="banner__text"> is a top-rated travel agency that is dedicated to providing the ultimate travel experience for our clients.</p>
        </div>
    </header>

    <main class="main">
        <section class="section section-about" id="section_about">
            <div class="section-about__img"><img src="./img/waterfall.webp" alt=""></div>
            <div class="section-about__textblock textblock">
                <h5 class="textblock__subtitle subtitle">About us</h5>
                <h2 class="textblock__title title-main">Explore the world with us</h2>
                <p class="textblock__text text">Us a top-rated travel agency that is dedicated to providing the ultimate travel experience for our clients.</p>
                <p class="textblock__text text">Our agency offers a vast range of travel packages to destinations all over the world, catering to the diverse interests and preferences of our clients. From exotic beach getaways to thrilling adventures, cultural experiences to romantic escapades, our agency has something for everyone.</p>
                <button class="textblock__btn" onclick="window.location.href='register.php'">Get Started</button>
            </div>
        </section>
        <section >
            <center><h5 class="section-whyus__subtitle subtitle">About us</h5></center>
            <center><h2 class="section-whyus__title title-main">Why choose us</h2></center>
        
            <div class="why-us">
                <div class="box">
                    <div class="block__img">
                        <img src="./img/booking.png" alt="">
                    </div>
                    <p class="block__title">Fast Booking</p>
                </div>
                
                <div class="box">
                    <div class="block__img">
                        <img src="./img/destination.png" alt="">
                    </div>
                    <p class="block__title">Diverse Destinations</p>
                </div>
            </div>
          </section>
        <section class="section section-numbers"> 
            <h5 class="section-numbers__subtitle subtitle">About us</h5>
            <h2 class="section-numbers__title title-main">Numbers speak louder</h2>
            <div class="section-numbers__data data">
                <div class="data__block block">
                    <strong>10K</strong>
                    <p class="block__title">Successful Trips</p>
                </div>
                <div class="data__block block">
                    <strong>10000</strong>
                    <p class="block__title">Happy Cusomers</p>
                </div>
                <div class="data__block block">
                    <strong>5000</strong>
                    <p class="block__title">Postitive Reviews</p>
                </div>
            </div>
        </section>
    </main>
    
    <footer class="footer">
    <nav class="footer__nav nav">
        <div class="nav__logo">
            <a href="./index.php"><img src="./img/easytravel.png" alt=""></a>
        </div>
        <div class="nav__footer-block footer-block">
            <h6 class="footer-block__title">About us</h6>
        </div>
        <div class="nav__footer-block footer-block">
            <h6 class="footer-block__title">Contact Us</h6>
        </div>
    </nav>
    <center class="small">&copy; Easy Travel | All Rights Reserved  @<?php echo date('Y'); ?> for HOUSSEM Works</center>
</footer>
    <script src="./js/index.js"></script>
</body>
</html>