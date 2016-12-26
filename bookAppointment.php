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
            <div class="forms">

                <h3 class="title1">Book Appointment</h3>

                <?php
                if (isset($_GET['msg']) && !empty($_GET['msg'])) {
                    ?>                      
                    <div class="alert alert-info" >
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong> <?php echo $_GET['msg'] ?> </strong>
                    </div>                      
                <?php } ?>
                <div class="form-grids row"  style="width: 50%;"> 

                    <div class="form-body">                       
                        <form enctype="multipart/form-data" method="post" action="bookAppointmentCode.php"> 

                            <div class="form-group">
                                <?php
                                $strSQL1 = "SELECT * FROM departments";
                                $rs1 = mysql_query($strSQL1);
                                ?>                                    
                                <label for="selector1">Department</label>                                   
                                <div><select name="dept_id" id="dept_id" class="form-control1" required="" onchange="getDoctors(this.value)">
                                        <?php while ($row1 = mysql_fetch_array($rs1)) { ?>
                                            <option value="<?php echo $row1['id']; ?>"><?php echo $row1['dept_name']; ?></option>
                                        <?php } ?>    
                                        <option value="" selected="">Select Department</option>
                                    </select>
                                </div>

                            </div>                                  

                            <div class="form-group">                                   
                                <label for="selector1">Doctor</label>                                     
                                <div><select name="doctor_id" id="doctor_id" class="form-control1" required="">                                           
                                        <option value="">Select Doctor</option>

                                    </select>
                                </div>                                   
                            </div> 
                            <div class="form-group">
                                <label for="selector1">Date for Appointment</label>
                                <div class='input-group date' id='datetimepicker1' style="width: 100%;">
                                    <input type='date' class="form-control" style="width: 100%;" name="appoint_date" id="appoint_date" required="" min="<?php echo date("Y-m-d", time()); ?>" onchange="getTimeSlots(this.value)" />
                                </div>
                            </div>


                            <div class="form-group">                                    
                                <label for="selector1">Time Slot</label>

                                <div><select name="timeslot_id" id="timeslot_id" class="form-control1" required="">
                                        <option value="" >Select Time Slot</option>
                                    </select>
                                </div>


                            </div> 
                            <div class="form-group"> 
                                <label for="Name">Are You having Insurance</label> <br>
                                <input type="radio" name="insurance" value="Yes" required="" onclick="checkInsurance(this.value)"> Yes
                                <input type="radio" name="insurance" value="No" required="" onclick="checkInsurance(this.value)"> No<br>
                            </div> 
                            
                            <?php
                                $strSQL5 = "SELECT * FROM insurancedetails where patient_id='".$_SESSION['patientId']."'";
                                $rs5 = mysql_query($strSQL5);
                                $row5= mysql_fetch_array($rs5);
                                $strSQL6 = "SELECT * FROM paymentinfo where patient_id='".$_SESSION['patientId']."'";
                                $rs6 = mysql_query($strSQL6);
                                $row6= mysql_fetch_array($rs6);
                                ?> 
                            <div id="insurance" style="display: none;">  
                                <label for="Name">If so,enter below details </label> 
                                <div class="form-group"> 
                                    <label for="Name">Agency Name</label> 
                                    <input type="text" class="form-control" id="agency"  name="agency"   <?php if(isset($row5['agency'])) { ?> value="<?php echo $row5['agency']; ?>"<?php } ?>> 
                                </div> 
                                <div class="form-group"> 
                                    <label for="Name">Policy Number</label> 
                                    <input type="text" class="form-control" id="policynumber"  name="policynumber"  <?php if(isset($row5['policynumber'])) { ?> value="<?php echo $row5['policynumber']; ?>"<?php } ?>> 
                                </div>
                                <div class="form-group"> 
                                    <label for="Name">Member Id</label> 
                                    <input type="text" class="form-control" id="memberid"  name="memberid"  <?php if(isset($row5['memberid'])) { ?> value="<?php echo $row5['memberid']; ?>"<?php } ?>> 
                                </div>
                            </div>
                            <div id="carddetails" style="display: none;">  
                                <label for="Name">If so,enter below details </label> 
                                <div class="form-group"> 
                                    <label for="Name">Name On Card</label> 
                                    <input type="text" class="form-control" id="nameoncard"  name="nameoncard"  <?php if(isset($row6['nameoncard'])) { ?> value="<?php echo $row6['nameoncard']; ?>"<?php } ?> > 
                                </div> 
                                <div class="form-group"> 
                                    <label for="Name">Card Number</label> 
                                    <input type="number" class="form-control" id="cardnumber"  name="cardnumber" pattern="[0-9]{16}"  <?php if(isset($row6['cardnumber'])) { ?> value="<?php echo $row6['cardnumber']; ?>"<?php } ?>  min="1000000000000000" max="9999999999999999"> 
                                </div>
                                <div class="form-group">                                   
                                    <label for="selector1">Month</label>                                     
                                    <input type="number" class="form-control" id="expmonth"  name="expmonth" pattern="[0-9]{2}"  style="width: 100%;" min="01" max="12" required="" <?php if(isset($row6['expmonth'])) { ?> value="<?php echo $row6['expmonth']; ?>"<?php } ?> > 
                                                                 
                                </div> 
                                <div class="form-group">                                   
                                    <label for="selector1">Year</label>                                     
                                    <input type="number" class="form-control" id="expyear"  name="expyear" pattern="[0-9]{4}"  style="width: 100%;" min="2016" max="2030" required="" <?php if(isset($row6['expyear'])) { ?> value="<?php echo $row6['expyear']; ?>"<?php } ?> > 
                                                                     
                                </div>
                                <div class="form-group"> 
                                    <label for="Name">CVV</label> 
                                    <input type="number" class="form-control" id="cvv"  name="cvv" pattern="[0-9]{3}"  style="width: 100%;" min="001" max="999" required="" <?php if(isset($row6['cvv'])) { ?> value="<?php echo $row6['cvv']; ?>"<?php } ?> > 
                                </div>
                            </div>
                            <button type="submit" class="btn btn-success" style="display: none" id="sumbit_button">Submit</button> 
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    function getDoctors(dept_id)
    {

        jQuery.ajax({
            type: "POST",
            url: "getData.php",
            dataType: 'json',
            data: "dept_id=" + dept_id + "&type=getdoc",
            success: function (data)
            {
                jQuery("#doctor_id").html(data);
            }

        });

    }

</script>
<script type="text/javascript">
    function getTimeSlots(inputDate)
    {
        var doc_id = document.getElementById("doctor_id").value;
        var dept_id = document.getElementById("dept_id").value;

        if (!inputDate || !doc_id || !dept_id) {
            alert("Please Select Required Inputs");
        } else {
            jQuery.ajax({
                type: "POST",
                url: "getData.php",
                dataType: 'json',
                data: "dept_id=" + dept_id + "&type=getslots&doc_id=" + doc_id + "&date=" + inputDate,
                success: function (data)
                {
                    jQuery("#timeslot_id").html(data);
                    document.getElementById('sumbit_button').style.display = "";
                }

            });

        }

    }
</script>
<script type="text/javascript" >
    function checkInsurance(value)
    {
        if (value == "Yes") {
            document.getElementById("insurance").style.display = "";
            document.getElementById("carddetails").style.display = "none";
             document.getElementById("nameoncard").required = false;
            document.getElementById("cardnumber").required = false;
            document.getElementById("expmonth").required = false;
            document.getElementById("expyear").required = false;
            document.getElementById("cvv").required = false;
            document.getElementById("policynumber").required = true;
            document.getElementById("agency").required = true;
            document.getElementById("memberid").required = true;
            
        } else if (value == "No") {
            document.getElementById("carddetails").style.display = "";
            document.getElementById("insurance").style.display = "none";
           document.getElementById("nameoncard").required = true;
            document.getElementById("cardnumber").required = true;
            document.getElementById("expmonth").required = true;
            document.getElementById("expyear").required = true;
            document.getElementById("cvv").required = true;
            document.getElementById("policynumber").required = false;
            document.getElementById("agency").required = false;
            document.getElementById("memberid").required = false;
            
        }

    }
</script> 
<!-- Classie -->
<?php include_once 'footeradmin1.php'; ?>