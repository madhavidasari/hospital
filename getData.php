<?php

include_once 'db_connect.php';

if (isset($_POST['type']) && $_POST['type'] == "getdoc") {
    $strSQL2 = "SELECT * FROM doctors where dept_id='" . $_POST['dept_id'] . "'";
    $rs = mysql_query($strSQL2);
    $result = '<option value="">Select Doctor</option>';
    while ($row = mysql_fetch_array($rs)) {
        $result.='<option value="' . $row['id'] . '">' . $row['firstname'] . " - " . $row['lastname'] . '</option>';
    }
    echo json_encode($result);
} elseif (isset($_POST['type']) && $_POST['type'] == "getslots") {
    $strSQL2 = "SELECT timeslot_id FROM appointments where doctor_id='" . $_POST['doc_id'] . "' and appoint_date='" . $_POST['date'] . "' and status=1";

    $rs2 = mysql_query($strSQL2);
    $bookedTimeslots = "";
    if (mysql_num_rows($rs2) > 0) {
        while ($row2 = mysql_fetch_array($rs2)) {
            if (isset($bookedTimeslots) && !empty($bookedTimeslots)) {
                $bookedTimeslots.="," . $row2['timeslot_id'];
            } else {
                $bookedTimeslots.=$row2['timeslot_id'];
            }
        }
        $strSQL3 = "SELECT * from timeslots where id NOT IN(" . $bookedTimeslots . ")";
    } else {
        $strSQL3 = "SELECT * from timeslots";
    }
    $rs3 = mysql_query($strSQL3);
    $result = '<option value="">Select Timeslot</option>';
    while ($row = mysql_fetch_array($rs3)) {
        $result.='<option value="' . $row['id'] . '">' . $row['timeslot'] . '</option>';
    }
    echo json_encode($result);
}
?>
