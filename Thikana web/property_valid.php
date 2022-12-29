<?php
require 'config.php';
if(isset($_GET['id'])){
    $ID=$_GET['id'];
    $sql="SELECT * FROM property WHERE id=$ID";
    $result=mysqli_query($conn, $sql);
    $rows=mysqli_fetch_array($result);
}    //$ID=$rows['id'];
    if(isset($_POST['valid_it'])){
        //image part is here
        // will be updated.
        if(!empty($_FILES["image"]["name"])){
            $fileName = basename($_FILES["image"]["name"]);
            $fileType = pathinfo($fileName, PATHINFO_EXTENSION);
            // Allow certain file formats 
            $allowTypes = array('jpg', 'png', 'jpeg');
            if (in_array($fileType, $allowTypes)) {
            $image = $_FILES['image']['tmp_name'];
            $imgContent = addslashes(file_get_contents($image));
          
             
                //nsert image content into database 
            $insert ="INSERT into images (id,image) VALUES ('$ID','$imgContent')";
            $sql=mysqli_query($conn, $insert);
            }
        } else{
            echo
            "<script> alert('please select a image'); </script> ";
        }
        // $ID=$rows['id'];
        $descript=$_POST['Discription'];
        $amenities=$_POST['amenities'];
        $price=$_POST['price'];
        echo $descript.$amenities.$price;
        $updt="UPDATE property SET valid = 1, Description= '$descript', amenities= '$amenities' , price=$price WHERE id = $ID";
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
    



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Showing Search Result</title>

    <link rel="stylesheet" href="provide_info_style.css">
</head>
<body>
<div class="sidebar">
   <header>THIKANA</header>
    <ul>
     <li><a href="/Provide Info/provide_info.html">Validate Information</a></li>
     <li><a href="#">Validate Property</a></li>
     <li><a href="/User Validation/user_validation.html">Validate User</a></li>
     <li><a href="#">Validate Review</a></li>
    </ul>
</div>


<section class="validate_info">

    <span class="title">Provide Information</span>


    <div class="container">
        

        <div class="form">
        <form action="#" method="post" enctype="multipart/form-data">  

            <block class="block">

                <section id="info-show">

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
                            <label class="line"> Location : </label>
                            <label class="line">  <strong> <?php echo $rows['location']; ?> </strong> </label>
                        </p>
    
                        <p> 
                            <label class="line"> Purpose : </label>
                            <label class="line">  <strong> <?php echo $rows['purpose']; ?> </strong> </label>
                        </p>

                    </div>
                
                    <h2>Give Image</h2>
                    <div id="image-upload" >
                        <input type="file" name="image"/>
                        <input type="file" name="image"/>
                        <input type="file" name="image"/>
                    </div>
                    <!-- <a href="item_add.php"> item add </a> <br>
                    <a href="LogOUT.php">Log out </a> -->
                    <div class="check-box">

                        <input type="checkbox" class="option-input">
                        I Confirm that the information is valid

                    </div>

                </section>


              
                <section id="right-side">

                    <textarea class="textarea" name="Discription" placeholder="Add Description..."></textarea>

                    <textarea class="textarea" name="amenities" placeholder="Add Amenities..."></textarea>

                    <input class="textarea" type="number" id="price" name="price" placeholder="Add Price...">
                
                </section>



                

            </block>

            
            <div class="buttons">
                <input type="submit" value="Validate Information" class="btn" id="valid_it" name="valid_it">
            </div>

            <div class="buttons">
                <input type="submit" value="Reject Information" class="btn" id="not_valid_it" name="not_valid_it">
            </div>
            
        </form>
        </div>

        
    </div>

    

    

    
</section>


</body>

</html>