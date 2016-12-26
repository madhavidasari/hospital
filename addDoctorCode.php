<?php

session_start();
include_once 'db_connect.php';

if (isset($_POST['update']) && $_POST['update'] == "update") {
    if (isset($_FILES["file"]['name']) && !empty($_FILES["file"]['name'])) {
        $target_dir = "uploads/";
        $target_file = $target_dir . time() . basename($_FILES["file"]["name"]);
        
        $sql = "update doctors  set username='" . $_POST["username"] . "',file_name='" . $_FILES["file"]["name"] . "',file_location='" . $target_file . "',firstname= '" . $_POST["firstname"] . "',lastname='".$_POST["lastname"]."',dept_id='" . $_POST["dept_id"] . "',password='" . md5($_POST["password"]) . "',doctor_code='".$_POST["doctor_code"]."' where id='" . $_POST["id"] . "'";
        $rs = mysql_query($sql, $conn);
        move_uploaded_file($_FILES["file"]["tmp_name"], $target_file);
    } else {
        $sql = "update doctors  set username='" . $_POST["username"] . "',firstname='" . $_POST["firstname"] . "',lastname='".$_POST["lastname"]."',dept_id='" . $_POST["dept_id"] . "',password='" . md5($_POST["password"]) . "',doctor_code='".$_POST["doctor_code"]."' where id='" . $_POST["id"] . "'";
        $rs = mysql_query($sql, $conn);
    }
    if ($rs === TRUE) {
        header('Location: listDoctors.php?msg=Doctor Updated Succesfully');
    } else {
        header('Location: addDoctor.php?msg=Something Went Wrong while Updating Doctor');
    }
} else {
    if (isset($_POST) && !empty($_POST) && isset($_FILES) && !empty($_FILES)) {


        $strSQL1 = "SELECT * FROM doctors where username='" . $_POST["username"] . "'";
        $rs1 = mysql_query($strSQL1);

        if (mysql_num_rows($rs1) > 0) {
            header('Location: addDoctor.php?msg=Doctor is Already Registerd with given Email');
            exit(0);
        } else {
            $target_dir = "uploads/";
            $target_file = $target_dir . time() . basename($_FILES["file"]["name"]);

            $sql = "INSERT INTO doctors (username,firstname,lastname,dept_id,password,doctor_code,file_name, file_location)
VALUES ('" . $_POST["username"] . "','" . $_POST["firstname"] . "','" . $_POST["lastname"] . "','" . $_POST["dept_id"] . "','" . md5($_POST["password"]) . "','" . $_POST["doctor_code"] . "','" . $_FILES["file"]["name"] . "','" . $target_file . "')";
            $rs = mysql_query($sql, $conn);

            move_uploaded_file($_FILES["file"]["tmp_name"], $target_file);
        }

        if ($rs === TRUE) {
            header('Location: listDoctors.php?msg=Doctor Added Succesfully');
        } else {
            header('Location: addDoctor.php?msg=Something Went Wrong while Adding Doctor');
        }
    }
}









