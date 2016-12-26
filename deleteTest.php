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
                <h3 class="title1">List Tests</h3> 
                <?php
                $strSQL = "SELECT * FROM tests where doctor_id='".$_SESSION['doctorId']."'";
                $rs = mysql_query($strSQL);
               
                ?>
                
                <?php  if(mysql_num_rows($rs)==0) {?>
                <div class="table-responsive widget-shadow" style="width:50%;">                     
                    <h4>No Test Added by you</h4>
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
                                <?php while ($row = mysql_fetch_array($rs)) { ?>
                                        <tr>                                         
                                            <td>Action</td>  
                                            <td><a href="deleteTestCode.php?id=<?php echo $row['id']; ?>"><span class="label label-danger">Delete</span></a></td>
                                        </tr>
                                        <tr style="border-bottom: 2px solid #e94e02;">                                         
                                            <td>Test Name</td>  
                                            <td><?php echo $row['testname']; ?></td>
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