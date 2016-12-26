<?php

session_start();
include_once 'db_connect.php';

if (isset($_POST) && !empty($_POST)) {
    
    if($_POST['insurance']=="Yes"){
		
        $strSQL5 = "SELECT * FROM insurancedetails where patient_id='".$_SESSION['patientId']."'";
        $rs5 = mysql_query($strSQL5); 
        
        if(mysql_num_rows($rs5)==0){
            $sql = "INSERT INTO insurancedetails (patient_id,policynumber,agency,memberid)
VALUES ('" . $_SESSION["patientId"]  . "','" . $_POST["policynumber"] . "','" . $_POST["agency"] . "','" . $_POST["memberid"] . "')";
   
    $rs = mysql_query($sql, $conn); 
        }else{
			
            $sql = "update insurancedetails  set policynumber= '" . $_POST["policynumber"] . "',agency= '" . $_POST["agency"] . "',memberid= '" . $_POST["memberid"] . "' where patient_id='" . $_SESSION["patientId"] . "'";
            $rs = mysql_query($sql, $conn);
        }
        
    }else if($_POST['insurance']=="No"){
        $strSQL5 = "SELECT * FROM paymentinfo where patient_id='".$_SESSION['patientId']."'";
        $rs5 = mysql_query($strSQL5); 
        
        if(mysql_num_rows($rs5)==0){
            $sql = "INSERT INTO paymentinfo (patient_id,nameoncard,cardnumber,expmonth,expyear,cvv)
VALUES ('" . $_SESSION["patientId"]  . "','" . $_POST["nameoncard"] . "','" . $_POST["cardnumber"] . "','" . $_POST["expmonth"] . "','" . $_POST["expyear"] . "','" . $_POST["cvv"] . "')";
   
    $rs = mysql_query($sql, $conn); 
        }else{
            $sql = "update paymentinfo  set nameoncard= '" . $_POST["nameoncard"] . "',cardnumber= '" . $_POST["cardnumber"] . "',expmonth= '" . $_POST["expmonth"] . "',expyear= '" . $_POST["expyear"] . "',cvv= '" . $_POST["cvv"] . "' where patient_id='" . $_SESSION["patientId"] . "'";
            $rs = mysql_query($sql, $conn);
        }
        
    }
    
     $strSQL = "SELECT * FROM appointments where patient_id='" . $_SESSION["patientId"] . "' and timeslot_id='" . $_POST["timeslot_id"] . "' and appoint_date='" . $_POST["appoint_date"] . "' and status=1";
     $rs1 = mysql_query($strSQL);   
    
     if(mysql_fetch_array($rs1)>0){
         header('Location: bookAppointment.php?msg=Already You Have an appointment on Same timeslot');
     }else{
         $sql = "INSERT INTO appointments (patient_id,doctor_id,timeslot_id,appoint_date)
VALUES ('" . $_SESSION["patientId"]  . "','" . $_POST["doctor_id"] . "','" . $_POST["timeslot_id"] . "','" . $_POST["appoint_date"] . "')";
   
    $rs = mysql_query($sql, $conn);   
    
    
      ini_set('max_execution_time', 3000);

    require 'mailer/PHPMailerAutoload.php';

    $strSQL2 = "SELECT * FROM emailsendingaddress";
    $rs2 = mysql_query($strSQL2);
    $row2 = mysql_fetch_array($rs2); 
    
    $strSQL3 = "SELECT * FROM patient where id='".$_SESSION['patientId']."'";
    $rs3 = mysql_query($strSQL3);
    $row3 = mysql_fetch_array($rs3);
    
    $mail = new PHPMailer;
    $mail->isSMTP();
	//$mail->SMTPDebug = 4;
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
    $mail->addAddress($row3['username'], $row3['firstname'] . " " . $row3['lastname']);
    $mail->isHTML(true);
    $mail->Subject = "Hey...! " . $row3['firstname'] ." ".$row3['lastname']. " Appointment Booked Successfully";
    $mail->Body = "Hey...! " . $row3['firstname'] ." ".$row3['lastname']. " Appointment Booked Successfully"
            . "<br> on '".$_POST["appoint_date"]."' ";
        
    if (!$mail->send()) {

        $message = $mail->ErrorInfo;
    } else {
        $message = "Mail Sent Successfully";
    }
    
 ;
    
    
     header('Location: listAppointments.php?msg=Your Appoinment Confirmed Successfuly '.$message);
     }

    
}else{
    header('Location: bookAppointment.php?msg=Something Went Wrong while Submittng Your Appoinment'.$message);
}











