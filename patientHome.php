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
                <h3 class="title1">My Details</h3> 
                <?php
                $strSQL = "SELECT * FROM patient where id='".$_SESSION['patientId']."'";
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
                                        <td>Address</td>  
                                        <td><?php echo $row['address']; ?></td>
                                    </tr> 
                                    <tr>                                         
                                        <td>City</td>  
                                        <td><?php echo $row['city']; ?></td>
                                    </tr>
                                    <tr>                                         
                                        <td>State</td>  
                                        <td><?php echo $row['state']; ?></td>
                                    </tr> 
                                    <tr>                                         
                                        <td>Country</td>  
                                        <td><?php echo $row['country']; ?></td>
                                    </tr>
                                    <tr>                                         
                                        <td>Zip Code</td>  
                                        <td><?php echo $row['zipcode']; ?></td>
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