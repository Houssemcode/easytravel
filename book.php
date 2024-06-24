<?php
    $conn = mysqli_connect("localhost", "root", "", "easy_travel");

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    if (isset($_POST['save'])) {
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $guests = mysqli_real_escape_string($conn, $_POST['guests']);
        $arrivals = mysqli_real_escape_string($conn, $_POST['arrivals']);
        $leaving = mysqli_real_escape_string($conn, $_POST['leaving']);
        $PackageId = isset($_GET['idp']) ? intval($_GET['idp']) : 0;

        // Validate dates
        if (strtotime($arrivals) > strtotime($leaving)) {
            echo "<div class='error'>Invalid dates: Arrival date must be before leaving date</div>";
        } else {
            $sql = "SELECT * FROM customers WHERE Email = ?";
            $stmt = mysqli_prepare($conn, $sql);
            mysqli_stmt_bind_param($stmt, "s", $email);
            mysqli_stmt_execute($stmt);
            $res = mysqli_stmt_get_result($stmt);

            if (mysqli_num_rows($res) > 0) {
                $row = mysqli_fetch_assoc($res); // Make sure $row is defined here
                $CustomerId = $row['CustomerId'];

                $sql = "SELECT * FROM package WHERE PackageId = ?";
                $stmt = mysqli_prepare($conn, $sql);
                mysqli_stmt_bind_param($stmt, "i", $PackageId);
                mysqli_stmt_execute($stmt);
                $res = mysqli_stmt_get_result($stmt);
                $row = mysqli_fetch_assoc($res); // Make sure $row is defined here again

                if ($row) {
                    $price = $row['PackagePrice'];
                    $Booking_date = date("Y-m-d H:i:s");
                    $TotalPrice = $price * $guests;

                    $sql = "INSERT INTO book_f_package (PackageId, CustomerId, Booking_date, Num_guests, Price, Arrivals, Leaving) 
                            VALUES (?, ?, ?, ?, ?, ?, ?)";
                    $stmt = mysqli_prepare($conn, $sql);
                    mysqli_stmt_bind_param($stmt, "iisidss", $PackageId, $CustomerId, $Booking_date, $guests, $TotalPrice, $arrivals, $leaving);

                    if (mysqli_stmt_execute($stmt)) {
                        echo "<div class='success'>Record created successfully</div>";
                    } else {
                        echo "<div class='error'>Error: " . mysqli_error($conn) . "</div>";
                    }
                } else {
                    echo "<div class='error'>Invalid Package ID</div>";
                }
            } else {
                echo "<div class='error'>Invalid Email</div>";
            }
        }
    }

    mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <title>Easy Travel</title>
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
                <li class="menu__btn"><button class="nav__btn" onclick="window.location.href='login.php'">Login</button></li>
            </ul>
            <button class="burger__btn">
                <img src="./img/burger.svg" alt="" class="brgr">
                <img src="./img/close.svg" alt="" class="close">
            </button>
        </nav>
    </header>
    <main class="main">
        <section class="booking">
            <center><h1 class="section-form__title title-main">Book Your Trip!</h1></center>

            <form action="" method="post" class="book-form">
                <div class="flex">
                    <div class="inputBox">
                        <span>Email :</span>
                        <input type="email" placeholder="enter your email" name="email" required>
                    </div>

                    <div class="inputBox">
                        <span>How many :</span>
                        <input type="number" placeholder="number of guests" name="guests" required>
                    </div>

                    <div class="inputBox">
                        <span>Arrivals :</span>
                        <input type="date" name="arrivals" required>
                    </div>

                    <div class="inputBox">
                        <span>Leaving :</span>
                        <input type="date" name="leaving" required>
                    </div>
                </div>
                <center><input type="submit" value="submit" class="btn" name="save"></center>
            </form>
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
