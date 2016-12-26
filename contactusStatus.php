<?php

include_once 'db_connect.php';
if (isset($_POST) && !empty($_POST)) {

    $sql = "INSERT INTO contactus (name,email,subject,message)
VALUES ('" . $_POST["name"] . "','" . $_POST["email"] . "','" . $_POST["subject"] . "','" . $_POST["message"] . "')";
    $rs = mysql_query($sql, $conn);

    if ($rs === TRUE) {
        header('Location: contactUs.php?s=1&st=Query Posted Succesfully#contact');
    } else {
        header('Location: contactUs.php?s=0&st=Something Went Wrong while Posting Query#contact');
    }
} else {
    header('Location: contactUs.php?s=0&st=Something Went Wrong while Posting Query#contact');
}

