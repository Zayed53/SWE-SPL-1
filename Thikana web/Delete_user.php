<?php
    require 'config.php';
    if(isset($_GET['email'])){
        $mail=$_GET['email'];
        $delemail=$mail;
        $dltmsql="DELETE FROM userstry WHERE email='$mail'";
        mysqli_query($conn, $dltmsql);
        echo  
        "<script> alert('deleted user'); window.location.href='all_user.php'; </script> ";
    }
?>