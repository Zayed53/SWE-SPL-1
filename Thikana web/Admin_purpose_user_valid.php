<?php
    require 'config.php';
    if(isset($_GET['id'])){
        $ID=$_GET['id'];
        $sql="SELECT * FROM property WHERE id=$ID";
        $result=mysqli_query($conn, $sql);
        $rows=mysqli_fetch_array($result);
        $purp=$rows['purpose'];
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Validation</title>

    <link rel="stylesheet" href="user_validation_style.css">
</head>
<body>

    <span class="title">User Validation</span>


    <div class="container">
        

        <div class="form">
            

            <block class="block">

                <section id="info-show">

                    <div class="left-container">

                        <span class="information" id="user-information">  Property Information  </span>


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
                                <label class="line">  <strong> <?php echo $rows['division']; ?>  </strong> </label>
                            </p>
        
                            <p> 
                                <label class="line"> Location : </label>
                                <label class="line">  <strong> <?php echo $rows['location']; ?> </strong> </label>
                            </p>
        
                            <p> 
                                <label class="line"> Purpose : </label>
                                <label class="line">  <strong> <?php echo $rows['purpose']; ?> </strong> </label>
                            </p>
        
                            <p> 
                                <label class="line"> Amenities : </label>
                                <label class="line">  <strong> <?php echo $rows['amenities']; ?> </strong> </label>
                            </p>
        
                            <p> 
                                <label class="line"> Price : </label>
                                <label class="line">  <strong> <?php echo $rows['price']; ?>/= </strong> </label>
                            </p>
    
                        </div>

                    </div>
                    

                </section>
                <?php
                $usersql="SELECT user_email FROM request_table WHERE property_id=$ID";
                $userresult=mysqli_query($conn, $usersql);
                if(mysqli_num_rows($userresult)>0){
                    $check=true;
                }else{
                    $check=false;
                    echo "<script> alert('No result found');window.location.href='admin_dash.php'; </script> ";
                }
                ?>
                 <?php
                    if($check){
                        while($userrows=$userresult->fetch_assoc()){
                            $mail=$userrows['user_email'];
                            //echo $mail;
                            $detailssql="SELECT * FROM userstry WHERE email='$mail'";
                            //echo $detailssql;
                            $detailresult=mysqli_query($conn, $detailssql);
                            //echo $detailresult;
                            $detailrows=mysqli_fetch_array($detailresult);
                            //here is the validation part
                            if(isset($_POST['valid_req'])){
                                if($purp=="Rent"){
                                    $checkid=$ID;
                                    //here to change
                                    $checksql="SELECT * FROM rents WHERE property_id=$checkid";
                                    $checkresult=mysqli_query($conn, $checksql);
                                    if(mysqli_num_rows($checkresult)>0){
                                        $newemail=$userrows['user_email'];
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
                                        $inemail=$userrows['user_email'];
                                        $inid=$ID;
                                        $insertr="INSERT INTO rents(email, property_id) VALUES ('$inemail', '$inid')";
                                        $insertrresult=mysqli_query($conn, $insertr);
                                        if($insertrresult){
                                            $dltsql="DELETE FROM request_table WHERE property_id=$checkid";
                                            mysqli_query($conn, $dltsql);
                                            $updtsql="UPDATE property SET searchable=0 WHERE id=$checkid";
                                            $updateproperty=mysqli_query($conn, $updtsql);
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
                                else if($purp=="Sell"){
                                    $checkid=$ID;
                                    $checksql="SELECT * FROM owns WHERE property_id=$checkid";
                                    $checkresult=mysqli_query($conn, $checksql);
                                    if(mysqli_num_rows($checkresult)>0){
                                        $newemail=$userrows['user_email'];
                                        $update="UPDATE owns SET email='$newemail' WHERE property_id=$checkid";
                                        $updateresult=mysqli_query($conn, $update);
                                        if($updateresult){
                                            $dltsql="DELETE FROM request_table WHERE property_id=$checkid";
                                            mysqli_query($conn, $dltsql);
                                            $updtsql="UPDATE property SET searchable=0 WHERE id=$checkid";
                                            $updateproperty=mysqli_query($conn, $updtsql);
                                            unset($_POST['valid_req']);
                                            echo  
                                            "<script> alert('done'); window.location.href='admin_purpose_valid.php'; </script> ";
                                            //header("Refresh:0");
                                        }else{
                                           echo  "<script> alert('failed'); </script> ";
                                        }
                                    }else{
                                        $inemail=$userrows['user_email'];
                                        $inid=$ID;
                                        $insertr="INSERT INTO owns(email, property_id) VALUES ('$inemail', '$inid')";
                                        $insertrresult=mysqli_query($conn, $insertr);
                                        if($insertrresult){
                                            $dltsql="DELETE FROM request_table WHERE property_id=$checkid";
                                            mysqli_query($conn, $dltsql);
                                            $updtsql="UPDATE property SET searchable=0 WHERE id=$checkid";
                                            $updateproperty=mysqli_query($conn, $updtsql);
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
                            }//implement reject button
                            if(isset($_POST['reject'])){
                                $delemail=$userrows['user_email'];
                                $dltmsql="DELETE FROM request_table WHERE user_email='$delemail'";
                                mysqli_query($conn, $dltmsql);

                            }
                            
                            echo "<script>
                            if ( window.history.replaceState ) {
                            window.history.replaceState( null, null, window.location.href );
                            }
                            </script>";    
                            
                        
                    ?>
                <section id="right-side">
               
                <form action="#" method="post">
                    <div class="right-container">
                    

                        <span class="information" id="user-information">  User Information  </span>
                        

                        <block class="block">

                            <div class="information">
                                <p> 
                                    <label class="line"> Name : </label>
                                    <label class="line">  <strong> <?php echo $detailrows['username']; ?> </strong> </label>
                                </p>
                            
    
                                <p> 
                                    <label class="line"> Purpose : </label>
                                    <label class="line"> <?php echo $detailrows['email'];?>  <strong>  </strong> </label>
                                </p>
    
                                <p> 
                                    <label class="line"> NID : </label>
                                    <label class="line">  <strong> <?php echo $detailrows['nid_no']; ?> </strong> </label>
                                </p>
    
                            </div>

                            <div class="buttons">
                                <input type="submit" value="Validate User" id="valid_req" name="valid_req" class="btn">
                            
                                <input type="submit" value="Reject User" class="btn" id="reject" name="reject">
                            </div>

                        </block>

                        

                    </div>


                </form>
                    

                    
                
                </section>
                <?php
                    }
                }
                ?>

                

            </block>

            
            

        </div>

        
    </div>




</body>

</html>