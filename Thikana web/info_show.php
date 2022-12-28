<?php
require 'config.php';
session_start();
if(!empty($_SESSION["email"])){
    $check=true;
    $mail=$_SESSION["email"];
    $name=$_SESSION["name"];
}
else{
    $check=false;
    
}
if(isset($_GET['id'])){
    $ID=$_GET['id'];
    $sql="SELECT * FROM property WHERE id=$ID";
    $result=mysqli_query($conn, $sql);
    $rows=mysqli_fetch_array($result);   
}

if(isset($_POST['Rent'])){
    $id=$rows['id'];
    $purp=$rows['purpose'];
    $queryr="INSERT INTO request_table (user_email, property_id, purpose ) VALUES('$mail', '$id', '$purp')";
    $insertr=mysqli_query($conn, $queryr);
    if($insertr){
        echo 
        "<script> alert('Rent request sent');  </script> ";
    }else{
        "<script> alert('Rent request failed');  </script> ";
    }
    echo "<script>
    if ( window.history.replaceState ) {
    window.history.replaceState( null, null, window.location.href );
    }
    </script>";
    
}
else if(isset($_POST['Buy'])){
    $id=$rows['id'];
    $purp=$rows['purpose'];
    $queryr="INSERT INTO request_table (user_email, property_id, purpose ) VALUES('$mail', '$id', '$purp')";
    $insertr=mysqli_query($conn, $queryr);
    if($insertr){
        echo 
        "<script> alert('Buy request sent');  </script> ";
    }else{
        "<script> alert('Buy request failed');  </script> ";
    }
    echo "<script>
    if ( window.history.replaceState ) {
    window.history.replaceState( null, null, window.location.href );
    }
    </script>";
    
}

if(isset($_POST['review'])){
    $rating=$_POST['rate'];
    $property=$rows['id'];
    $user_mail=$mail;
    $user_name=$name;
    $review=$_POST['reviewComments'];
    //echo "rate".$rating."property= ".$property."user_mail= ".$user_mail."username= ".$user_name."review= ".$review;
    $query_review="INSERT INTO review_table (property_id,  	reviewer_email, reviewer_name, rate, text) VALUES('$property', '$user_mail','$user_name','$rating', '$review')";
    $insert_review=mysqli_query($conn, $query_review);
    if($insert_review){
        echo 
        "<script> alert('review added');  </script> ";
    }else{
        "<script> alert('review addition failed');  </script> ";
    }
    //header("location: info_show.php");
    //echo "<script> console.log(kam korse);</script>";
    echo "<script>
    if ( window.history.replaceState ) {
    window.history.replaceState( null, null, window.location.href );
    }
    </script>";
}






?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Information show</title>

    <link rel="stylesheet" href="info_show1.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />

</head>

<body>

    <header>
        <a class="site_name" href="/Home/home.html">THIKANA.COM</a>
        <nav>
            <ul class="nav_links">
                <li><a href="home.php">Home</a></li>
                <li><a href="#">About</a></li>
                <li><a href="#">Services</a></li>
                <li><a href="#">Contact</a></li>
                <li><a href="/Add Property/Add_Property.html">Add Property</a></li>
            </ul>
        </nav>
        <p class="lbutton">Log in</p>
    </header>

    <section class="showInfo">
        <!-- <span class="title">Details</span> -->

        <div class="container">


            <div class="form">

                <block class="block">

                    <section id="image-show">
                        <!-- <img src="/Info Show/Arrr.png"/> -->

                        <!-- Slider main container -->
                        <div class="swiper">
                            <!-- Additional required wrapper -->
                            <div class="swiper-wrapper">
                            <?php
                            $id=$rows['id'];
                            $sqlimg="SELECT image from images where id=$id ";
                            $resultimg=mysqli_query($conn, $sqlimg);
                            while($imgrows=$resultimg->fetch_assoc()){
                            //$imgrows=mysqli_fetch_array($resultimg);
                            ?>
                                <!-- Slides -->
                                <div class="swiper-slide"> <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($imgrows['image']); ?>" /></div>
                                <!-- <div class="swiper-slide"> <img src="/Info Show/Arrr.png" /> </div>
                                <div class="swiper-slide"> <img src="/Info Show/Arrr.png" /> </div>
                                <div class="swiper-slide"> <img src="/Info Show/Arrr.png" /> </div> -->
                            <?php } ?>
                            </div>

                            <!-- If we need pagination -->
                            <div class="swiper-pagination"></div>

                            <!-- If we need navigation buttons -->
                            <div class="swiper-button-prev"></div>
                            <div class="swiper-button-next"></div>


                        </div>

                    </section>


                    <section id="reviews">
                        <div>
                            <label id="review-text"> <strong> Reviews </strong> </label>
                        </div>
                        <?php
                        $revid=$rows['id'];
                        $sql_rev="SELECT * from review_table where property_id=$revid "; 
                        $rev_result=mysqli_query($conn, $sql_rev);
                        if(mysqli_num_rows($rev_result)>0){
                            while($rev_rows=$rev_result->fetch_assoc()){
                        ?>

                        <div class="review-box">
                            <label> 
                                <?php echo "Rating:".$rev_rows['rate']."/5"."<br>".$rev_rows['text']."\n"."\t\t-".$rev_rows['reviewer_name']; ?>
                            </label>
                        </div>
                        <?php
                            }
                        } else{ ?>

                        <div class="review-box">
                            <label> No review added yet.

                            </label>
                        </div>
                        <?php } ?>

                        <div class="margin-top-2rem">
                            <label id="review-text"> <strong> 
                            <?php
                            $rateid=$rows['id'];
                            $sql_rate="SELECT AVG(rate) FROM review_table where property_id=$rateid";
                            $rev_result=mysqli_query($conn, $sql_rate);
                            $rate=mysqli_fetch_array($rev_result);
                            echo $rate['AVG(rate)']."/5"?>    
                             </strong> </label>
                        </div>

                        <div class="margin-top-2rem">
                            <!-- <input type="submit" value="Add Review" class="btn"> -->
                            <!-- <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#form"> See Modal with Form </button> -->
                            <!-- <h2>Add Review</h2> -->


                            <!-- review add button -->
                            <?php
                                if($check){
                            ?>
                            <button id="review-add-btn" aria-label="add review" title="Add Review" class="btn">Add Review</button> 
                            <?php }else{ ?>
                                <a class="btn" href="LogIN.php"> <?php echo "LogIN to add review" ?></a> <?php } ?>
                            <!-- new modal code from here -->
                            <div id="modal" role="dialog" aria-modal="true" aria-labelledby="add-review-header" class="">
                            <button class="close-btn" aria-label="close" title="Close" class="btn" >x</button>
                            <div id="review-form-container">
                                <h2 id="add-review-header">Add Review</h2>
                                <!-- action form for review -->
                                <form id="review-form"   method="post"> 
                                <!-- action ="add_review.php" -->
                                <!-- <div class="fieldset">
                                    <label for="reviewName">Name</label>
                                    <input name="reviewName" id="reviewName" required="">
                                </div> -->
                                <div class="fieldset">
                                    <label>Rating</label>
                                    <div class="rate">
                                    <input type="radio" id="star5" name="rate" value=5 onkeydown="navRadioGroup(event)" onfocus="setFocus(event)" required="">
                                    <label for="star5" title="5 stars">5 stars</label>
                                    <input type="radio" id="star4" name="rate" value=4 onkeydown="navRadioGroup(event)">
                                    <label for="star4" title="4 stars">4 stars</label>
                                    <input type="radio" id="star3" name="rate" value=3 onkeydown="navRadioGroup(event)">
                                    <label for="star3" title="3 stars">3 stars</label>
                                    <input type="radio" id="star2" name="rate" value=2 onkeydown="navRadioGroup(event)">
                                    <label for="star2" title="2 stars">2 stars</label>
                                    <input type="radio" id="star1" name="rate" value=1 onkeydown="navRadioGroup(event)" onfocus="setFocus(event)">
                                    <label for="star1" title="1 star">1 star</label>
                                    </div>
                                </div>

                                <div class="fieldset">
                                    <label for="reviewComments">Comments</label>
                                    <textarea name="reviewComments" id="reviewComments" cols="20" rows="5" required=""></textarea>
                                </div>
                                <div class="fieldset right">
                                    <!-- <button id="submit-review-btn" class="btn">Save</button> -->
                                    <input type="submit" value="Save" class="btn" name="review" id="review"/>
                                </div>
                                </form>
                            </div>
                            </div>
                            <div class="modal-overlay"></div>
                            <!-- ends here -->
                            
                        </div>

                    </section>

                </block>


                <block>

                    <div class="results">
                        <p>
                            <label class="currency"> BDT </label>
                            <label class="amount"> <?php echo $rows['price']; ?> /= </label>
                        </p>

                        <p>
                            <label class="location"> <?php echo $rows['location'].",".$rows['district'].",".$rows['division']; ?></label>
                        </p>
                        <!-- <p>
                            <label class="location"> new test </label>
                        </p> -->

                        <p>
                            <label class="apartment"> Apartment </label>
                        </p>

                        <p>
                            <label class="beds-baths"> Bedrooms: <strong><?php echo $rows['room_num']; ?></strong> </label>
                            <label class="beds-baths"> Bathrooms: <strong><?php echo $rows['bath_num']; ?></strong> </label>
                            <label class="area"> Area: <strong><?php echo $rows['area']; ?></strong> sqft </label>
                        </p>

                        <p>
                            <label class="amenities"> Amenities: <?php echo $rows['amenities']; ?> </label>
                        </p>

                        <p>
                            <label class="margin-top-2rem"> </label>
                        </p>

                        <p>
                            <label class="description"> If you are looking for a home within an affordable range then
                                check this flat.
                                Well fitted with gas, electricity and water supplies, this flat is ideal to move in for
                                new inhabitants.
                                After entering the flat, you will find ample rooms cited for your recessing time and
                                also happy dine hour.
                                The kitchen area is just close to the dining space which gives the impression of ample
                                light and space
                                to have a content cooking time. Well-fitted bathrooms with resilient fixtures as per
                                your prerequisites.
                                Lots of restaurants, shopping places and schools are nearby as well as parks so the
                                neighborhood is great as well.
                            </label>
                        </p>


                        <p>
                            <label class="margin-top-2rem"> </label>
                        </p>
                        <p>
                            <label class="margin-top-2rem"> </label>
                        </p>


                    </div>


                </block>



                <block class="block">

                    <form id="button_form" method="post">
                    <?php 
                    if($check) {
                        if($rows['purpose']=="Rent"){?>
                        <div class="buttons">
                            <input type="submit" value="Rent Request" class="btn" name="Rent" id="Rent">
                        </div>
                        <?php 
                        }else{ ?>

                        <div class="buttons">
                            <input type="submit" value="Buy Request" class="btn" id="Buy" name="Buy">
                        </div>
                        <?php 
                        }
                    } ?>
                    </form>

                </block>




            </div>
        </div>

    </section>


    <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>

    <script>

        const swiper = new Swiper('.swiper', {

            autoplay:
            {
                delay: 3000,
                disableOnInteraction: false,
            },

            loop: true,

            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },

            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },


        });

    </script>
    <!-- js for modal -->
    <script src="modal.js">

    </script>
    <!-- script for comment submission -->
    <!-- <script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
    <script type="text/javascript">
    <script src="review.js"> </script> -->

    

</body>

</html>