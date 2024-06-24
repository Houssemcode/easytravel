<?php
    $conn=mysqli_connect("localhost", "root", "", "easy_travel");
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }else{
        $id_package = $_GET['id'];
        $name_package = $_GET['name'];
        
        $sql= "SELECT * FROM package WHERE PackageId = '$id_package'";
        $res=mysqli_query($conn, $sql);
        $row=mysqli_fetch_assoc($res);
        $discerption = $row['discerption'];
        $endPackage = $row['endPackage'];
        $PackagePrice = $row['PackagePrice'];
        $PackageType = $row['PackageType'];
        $PackageImage = $row['PackageImage'];
    }    
?>

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
    <header class="header_book">
        <nav class="header__nav nav">
            <div class="nav__logo">
                <a href="./index.php"><img src="./img/easytravel.png" alt=""></a>
            </div>
            <ul class="nav__menu menu">
                <li class="menu__item"><a href="index.php" class="menu__link">Home</a></li>
                <li class="menu__item"><a href="index.php#section_about" class="menu__link" id="about">About</a></li>
                <li class="menu__item"><a href="explore.php" class="menu__link">Explore</a></li>
                <button class="textblock__btn" onclick="window.location.href='book.php?idp=<?php echo $id_package?>'">Booking now</button>
            </ul>
            <button class="burger__btn">
                <img src="./img/burger.svg" alt="" class="brgr">
                <img src="./img/close.svg" alt="" class="close">
            </button>
        </nav>
    </header>
    <main class="main">
        <center><h1 class="subtitle">Information </h1></center>
        <center><h1 class="title-main">about Package</h1></center>
        <section class="section section-about" id="section_about">
            <div class="section-about__img"><img class="section-about__img" src="package/<?php echo $PackageImage; ?>" alt=""></div>
            <div class="section-about__textblock textblock">
                <h2 class="textblock__title title-main"><?php echo $name_package ?></h2>
                <h5 class="textblock__subtitle subtitle">Description:</h5>
                <p class="textblock__text text"><?php echo $discerption?></p>
                <p class="textblock__text text">Type : <?php echo $PackageType?> <br> End Date : <?php echo $endPackage?> <br> Price : <?php echo $PackagePrice?>$</p>
                <button class="textblock__btn" onclick="window.location.href='book.php?idp=<?php echo $id_package?>'">Booking now</button>
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
        <center class="small">&copy; Easy Travel | All Rights Reserved  @<?php echo date('Y'); ?></center>
    </footer>
    <script src="./js/app.js"></script>
</body>
</html>