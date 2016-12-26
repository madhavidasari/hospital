<!DOCTYPE html>
<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]> <html class="lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]> <html class="lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="en"> <!--<![endif]-->
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title>Login | Hospital Management</title>
  <link rel="stylesheet" href="template/homepage/style.css">
  <!--[if lt IE 9]><script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
</head>
<body>

<br/>
<center>
<h1>Hospital Management System

</h1>
 <h3><a href="index.php">Home</a></h3>
 <?php
 if (isset($_GET['s'])) {
     if (isset($_GET['s']) && $_GET['s'] == 0) {
         ?>                      
         <div class="alert alert-danger" id="danger-alert">
             <button type="button" class="close" data-dismiss="alert">x</button>
             <strong> <?php echo $_GET['st'] ?> </strong>
         </div>                      
         <?php
     }
 }
 ?>
 <?php if ($_GET['login'] == "patient") { ?>
     <h2 class="light bordered"><span>Patient Login</span></h2>
 <?php } else if ($_GET['login'] == "doctor") { ?>
     <h2 class="light bordered"><span>Doctor Login</span></h2>
 <?php } else if ($_GET['login'] == "admin") { ?>
     <h2 class="light bordered"><span>Admin Login</span></h2>
 <?php } ?>

 </center>
  <section class="container">
    <div class="login">
      <h1>Login</h1>
      <form method="post" action="loginStatus.php">
        <p><input type="email" placeholder="Email Address" name="username" required /></p>
        <p><input type="password" placeholder="Password" required="" name="password" /></p>
        <?php if ($_GET['login'] == "patient") { ?>
            <input name="type" value="patient" hidden="" type="text">
        <?php } else if ($_GET['login'] == "doctor") { ?>
            <input name="type" value="doctor" hidden="" type="text">
        <?php } else if ($_GET['login'] == "admin") { ?>
            <input name="type" value="admin" hidden="" type="text">
        <?php } ?> 
        <p class="submit"><input type="submit" name="commit" value="Login"></p>
      </form>
	 
    </div>

    <div class="login-help">
      <!---<p><font color=#000000>Forgot your password? <a href="index.html">Click here to submit a reset request</a>.</font></p>-->
    </div>
  </section>
</body>
</html>
