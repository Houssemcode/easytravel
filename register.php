<?php
    $conn=mysqli_connect("localhost", "root", "", "easy_travel");
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }else{
        if (isset($_POST['save'])){
            $fname = $_POST['fname'];
            $lname = $_POST['lname'];
            $phone = $_POST['phone'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $c_password = $_POST['c_password'];

            $sql="SELECT * FROM customers WHERE Email = '{$email}'";
            $res=mysqli_query($conn, $sql);
            if(mysqli_num_rows($res)>0){
                echo "<div class= 'error'>Email already exists</div>";
            }
            else{
                if($password===$c_password){
                $sql="INSERT INTO customers (FirstName, LastName, Phone, Email, Password) VALUES('{$fname}', '{$lname}', '{$phone}', '{$email}', '{$password}')";
                if(mysqli_query($conn,$sql)){
                    $sql="SELECT * FROM customers WHERE Email = '{$email}'";
                    $res=mysqli_query($conn, $sql);
                    if(mysqli_num_rows($res)>0){
                        $row=mysqli_fetch_assoc($res);
                        session_start();
                        $_SESSION['CustomerId']=$row['CustomerId'];
                        header("location:profile.php");
                    }
                }else{
                    echo "error";
                }
                }else{
                echo "<div class= 'error'>Password are not matching</div>";
                }
            }
        }
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
<body class="body_reg">
    <header class="header_reg">
        <nav class="header__nav nav">
            <div class="nav__logo">
                <a href="./index.php"><img src="./img/easytravel.png" alt=""></a>
            </div>
            <ul class="nav__menu menu">
                <li class="menu__item"><a href="./index.php" class="menu__link">Home</a></li>
                <li class="menu__item"><a href="./index.php#section_about" class="menu__link" id="about">About</a></li>
                <li class="menu__item"><a href="./explore.php" class="menu__link">Explore</a></li>
                <li class="menu__item"><a href="./book.php" class="menu__link">Book now</a></li>
                <li class="menu__btn"><button class="nav__btn" onclick="window.location.href='login.php'">Login</button></li>
            </ul>
            <button class="burger__btn">
                <img src="./img/burger.svg" alt="" class="brgr">
                <img src="./img/close.svg" alt="" class="close">
            </button>
        </nav>
    </header>
    <main class="main">
        <section class="section section-form">
            <h5 class="section-form__subtitle subtitle">Register</h5>
            <h2 class="section-form__title title-main">Take the first step</h2>
            <form class="form" id="contactform" method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>">

                <input type="text" class="form__input" placeholder="First Name" id="fname" name="fname" required>
                
                <input type="text" class="form__input" placeholder="Last Name" id="lname" name="lname" required>
                
                <input type="tel" class="form__input" placeholder="Phone No." id="phone" name="phone" required>

                <input type="email" class="form__input" placeholder="Email" id="email" name="email" required>

                <input type="password" class="form__input" placeholder="Password" id="password" name="password" required>

                <input type="password" class="form__input" placeholder="Confirm Password" id="c_password" name="c_password" required>
                <div class="register-link">
                    <p>I have an account? <a href="login.php">Login</a></p>
                  </div>
                <input type="submit" name="save" value="Register" class="form__btn">
                <?php if(isset($error)) { echo "<p>$error</p>"; } ?>
            </form>
        </div>
            <div class="section-form__data data">
            <div class="data__block block">
                    <div class="block__img">
                        <svg>
                        <use xlink:href="./img/sprite/sprite-contacts.svg#pin"></use>
                        </svg>
                    </div>
                    <p class="block__title">Address</p>
                    <Addres class="block__info">Guelma Street, Algeria</Addres>
                </div>
                <div class="data__block block">
                    <div class="block__img">
                        <svg>
                    <use xlink:href="./img/sprite/sprite-contacts.svg#mail"></use>
                  </svg>
                    </div>
                    <p class="block__title">Email</p>
                    <p class="block__info">contact@easytravel.com</p>
                </div>
                <div class="data__block block">
                    <div class="block__img">
                        <svg>
                    <use xlink:href="./img/sprite/sprite-contacts.svg#tel"></use>
                  </svg>
                    </div>
                    <p class="block__title">Phone</p>
                    <p class="block__info">+213 0745260789</p>
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
    <script src="./js/contact.js"></script>
</body>
</html>