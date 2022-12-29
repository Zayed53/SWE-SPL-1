<!-- <?php
require 'config.php';
session_start();
$passError1 = $passError2 = false;
$email = $_GET['email'];
if (isset($_POST['reset'])) {
    $password = $_POST['password'];
    $chkpass = $_POST['check_pass'];
    // $sql = "SELECT * FROM userstry WHERE email='$email'";
    // $result = mysqli_query($conn, $sql);
    if(strlen($password) < 8 || ctype_upper($password) || ctype_lower($password)){
        $passError1 = true;
    }
    else if($chkpass != $password){
        $passError2 = true;
    }
    else{
        $hashpassword=password_hash($password, PASSWORD_DEFAULT);
        $sql = "UPDATE userstry SET password = '$hashpassword' WHERE email = '$email'";
        $result = mysqli_query($conn, $sql);
    }
}
?> -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Iconscout CSS -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <!-- CSS -->
    <link rel="stylesheet" href="reset_password.css">

    <title>Reset Password</title>
</head>

<body>

    <div class="sidebar">
        <header>THIKANA</header>
        <ul>
        <li><a href="home.php">Home</a></li>
        <li><a href="User_info_dash.php">User Information</a></li>
        <li><a href="User_Rent_Dash.php">Rented Properties</a></li>
        <li><a href="User_own_dash.php">Owned Properties</a></li>
        <li><a href="LogOUT.php">Logout</a></li>
        </ul>
    </div>

    <section class="reset_password">
        <div class="container">
            <div class="forms">
                <div class="form login">
                    <span class="title">Reset Password</span>

                    <form action="#" method="post">
                        <div class="input-field">
                            <input type="password" class="password"  name="password" placeholder="Create a password" required>
                            <i class="uil uil-lock icon"></i>
                        </div>
                        <!-- <?php if($passError1){?>
                        <p class="error_message"> Password must be 8 letters long and contain uppercase and lowercase </p><?php } ?> -->
                        <div class="input-field">
                            <input type="password"  name="check_pass" id="check_pass" class="password" placeholder="Confirm password" required>
                            <i class="uil uil-lock icon"></i>
                            <i class="uil uil-eye-slash showHidepw"></i>
                        </div>
                        <!-- <?php if($passError2){?>
                        <p class="error_message"> Passwords don't match </p><?php } ?> -->

                        <div class="input-field button">
                            <input type="submit" name="reset" value="Reset Password">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <script src="script.js"></script>
</body>

</html>