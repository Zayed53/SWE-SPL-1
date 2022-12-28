<?php error_reporting (E_ALL ^ E_NOTICE); ?>

<?php
require 'config.php';

//echo $query;

$sql="SELECT * From request_table";
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
        if(isset($_POST['valid_req'])){
            if($rows['purpose']=="Rent"){
                $checkid=$rows['property_id'];
                $checksql="SELECT * FROM rents WHERE property_id=$checkid";
                $checkresult=mysqli_query($conn, $checksql);
                if(mysqli_num_rows($checkresult)>0){
                    $newemail=$rows['user_email'];
                    $update="UPDATE rents SET email='$newemail' WHERE property_id=$checkid";
                    $updateresult=mysqli_query($conn, $update);
                    if($updateresult){
                        // echo
                        // "<script> alert('done'); </script> ";
                        $dltsql="DELETE FROM request_table WHERE property_id=$checkid";
                        mysqli_query($conn, $dltsql);
                        unset($_POST['valid_req']);
                        echo  
                        "<script> alert('done'); window.location.href='admin_purpose_valid.php'; </script> ";
                        //header("Location:admin_purpose_valid.php");
                    }else{
                       echo  "<script> alert('failed'); </script> ";
                    }
                }else{
                    $inemail=$rows['user_email'];
                    $inid=$rows['property_id'];
                    $insertr="INSERT INTO rents(email, property_id) VALUES ('$inemail', '$inid')";
                    $insertrresult=mysqli_query($conn, $insertr);
                    if($insertrresult){
                        $dltsql="DELETE FROM request_table WHERE property_id=$checkid";
                        mysqli_query($conn, $dltsql);
                        unset($_POST['valid_req']);
                        echo  
                        "<script> alert('done'); window.location.href='admin_purpose_valid.php'; </script> ";
                        //header("Location:admin_purpose_valid.php");
                    }else{
                        echo  "<script> alert('failed'); </script> ";
                     }
                }
                
                //implement alter or new insert
            }
            else if($rows['purpose']=="Sell"){
                $checkid=$rows['property_id'];
                $checksql="SELECT * FROM owns WHERE property_id=$checkid";
                $checkresult=mysqli_query($conn, $checksql);
                if(mysqli_num_rows($checkresult)>0){
                    $newemail=$rows['user_email'];
                    $update="UPDATE owns SET email='$newemail' WHERE property_id=$checkid";
                    $updateresult=mysqli_query($conn, $update);
                    if($updateresult){
                        $dltsql="DELETE FROM request_table WHERE property_id=$checkid";
                        mysqli_query($conn, $dltsql);
                        unset($_POST['valid_req']);
                        echo  
                        "<script> alert('done'); window.location.href='admin_purpose_valid.php'; </script> ";
                        //header("Refresh:0");
                    }else{
                       echo  "<script> alert('failed'); </script> ";
                    }
                }else{
                    $inemail=$rows['user_email'];
                    $inid=$rows['property_id'];
                    $insertr="INSERT INTO owns(email, property_id) VALUES ('$inemail', '$inid')";
                    $insertrresult=mysqli_query($conn, $insertr);
                    if($insertrresult){
                        $dltsql="DELETE FROM request_table WHERE property_id=$checkid";
                        mysqli_query($conn, $dltsql);
                        unset($_POST['valid_req']);
                        echo  
                        "<script> alert('done'); window.location.href='admin_purpose_valid.php'; </script> ";
                        //header("Refresh:0");
                    }else{
                        echo  "<script> alert('failed'); </script> ";
                     }
                }

                //implement alter or new insert
            }
        }
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
                        <label class="user email"><?php echo $rows['user_email']; ?> </label>
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
                    <!-- <input type="submit"  value="Validate Request" class="btn" id="valid_req" name="valid_req"> -->
        

                    

                </div>
                

            </form>
            




        </div>
       </a>
    </div>
    

    

    

    

    <?php }
    } ?>

</body>

</html>
