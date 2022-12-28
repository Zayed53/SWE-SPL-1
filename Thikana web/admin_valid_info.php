<?php
require 'config.php';
if(isset($_GET['id'])){
    $ID=$_GET['id'];
    $sql="SELECT * FROM property WHERE id=$ID";
    $result=mysqli_query($conn, $sql);
    $rows=mysqli_fetch_array($result);
    if(isset($_POST['valid_it'])){
        //echo "eita kam korse"
        $ID=$rows['id'];
        $updt="UPDATE property SET valid = 1 WHERE id = $ID";
        $check=mysqli_query($conn, $updt);
        if($check){
            echo
            "<script> alert('New Property is validated'); window.location.href='admin_valid.php'; </script> ";
        }else{
            echo
            "<script> alert('Property validation failed'); </script> ";
        }
    }else if(isset($_POST['not_valid_it'])){
        $delid=$rows['id'];
        $dlt="DELETE FROM property WHERE id=$delid";
        $check2=mysqli_query($conn, $dlt);
        if($check2){
            echo
            "<script> alert('Property is deleted'); window.location.href='admin_valid.php'; </script> ";
        }else{
            echo
            "<script> alert('Property delete failed'); </script> ";
        }
    }
    
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Information show</title>

    <link rel="stylesheet" href="info_show.css">
</head>
<body>

    <span class="title">Information</span>

    <div class="container">
    
        

        <div class="form">
            

            <form action="#" method="post">

                <div class="information">
                    <p> 
                        <label class="line"> Number of rooms : </label>
                        <label class="line">  <strong> <?php echo $rows['room_num']; ?> </strong> </label>
                    </p>

                    <p> 
                        <label class="line"> Number of Bathrooms : </label>
                        <label class="line">  <strong> <?php echo $rows['bath_num']; ?> </strong> </label>
                    </p>

                    <p> 
                        <label class="line"> Apartment size : </label>
                        <label class="line">  <strong> <?php echo $rows['area']; ?> </strong> sqft </label>
                    </p>

                    <p> 
                        <label class="line"> District : </label>
                        <label class="line">  <strong> <?php echo $rows['district']; ?> </strong> </label>
                    </p>

                    <p> 
                        <label class="line"> Division : </label>
                        <label class="line">  <strong> <?php echo $rows['division']; ?> </strong> </label>
                    </p>

                    <p> 
                        <label class="line"> Local area : </label>
                        <label class="line">  <strong> Mohammodpur </strong> </label>
                    </p>

                    <p> 
                        <label class="line"> Location : </label>
                        <label class="line">  <strong> <?php echo $rows['location']; ?> </strong> </label>
                    </p>

                    <p> 
                        <label class="line"> Purpose : </label>
                        <label class="line">  <strong> <?php echo $rows['purpose']; ?></strong> </label>
                    </p>

                    <p> 
                        <label class="line"> Amenities : </label>
                        <label class="line">  <strong> <?php echo $rows['amenities']; ?> </strong> </label>
                    </p>

                    <p> 
                        <label class="line"> Price : </label>
                        <label class="line">  <strong> <?php echo $rows['price']; ?> /= </strong> </label>
                    </p>
                    <input type="submit"  value="Validate Property" class="btn" id="valid_it" name="valid_it">
                    <input type="submit"  value="reject Property" class="btn" id="not_valid_it" name="not_valid_it">

             

                </div>



            </form>



        </div>
    </div>    

    



</body>

</html>