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
            <div class="tables">
                <h3 class="title1">Doctor Responses</h3> 
                <?php
                $strSQL = "SELECT *,a.id as aId,a.status as aStatus,a.updated_on as updated FROM doctorresponce dr LEFT JOIN appointments a on a.id=dr.appointment_id LEFT JOIN doctors d on d.id=a.doctor_id  LEFT JOIN timeslots t on a.timeslot_id=t.id where a.id='" . $_GET['id'] . "' order by a.appoint_date ASC";
                $rs = mysql_query($strSQL);
               
                ?>
                
                <?php  if(mysql_num_rows($rs)==0) {?>
                <div class="table-responsive widget-shadow" style="width:50%;">                     
                    <h4>No Responses Posted By Doctor</h4>
                    </div>
                <?php } else {?>
                <div class="table-responsive widget-shadow" style="width:80%;"> 

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
                                <?php while ($row = mysql_fetch_array($rs)) { ?>
                                        
                                        <tr>                                         
                                            <td style="width:20%">Response</td>  
                                            <td><?php echo $row['response']; ?></td>
                                            
                                        </tr>
                                        <tr style="border-bottom: 2px solid #e94e02;">                                         
                                            <td>Posted On</td>  
                                            <td><?php echo $row['added_on']; ?></td>
                                        </tr>
                                        
                           
                                    <?php } ?>
                                                                        
                            </tbody> 
                        </table> 
                    </div>
                <?php } ?>
                
                  

            </div>
        </div>
    </div>
</div>
<!-- Classie -->
<?php include_once 'footeradmin1.php'; ?>