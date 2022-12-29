<?php
    if(isset($_POST['valid_prop'])){
        //echo "ashse ekhane";
        header("location:admin_valid.php");
    }
    else if(isset($_POST['valid_req'])){
        header("location:admin_purpose_valid.php");
    }else if(isset($_POST['review'])){
        header("location:Admin_review.php");
    }else if(isset($_POST['view'])){
        header("location:all_user.php");
    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>

    <link rel="stylesheet" href="admin_dashboard.css">
</head>
<body>
    
    <div class="sidebar">
        <header>THIKANA</header>
        <ul>
         <li><a href="admin_valid.php">View Request</a></li>
         <li><a href="admin_purpose_valid.php">Enist property</a></li>
         <li><a href="#">view all property</a></li>
         <li><a href="Admin_review.php">View users</a></li>
        </ul>
    </div>

    <section class="validate_info">

        <span class="title"> Dashboard </span>

        <div class="container">

            

            <div class="form">
                

                <form action="#" method="post">

                    <div class="dashboard">
                        
                    
                    <input type="submit" value="View Requests" class="btn" id="valid_req" name="valid_req">

                    <input type="submit"  value="Enlist Property" class="btn" id="valid_prop" name="valid_prop">
                        
                    <input type="submit" value="view all property" class="btn" id="review" name="review">
                    
                    <input type="submit" value="view users" class="btn" id="view" name="view">

                    </div>



                </form>



            </div>
        </div>

    </section>
</body>

</html>