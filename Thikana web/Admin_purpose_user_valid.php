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
<div class="sidebar">
        <header>THIKANA</header>
        <ul>
         <li><a href="/Provide Info/provide_info.html">Validate Information</a></li>
         <li><a href="#">Validate Property</a></li>
         <li><a href="/User Validation/user_validation.html">Validate User</a></li>
         <li><a href="#">Validate Review</a></li>
        </ul>
</div>

<section class="user_validation">


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
                            //implement reject button
                            
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
                                <!-- <input type="submit" value="Validate User" id="valid_req" name="valid_req" class="btn"> -->
                                <a class="btn" href="valid_buy_rent.php?id=<?php echo $ID?>&email=<?php echo $userrows['user_email']?>&pur=<?php echo $purp?>" style="text-decoration:none"> <?php echo "Accept" ?></a> 
                            
                                <a class="btn" href="reject_request.php?id=<?php echo $ID?>&email=<?php echo $userrows['user_email']?>" style="text-decoration:none"> <?php echo "Reject" ?></a>
                            </div>

                        </block>

                        

                        

                    </div>
                    <?php
                        }
                        }
                        ?>


                </form>
                    

                    
                
            </section>
                

                

            </block>
            

            
            

        </div>
        

        
    </div>


</section>

</body>

</html>