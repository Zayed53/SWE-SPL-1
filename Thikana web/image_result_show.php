<?php
require 'config.php';

?>

<!Doctype html>
<html>
    <body>
    <?php 
    $sql="SELECT image from images";
    $result=mysqli_query($conn, $sql);
    if($result){
        echo "picture found";
    }else{
        echo "picture not found";
    }
    if(mysqli_num_rows($result)> 0){ 
        while($row = $result->fetch_assoc()){
    ?>
    <p> this is running </p>
    <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['image']); ?>" />
    <?php }
    }else { ?>
    <p>no picture found</p>
    <?php } ?>
    </body>
</html>