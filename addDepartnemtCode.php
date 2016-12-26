<?php
session_start();
include_once 'db_connect.php';

if (isset($_POST['update']) && $_POST['update'] == "update") {    
        $sql = "update departments  set dept_name= '" . $_POST["dept_name"] . "',dept_code= '" . $_POST["dept_code"] . "' where id='" . $_POST["id"] . "'";
        $rs = mysql_query($sql, $conn);
   if ($rs === TRUE) {
            header('Location: listDepartments.php?msg=Department Updated Succesfully');
        } else {
            header('Location: AddDepartment.php?msg=Something Went Wrong while Updating Department');
        }
} else {
    if (isset($_POST) && !empty($_POST)) {        

        $sql = "INSERT INTO departments (dept_name,dept_code) VALUES ('" . $_POST["dept_name"] . "','" . $_POST["dept_code"] . "')";
        $rs = mysql_query($sql, $conn);
        if ($rs === TRUE) {
            header('Location: listDepartments.php?msg=Department Added Succesfully');
        } else {
            header('Location: AddDepartment.php?msg=Something Went Wrong while Adding Department');
        }
    }
}









