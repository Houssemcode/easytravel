<?php
    $conn=mysqli_connect("localhost", "root", "", "easy_travel");
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
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
                <li class="menu__item"><a href="./index.php" class="menu__link">Home</a></li>
                <li class="menu__item"><a href="./index.php#section_about" class="menu__link" id="about">About</a></li>
                <li class="menu__item"><a href="./explore.php" class="menu__link">Explore</a></li>
            </ul>
            <button class="burger__btn">
                <img src="./img/burger.svg" alt="" class="brgr">
                <img src="./img/close.svg" alt="" class="close">
            </button>
        </nav>
    </header>
    <main class="main">
        <center><h1 class="subtitle">Explore</h1></center>
        <center><h1 class="title-main">Our Packages </h1></center>
        <section class="packages">
            <div class="box-container">
                <div class="boxx">
                    <?php  
                        $select_packages = mysqli_query($conn, "SELECT * FROM `package`") or die('query failed');
                        if(mysqli_num_rows($select_packages) > 0){
                            while($fetch_packages = mysqli_fetch_assoc($select_packages)){
                    ?>
                    <div class="image">
                        <img class="image" src="package/<?php echo $fetch_packages['PackageImage']; ?>" alt="">
                    </div>
                    <div class="content">
                        <h3><?php echo $fetch_packages['PackageName']; ?></h3>
                        <a href="package.php?id=<?php echo $fetch_packages['PackageId']; ?>&name=<?php echo $fetch_packages['PackageName']; ?>" class="btn">Explore it</a>
                    </div>
                    <?php
                        }
                    }else{
                        echo '<p class="error">Empty!</p>';
                    }
                    ?>
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
        <center class="small">&copy; Easy Travel | All Rights Reserved  @<?php echo date('Y'); ?></center>
    </footer>
    <script src="./js/app.js"></script>
</body>
</html>