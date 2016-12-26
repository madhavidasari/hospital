<?php

session_start();
include_once 'db_connect.php';

if (isset($_GET) && !empty($_GET)) {

    if ($_GET['status'] == 1) {
       
        $strSQL = "SELECT * FROM appointments where id='" . $_GET['id'] . "'";
        $rs1 = mysql_query($strSQL);
        $row = mysql_fetch_array($rs1);
        $strSQL1 = "SELECT * FROM appointments where doctor_id='" . $row['doctor_id'] . "' and appoint_date='" . $row['appoint_date'] . "' and status=1 and timeslot_id='" . $row['timeslot_id'] . "' and id!='" . $row['id'] . "'";
        $rs2 = mysql_query($strSQL1);

        $strSQL3 = "SELECT * FROM appointments where user_id='" . $_SESSION["userId"] . "' and timeslot_id='" . $row["timeslot_id"] . "' and appoint_date='" . $row["appoint_date"] . "' and status=1 and id!='" . $row['id'] . "'";
        $rs3 = mysql_query($strSQL3);        
       
        if ((mysql_num_rows($rs3) == 0) && (mysql_num_rows($rs2) == 0)) {

            $sql = "update appointments set status='" . $_GET['status'] . "' where id='" . $_GET['id'] . "' ";
            $rs = mysql_query($sql, $conn);
            header('Location: listAppointments.php?msg=Appoinment Updated Successfully');
        } else if (mysql_fetch_array($rs3) > 0) {
            header('Location: listAppointments.php?msg=Already You Have an appointment on Same timeslot');
        } elseif (mysql_num_rows($rs2) > 0) {
            header('Location: listAppointments.php?smsg=This Slot is Already Allocated to Some Other Patient');
        }
    } else {
        $sql = "update appointments set status='" . $_GET['status'] . "' where id='" . $_GET['id'] . "' ";
        $rs = mysql_query($sql, $conn);
        header('Location: listAppointments.php?msg=Appoinment Updated Successfully');
    }
}







