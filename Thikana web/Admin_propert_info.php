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
                                if(isset($_POST['del_rev'])){
                                    $dltemail=$rev_rows['reviewer_email'];
                                    $dltsql="DELETE from review_table where reviewer_email='$dltemail'"; 
                                    mysqli_query($conn, $dltsql);
                                }
                        ?>
                        <form method="post">
                        <div class="review-box">
                            <label> 
                                <?php echo "Rating:".$rev_rows['rate']."/5"."<br>".$rev_rows['text']."\n"."\t\t-".$rev_rows['reviewer_name']; ?>
                            </label>
                            <input type="submit"  value="delete review" class="btn" id="del_rev" name="del_rev">
                        </div>
                        </form>
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