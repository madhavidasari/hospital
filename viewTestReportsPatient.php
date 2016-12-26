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
                <h3 class="title1">Doctor Test Reports</h3> 
                <?php
                $strSQL = "SELECT *,a.id as aId,a.status as aStatus,a.updated_on as updated FROM testreport dr LEFT JOIN tests ts on ts.id=dr.test_id LEFT JOIN appointments a on a.id=dr.appointment_id  where a.id='" . $_GET['id'] . "' order by a.appoint_date ASC";
         
                
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
                                            <td style="width:20%">Test Name</td>  
                                            <td><?php echo $row['testname']; ?></td>
                                            
                                        </tr>
                                        <tr style="border-bottom: 2px solid #e94e02;">                                         
                                            <td>Report</td>  
                                            <td><?php echo $row['report']; ?></td>
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