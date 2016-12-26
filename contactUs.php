<?php include_once 'header.php'; ?>


<div class="fullwidthbanner-container">					
    <div class="fullwidthbanner">
        <ul>	

            <li data-transition="fade" data-slotamount="10"> 										

                <div class="caption lfr" data-x="860" data-y="80" data-speed="800" data-start="1300" data-easing="easeOutBack"><img src="images/slider2-img2.jpg" alt="" class="img-circle" /></div>
                <div class="caption lfb" data-x="610" data-y="250" data-speed="900" data-start="900" data-easing="easeOutExpo">
                    <img src="images/slider2-img3.jpg" alt="" class="img-circle" /></div>
                <div class="caption lfr" data-x="590" data-y="120" data-speed="900" data-start="900" data-easing="easeOutExpo">
                    <img src="images/slider2-img1.jpg" alt="" class="img-circle" /></div>
                <div class="caption lfr" data-x="900" data-y="300" data-speed="900" data-start="900" data-easing="easeOutExpo">
                    <img src="images/slider2-img4.jpg" alt="" class="img-circle" /></div>
                <br><br>

                <div class="caption lft big_white" data-x="0" data-y="200" data-speed="400" data-start="1700" data-easing="easeOutExpo">life can be better</div>
                <div class="caption lfr medium_grey" data-x="0" data-y="260" data-speed="300" data-start="2500" data-easing="easeOutExpo">Right from the start, Best Doctors was so reassuring,<br> and the service was flawless.
                </div>
                <div class="caption lfb" data-x="0" data-y="350" data-speed="300" data-start="2600" data-easing="easeOutExpo">

                    <div class="caption lfb" data-x="140" data-y="350" data-speed="300" data-start="2700" data-easing="easeOutExpo">
                    </div>
                    <div class="caption lfb" data-x="178" data-y="350" data-speed="300" data-start="2800" data-easing="easeOutExpo">
                        </li>
                        <li data-transition="fade" data-slotamount="10"> 										



                            <div class="caption lfr" data-x="590" data-y="10" data-speed="900" data-start="900" data-easing="easeOutExpo">
                                <img src="images/slider2-girl-img.png" alt=""/></div>



                            <div class="caption lfr medium_grey" data-x="0" data-y="260" data-speed="300" data-start="2500" data-easing="easeOutExpo">It’s so valuable to have an expert reviewing your condition</div>
                            <div class="caption lfb" data-x="0" data-y="350" data-speed="300" data-start="2600" data-easing="easeOutExpo">

                        </li>
                        <li data-transition="fade" data-slotamount="10"> 										

                            <div class="caption lfr" data-x="860" data-y="80" data-speed="800" data-start="1300" data-easing="easeOutBack"><img src="images/slider2-img2.jpg" alt="" class="img-circle" /></div>
                            <div class="caption lfb" data-x="610" data-y="250" data-speed="900" data-start="900" data-easing="easeOutExpo">
                                <img src="images/slider2-img3.jpg" alt="" class="img-circle" /></div>
                            <div class="caption lfr" data-x="590" data-y="120" data-speed="900" data-start="900" data-easing="easeOutExpo">
                                <img src="images/slider2-img1.jpg" alt="" class="img-circle" /></div>
                            <div class="caption lfr" data-x="900" data-y="300" data-speed="900" data-start="900" data-easing="easeOutExpo">
                                <img src="images/slider2-img4.jpg" alt="" class="img-circle" /></div>

                            <div class="caption lft big_white" data-x="0" data-y="200" data-speed="400" data-start="1700" data-easing="easeOutExpo">life can be better</div>
                            <div class="caption lfr medium_grey" data-x="0" data-y="260" data-speed="300" data-start="2500" data-easing="easeOutExpo">
                                Best Doctors was genuinely interested in helping us.</div>
                            <div class="caption lfb" data-x="0" data-y="350" data-speed="300" data-start="2600" data-easing="easeOutExpo">



                        </li>
                        </ul>		
                    </div>					
                </div>
                </div>
                </section>

                <section class="sub-page-banner text-center" data-stellar-background-ratio="0.3" id="contact">
                    <div class="overlay"></div>
                    <div class="container">
                        <h1 class="entry-title">Contact us</h1>
                        <p></p>
                    </div>
                </section>


                <div class="sub-page-content">
                    <div class="container">

                        <div class="row">
                            <div class="col-md-8 contact-form">
                                <?php
                                if (isset($_GET) && !empty($_GET)) {
                                    if (isset($_GET) && !empty($_GET) && $_GET['s'] == 0) {
                                        ?>                      
                                        <div class="alert alert-danger" id="danger-alert">
                                            <button type="button" class="close" data-dismiss="alert">x</button>
                                            <strong> <?php echo $_GET['st'] ?> </strong>
                                        </div>                      
                                    <?php } ?>

                                    <?php
                                    if (isset($_GET) && !empty($_GET) && $_GET['s'] == 1) {
                                        ?>

                                        <div class="alert alert-success" id="danger-alert">
                                            <button type="button" class="close" data-dismiss="alert">x</button>
                                            <strong> <?php echo $_GET['st'] ?> </strong>
                                        </div>
                                        <?php
                                    }
                                }
                                ?>
                                <h2 class="light bordered">Give us a <span>Message</span></h2>
                                <form method="POST" action="contactusStatus.php">
                                    <input type="text" placeholder="First Name" name="name" required  title="Last Name can not be empty"/>
                                    <input type="email" placeholder="Email Address" name="email" required />
                                    <input type="text" placeholder="Subject" name="subject" required>
                                    <textarea placeholder="Message" name="message"required></textarea>
                                    <input type="submit" name="submit" class="btn btn-default" value="Submit">
                                </form>
                                <div class="clearfix"></div>
                            </div>



                        </div>
                    </div>

                </div>



                <div class="colourfull-row"></div>
                <?php include("footer.php"); ?>

