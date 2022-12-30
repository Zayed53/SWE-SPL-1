<?php
require 'config.php';
$passError1 = $passError2 = $emailError1 = $emailError2 = $NIDError1 = $NIDError2 = $phoneError1 = $phoneError2 = false;
if(isset($_POST['submit'])){
    $username=$_POST['name'];
    $email=$_POST['email'];
    $phn=$_POST['phone_no'];
    $nidno=$_POST['nid'];
    $address=$_POST['address'];
    $password=$_POST['password'];
    $chkpass=$_POST['check_pass'];

    $select1="SELECT * FROM userstry WHERE email='$email'";
    $result1=mysqli_query($conn, $select1);

    $select2="SELECT * FROM userstry WHERE nid_no='$nidno'";
    $result2=mysqli_query($conn, $select2);

    $select3="SELECT * FROM userstry WHERE phone_no='$phn'";
    $result3=mysqli_query($conn, $select3);

    if(mysqli_num_rows($result1)>0){
        $emailError1 = true;
    }
    else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $emailError2 = true;
    }
    else if(mysqli_num_rows($result2)>0){
        $NIDError1 = true;
    }
    else if(strlen($nidno) < 10 || strlen($nidno) > 10){
        $NIDError2 = true;
    }
    else if(mysqli_num_rows($result3)>0){
        $phoneError1 = true;
    }
    else if(strlen($phn) < 11 || strlen($phn) > 11){
        $phoneError2 = true;
    }
    else if(strlen($password) < 8 || ctype_upper($password) || ctype_lower($password)){
        $passError1 = true;
    }
    else{

        if($chkpass==$password){
            $hashpassword=password_hash($password, PASSWORD_DEFAULT);
            $insert= "INSERT INTO userstry (username, email, phone_no, nid_no, address, password) VALUES ('$username', '$email', '$phn', '$nidno', '$address', '$hashpassword')";
            $sql=mysqli_query($conn, $insert);
            if($sql){
                    echo 
                    "<script> alert('Registration Complete'); window.location.href='LogIN.php'; </script> ";
                }else{
                     echo 
                     "<script> alert('Registration Failed'); </script> ";
                }
        }
        else{
                $passError2 = true;
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
    <header>
        <a class="site_name" href="home.php">THIKANA</a>
        <nav>
            <ul class="nav_links">
                <li><a href="home.php">Home</a></li>
                <li><a href="about.html">About</a></li>
                <li><a href="services.html">Services</a></li>
                <li><a href="contact.html">Contact</a></li>
                <li><a href="item_add.php">Add Property</a></li>
            </ul>
        </nav>
        <p class="lbutton">Log in</p>
    </header>
    
    <section class="loginReg">
        <div class="container">
            <div class="forms">


                <div class="form signup">
                    <span class="title">Registration</span>

                    <form action="#" method="post">
                        <div class="input-field">
                            <input type="text"  name="name" value="<?php echo isset($_POST['name']) ? $_POST['name'] : ''; ?>" placeholder="Enter your name" required>
                            <i class="uil uil-user"></i>
                        </div>
                        <div class="input-field">
                            <input type="text"  name="email" id="email" value="<?php echo isset($_POST['email']) ? $_POST['email'] : ''; ?>"placeholder="Enter your email" required>
                            <i class="uil uil-envelope icon"></i>
                        </div>
                        <?php if($emailError1){?>
                        <p class="error_message"> Email already in use </p><?php } ?>
                        <?php if($emailError2){?>
                        <p class="error_message"> Invalid Email </p><?php } ?>
                        <div class="input-field">
                            <input type="text"  onkeypress="return onlyNumberKey(event)" name="nid" id="nid" value="<?php echo isset($_POST['nid']) ? $_POST['nid'] : ''; ?>"  placeholder="Enter your nid" required>
                            <i class="uil uil-user-circle"></i>
                        </div>
                        <?php if($NIDError1){?>
                        <p class="error_message"> NID already in use </p><?php } ?>
                        <?php if($NIDError2){?>
                        <p class="error_message"> Invalid NID </p><?php } ?>
                        <div class="input-field">
                            <input type="text"  onkeypress="return onlyNumberKey(event)" name="phone_no" id="phone_no"  value="<?php echo isset($_POST['phone_no']) ? $_POST['phone_no'] : ''; ?>" placeholder="Enter your phone no." required>
                            <i class="uil uil-phone"></i>
                        </div>
                        <?php if($phoneError1){?>
                        <p class="error_message"> Phone Number already in use </p><?php } ?>
                        <?php if($phoneError2){?>
                        <p class="error_message"> Invalid Phone Number </p><?php } ?>
                        <div class="input-field">
                            <input type="address"  name="address" id="address"  value="<?php echo isset($_POST['address']) ? $_POST['address'] : ''; ?>" placeholder="Enter your address" required>
                            <i class="uil uil-map-marker"></i>
                        </div>
                        <div class="input-field">
                            <input type="password" class="password"  name="password" placeholder="Create a password" required>
                            <i class="uil uil-lock icon"></i>
                        </div>
                        <?php if($passError1){?>
                        <p class="error_message"> Password must be 8 letters long and contain uppercase and lowercase </p><?php } ?>
                        <div class="input-field">
                            <input type="password"  name="check_pass" id="check_pass" class="password" placeholder="Confirm password" required>
                            <i class="uil uil-lock icon"></i>
                            <i class="uil uil-eye-slash showHidepw"></i>
                        </div>
                        <?php if($passError2){?>
                        <p class="error_message"> Passwords don't match </p><?php } ?>

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

