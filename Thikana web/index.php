<?php
    session_start();
    if(!empty($_SESSION["email"])){
        $mail=$_SESSION["name"];
    }
    else{
        $mail="kam hoy nai, login koren";
    }
?>

<!Doctype html>
<html>
    <head>
        <title>THIKANA</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/dark.css">
    </head>
    <body>
        <h2>Welcome<?php 
        echo $mail;
        ?></h2>
        <a href="item_add.php"> item add </a> <br>
        <a href="LogOUT.php">Log out </a>
    </body>
</html>