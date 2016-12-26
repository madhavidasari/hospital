<?php
session_start();
include_once 'db_connect.php';
include_once 'headeradmin1.php';
?>
<div class="main-content" style="margin-top: 5%;">
    
    <?php include 'adminTop.php'; ?>
    <!-- main content start-->

    <div id="page-wrapper" style="background: #fff;">
        <div class="main-page">
            <div class="tables">
                <h3 class="title1">Doctors List</h3> 
                <?php
                $strSQL = "SELECT *,d.id as dId from doctors d LEFT JOIN  departments dp on dp.id=d.dept_id";
                $rs = mysql_query($strSQL);
               
                ?>
                
                <?php  if(mysql_num_rows($rs)==0) {?>
                <div class="table-responsive widget-shadow" style="width:50%;">                     
                    <h4>No Doctors Added by Admin</h4>
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
                                    <th></th>  
                                </tr> 
                            </thead> 
                            <tbody>  
                                <?php while ($row = mysql_fetch_array($rs)) { ?>
                                        <tr>                                         
                                            <td>Action</td>  
                                            <td><a href="deleteDoctorCode.php?id=<?php echo $row['dId']; ?>"><span class="label label-danger">Delete</span></a></td>
                                            <td rowspan="4" style="width: 25%"><a href="<?php echo $row['file_location']; ?>" target="_blank"><img src="<?php echo $row['file_location']; ?>" style="width:200px;height:200px;"/></a></td>                                        
                                            
                                        </tr>
                                        <tr>                                         
                                            <td>First Name</td>  
                                            <td><?php echo $row['firstname']; ?></td>
                                        </tr>
                                        <tr>                                         
                                            <td>Last Name</td>  
                                            <td><?php echo $row['lastname']; ?></td>
                                        </tr>
                                        <tr>                                         
                                            <td>User Name</td>  
                                            <td><?php echo $row['username']; ?></td>
                                        </tr>
                                        <tr>                                         
                                            <td>Department</td>  
                                            <td><?php echo $row['dept_name']; ?></td>
                                        </tr>
                                        <tr style="border-bottom: 2px solid #e94e02;">                                         
                                            <td>Doctor Code</td>  
                                            <td><?php echo $row['doctor_code']; ?></td>
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