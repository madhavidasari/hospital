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
                <h3 class="title1">My Details</h3> 
                <?php
                $strSQL = "SELECT * FROM administrator";
                $rs = mysql_query($strSQL);
                $row = mysql_fetch_array($rs);
                ?>
                <div class="table-responsive widget-shadow" style="width:50%;">                     
                        <table class="table"> 
                            <thead> 
                                <tr> 
                                    <th></th>                                   
                                    <th></th>                                                                                                            
                                </tr> 
                            </thead> 
                            <tbody>                                 
                                    <tr>                                         
                                        <td>User Name</td>  
                                        <td><?php echo $row['username']; ?></td>
                                    </tr>
                                    <tr>                                         
                                        <td>Email</td>  
                                        <td><?php echo $row['email']; ?></td>
                                    </tr>                                    
                            </tbody> 
                        </table> 
                    </div>
                  

            </div>
        </div>
    </div>
</div>
<!-- Classie -->
<?php include_once 'footeradmin1.php'; ?>