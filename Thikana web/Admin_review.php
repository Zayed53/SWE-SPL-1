<?php error_reporting (E_ALL ^ E_NOTICE); ?>

<?php
require 'config.php';
$purp=$_POST['purp'];
if(isset($_POST['purp']))
{
    $query="purpose='$purp' AND valid=1";
}
else
{
    $query="purpose='Sell' OR purpose = 'Rent' AND valid=1";
}


//echo $query;

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
<?php
    if($check){
       while($rows=$result->fetch_assoc()){
            $id=$rows['id'];
            $sqlimg="SELECT image from images where id=$id LIMIT 1";
            $resultimg=mysqli_query($conn, $sqlimg);
            $imgrows=mysqli_fetch_array($resultimg);
        ?>

    <span class="title"></span>
    
    <div class="container">
        

        <a class="link" href="Admin_propert_info.php?id=<?php echo $rows['id'] ?>">
        

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
    

    

    

    

    <?php }
    } ?>

</body>

</html>
