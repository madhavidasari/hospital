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
            <div class="tables">
                <h3 class="title1">Post Response</h3> 
                <?php
                $strSQL = "SELECT *,a.id as aId,a.status as aStatus,a.updated_on as updated FROM appointments a LEFT JOIN patient p on p.id=a.patient_id  LEFT JOIN timeslots t on a.timeslot_id=t.id where a.doctor_id='" . $_SESSION['doctorId'] . "' and a.id='".$_GET['id']."' order by a.appoint_date ASC";
                $rs = mysql_query($strSQL);
               
                ?>
                
                <?php  if(mysql_num_rows($rs)==0) {?>
                <div class="table-responsive widget-shadow" style="width:50%;">                     
                    <h4>Something Went Wrong</h4>
                    </div>
                <?php } else {?>
                <div class="table-responsive widget-shadow" style="width:50%;"> 

               <?php  
                    if (isset($_GET['msg']) && !empty($_GET['msg'])) {
                        ?>                      
                        <div class="alert alert-info" >
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong> <?php echo $_GET['msg'] ?> </strong>
                        </div>                      
                    <?php } ?>

                    
            
                        <table class="table"> 
                            <thead> 
                                <tr> 
                                    <th></th>                                   
                                    <th></th>  
                                   
                                </tr> 
                            </thead> 
                            <tbody>  
                                <?php $row = mysql_fetch_array($rs); ?>
                                        
                                        <tr>                                         
                                            <td>Appointment Date</td>  
                                            <td><?php echo $row['appoint_date']; ?></td>
                                            </tr>
                                        <tr>                                         
                                            <td>Patient Name</td>  
                                            <td><?php echo $row['firstname']." ".$row['lastname']; ?></td>
                                        </tr>
                                        <tr>                                         
                                            <td>User Name</td>  
                                            <td><?php echo $row['username']; ?></td>
                                        </tr>                                                                                                         
                            </tbody> 
                        </table> 
                    </div>
                <?php } ?>  
            </div>
            <div class="form-grids row"  style="width: 60%;"> 

                    <div class="form-body">
                        
                        <form enctype="multipart/form-data" method="post" action="addDoctorResponseCode.php"> 

                                <div class="form-group"> 
                                    <label for="Name">Response</label> 
                                    <textarea  class="form-control" id="response"  name="response"  required="" rows="10" cols="50"> </textarea>
                                </div>
                            <input name="appointmentId" value="<?php echo $row['aId']; ?>" hidden="">                          
                                <button type="submit" class="btn btn-success">Submit</button> 
                            </form>
                       
                    </div>
                </div>
        </div>
    </div>
</div>
<!-- Classie -->
<?php include_once 'footeradmin1.php'; ?>