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
        <a class="site_name" href="#"><span>THIKANA.COM</a>
        <nav>
            <ul class="nav_links">
                <li><a href="#">Home</a></li>
                <li><a href="#">About</a></li>
                <li><a href="#">Services</a></li>
                <li><a href="#">Contact</a></li>
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

               <a class="button" href="registration.php" > <button>Sign Up</button></a> 
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
                    <?php
                        $sql="SELECT * FROM division";
                        $result=mysqli_query($conn, $sql);
                        while($rows=$result->fetch_assoc()){
                            $val=$rows['Division']?>
                            <option value="<?php echo $val; ?>" > <?php echo $val; ?>  </option>
                        <?php
                        }?>
                </select>   

                <!-- <input type="search" name="" placeholder="Division" id="" class="inputBox"> -->
                <input type="search" name="District" placeholder="District" id="District" class="inputBox">
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




