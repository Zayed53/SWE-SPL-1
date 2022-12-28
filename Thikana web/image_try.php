<?php
include 'config.php';
if(isset($_REQUEST["submit"])){
    $id=$_POST['id'];
    if(!empty($_FILES["image"]["name"])){
    $fileName = basename($_FILES["image"]["name"]);
    $fileType = pathinfo($fileName, PATHINFO_EXTENSION);
    // Allow certain file formats 
    $allowTypes = array('jpg', 'png', 'jpeg');
    if (in_array($fileType, $allowTypes)) {
    $image = $_FILES['image']['tmp_name'];
    $imgContent = addslashes(file_get_contents($image));
  
     
        //nsert image content into database 
    $insert ="INSERT into images (id,image) VALUES ('$id','$imgContent')";
    $sql=mysqli_query($conn, $insert); 
    if($sql){
        echo 
        "<script> alert('image addition done'); </script> ";
    }else{
         echo 
         "<script> alert('image addition  failed'); </script> ";
    }
    }
    else{
        echo
        "<script> alert('image not supported'); </script> ";
    }
}else{
    echo
    "<script> alert('please select a image'); </script> ";
}
}

?>
<html>
    <head>
        <title>THIKANA</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/dark.css">
    </head>
    <body>
        <h2>give image</h2>
        <form id="form" name="form" action="" method="POST" enctype="multipart/form-data">
            <input type="file" name="image"/>
            <input type="number" name="id"/>
            <input type="submit" name="submit" value="upload"/>
        </form>
        <!-- <a href="item_add.php"> item add </a> <br>
        <a href="LogOUT.php">Log out </a> -->
    </body>
</html>