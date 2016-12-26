<?php
session_start();
include_once 'db_connect.php';

    if (isset($_POST) && !empty($_POST)) {        

        $sql = "INSERT INTO doctorresponce (appointment_id,response) VALUES ('" . $_POST["appointmentId"] . "','" . $_POST["response"] . "')";
        $rs1 = mysql_query($sql, $conn);
        
       

   

    if ($rs1 === TRUE) {
            header('Location: updateResponseDoctor.php?msg=Response Mailed Succesfully&id='.$_POST["appointmentId"]);
        } else {
            header('Location: updateResponseDoctor.php?msg=Something Went Wrong while Posting Response&id='.$_POST["appointmentId"]);
        }
    }


    






