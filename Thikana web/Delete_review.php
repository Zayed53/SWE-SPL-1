<?php
    require 'config.php';
    if(isset($_GET['email'])){
        $ID=$_GET['id'];
        $mail=$_GET['email'];
        $txt=$_GET['text'];
        $dltsql="DELETE from review_table where reviewer_email='$mail' AND text='$txt' AND property_id='$ID'"; 
        mysqli_query($conn, $dltsql);
        echo  
        "<script> alert('deleted review); window.location.href='Admin_propert_info.php'; </script> ";
    }
?>