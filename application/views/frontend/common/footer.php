</div><!--main-content-->
<div id="bottom-sidebar">
                <div class="wrapper">
                    <div class="row-fluid">

                        <div class="span4 widget-area-3">
                            <div class="widget">
                                <h2 class="widget-title">Address</h2>
								   <address>
									<strong>KINGMAKER INFOTECH INDIA PVT. LTD.</strong><br>
											Office No 12<sup>th</sup>, Floor 5 <sup>th</sup>,
									<br>
										Megacenter,
										Hadapsar, Pune - 4110289.
									<br>
									<br>
									<i class="icon-envelope"></i>&nbsp;&nbsp;+91-20- 53265486 / 53265487<br>
									<i class="icon-envelope"></i>&nbsp;&nbsp;<a href="http://www.kingsmakerinfotech.com">www.kingsmakerinfotech.com</a><br>
									<i class="icon-envelope"></i>&nbsp;&nbsp;<a href="mailto:customercare@kingsmakerinfotech.com">support@kingsmakerinfotech.com</a>
								</address>
                                
                            </div><!--widget-->
                        </div><!--span4-->


                        <div class="span4 widget-area-4">
                            <div class="widget kopa-social-widget">
                                <h2 class="widget-title">Social</h2>
                                <ul class="clearfix">
                                    <li><a href="#" class="fa fa-twitter"></a></li>
                                    <li><a href="#" class="fa fa-facebook"></a></li>
                                    <li><a href="#" class="fa fa-rss"></a></li>
                                    <li><a href="#" class="fa fa-flickr"></a></li>
                                    <li><a href="#" class="fa fa-dribbble"></a></li>
                                    <li><a href="#" class="fa fa-vimeo-square"></a></li>
                                </ul>

                                <p>KEEP IN TOUCH</p>

                            </div><!--widget-->
                        </div><!--span4-->

                        <div class="span4 widget-area-5">
                            <div class="widget kopa-newsletter-widget">
                                <h2 class="widget-title">Newsletter</h2>
                                <form action="" method="post" class="newsletter-form clearfix">

                                    <p class="input-email clearfix">
                                        <input type="text" onfocus="if(this.value==this.defaultValue)this.value='';" onblur="if(this.value=='')this.value=this.defaultValue;" name="email" value="Subscribe to newsletter" class="email" size="40">
                                        <input type="submit" value="Subscribe" class="submit">
                                    </p>
                                </form>
                                <div id="newsletter-response"></div>
                                <p>Sign up to Our Newsletter & get attractive Offers by subscribing to our newsletters.</p>
                            </div><!--widget-->
                        </div><!--span4-->

                    </div><!--row-fluid-->
                </div><!--wrapper-->
            </div><!--bottom-sidebar-->

            <footer id="page-footer">
                <div class="wrapper">
                    <div class="row-fluid">
                        <div class="span12">

                            <p id="copyright">Copyrights. &copy; 2016 by KINGMAKER INFOTECH INDIA PVT. LTD.</p>
                            <ul id="footer-menu" class="clearfix">
                                <li><a href="index.html">Home</a></li>
                                <li><a href="#">About us</a></li>
                                <li><a href="#">FAQ</a></li>
                                <li><a href="#">Contact Us</a></li>
                                <li><a href="#">Terms of Use</a></li>

                            </ul><!--footer-menu-->
                        </div><!--span12-->
                    </div><!--row-fluid-->
                </div><!--wrapper-->
            </footer><!--page-footer-->
      <p id="back-top">
                <a href="#top">Back to Top</a>
            </p>

        </div><!--kopa-wrapper-->


        <script src="<?php echo base_url()?>assets/frontend/js/jquery-1.8.3.min.js"></script>
        <script src="<?php echo base_url()?>assets/frontend/js/superfish.js"></script>
        <script src="<?php echo base_url()?>assets/frontend/js/retina.js"></script>
        <script src="<?php echo base_url()?>assets/frontend/js/bootstrap.js"></script>
        <script src="<?php echo base_url()?>assets/frontend/js/jquery.hoverdir.js"></script>
    <script src="<?php echo base_url()?>assets/frontend/js/jquery.carouFredSel-6.0.4-packed.js"></script>
        <script src="<?php echo base_url()?>assets/frontend/js/jquery.flexslider-min.js"></script>
        <script src="<?php echo base_url()?>assets/frontend/js/jquery.prettyPhoto.js"></script>
        <script src="<?php echo base_url()?>assets/frontend/js/jflickrfeed.min.js"></script>
        <script src="<?php echo base_url()?>assets/frontend/js/jquery.validate.min.js"></script>
      <script src="<?php echo base_url()?>assets/frontend/js/jquery.form.js"></script>
        <script src="<?php echo base_url()?>assets/frontend/js/jquery.isotope.min.js"></script>
        <script src="<?php echo base_url()?>assets/frontend/js/sequence.jquery-min.js"></script>
        <script src="<?php echo base_url()?>assets/frontend/js/classie.js"></script>
      <script src="<?php echo base_url()?>assets/frontend/js/cbpAnimatedHeader.min.js"></script>
        <script src="<?php echo base_url()?>assets/frontend/js/styleswitch.js"></script>
        <script src="<?php echo base_url()?>assets/frontend/js/custom.js" charset="utf-8"></script>


        <script>
      /mobile/i.test(navigator.userAgent) && !location.hash && setTimeout(function () {
        if (!pageYOffset) window.scrollTo(0, 1);
      }, 1000);

      jQuery(document).ready(function(){
        var options = {
          nextButton: true,
          prevButton: true,
          animateStartingFrameIn: true,
          autoPlayDelay: 3000,
          preloader: true,
          pauseOnHover: true,
          preloadTheseFrames: [1]
        };

        var sequence = jQuery("#sequence").sequence(options).data("sequence");

        sequence.afterLoaded = function(){
          jQuery("#nav").fadeIn(100);
          jQuery("#nav li:nth-child("+(sequence.settings.startingFrameID)+") img").addClass("active");
        }

        sequence.beforeNextFrameAnimatesIn = function(){
          jQuery("#nav li:not(:nth-child("+(sequence.nextFrameID)+")) img").removeClass("active");
          jQuery("#nav li:nth-child("+(sequence.nextFrameID)+") img").addClass("active");
        }

        jQuery("#nav li").click(function(){
          jQuery(this).children("img").removeClass("active").children("img").addClass("active");
          sequence.nextFrameID = jQuery(this).index()+1;
          sequence.goTo(sequence.nextFrameID);
        });
      });
    </script>

    </body>

</html>