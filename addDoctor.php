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
                <h3 class="title1">Edit Doctor</h3>
                <?php } else { ?>
                 <h3 class="title1">Add Doctor</h3>
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
                            $strSQL = "SELECT * FROM doctors where id='" . $_GET['id'] . "'";
                            $rs = mysql_query($strSQL);
                            $row = mysql_fetch_array($rs);
                            ?>
                            <form enctype="multipart/form-data" method="post" action="addDoctorCode.php"> 

                                <div class="form-group"> 
                                    <label for="Name">First Name</label> 
                                    <input type="text" class="form-control" id="firstname"  name="firstname"  required="" value="<?php echo $row['firstname']; ?>"> 
                                </div>
                                <div class="form-group"> 
                                    <label for="Name">Last Name</label> 
                                    <input type="text" class="form-control" id="lastname"  name="lastname"  required="" value="<?php echo $row['lastname']; ?>"> 
                                </div> 
                                <div class="form-group"> 
                                    <label for="Name">User Name</label> 
                                    <input type="email" class="form-control" id="username"  name="username"  required="" value="<?php echo $row['username']; ?>"> 
                                </div> 
                                <div class="form-group"> 
                                    <label for="Name">Password</label> 
                                    <input type="password" class="form-control" id="password"  name="password"  required=""> 
                                </div> 
                                <div class="form-group"> 
                                    <label for="Name">Doctor Code</label> 
                                    <input type="text" class="form-control" id="doctor_code"  name="doctor_code"  required="" value="<?php echo $row['doctor_code']; ?>"> 
                                </div>
                                <div class="form-group">
                                    <?php
                                    $strSQL1 = "SELECT * FROM departments";
                                    $rs1 = mysql_query($strSQL1);
                                    ?>
                                    <label for="selector1">Department</label>
                                    <div><select name="dept_id" id="status" class="form-control1" required="">
                                            <?php while ($row1 = mysql_fetch_array($rs1)) { ?>
                                            <option value="<?php echo $row1['id']; ?>"  <?php if($row['dept_id']==$row1['id']) { ?> selected="" <?php } ?>><?php echo $row1['dept_name']; ?></option>
                                            <?php } ?>                     
                                        </select>
                                    </div>
                                </div>  
                                <div class="form-group"> 
                                        <label for="image">Attachments</label> 
                                        <input type="file" id="file" name="file" >
                                        <a href="<?php echo $row['file_location']; ?>" target="_blank"> <img src="<?php echo $row['file_location']; ?>" style="width:100px;height:100px;"/></a>                                        
                                    </div>  
                                
                                <input type="text" value="update" name="update" hidden="">
                                <input type="text" value="<?php echo $row['id']; ?>" name="id" hidden="">
                                <button type="submit" class="btn btn-success">Submit</button> 
                            </form>


                            <?php
                        } else {
                            ?>
                        <form enctype="multipart/form-data" method="post" action="addDoctorCode.php"> 

                                <div class="form-group"> 
                                    <label for="Name">First Name</label> 
                                    <input type="text" class="form-control" id="firstname"  name="firstname"  required=""> 
                                </div>
                                <div class="form-group"> 
                                    <label for="Name">Last Name</label> 
                                    <input type="text" class="form-control" id="lastname"  name="lastname"  required=""> 
                                </div> 
                                <div class="form-group"> 
                                    <label for="Name">User Name</label> 
                                    <input type="email" class="form-control" id="username"  name="username"  required=""> 
                                </div> 
                                <div class="form-group"> 
                                    <label for="Name">Password</label> 
                                    <input type="password" class="form-control" id="password"  name="password"  required=""> 
                                </div> 
                                <div class="form-group"> 
                                    <label for="Name">Doctor Code</label> 
                                    <input type="text" class="form-control" id="doctor_code"  name="doctor_code"  required=""> 
                                </div>
                                <div class="form-group">
                                    <?php
                                    $strSQL = "SELECT * FROM departments";
                                    $rs = mysql_query($strSQL);
                                    ?>
                                    <label for="selector1">Department</label>
                                    <div><select name="dept_id" id="status" class="form-control1" required="">
                                            <?php while ($row = mysql_fetch_array($rs)) { ?>
                                                <option value="<?php echo $row['id']; ?>" ><?php echo $row['dept_name']; ?></option>
                                            <?php } ?>                     
                                        </select>
                                    </div>
                                </div> 
                                <div class="form-group"> 
                                    <label for="image">Photo</label> 
                                    <input type="file" id="file" name="file" required=""> 
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