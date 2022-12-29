<?php
require 'config.php';
session_start();
if(!empty($_SESSION["email"])){
    $check=true;
    $name=$_SESSION["name"];
    $email=$_SESSION["email"];
    $sql="SELECT * From owns WHERE email ='$email'";
    $result=mysqli_query($conn, $sql);
    if(mysqli_num_rows($result)>0){
        $check=true;
    }else{
        $check=false;
        echo "<script> alert('No property is owned');window.location.href='user_info_dash.php'; </script> ";
    }
    //$rows=mysqli_fetch_array($result);  
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
    <title>User Properties</title>

    <link rel="stylesheet" href="user_properties_style.css">
</head>


<body>

    <div class="sidebar">
        <header>THIKANA</header>
        <ul>
        <li><a href="home.php">home</a></li>
        <li><a href="User_info_dash.php">User Information</a></li>
         <li><a href="User_Rent_Dash.php">Rented Properties</a></li>
         <li><a href="User_own_dash.php">Owned properties</a></li>
         <li><a href="LogOUT.php">LogOUT</a></li>
        </ul>
    </div>

    <section class="show-properties">
    <?php
    if($check){
        while($rows=$result->fetch_assoc()){
            $id=$rows['property_id'];
            $propertysql="SELECT * From property WHERE id =$id";
            $propeertresult=mysqli_query($conn, $propertysql);
            $proprows=mysqli_fetch_array($propeertresult);  
         ?>
    

        <span class="title">Properties rquested</span>

        <div class="container">
        

            <a class="link" href="/Info Show/info_show.html">

                <div class="form">
                <?php
                $imgid=$proprows['id'];
                $sqlimg="SELECT image from images where id=$imgid LIMIT 1";
                $resultimg=mysqli_query($conn, $sqlimg);
                $imgrows=mysqli_fetch_array($resultimg);
            ?>
                
                <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($imgrows['image']); ?>" />

                    <form action="#">

                        <div class="results">

                            
                            <p>
                                <label class="currency"> BDT </label>
                                <label class="amount"> <?php echo $proprows['price']; ?> Thousand </label>
                            </p>

                            <p>
                                <label class="location"><?php echo $proprows['location'].",".$proprows['district'].",".$proprows['division']; ?> </label>
                            </p>

                            <p>
                                <label class="apartment"> Apartment </label>
                            </p>

                            <p>
                                <label class="amenities"> Amenities: <?php echo $proprows['amenities']; ?> </label>
                            </p>

                            <p>
                                <label class="beds-baths"> Bedrooms: <strong><?php echo $proprows['room_num']; ?></strong> </label>
                                <label class="beds-baths"> Bathrooms: <strong><?php echo $proprows['bath_num']; ?></strong> </label>
                                <label class="area"> Area: <strong><?php echo $proprows['area']; ?></strong> sqft </label>
                            </p>



                        </div>



                    </form>



                </div>

            </a>

        </div>
        <?php }
        }
        ?>


    </section>


</body>

</html>