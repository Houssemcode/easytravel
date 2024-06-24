<?php
// Start the session
session_start();
$newAddres = '';

// Get the user's Addres from the session
$Addres = $_SESSION['Addres'];

// Check if the form was submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

    // Get the new Addres from the form
    $newAddres = trim($_POST["newAddres"]);

    // Connect to the database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "easy_travel";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare the SQL query to update the user's Addres
    $sql = "UPDATE customers SET Addres = ? WHERE Addres = ?";

    // Prepare the statement
    $stmt = $conn->prepare($sql);

    // Bind parameters
    $stmt->bind_param("ss", $newAddres, $Addres);

    // Execute the statement
    if($stmt->execute()){
        // Update the Addres in the session
        $_SESSION['Addres'] = $newAddres;

        // Redirect to the profile page
        header("location: profile.php");
        exit;
    } else {
        // Display an error message
        echo "Error updating Addres: " . $conn->error;
    }

    // Close the statement and database connection
    $stmt->close();
    $conn->close();
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
                <li class="menu__btn"><button class="nav__btn" onclick="window.location.href='my_trip.php'">Trip</button></li>
            </ul>
            <button class="burger__btn">
                <img src="./img/burger.svg" alt="" class="brgr">
                <img src="./img/close.svg" alt="" class="close">
            </button>
        </nav>
    </header>
    <main class="main">
        <center><h1 class="subtitle">Update My</h1></center>
        <center><h1 class="title-main">Information</h1></center>
		<div class="info-container"></div>
            <form class="form" id="contactform" method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>">

                <label>Current Addres :  <?php echo $Addres; ?></label>
                
                
                <input type="text" class="form__input" placeholder="New Addres" id="Addres" name="newAddres" required>
                <div class="form-group">
                    <input type="submit" name="save" value="Register" class="form__btn">
                    <a href="profile.php" class="btn btn-secondary ml-2">Cancel</a>
                </div>
                <?php if(isset($error)) { echo "<p>$error</p>"; } ?>
            </form>
        </div>
            <style>
                .info-container {
                    margin: 0 auto;
                    max-width: 800px;
                    padding: 20px;
                    background-color: #f2f2f2;
                    border-radius: 10px;
                }

                table {
                    width: 100%;
                    border-collapse: collapse;
                    margin-bottom: 20px;
                }

                th,
                td {
                    text-align: left;
                    padding: 10px;
                    border: 1px solid #ccc;
                }

                th {
                    background-color: #ddd;
                }

                tr:nth-child(even) {
                    background-color: #f2f2f2;
                }
            </style>          
           
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