<?php
    require 'config.php';
    if(isset($_GET['id'])){
        $ID=$_GET['id'];
        $mail=$_GET['email'];
        $purp=$_GET['pur'];
        //echo $ID.$mail.$purp;
        if($purp=="Rent"){
            $checkid=$ID;
            //here to change
            $checksql="SELECT * FROM rents WHERE property_id=$checkid";
            $checkresult=mysqli_query($conn, $checksql);
            if(mysqli_num_rows($checkresult)>0){
                $newemail=$mail;
                $update="UPDATE rents SET email='$newemail' WHERE property_id=$checkid";
                $updateresult=mysqli_query($conn, $update);
                if($updateresult){
                    // echo
                    // "<script> alert('done'); </script> ";
                    $dltsql="DELETE FROM request_table WHERE property_id=$checkid";
                    mysqli_query($conn, $dltsql);
                    echo  
                    "<script> alert('done'); window.location.href='admin_purpose_valid.php'; </script> ";
                    //header("Location:admin_purpose_valid.php");
                }else{
                   echo  "<script> alert('failed'); </script> ";
                }
            }else{
                $inemail=$mail;
                $inid=$ID;
                $insertr="INSERT INTO rents(email, property_id) VALUES ('$inemail', '$inid')";
                $insertrresult=mysqli_query($conn, $insertr);
                if($insertrresult){
                    $dltsql="DELETE FROM request_table WHERE property_id=$checkid";
                    mysqli_query($conn, $dltsql);
                    $updtsql="UPDATE property SET searchable=0 WHERE id=$checkid";
                    $updateproperty=mysqli_query($conn, $updtsql);
                    echo  
                    "<script> alert('done'); window.location.href='admin_purpose_valid.php'; </script> ";
                    //header("Location:admin_purpose_valid.php");
                }else{
                    echo  "<script> alert('failed'); </script> ";
                 }
            }
            
            //implement alter or new insert
        }
        else if($purp=="Sell"){
            $checkid=$ID;
            $checksql="SELECT * FROM owns WHERE property_id=$checkid";
            $checkresult=mysqli_query($conn, $checksql);
            if(mysqli_num_rows($checkresult)>0){
                $newemail=$userrows['user_email'];
                $update="UPDATE owns SET email='$newemail' WHERE property_id=$checkid";
                $updateresult=mysqli_query($conn, $update);
                if($updateresult){
                    $dltsql="DELETE FROM request_table WHERE property_id=$checkid";
                    mysqli_query($conn, $dltsql);
                    $updtsql="UPDATE property SET searchable=0 WHERE id=$checkid";
                    $updateproperty=mysqli_query($conn, $updtsql);
                    unset($_POST['valid_req']);
                    echo  
                    "<script> alert('done'); window.location.href='admin_purpose_valid.php'; </script> ";
                    //header("Refresh:0");
                }else{
                   echo  "<script> alert('failed'); </script> ";
                }
            }else{
                $inemail=$mail;
                $inid=$ID;
                $insertr="INSERT INTO owns(email, property_id) VALUES ('$inemail', '$inid')";
                $insertrresult=mysqli_query($conn, $insertr);
                if($insertrresult){
                    $dltsql="DELETE FROM request_table WHERE property_id=$checkid";
                    mysqli_query($conn, $dltsql);
                    $updtsql="UPDATE property SET searchable=0 WHERE id=$checkid";
                    $updateproperty=mysqli_query($conn, $updtsql);
                    echo  
                    "<script> alert('done'); window.location.href='admin_purpose_valid.php'; </script> ";
                    //header("Refresh:0");
                }else{
                    echo  "<script> alert('failed'); </script> ";
                 }
            }

            //implement alter or new insert
        }
        // $sql="SELECT * FROM property WHERE id=$ID";
        // $result=mysqli_query($conn, $sql);
        // $rows=mysqli_fetch_array($result);
        // $purp=$rows['purpose'];
    }
?>