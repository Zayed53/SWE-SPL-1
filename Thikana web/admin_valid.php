<?php error_reporting (E_ALL ^ E_NOTICE); ?>

<?php
require 'config.php';

//echo $query;

$sql="SELECT * From property WHERE valid=0";
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

    <link rel="stylesheet" href="Admin_search_result_style.css">
</head>

<body>
<div class="sidebar">
        <header>THIKANA</header>
        <ul>
        <li><a href="admin_valid.php" style="text-decoration:none">View Requests</a></li>
         <li><a href="admin_purpose_valid.php" style="text-decoration:none">Enlist Property</a></li>
         <li><a href="Admin_review.php" style="text-decoration:none">View Properties</a></li>
         <li><a href="all_user" style="text-decoration:none">View users</a></li>
        </ul>
    </div>

    
<section class="admin_valid">
<?php
    if($check){
       while($rows=$result->fetch_assoc()){
            $id=$rows['id'];
        ?>



    <span class="title"></span>
    
    <div class="container">
        

        <a class="link" href="property_valid.php?id=<?php echo $rows['id'] ?>">
        

        <div class="form">
            <form action="#" method="post">
                
            
                <div class="results">
                
                    <p>
                        <label class="property ID"><?php echo $rows['id']; ?> </label>
                    </p>
                    <p>
                        <label class="location"><?php echo $rows['location'].", ".$rows['district'].", ".$rows['division']; ?> </label>
                    </p>
                    

                    <p>
                        <label class="apartment"> <?php echo $rows['seller_email']; ?>  </label>
                    </p>
                    
                    <p>
                        <label class="amenities"> Purpose: <?php echo $rows['purpose']; ?> </label>
                    </p>
                </div>
                

            </form>
            




        </div>
       </a>
    </div>
    
    

    

    

    

    <?php }
    } ?>
</section>
</body>

</html>

