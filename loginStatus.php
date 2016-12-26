<?php
session_start();
include_once 'db_connect.php';
?>

<?php

if (isset($_POST) && isset($_POST['type']) && ($_POST['type'] == "patient")) {
    $strSQL = "SELECT * FROM patient where username='" . $_POST['username'] . "'";
    $rs = mysql_query($strSQL);
    while ($row = mysql_fetch_array($rs)) {
        
        if ($row['username'] == $_POST['username'] && $row['password'] == md5($_POST['password'])) {
            $_SESSION['patientId'] = $row['id'];
            $_SESSION['patientName'] = $row['firstname'] . " " . $row['lastname'];
        }
    }
    
    if (isset($_SESSION['patientId']) && !empty($_SESSION['patientId'])) {
        header("Location: patientHome.php");
    } else {
        header('Location: login.php?s=0&st=Invalid Username/Password&login=patient#login');
    }
}elseif (isset($_POST) && isset($_POST['type']) && ($_POST['type'] == "doctor")) {
    $strSQL = "SELECT * FROM doctors where username='" . $_POST['username'] . "'";
    $rs = mysql_query($strSQL);
    while ($row = mysql_fetch_array($rs)) {
        if ($row['username'] == $_POST['username'] && $row['password'] == md5($_POST['password'])) {
            $_SESSION['doctorId'] = $row['id'];
            $_SESSION['doctorName'] = $row['firstname'] . " " . $row['lastname'];
        }
    }
    if (isset($_SESSION['doctorId']) && !empty($_SESSION['doctorId'])) {
        header("Location: doctorHome.php");
    } else {
        header('Location: login.php?s=0&st=Invalid Username/Password&login=doctor#login');
    }
}elseif (isset($_POST) && isset($_POST['type']) && ($_POST['type'] == "admin")) {
    $strSQL = "SELECT * FROM administrator where username='" . $_POST['username'] . "'";
    $rs = mysql_query($strSQL);
    while ($row = mysql_fetch_array($rs)) {
        if ($row['username'] == $_POST['username'] && $row['password'] == md5($_POST['password'])) {
            $_SESSION['adminId'] = $row['id'];
            $_SESSION['adminName'] = $row['username'];
        }
    }
    if (isset($_SESSION['adminId']) && !empty($_SESSION['adminId'])) {
        header("Location: adminHome.php");
    } else {
        header('Location: login.php?s=0&st=Invalid Username/Password&login=admin#login');
    }
}
?>