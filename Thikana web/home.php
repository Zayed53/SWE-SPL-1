<?php
require "config.php";
session_start();
if(!empty($_SESSION["email"])){
    $check=true;
    $mail=$_SESSION["name"];
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
    <title>Home</title>

    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <a class="site_name" href="home.php"><span>THIKANA</a>
        <nav>
            <ul class="nav_links">
                <li><a href="home.php">Home</a></li>
                <li><a href="about.html">About</a></li>
                <li><a href="services.html">Services</a></li>
                <li><a href="contact.html">Contact</a></li>
                <li><a href="item_add">Add Property</a></li>
            </ul>
        </nav>
        <div>
        <?php 
        if($check){
        ?> <a class="button" href="User_info_dash.php"><button> <?php echo "Dashboard" ?></button></a>
        <?php } 
        else{
        ?>    <a class="button" href="LogIN.php"><button>Login</button></a>
              <a class="button" href="registration.php"><button>Sign Up</button></a>
        <?php }
        ?>
        </div>
    </header>




    <section class="home" id="home">

        <form action="Search.php" method="post">
    
            <h3>Find your perfect home</h3>
            <div class="inputBox">
                <select name="purp" id="purp" class="inputBox">
                    <option value="" disabled hidden selected>Purpose</option>
                    <option value="Rent">Rent</option>
                    <option value="Sell">Sell</option>
                </select>
                <select name="Area" id="Area" class="inputBox">
                    <option value="" disabled hidden selected>Area (sqft)</option>
                    <option value=0>  0    </option>
                    <option value=800>800  </option>
                    <option value=1000>1000 </option>
                    <option value=1200>1200 </option>
                    <option value=1600>1600 </option>
                    <option value=2000>2000 </option>
                    <option value=5000>5000 </option>
                    <option value=8000>8000 </option>
                    <option value=10000>10000</option>
                    <option value=15000>15000</option>
                    <option value=20000>20000</option>
                    <option value=30000>30000</option>
                    <option value=35000>35000</option>
                    <option value=40000>40000</option>
                    <option value=50000>50000</option>
                </select>
                <select name="Division" id="Division" class="inputBox">
                    <option value="" disabled hidden selected>Division</option>
                    <option value="Barisal">Barisal</option>
                    <option value="Chittagong">Chittagong</option>
                    <option value="Dhaka">Dhaka</option>
                    <option value="Khulna">Khulna</option>
                    <option value="Mymensingh">Mymensingh</option>
                    <option value="Rajshahi">Rajshahi</option>
                    <option value="Rangpur">Rangpur</option>
                    <option value="Sylhet">Sylhet</option>
                </select>
                <select name="District" id="District" class="inputBox">
                <option value="" disabled hidden selected>District</option>
                        <option value="" disabled >Barisal</option>
                        <option value="Barisal">Barisal</option>
                        <option value="Barguna">Barguna</option>
                        <option value="Bhola">Bhola</option>
                        <option value="Jhalokati">Jhalokati</option>
                        <option value="Patuakhali">Patuakhali</option>
                        <option value="Pirojpur">Pirojpur</option>
                        <option value="" disabled >Chittagong</option>
                        <option value="Brahmanbaria">Brahmanbaria</option>
                        <option value="Comilla">Comilla</option>
                        <option value="Chandpur">Chandpur</option>
                        <option value="Lakshmipur">Lakshmipur</option>
                        <option value="Noakhali">Noakhali</option>
                        <option value="Feni">Feni</option>
                        <option value="Khagrachhari">Khagrachhari</option>
                        <option value="Rangamati">Rangamati</option>
                        <option value="Bandarban">Bandarban</option>
                        <option value="Chittagong">Chittagong</option>
                        <option value="Cox's Bazar">Cox's Bazar</option>
                        <option value="" disabled >Dhaka</option>
                        <option value="Dhaka">Dhaka</option>
                        <option value="Gazipur">Gazipur</option>
                        <option value="Kishoreganj">Kishoreganj</option>
                        <option value="Manikganj">Manikganj</option>
                        <option value="Munshiganj">Munshiganj</option>
                        <option value="Narayanganj">Narayanganj</option>
                        <option value="Narsingdi">Narsingdi</option>
                        <option value="Tangail">Tangail</option>
                        <option value="Faridpur">Faridpur</option>
                        <option value="Gopalganj">Gopalganj</option>
                        <option value="Madaripur">Madaripur</option>
                        <option value="Rajbari">Rajbari</option>
                        <option value="Shariatpur">Shariatpur</option>
                        <option value="" disabled >Khulna</option>
                        <option value="" disabled >Mymensingh</option>
                        <option value="" disabled >Rajshahi</option>
                        <option value="" disabled >Rangpur</option>
                        <option value="" disabled >Sylhet</option>
                </select>
                <!-- <input type="search" name="District" placeholder="District" id="District" class="inputBox"> -->
                <select name="Minprice" id="Minprice" class="inputBox">
                    <option value="" disabled hidden selected>Minimum price (BDT)</option>
                    <option value=5000> 5000/=</option>
                    <option value=10000>10000/=</option>
                    <option value=15000>15000/=</option>
                    <option value=20000>20000/=</option>
                    <option value=25000>25000/=</option>
                </select>
                </select>
                <select name="Maxprice" id="Maxprice" class="inputBox">
                    <option value="" disabled hidden selected>Maximum price (BDT)</option>
                    <option value=30000>30000/=</option>
                    <option value=35000>35000/=</option>
                    <option value=40000>40000/=</option>
                    <option value=45000>45000/=</option>
                    <option value=50000>50000/=</option>
                </select>
                <select name="Room_no" id="Room_no" class="inputBox">
                    <option value="" disabled hidden selected>Bedrooms</option>
                    <option value=1 >1 bedroom</option>
                    <option value=2 >2 bedrooms</option>
                    <option value=3 >3 bedrooms</option>
                    <option value=4 >4 bedrooms</option>
                    <option value=5 >5 bedrooms</option>
                </select>
                <select name="Bath_no" id="Bath_no" class="inputBox">
                    <option value="" disabled hidden selected>Bathrooms</option>
                    <option value=1 >1 bathroom</option>
                    <option value=2 >2 bathrooms</option>
                    <option value=3 >3 bathrooms</option>
                    <option value=4 >4 bathrooms</option>
                    <option value=5 >5 bathrooms</option>
                </select>
                
                <input type="submit" value="Search Property" class="btn">
                <input type="submit" value="Reset All" class="btn">
            </div>
        </form>
    
    </section>


    <!-- <footer>
        <h2> Footer </h2>
    </footer>
 -->



    <!-- <div class="background_image"></div> -->
</body>
</html>


