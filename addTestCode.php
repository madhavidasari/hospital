<?php
session_start();
include_once 'db_connect.php';

if (isset($_POST['update']) && $_POST['update'] == "update") {    
        $sql = "update tests  set testname= '" . $_POST["testname"] . "' where id='" . $_POST["id"] . "'";
        $rs = mysql_query($sql, $conn);
   if ($rs === TRUE) {
            header('Location: listTests.php?msg=Test Updated Succesfully');
        } else {
            header('Location: addTest.php?msg=Something Went Wrong while Updating Test');
        }
} else {
    if (isset($_POST) && !empty($_POST)) {        

        $sql = "INSERT INTO tests (testname,doctor_id) VALUES ('" . $_POST["testname"] . "','" . $_SESSION["doctorId"] . "')";
        $rs = mysql_query($sql, $conn);
        if ($rs === TRUE) {
            header('Location: listTests.php?msg=Test Added Succesfully');
        } else {
            header('Location: addTest.php?msg=Something Went Wrong while Adding Test');
        }
    }
}









