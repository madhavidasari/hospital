<?php
session_start();
include_once 'db_connect.php';
$body="";
    if (isset($_POST) && !empty($_POST)) {  
        
        foreach ($_POST['test'] as $key => $value) { 
            $strSQL3 = "SELECT * FROM tests where id='".$key."'";
            $rs3 = mysql_query($strSQL3);
            $row3 = mysql_fetch_array($rs3);
            
            $sql = "INSERT INTO testreport (appointment_id,test_id,report) VALUES ('".$_POST["appointmentId"]."','" . $key . "','" . $value . "')";
         $body.=$row3['testname']."             ".$value."<br>";
            $rs = mysql_query($sql, $conn);
        }      
       
        ini_set('max_execution_time', 3000);

    require 'mailer/PHPMailerAutoload.php';

    $strSQL2 = "SELECT * FROM emailsendingaddress";
    $rs2 = mysql_query($strSQL2);
    $row2 = mysql_fetch_array($rs2);
    
    
     $strSQL = "SELECT *,a.id as aId,a.status as aStatus,a.updated_on as updated FROM appointments a LEFT JOIN patient p on p.id=a.patient_id  LEFT JOIN timeslots t on a.timeslot_id=t.id where a.doctor_id='" . $_SESSION['doctorId'] . "' and a.id='".$_POST["appointmentId"]."' order by a.appoint_date ASC";
     $rs = mysql_query($strSQL);
    $row=  mysql_fetch_array($rs);
    
    $mail = new PHPMailer;
    $mail->isSMTP();
	$mail->SMTPOptions = array(
    'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
    )
);
    $mail->Host = gethostbyname($row2['emailhost']);
    $mail->SMTPAuth = true;
    $mail->Username = trim($row2['senderemail']);
    $mail->Password = trim($row2['emailpassword']);
    $mail->SMTPSecure = 'tls';
    $mail->Port = trim($row2['emailport']);
    $mail->setFrom(trim($row2['senderemail']), 'Hospital Management');
    $mail->addReplyTo(trim($row2['senderemail']), 'Hospital Management');
    $mail->addAddress($row['username'], $row['firstname'] . " " . $row['lastname']);
    $mail->isHTML(true);
    $mail->Subject = "Hey...! " . $row3['firstname'] ." ".$row3['lastname']. " Test Results Posted By '".$_SESSION['doctorName']."'";
    $mail->Body = $body;
        
    if (!$mail->send()) {

        $message = $mail->ErrorInfo;
    } else {
        $message = "Mail Sent Successfully";
    }
        
        
        header('Location: updateTestDoctor.php?msg=Test Report Added Succesfully and Mail Sent Successfully&id='.$_POST["appointmentId"]);
        
        
       
    }










