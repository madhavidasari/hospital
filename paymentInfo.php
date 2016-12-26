<?php
session_start();
include_once 'db_connect.php';
include_once 'headeradmin1.php';
?>
<div class="main-content" style="margin-top: 5%;">
    <!--left-fixed -navigation-->
    <div class=" sidebar" role="navigation">
        <div class="navbar-collapse">
            <nav class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-left  cbp-spmenu-open" id="cbp-spmenu-s1">
                <?php //include 'adminLeft.php'; ?>
                <!-- //sidebar-collapse -->
            </nav>
        </div>
    </div>
    <!--left-fixed -navigation-->
    <?php include 'patientTop.php'; ?>
    <!-- main content start-->

    <div id="page-wrapper" style="background: #fff;">
        <div class="main-page">
            <div class="tables">
                <h3 class="title1">Payment Details</h3> 
                <?php
                $strSQL5 = "SELECT * FROM insurancedetails where patient_id='" . $_SESSION['patientId'] . "'";
                $rs5 = mysql_query($strSQL5);
                $row5 = mysql_fetch_array($rs5);
                $strSQL6 = "SELECT * FROM paymentinfo where patient_id='" . $_SESSION['patientId'] . "'";
                $rs6 = mysql_query($strSQL6);
                $row6 = mysql_fetch_array($rs6);
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
                                <?php if(mysql_num_rows($rs5)>0) {?>
                                <tr>                                         
                                        <td>Insurance Details</td>  
                                        <td></td>
                                    </tr>
                                    <tr>                                         
                                        <td>Agency Name</td>  
                                        <td><?php echo $row5['agency']; ?></td>
                                    </tr>
                                    <tr>                                         
                                        <td>Policy Number</td>  
                                        <td><?php echo $row5['policynumber']; ?></td>
                                    </tr> 
                                    <tr style="border-bottom: 2px solid #e94e02;">                                         
                                        <td >Member Id</td>  
                                        <td><?php echo $row5['memberid']; ?></td>
                                    </tr>
                                <?php } ?>
                                     <?php if(mysql_num_rows($rs6)>0) {?>
                                    <tr>                                         
                                        <td>Card Details</td>  
                                        <td></td>
                                    </tr>
                                    <tr>                                         
                                        <td>Name On Card</td>  
                                        <td><?php echo $row6['nameoncard']; ?></td>
                                    </tr> 
                                    <tr>                                         
                                        <td>Card Number</td>  
                                        <td><?php echo $row6['cardnumber']; ?></td>
                                    </tr>
                                    <tr>                                         
                                        <td>Month</td>  
                                        <td><?php echo $row6['expmonth']; ?></td>
                                    </tr> 
                                    <tr>                                         
                                        <td>Year</td>  
                                        <td><?php echo $row6['expyear']; ?></td>
                                    </tr>
                                    <tr>                                         
                                        <td>CVV</td>  
                                        <td><?php echo $row6['cvv']; ?></td>
                                    </tr> 
                                     <?php } ?>
                                    
                            </tbody> 
                        </table> 
                    </div>
                  

            </div>
        </div>
    </div>
</div>
<!-- Classie -->
<?php include_once 'footeradmin1.php'; ?>