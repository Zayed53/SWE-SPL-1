<?php error_reporting (E_ALL ^ E_NOTICE); ?>

<?php
require 'config.php';
session_start();
if(!empty($_SESSION["email"])){
    $checklog=true;
    $mail=$_SESSION["name"];
}
else{
    $checklog=false;
    
}
$purp=$_POST['purp'];
if(isset($_POST['purp']))
{
    $query="purpose='$purp' AND valid=1 AND searchable=1 ";
}
else
{
    $query="(purpose='Sell' OR purpose = 'Rent' )AND valid=1 AND searchable=1 ";
}

$division=$_POST['Division'];
if(!empty($division)){
    $query=$query."AND division='$division' ";

    
}
$district=$_POST['District'];
if(!empty($district)){
    $query=$query."AND district='$district' ";
}
$Area=$_POST['Area'];
if(!empty($area)){
    $query=$query."AND area  < $Area ";

}$minprice=$_POST['Minprice'];
if(!empty($minprice)){
    $query=$query."AND price  > $minprice ";
}$maxprice=$_POST['Maxprice'];
if(!empty($maxprice)){
    $query=$query."AND price  < $maxprice ";
}
$room=$_POST['Room_no'];
if(!empty($room)){
    $query=$query."AND room_num =$room ";
}
$bath=$_POST['Bath_no'];
if(!empty($bath)){
    $query=$query."AND bath_num=$bath ";
}



$sql="SELECT * From property WHERE ".$query;
$result=mysqli_query($conn, $sql);

if(mysqli_num_rows($result)>0){
    $check=true;
}else{
    $check=false;
    echo "<script> alert('No result found'); </script> ";
}
?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Showing Search Result</title>

    <link rel="stylesheet" href="search_result_style.css">
</head>
<body>
<header>
        <a class="site_name" href="home.php">THIKANA.COM</a>
        <nav>
            <ul class="nav_links">
                <li><a href="home.php">Home</a></li>
                <li><a href="#">About</a></li>
                <li><a href="#">Services</a></li>
                <li><a href="#">Contact</a></li>
                <li><a href="item_add.php">Add Property</a></li>
            </ul>
        </nav>
        <?php 
        if($checklog){
        ?> <a class="button" href="User_info_dash.php"><button> <?php echo "Dashboard" ?></button></a>
        <?php } 
        else{
        ?>    <a class="button" href="LogIN.php"><button>Login</button></a>
                <a class="button" href="registration.php"><button>Sign Up</button></a>
        <?php }
        ?>
    </header>

<?php
    if($check){
       while($rows=$result->fetch_assoc()){
            $id=$rows['id'];
            $sqlimg="SELECT image from images where id=$id LIMIT 1";
            $resultimg=mysqli_query($conn, $sqlimg);
            $imgrows=mysqli_fetch_array($resultimg);
        ?>

    <section class="search_result">
    <span class="title"></span>
    
    <div class="container">
        

        <a class="link" href="info_show.php?id=<?php echo $rows['id'] ?>">
        

        <div class="form">
           
        <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($imgrows['image']); ?>" />
            
            
        
            <form action="#">
                
            
                <div class="results">
                
                    <p> 
                        <label class="currency"> BDT </label> 
                        <label class="amount"> <?php echo $rows['price']; ?> </label> 
                    </p>
                    
                    <p>
                        <label class="location"><?php echo $rows['location'].",".$rows['district'].",".$rows['division']; ?> </label>
                    </p>
                    

                    <p>
                        <label class="apartment"> Apartment </label>
                    </p>
                    
                    <p>
                        <label class="amenities"> Amenities: <?php echo $rows['amenities']; ?> </label>
                    </p>

                    <p>
                        <label class="beds-baths"> Bedrooms: <strong><?php echo $rows['room_num']; ?></strong> </label>
                        <label class="beds-baths"> Bathrooms: <strong><?php echo $rows['bath_num']; ?></strong> </label>
                        <label class="area"> Area: <strong><?php echo $rows['area']; ?></strong> sqft </label>
                    </p>
        

                    

                </div>
                

            </form>
            




        </div>
       </a>
    </div>
    </section>
    

    

    

    

    <?php }
    } ?>

</body>

</html>



<!-- <!Doctype html>
<html>
<button onclick="listView()"><i class="fa fa-bars"></i> List</button> -->







