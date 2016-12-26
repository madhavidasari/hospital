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
                <h3 class="title1">Edit Details</h3> 
                <?php
                $strSQL = "SELECT * FROM patient where id='" . $_SESSION['patientId'] . "'";
                $rs = mysql_query($strSQL);
                $row = mysql_fetch_array($rs);
                ?>
                <div class="form-grids row" style="width: 50%;"> 
                    <?php
                    if (isset($_GET['msg']) && !empty($_GET['msg'])) {
                        ?>                      
                        <div class="alert alert-info" >
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong> <?php echo $_GET['msg'] ?> </strong>
                        </div>                      
                    <?php } ?>
                    <div class="form-body">                        
                        <form enctype="multipart/form-data" method="post" action="patientEditDetailsCode.php">                                  
                            <div class="form-group"> 
                                <label for="Name">First Name<span style="color:red;">*</span></label> <br>
                                <input type="text" class="form-control" placeholder="First Name" name="firstname" required="" value="<?php echo $row['firstname']; ?>">
                            </div>
                            <div class="form-group"> 
                                <label for="">Last Name<span style="color:red;">*</span></label><br>
                                <input type="text" class="form-control"  placeholder="Last Name" name="lastname" required="" value="<?php echo $row['lastname']; ?>">
                            </div> 

                            <div class="form-group"> 
                                <label for="">Address<span style="color:red;">*</span></label><br>
                                <textarea  class="form-control"  placeholder="Address" name="address" required="" cols="50" rows="5"><?php echo $row['address']; ?></textarea>
                            </div>

                            <div class="form-group"> 
                                <label for="">City<span style="color:red;">*</span></label><br>
                                <input type="text" class="form-control"  placeholder="City" name="city" required="" value="<?php echo $row['city']; ?>">
                            </div>
                            <div class="form-group"> 
                                <label for="">State<span style="color:red;">*</span></label><br>
                                <input type="text"  class="form-control" placeholder="State" name="state" required="" value="<?php echo $row['state']; ?>">
                            </div>

                            <div class="form-group"> 
                                <label for="">Country<span style="color:red;">*</span></label><br>
                                <input type="text"  class="form-control" placeholder="Country" name="country" required="" value="<?php echo $row['country']; ?>">
                            </div>
                            <div class="form-group"> 
                                <label for="">Zip Code<span style="color:red;">*</span></label><br>
                                <input type="text"  class="form-control" placeholder="Zip Code" name="zipcode" required="" value="<?php echo $row['zipcode']; ?>">
                            </div>

                            <input type="text"  name="id" required="" value="<?php echo $row['id']; ?>" hidden="">
                            <button type="submit" class="btn btn-success">Update</button> 
                        </form>

                    </div>
                </div>


            </div>
        </div>
    </div>
</div>
<!-- Classie -->
<?php include_once 'footeradmin1.php'; ?>