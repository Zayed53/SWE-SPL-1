<?php
    if(isset($_POST['valid_prop'])){
        //echo "ashse ekhane";
        header("location:admin_valid.php");
    }
    else if(isset($_POST['valid_req'])){
        header("location:admin_purpose_valid.php");
    }else if(isset($_POST['review'])){
        header("location:Admin_review.php");
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

    <span class="title"> Dashboard </span>

    <div class="container">

        

        <div class="form">
            

            <form action="#" method="post">

                <div class="dashboard">
                    
                  
                  <input type="submit" value="Validate Request" class="btn" id="valid_req" name="valid_req">

                  <input type="submit"  value="Validate Property" class="btn" id="valid_prop" name="valid_prop">
                    
                  <input type="submit" value="view all property" class="btn" id="review" name="review">
                  
                  <input type="button" value="Validate User" class="btn" id="">

                </div>



            </form>



        </div>
    </div>

    

    

    



</body>

</html>