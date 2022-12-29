<?php
    require 'config.php';
    if(isset($_GET['id'])){
        $ID=$_GET['id'];
        $mail=$_GET['email'];
        $delemail=$mail;
        $dltmsql="DELETE FROM request_table WHERE user_email='$delemail'";
        mysqli_query($conn, $dltmsql);
        echo  
        "<script> alert('deleted user'); window.location.href='admin_purpose_valid.php'; </script> ";
    
    }
?>