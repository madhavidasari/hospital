<footer id="footer" class="light">
    <div class="container">
        <div class="row">

        </div>
    </div>
    <p class="copyright text-center">Copyright &copy; 2016 .</p>

</footer>
</div><!--end #wrapper-->
<script type="text/javascript">

    var tpj = jQuery;
    tpj.noConflict();

    tpj(document).ready(function () {

        if (tpj.fn.cssOriginal != undefined)
            tpj.fn.css = tpj.fn.cssOriginal;

        tpj('.fullwidthbanner').revolution(
                {
                    delay: 9000,
                    startwidth: 890,
                    startheight: 450,
                    onHoverStop: "on", // Stop Banner Timet at Hover on Slide on/off

                    thumbWidth: 100, // Thumb With and Height and Amount (only if navigation Tyope set to thumb !)
                    thumbHeight: 50,
                    thumbAmount: 4,
                    hideThumbs: 200,
                    navigationType: "both", //bullet, thumb, none, both	 (No Shadow in Fullwidth Version !)
                    navigationArrows: "verticalcentered", //nexttobullets, verticalcentered, none
                    navigationStyle: "round", //round,square,navbar

                    touchenabled: "on", // Enable Swipe Function : on/off

                    navOffsetHorizontal: 0,
                    navOffsetVertical: 20,
                    fullWidth: "on",
                    shadow: 0								//0 = no Shadow, 1,2,3 = 3 Different Art of Shadows -  (No Shadow in Fullwidth Version !)

                });




    });
</script>
<script src="template/homepage/js/bootstrap.min.html"></script>
<script src="template/homepage/js/carousel.html"></script>
<script src="template/homepage/js/jquery.stellar.js"></script>
<script src="template/homepage/js/jquery-ui-1.10.3.custom.js"></script>
<!--jCarousel library-->
<script type="text/javascript" src="template/homepage/js/jquery.jcarousel.min.js"></script>
<script src="template/homepage/js/jquery.uniform.js"></script>
<script src="template/homepage/js/color-switcher.js"></script>
<script type="text/javascript">
    
    jQuery(function ($) {
        // parallaax
        jQuery.stellar({
            horizontalScrolling: false,
            verticalOffset: 0
        });
        //$(".panel-collapse").collapse();

        jQuery("#datepicker").datepicker({
            inline: true
        });

        //jcarousel
        jQuery('#mycarousel').jcarousel({
            vertical: true,
            scroll: 1
        });

        //form styling
        jQuery("select").uniform();

        //top toggle section
        jQuery("#toggle-btn").click(function (e) {
            jQuery("#top-sec-detail").slideToggle();
            jQuery("#toggle-btn i").toggleClass("fa-minus");
        });

    })(jQuery);

</script>



</body>
</html>