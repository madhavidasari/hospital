<?php
session_start();
include_once 'db_connect.php';

if (isset($_POST['update']) && $_POST['update'] == "update") {    
        $sql = "update timeslots  set timeslot= '" . $_POST["timeslot"] . "' where id='" . $_POST["id"] . "'";
        $rs = mysql_query($sql, $conn);
   if ($rs === TRUE) {
            header('Location: listTimeSlots.php?msg=TimeSlot Updated Succesfully');
        } else {
            header('Location: addTimeSlot.php?msg=Something Went Wrong while Updating TimeSlot');
        }
} else {
    if (isset($_POST) && !empty($_POST)) {        

        $sql = "INSERT INTO timeslots (timeslot) VALUES ('" . $_POST["timeslot"] . "')";
        $rs = mysql_query($sql, $conn);
        if ($rs === TRUE) {
            header('Location: listTimeSlots.php?msg=TimeSlot Added Succesfully');
        } else {
            header('Location: addTimeSlot.php?msg=Something Went Wrong while Adding TimeSlot');
        }
    }
}









