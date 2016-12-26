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
                <h3 class="title1">Contact Us Posts</h3> 
                <?php
                $strSQL = "SELECT * FROM contactus order by posted_on desc";
                $rs = mysql_query($strSQL);
               
                ?>
                
                <?php  if(mysql_num_rows($rs)==0) {?>
                <div class="table-responsive widget-shadow" style="width:50%;">                     
                    <h4>No Queries Posted.</h4>
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
                                            <td>Name</td>  
                                            <td><?php echo $row['name']; ?></td>
                                        </tr>
                                        <tr>                                         
                                            <td>Email</td>  
                                            <td><?php echo $row['email']; ?></td>
                                        </tr>                                        
                                        <tr>                                         
                                            <td>Subject</td>  
                                            <td><?php echo $row['subject']; ?></td>
                                        </tr>
                                        <tr>                                         
                                            <td>Message</td>  
                                            <td><?php echo $row['message']; ?></td>
                                        </tr>
                                        <tr style="border-bottom: 2px solid #e94e02;">                                         
                                            <td>Posted On</td>  
                                            <td><?php echo $row['posted_on']; ?></td>
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