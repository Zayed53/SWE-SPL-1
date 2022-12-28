<?php
require 'config.php';
if(isset($_POST['submit'])){
    $username=$_POST['name'];
    $email=$_POST['email'];
    $phn=$_POST['phone_no'];
    $nidno=$_POST['nid'];
    $address=$_POST['address'];
    $password=$_POST['password'];
    $chkpass=$_POST['check_pass'];

    $select="SELECT * FROM userstry WHERE email='$email'";
    $result=mysqli_query($conn, $select);
    if(mysqli_num_rows($result)>0){
        echo 
             "<script> alert('email has already taken'); </script> ";
    }
    else{
        if($chkpass==$password){
            $hashpassword=password_hash($password, PASSWORD_DEFAULT);
            $insert= "INSERT INTO userstry (username, email, phone_no, nid_no, address, password) VALUES ('$username', '$email', '$phn', '$nidno', '$address', '$hashpassword')";
            $sql=mysqli_query($conn, $insert);
            if($sql){
                    echo 
                    "<script> alert('registration  done'); window.location.href='LogIN.php'; </script> ";
                }else{
                     echo 
                     "<script> alert('registration  failed'); </script> ";
                }
        }
        else{
                echo
                "<script> alert('pass didnt match'); </script> ";
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

    <title>Registration Form</title>
</head>
<body>
    <!-- <header>
        <a class="site_name" href="/Home/home.html">THIKANA.COM</a>
        <nav>
            <ul class="nav_links">
                <li><a href="/Home/home.html">Home</a></li>
                <li><a href="#">About</a></li>
                <li><a href="#">Services</a></li>
                <li><a href="#">Contact</a></li>
                <li><a href="/Add Property/Add_Property.html">Add Property</a></li>
            </ul>
        </nav>
        <p class="lbutton">Log in</p>
    </header> -->
    <!-- <section class="loginReg"> -->
    <div class="container">
        <div class="forms">


            <div class="form signup">
                <span class="title">Registration</span>

                <form action="#" method="post">
                    <div class="input-field">
                        <input type="text"  name="name" placeholder="Enter your name" required>
                        <i class="uil uil-user"></i>
                    </div>
                    <div class="input-field">
                        <input type="text"  name="nid" id="nid" placeholder="Enter your nid" required>
                        <i class="uil uil-user-circle"></i>
                    </div>
                    <div class="input-field">
                        <input type="text"  name="email" id="email" placeholder="Enter your email" required>
                        <i class="uil uil-envelope icon"></i>
                    </div>
                    <div class="input-field">
                        <input type="text"  name="phone_no" id="phone_no" placeholder="Enter your phone no." required>
                        <i class="uil uil-phone"></i>
                    </div>
                    <div class="input-field">
                        <input type="address"  name="address" id="address" placeholder="Enter your address" required>
                        <i class="uil uil-map-marker"></i>
                    </div>
                    <div class="input-field">
                        <input type="password" class="password"  name="password" placeholder="Create a password" required>
                        <i class="uil uil-lock icon"></i>
                    </div>
                    <div class="input-field">
                        <input type="password"  name="check_pass" id="check_pass" class="password" placeholder="Confirm password" required>
                        <i class="uil uil-lock icon"></i>
                        <i class="uil uil-eye-slash showHidepw"></i>
                    </div>

                    <!-- <div class="chechbox-text">
                        <div class="checkbox-content">
                            <input type="checkbox" id="logCheck">
                            <label for="logCheck" class="text">Remember me</label>
                        </div>

                        <a href="#" class="text">Forgot password?</a>
                    </div> -->

                    <div class="input-field button">
                        <input type="submit"   name="submit" value="Signup Now">
                    </div>
                </form>

                <div class="login-signup">
                    <span class="text">Already have an account?
                        <a href="LogIN.php" class="text login-link">Log in</a>
                    </span>
                </div>
            </div>
        </div>
    </div>
    <!-- </section> -->

    <script src="script.js"></script>

</body>
</html>

