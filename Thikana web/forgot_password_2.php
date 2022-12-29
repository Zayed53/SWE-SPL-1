<?php
require 'config.php';
session_start();
$NIDError1 = $NIDError2 = $phoneError1 = $phoneError2 = false;
$email = $_GET['email'];
if (isset($_POST['continue_2'])) {
    $nid = $_POST['nid'];
    $phn = $_POST['phone_no'];
    $sql = "SELECT * FROM userstry WHERE email='$email'";
    $result = mysqli_query($conn, $sql);
    if(strlen($nid) < 10 || strlen($nid) > 10){
        $NIDError2 = true;
    }
    else if(strlen($phn) < 11 || strlen($phn) > 11){
        $phoneError2 = true;
    }
    else if (mysqli_num_rows($result) > 0) {
        $row=mysqli_fetch_array($result);
        if($nid == $row['nid_no'] && $phn == $row['phone_no']){
            header("location: reset_password_1.php?email=$email");
        }
        else if($nid != $row['nid_no']){
            $NIDError1 = true;
        }
        else if($phn != $row['phone_no']){
            $phoneError1 = true;
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

    <!-- Iconscout CSS -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <!-- CSS -->
    <link rel="stylesheet" href="style.css">

    <title>Login & Registration Form</title>
</head>

<body>

    <header>
        <a class="site_name" href="LogIN"><span>THIKANA.COM</a>
        <nav>
            <ul class="nav_links">
                <li><a href="LogIN">Home</a></li>
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
                    <span class="title">Enter Your NID Number And Phone Number</span>

                    <form action="#" method="post">
                        <div class="input-field">
                            <input type="text"  onkeypress="return onlyNumberKey(event)" name="nid" id="nid" placeholder="Enter your nid" required>
                            <i class="uil uil-user-circle"></i>
                        </div>
                        <?php if($NIDError1){?>
                        <p class="error_message"> NID already in use </p><?php } ?>
                        <?php if($NIDError2){?>
                        <p class="error_message"> Invalid NID </p><?php } ?>

                        <div class="input-field">
                            <input type="text"  onkeypress="return onlyNumberKey(event)" name="phone_no" id="phone_no" placeholder="Enter your phone no." required>
                            <i class="uil uil-phone"></i>
                        </div>
                        <?php if($phoneError1){?>
                        <p class="error_message"> Phone Number already in use </p><?php } ?>
                        <?php if($phoneError2){?>
                        <p class="error_message"> Invalid Phone Number </p><?php } ?>

                        <div class="input-field button">
                            <input type="submit" name="continue_2" value="Continue">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <script src="script.js"></script>
    <script>
        function onlyNumberKey(evt) {
            var ASCIICode = (evt.which) ? evt.which : evt.keyCode
            if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
                return false;
            return true;
        }
    </script>
</body>

</html>