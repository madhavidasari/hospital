<?php

session_start();
include_once 'db_connect.php';
if (isset($_POST) && isset($_POST['patient']) && ($_POST['patient'] == "patient")) { 
    
    $strSQL = "SELECT * FROM patient where username='" . $_POST['username'] . "'";   
    
    $rs = mysql_query($strSQL);
    if (mysql_num_rows($rs) > 0) {
        header('Location: patientRegistration.php?s=0&st=Email is Already Registerd with Us.#patient');
    } else {
        
        $sql = "INSERT INTO patient (firstname,lastname,address,city,state,country,zipcode,username,password,mobile)
                VALUES ('" . $_POST["firstname"] . "','" . $_POST["lastname"] . "','" . $_POST["address"] . "','" . $_POST["city"] . "','" . $_POST["state"] . "','" . $_POST["country"] . "','" . $_POST["zipcode"] . "','" . $_POST["username"] . "','" . md5($_POST["password"]) . "','" . $_POST["mobile"] . "')";

        $rs2 = mysql_query($sql, $conn);

        if ($rs2 === TRUE) {
            $strSQL1 = "SELECT * FROM patient where username='" . $_POST['username'] . "'";
            $rs1 = mysql_query($strSQL1);
            
            while ($row1 = mysql_fetch_array($rs1)) {
               
                if ($row1['username'] == $_POST['username'] && $row1['password'] == md5($_POST["password"])) {
                    $_SESSION['patientId'] = $row1['id'];
                    $_SESSION['patientName'] = $row1['firstname'] . " " . $row1['lastname'];
                }
            }

            header("Location: patientHome.php");
            exit();
        } else {
            header('Location: patientRegistration.php?s=0&st=Something Went wrong.Please Try Later.#patient');
        }
    }
}
?>

