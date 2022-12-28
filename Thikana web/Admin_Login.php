<?php
    require 'config.php';
    if(isset($_POST['login'])){
        $username=$_POST['User'];
        $password=$_POST['Pass'];
        $sql="SELECT * FROM admin WHERE Username='$username' AND Password='$password'";
        $result=mysqli_query($conn, $sql);
        if(mysqli_num_rows($result)>0){
            echo  
                "<script> alert('login  done'); </script> ";
                header("location: admin_dash.php");
        }
    }
    

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Login</title>
  <link rel="stylesheet" href="admin_style.css">
</head>
<body>

  <h2 class="sitename">THIKANA.COM</h2>
    
  
  <div class="container">
    
    <div class="adminform">
      <form method="post">
        <h2>ADMIN LOGIN</h2>
        <input type="text" name="User" id="User" placeholder="Admin Name">
        <input type="password" name="Pass" id="Pass" placeholder="Password">
        <button type="submit" name="login">LOGIN</button>
      </form>
    </div>
    <!-- <div class="image">
      <img src="/Images/man-with-laptop-light.png">
    </div> -->
  </div>

</body>
</html>