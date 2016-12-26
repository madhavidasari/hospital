<?php
session_start();
include_once 'db_connect.php';
include_once 'headeradmin1.php';
?>
<div class="main-content" style="margin-top: 5%;">

    <?php include 'doctorTop.php'; ?>
    <!-- main content start-->

    <div id="page-wrapper" style="background: #fff;">
        <div class="main-page">
           
                <h3 class="title1">Appointments List</h3> 
                <?php
                $strSQL = "SELECT *,a.id as aId,a.status as aStatus,a.updated_on as updated FROM appointments a LEFT JOIN patient p on p.id=a.patient_id  LEFT JOIN timeslots t on a.timeslot_id=t.id where a.doctor_id='" . $_SESSION['doctorId'] . "' order by a.appoint_date ASC";
                $rs = mysql_query($strSQL);
                ?>

                <?php if (mysql_num_rows($rs) == 0) { ?>
                    <div class="table-responsive widget-shadow" style="width:50%;">                     
                        <h4>No Appointments Booked .</h4>
                    </div>
                <?php } else { ?>
                    <div class="table-responsive widget-shadow" style="width:100%;"> 

                        



                        <div class="elements  row"> 
                            <?php 
                            $i=1;
                            while ($row = mysql_fetch_array($rs)) { ?>

                            <div class="col-md-3 profile widget-shadow" style="margin-bottom:20px;min-height:440px;">
                                    <h4 class="title3">Appointment # <?php echo $i; ?></h4>
                                    <div class="profile-top">                                      
                                        <h5>Appointment Date</h5>
                                        <h4><?php echo $row['appoint_date']; ?></h4>
                                        <h5>Patient Name</h5>
                                        <h4><?php echo $row['firstname']." ".$row['lastname']; ?></h4>
                                        <h5>Time Slot</h5>
                                        <h4><?php echo $row['timeslot']; ?></h4>
                                        <h5>Patient Status</h5>
                                        <h4><?php if($row['aStatus']==1) { echo "Confirmed"; }else {echo "Cancelled"; } ?></h4>
                                        <h5>Update Response</h5>
                                        <h4><a href="updateResponseDoctor.php?id=<?php echo $row['aId']; ?>"><span class="label label-success">Update Response</span></a></h4>
                                        <h5>Update Tests Report</h5>
                                        <h4><a href="updateTestDoctor.php?id=<?php echo $row['aId']; ?>"><span class="label label-info">Update Tests Report</span></a></h4>
                                    
                                    </div>
                                </div>

                            <?php                             
                            $i++;
                            } ?>


                        </div>
                    <?php } ?>



                </div>

          
        </div>
    </div>
    <!-- Classie -->
    <?php include_once 'footeradmin1.php'; ?>