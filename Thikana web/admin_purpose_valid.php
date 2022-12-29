<?php error_reporting (E_ALL ^ E_NOTICE); ?>

<?php
require 'config.php';

//echo $query;

$sql="SELECT DISTINCT property_id, purpose From request_table";
$result=mysqli_query($conn, $sql);

if(mysqli_num_rows($result)>0){
    $check=true;
}else{
    $check=false;
    echo "<script> alert('No result found');window.location.href='admin_dash.php'; </script> ";
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
<?php
    if($check){
       while($rows=$result->fetch_assoc()){
        $ID=$rows['property_id'];
        //echo $mail;
        $detailssql="SELECT * FROM property WHERE id=$ID";
        //echo $detailssql;
        $detailresult=mysqli_query($conn, $detailssql);
        //echo $detailresult;
        $detailrows=mysqli_fetch_array($detailresult);
        echo "<script>
        if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
        }
        </script>";
        ?>

    <span class="title"></span>
    
    <div class="container">
        
        <a class="link" href="Admin_purpose_user_valid.php?id=<?php echo $rows['property_id'] ?>">
        <div class="form">
           
            
            <form action="#" method="post">
                
            
                <div class="results">
                
                    <!-- <p> 
                        <label class="currency"> BDT </label> 
                        <label class="amount"> <?php echo $rows['price']; ?> </label> 
                    </p> -->
                    
                    <p>
                        <label class="property ID"><?php echo $rows['property_id']; ?> </label>
                    </p>
                    <p>
                        <label class="user email"><?php echo $detailrows['location']; ?> </label>
                    </p>

                    <p>
                        <label class="apartment"> <?php echo $rows['purpose'] ?> </label>
                    </p>
                    
                    <!-- <p>
                        <label class="amenities"> Amenities: <?php echo $rows['amenities']; ?> </label>
                    </p>

                    <p>
                        <label class="beds-baths"> Bedrooms: <strong><?php echo $rows['room_num']; ?></strong> </label>
                        <label class="beds-baths"> Bathrooms: <strong><?php echo $rows['bath_num']; ?></strong> </label>
                        <label class="area"> Area: <strong><?php echo $rows['area']; ?></strong> sqft </label>
                    </p> --> 
                    
        

                    

                </div>
                

            </form>
            




        </div>
       </a>
    </div>
    

    

    

    

    <?php }
    } ?>

</body>

</html>
