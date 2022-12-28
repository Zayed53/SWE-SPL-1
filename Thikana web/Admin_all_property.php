<?php
    require 'config.php';
    $sql="SELECT * From property WHERE valid=1";
    $result=mysqli_query($conn, $sql);
    
    if(mysqli_num_rows($result)>0){
        $check=true;
    }else{
        $check=false;
        echo "<script> alert('No result found'); </script> ";
    }
?>