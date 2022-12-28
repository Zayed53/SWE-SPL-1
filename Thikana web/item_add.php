<?php
require 'config.php';
session_start();
if(!empty($_SESSION["email"])){
    $logedin=true;
}else{
    $logedin=false;
}
if($logedin){
    if(isset($_POST['add'])){
        $roomno=$_POST['room'];
        $bathno=$_POST['bath'];
        $apparea=$_POST['area'];
        $division=$_POST['div'];
        $district=$_POST['dist'];
        $Location=$_POST['location'];
        $purpose=$_POST['purp'];
        $phn=$_SESSION["phn_no"];
        $email=$_SESSION["email"];

    $insert= "INSERT INTO property ( price, room_num, bath_num, area, division, district, location, purpose, amenities,  seller_phone_no, seller_email, valid) VALUES ( 0,'$roomno', '$bathno', '$apparea', '$division', '$district', '$Location', '$purpose','none', '$phn', '$email', 0 )";
        $sql=mysqli_query($conn, $insert);
        if($sql){
            echo  
            "<script> alert('New Property addition request sent'); window.location.href='home.php'; </script> "; // window.location.replace('home.php')
        }else{
            echo 
            "<script> alert('property addition  failed'); </script> ";
        }
    }
}

else{
    
    echo "<script> alert('Please LOGIN first'); window.location.href='LogIN.php'; </script> ";
    exit();
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="Add_Property_Style.css">

    <title>Add Property</title>
</head>
<body>
    <header>
        <a class="site_name" href="home.php">THIKANA.COM</a>
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
    </header>
<section class="addProperty">    
    <div class="container">
        <div class="form add_property">
            <span class="title">Add Property</span>

            <form action="#" method="post" >
                <!-- price baad -->
                <!-- <div class="input-field">
                    <input type="number" name="price" placeholder="Enter Price" required>
                </div> -->
                <div class="input-field">
                    <input type="number" name="room" id="room"  placeholder="Enter Room Number" required>
                </div>
                <div class="input-field">
                    <input type="number"  name="bath" id="bath" placeholder="Enter Bath Number" required>
                </div>
                <div class="input-field">
                    <input type="number"  name="area" id="area" placeholder="Enter Apartment Size" required>
                </div>
                <div class="input-field">
                    <input type="text"  name="div" id="div" placeholder="Enter Division" required>
                </div>
                <div class="input-field">
                    <input type="text"  name="dist" id="dist" placeholder="Enter District" required>
                </div>
                <div class="input-field">
                    <input type="text"  name="location" id="location" placeholder="Enter Location" required>
                </div>
                <div class="input-field">
                    <input type="text"  name="purp" id="purp" placeholder="Enter Purpose" required>
                </div>
                <!-- <div class="input-field">
                    <input type="text"  name="amin" id="amin" placeholder="Enter Aminities" required>
                </div> -->
                <div class="input-field button">
                    <input type="submit"  name="add" value="Submit">
                </div>
            </form>
        </div>
    </div>
</section>
</body>
</html>

<!-- <!Doctype html>
<html>
    <head>
        <title>THIKANA</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/dark.css">
    </head>
    <body>
        <h2>item_add</h2>
        <form class="" action="" method="post" >
            <label for="price">Price: </label>
            <input type="number" name="price" value=""><br>
            <label for="room">room number: </label>
            <input type="number" name="room" id="room" value=""><br>
            <label for="bath">bath number: </label>
            <input type="number" name="bath" id="bath" value=""><br>
            <label for="area">apartment size: </label>
            <input type="number" name="area" id="area" value=""><br>
            <label for="div">division: </label>
            <input type="text" name="div" id="div" value=""><br>
            <label for="dist">district: </label>
            <input type="text" name="dist" id="dist" value=""><br>
            <label for="local">local area: </label>
            <input type="text" name="local" id="local" value=""><br>
            <label for="location">location: </label>
            <input type="text" name="location" id="location" value=""><br>
            <label for="purp">purpose: </label>
            <input type="text" name="purp" id="purp" value=""><br>
            <label for="amin">aminities: </label>
            <input type="text" name="amin" id="amin" value=""><br>
            <input type="submit" name="add" value="Submit">
        </form>
    </body>
</html> -->