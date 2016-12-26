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
            <div class="forms">
                <?php  if (isset($_GET['id']) && !empty($_GET['id'])) { ?>
                <h3 class="title1">Edit Time Slot</h3>
                <?php } else { ?>
                 <h3 class="title1">Add Time Slot</h3>
                <?php } ?>
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
                        <?php
                        if (isset($_GET['id']) && !empty($_GET['id'])) {
                            $strSQL = "SELECT * FROM timeslots where id='" . $_GET['id'] . "'";
                            $rs = mysql_query($strSQL);
                            $row = mysql_fetch_array($rs);
                            ?>
                            <form enctype="multipart/form-data" method="post" action="addTimeSlotCode.php"> 

                                <div class="form-group"> 
                                    <label for="Name">Time Slot</label> 
                                    <input type="text" class="form-control" id="timeslot"  name="timeslot" required="" value="<?php echo $row['timeslot'] ?>"> 

                                </div> 
                                 
                                <input type="text" value="update" name="update" hidden="">
                                <input type="text" value="<?php echo $row['id']; ?>" name="id" hidden="">
                                <button type="submit" class="btn btn-success">Submit</button> 
                            </form>


                            <?php
                        } else {
                            ?>
                        <form enctype="multipart/form-data" method="post" action="addTimeSlotCode.php"> 

                                <div class="form-group"> 
                                    <label for="Name">Time Slot</label> 
                                    <input type="text" class="form-control" id="timeslot"  name="timeslot" required=""> 

                                </div> 
                                
                                <button type="submit" class="btn btn-success">Submit</button> 
                            </form>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Classie -->
<?php include_once 'footeradmin1.php'; ?>