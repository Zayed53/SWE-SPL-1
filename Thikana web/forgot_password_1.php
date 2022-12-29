<?php
require 'config.php';
$emailError = false;
session_start();
if (isset($_POST['continue_1'])) {
    $email = $_POST['email'];
    $sql = "SELECT * FROM userstry WHERE email='$email'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        header("location: forgot_password_2.php?email=$email");
    } else {
        $emailError = true;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Iconscout CSS -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <!-- CSS -->
    <link rel="stylesheet" href="style.css">

    <title>Forgot Password Form</title>
</head>

<body>

    <header>
        <a class="site_name" href="home.php"><span>THIKANA.COM</a>
        <nav>
            <ul class="nav_links">
                <li><a href="home.php">Home</a></li>
                <li><a href="#">About</a></li>
                <li><a href="#">Services</a></li>
                <li><a href="#">Contact</a></li>
                <li><a href="item_add">Add Property</a></li>
            </ul>
        </nav>
        <p class="lbutton">Log in</p>
    </header>

    <section class="loginReg">
        <div class="container">
            <div class="forms">
                <div class="form login">
                    <span class="title">Enter Your Email</span>

                    <form action="#" method="post">
                        <div class="input-field">
                            <input type="text" name="email" id="email" placeholder="Enter your email" required>
                            <i class="uil uil-envelope icon"></i>
                        </div>
                        <?php if($emailError){?>
                        <p class="error_message"> Email does not exist </p><?php } ?>

                        <div class="input-field button">
                            <input type="submit" name="continue_1" value="Continue">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <script src="script.js"></script>
</body>

</html>