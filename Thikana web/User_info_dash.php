<?php
require 'config.php';
session_start();
if(!empty($_SESSION["email"])){
    $check=true;
    $name=$_SESSION["name"];
    $email=$_SESSION["email"];
    $sql="SELECT * From userstry WHERE email='$email'";
    $result=mysqli_query($conn, $sql);
    $rows=mysqli_fetch_array($result);  
}
else{
    $check=false;
    
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Information in user dashboard</title>

    <link rel="stylesheet" href="user_info_style.css">
</head>

<body>

    <div class="sidebar">
        <header><?php echo $name ?></header>
        <ul>
        <li><a href="home.php">Home</a></li>
         <li><a href="User_info_dash.php">User Information</a></li>
         <li><a href="User_Rent_Dash.php">Rented Properties</a></li>
         <li><a href="User_own_dash.php">Owned properties</a></li>
         <li><a href="LogOUT.php">LogOUT</a></li>
        </ul>
    </div>

    <section class="show-info">

        <span class="title">User Information</span>

        <div class="container">


                <div class="form">


                    <form action="#">

                        <div class="results">

                            <p>
                                <label class="left-options"> Name </label>
                                <label class="colon"  id="name"> : </label>
                                <label class="right-options"> <?php echo $name ?> </label>
                            </p>

                            <p>
                                <label class="left-options"> E-mail </label>
                                <label class="colon" id="e-mail"> : </label>
                                <label class="right-options"> <?php echo $email ?> </label>
                            </p>

                            <p>
                                <label class="left-options"> NID </label>
                                <label class="colon" id="nid"> : </label>
                                <label class="right-options"> <?php echo $rows['nid_no'] ?>  </label>
                            </p>

                            <p>
                                <label class="left-options"> Phone no </label>
                                <label class="colon" id="phone-no"> : </label>
                                <label class="right-options"> <?php echo $rows['phone_no'] ?> </label>
                            </p>
                            <p>
                                <label class="left-options"> Address </label>
                                <label class="colon"  id="address"> : </label>
                                <label class="right-options"> <?php echo $rows['address'] ?> </label>
                            </p>


                        </div>


                        

                    </form>


                    


                </div>


                        <div class="buttons">

                                <input type="submit" value="Reset Password" class="btn">

                        </div>

        </div>

    </section>









</body>

</html>