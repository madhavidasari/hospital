<?php
session_start();
include_once 'db_connect.php';
include_once 'headeradmin1.php';
?>
<div class="main-content" style="margin-top: 5%;">

    <?php include 'patientTop.php'; ?>
    <!-- main content start-->

    <div id="page-wrapper" style="background: #fff;">
        <div class="main-page">
           
                <h3 class="title1">Doctors List</h3> 
                <?php
                $strSQL = "SELECT *,a.id as aId,a.status as aStatus,a.updated_on as updated FROM appointments a LEFT JOIN doctors d on d.id=a.doctor_id  LEFT JOIN timeslots t on a.timeslot_id=t.id where a.patient_id='" . $_SESSION['patientId'] . "' order by a.appoint_date ASC";
                $rs = mysql_query($strSQL);
                ?>

                <?php if (mysql_num_rows($rs) == 0) { ?>
                    <div class="table-responsive widget-shadow" style="width:50%;">                     
                        <h4>No Appointments Booked by You</h4>
                    </div>
                <?php } else { ?>
                    <div class="table-responsive widget-shadow" style="width:100%;"> 

                        <?php
                        if (isset($_GET['msg']) && !empty($_GET['msg'])) {
                            ?>                      
                            <div class="alert alert-info" >
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                <strong> <?php echo $_GET['msg'] ?> </strong>
                            </div>                      
                        <?php } ?>



                        <div class="elements  row"> 
                            <?php 
                            $i=1;
                            while ($row = mysql_fetch_array($rs)) { ?>

                            <div class="col-md-3 profile widget-shadow" style="margin-bottom:20px;min-height:440px;">
                                    <h4 class="title3">Appointment # <?php echo $i; ?></h4>
                                    <div class="profile-top">                                      
                                        <h5>Appointment Date</h5>
                                        <h4><?php echo $row['appoint_date']; ?></h4>
                                        <h5>Doctor Name</h5>
                                        <h4><?php echo $row['firstname']." ".$row['lastname']; ?></h4>
                                        <h5>Time Slot</h5>
                                        <h4><?php echo $row['timeslot']; ?></h4>
                                        <h5>Status</h5>
                                        <h4><?php if($row['aStatus']==1) { echo "Confirmed"; }else {echo "Cancelled"; } ?></h4>
                                        <h5>Action</h5>
                                        <?php if(strtotime($row['appoint_date']) > time() && $row['aStatus']==1){ ?>
                                        <h4><a href="cancelAppontment.php?id=<?php echo $row['aId']; ?>&status=0"><span class="label label-danger">Cancel</span></a></h4>    
                                        <?php }else if(strtotime($row['appoint_date']) > time() && $row['aStatus']==0){ ?>
                                        <h4><a href="cancelAppontment.php?id=<?php echo $row['aId']; ?>&status=1"><span class="label label-success">Re-Book</span></a></h4>    
                                        <?php } else {?>
                                        <h4> Not Allowed to Perform Any Update</h4>
                                        <?php } ?>
                                        <h5>View Doctor Response</h5>
                                        <h4><a href="viewResponsePatient.php?id=<?php echo $row['aId']; ?>"><span class="label label-success">View Doctor Response</span></a></h4>
                                        <h5>View Tests Reports</h5>
                                        <h4><a href="viewTestReportsPatient.php?id=<?php echo $row['aId']; ?>"><span class="label label-info">View Test Reports</span></a></h4>
                                    
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