<?php
$conn=mysqli_connect("localhost", "root", "", "try_user");

if(!$conn){
    die("Connection Error". mysqli_connect_error());
    //echo "not connected";
}
else{
    //echo "Connected Successfully";
}
?>
