<?php error_reporting (E_ALL ^ E_NOTICE); ?>

<?php
require 'config.php';

//echo $query;

$sql="SELECT * From userstry";
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
         <li><a href="#" style="text-decoration:none">Validate Information</a></li>
         <li><a href="#" style="text-decoration:none">Validate Property</a></li>
         <li><a href="#" style="text-decoration:none">Validate User</a></li>
         <li><a href="#" style="text-decoration:none">Validate Review</a></li>
        </ul>
</div>
<section class="admin_valid">
<?php
    if($check){
       while($rows=$result->fetch_assoc()){
            // $id=$rows['id'];
        ?>


    <span class="title"></span>
    
    <div class="container">
        

        <!-- <a class="link" href="property_valid.php?id=<?php echo $rows['id'] ?>"> -->
        

        <div class="form">
            <form action="#" method="post">
                
            
                <div class="results">
                
                    <p> 
                        <label class="amount"> <?php echo "Name: ".$rows['username']; ?> </label> 
                    </p>
                    
                    <p>
                        <label class="location"><?php echo "Email: ".$rows['email']; ?> </label>
                    </p>
                    <p>
                        <label class="location"><?php echo "Phone No: ".$rows['phone_no']; ?> </label>
                    </p>
                    <p>
                        <label class="amenities"> <?php echo "NID No: ".$rows['nid_no']; ?> </label>
                    </p>

                    <p>
                        <label class="apartment"> <?php echo "address: ".$rows['address']; ?>  </label>
                    </p>
                    
                    
                </div>
                <div class="buttons">
                <a class="btn"href="Delete_user.php?email=<?php echo $rows['email']?>" style="text-decoration:none"> <?php echo "Delete user" ?></a>
                </div>

            </form>
            




        </div>
       <!-- </a> -->
    </div>
    

    

    

    

    <?php }
    } ?>
</section>
</body>

</html>

