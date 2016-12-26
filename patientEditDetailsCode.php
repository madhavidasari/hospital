<?php

include_once 'db_connect.php';
if (isset($_POST) && !empty($_POST)) {    
   
    $sql = "update  patient set firstname='" . $_POST["firstname"] . "',lastname='" .$_POST["lastname"]. "',address='" .$_POST["address"]. "',city='" .$_POST["city"]. "',state='" .$_POST["state"]. "',country='" .$_POST["country"]. "',zipcode='" .$_POST["zipcode"]. "' where id='".$_POST['id']."'";
        

    $rs = mysql_query($sql, $conn);

    if ($rs === TRUE) {
        header('Location: patientEditDetails.php?msg=Details Updated Succesfully');
    } else {
        header('Location: patientEditDetails.php?msg=Something Went Wrong while Updating Details');
    }
} else {
    header('Location: patientEditDetails.php?msg=Something Went Wrong while Updating Details');
}

