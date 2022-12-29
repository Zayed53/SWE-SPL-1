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
        $division=$_POST['Division'];
        $district=$_POST['District'];
        $Location=$_POST['location'];
        $purpose=$_POST['purp'];
        $phn=$_SESSION["phn_no"];
        $email=$_SESSION["email"];
        echo $purpose;

    $insert= "INSERT INTO property ( price, room_num, bath_num, area, division, district, location, purpose, amenities,  seller_phone_no, seller_email, valid, searchable) VALUES ( 0,'$roomno', '$bathno', '$apparea', '$division', '$district', '$Location', '$purpose','none', '$phn', '$email', 0, 0)";
        $sql=mysqli_query($conn, $insert);
        if($sql){
            echo  
            "<script> alert('New Property addition request sent'); window.location.href='home.php'; </script> ";
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
                <div class="input-field">
                    <input type="text" onkeypress="return onlyNumberKey(event)" name="room" id="room"  placeholder="Enter Room Number" required>
                </div>
                <div class="input-field">
                    <input type="text" onkeypress="return onlyNumberKey(event)" name="bath" id="bath" placeholder="Enter Bath Number" required>
                </div>
                <div class="input-field">
                    <input type="text" onkeypress="return onlyNumberKey(event)" name="area" id="area" placeholder="Enter Apartment Size" required>
                </div>
                <div class="selectBox">
                    <select name="Division" id="Division" class="selectBox">
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
                </div>
                <div class="selectBox">
                    <select name="District" id="District" class="selectBox">
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
                </div>
                <!-- <div class="input-field">
                    <input type="text"  name="div" id="div" placeholder="Enter Division" required>
                </div>
                <div class="input-field">
                    <input type="text"  name="dist" id="dist" placeholder="Enter District" required>
                </div> -->
                <div class="input-field">
                    <input type="text"  name="location" id="location" placeholder="Enter Location" required>
                </div>
                <div class="selectBox">
                    <select name="purp" id="purp" class="selectBox">
                        <option value="" disabled hidden selected>Enter Purpose</option>
                        <option value="Rent">Rent</option>
                        <option value="Sell">Sell</option>
                    </select>
                </div>
                <div class="input-field button">
                    <input type="submit"  name="add" value="Submit">
                </div>
            </form>
        </div>
    </div>
</section>
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