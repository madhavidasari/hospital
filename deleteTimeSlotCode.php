<?php

include_once 'db_connect.php';
if(isset($_GET['id']) && !empty($_GET['id'])){
    $sql = "delete from timeslots where id='" . $_GET["id"] . "'";
        $rs = mysql_query($sql, $conn);
        if ($rs === TRUE) {
            header('Location: deleteTimeSlot.php?msg=TimeSlot Deleted Succesfully');
        }else {
            header('Location: deleteTimeSlot.php?msg=Something Went Wrong while Deleting TimeSlot');
        }
}else{
    header('Location: deleteTimeSlot.php?msg=Something Went Wrong while Deleting TimeSlot');
}
