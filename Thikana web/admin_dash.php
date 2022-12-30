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
         <li><a href="admin_purpose_valid.php">Enlist Property</a></li>
         <li><a href="Admin_review.php">View Properties</a></li>
         <li><a href="all_user">View users</a></li>
        </ul>
    </div>

    <section class="admin_dashboard">

        <span class="title"> Dashboard </span>

        <div class="container">

            

            <div class="form">
                
                <div class="welcome-admin">
                <span >
                    Welcome Admin!
                </span>
                </div>

                <form action="#" method="post">

                    <block class="block">
                        
                    
                        <section id="left-one" >

                            <div class="information">

                                <p>
                                    <strong>View Request</strong>
                                </p>
    
                                <p>
                                    Clients will look for their desired properties and will send rent 
                                    or buy requests. The Admin will be able to look at all the requests 
                                    that came from the client's side. Then the Admin will choose to accept
                                    or reject the requests.
                                </p>

                            </div>
                            

                        </section>
                      
                        <section id="right-one">
                        
                            <div class="information">

                                <p >
                                    <strong>Enlist Properties</strong>
                                </p>
    
                                <p>
                                    The list of properties will be shown here. The Admin will be
                                    able to see all the properties that are to be listed. Then the 
                                    Admin will be able to accept or reject the properties enlisted.
                                </p>
                                
                            </div>

                        </section>
                
    
                    </block>


                    <block class="block">
                        
                    
                        <section id="left-one" >

                            <div class="information">

                                <p>
                                    <strong>View Properties</strong>
                                </p>
    
                                <p>
                                    The properties will be listed here. The Admin will be able to 
                                    see all the properties that are already listed in the website.
                                    Then he/she will be able to perform necessary changes on the properties.
                                </p>

                            </div>
                            

                        </section>
                      
                        <section id="right-one">
                        
                            <div class="information">

                                <p>
                                    <strong>View Users</strong>
                                </p>
    
                                <p>
                                    There will several users listed here. The Admin will be able to
                                    see already listed users and also the users that are yet to be 
                                    validated. The Admin will be able to take proper actions after seeing
                                    the user information.
                                </p>
                                
                            </div>
                            
                        </section>
                
    
                    </block>
                    

                    



                </form>



            </div>
        </div>

    </section>
</body>

</html>