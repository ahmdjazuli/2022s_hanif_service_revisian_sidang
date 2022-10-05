<?php require('header.php') ?>
  <div class="collection_text">Lokasi Hanif Komputer 1 dan 2</div>
   <div class="about_main layout_padding">
    <div class="collectipn_section_3 layout_padding">
    	<div class="container">
    		<div class="racing_shoes">
    			<div class="row">
    				<div class="col-md-7">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7965.310334553558!2d114.8221787539062!3d-3.433825199999996!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2de68114f7b0a7a9%3A0x39a1c8a214ab1472!2sHANIF%20COMPUTER!5e0!3m2!1sid!2ssg!4v1657851514350!5m2!1sid!2ssg" width="600" height="510" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
    				</div>
    				<div class="col-md-5">
    					<div class="sale_text"><strong>Jl. Gotong Royong Perdana<br><span style="color: #0a0506;">Komplek, </span> <br>No.3 </strong><br><span style="color:black">Ruko No. 6 </span></div>
    					<div class="number_text"><strong></strong></div>
    					<button class="seemore">WA : (0821)58222001</button>
    				</div>
    			</div>
    		</div>
    	</div>
    </div>
    <div class="collectipn_section_3 layout_padding">
        <div class="container">
            <div class="racing_shoes">
                <div class="row">
                    <div class="col-md-7">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7965.216617768961!2d114.82619385390629!3d-3.445041599999986!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2de68174167eff0b%3A0xd8f95f3cd9425472!2sHANIF%20COMPUTER%202!5e0!3m2!1sid!2ssg!4v1657851701935!5m2!1sid!2ssg" width="600" height="510" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                    </div>
                    <div class="col-md-5">
                        <div class="sale_text"><strong>Jl. Karamunting<br><span style="color: #0a0506;">No. 4</span> <br>Guntung Paikat </strong><br><span style="color:black">Banjarbaru</span></div>
                        <div class="number_text"><strong></strong></div>
                        <button class="seemore">WA : (0821)58222001</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
	<!-- new collection section end -->

      <!-- Javascript files-->
      <script src="js/jquery.min.js"></script>
      <script src="js/popper.min.js"></script>
      <script src="js/bootstrap.bundle.min.js"></script>
      <script src="js/jquery-3.0.0.min.js"></script>
      <script src="js/plugin.js"></script>
      <!-- sidebar -->
      <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
      <script src="js/custom.js"></script>
      <!-- javascript --> 
      <script src="js/owl.carousel.js"></script>
      <script src="https:cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
      <script>
         $(document).ready(function(){
         $(".fancybox").fancybox({
         openEffect: "none",
         closeEffect: "none"
         });
         
         
$('#myCarousel').carousel({
            interval: false
        });

        //scroll slides on swipe for touch enabled devices

        $("#myCarousel").on("touchstart", function(event){

            var yClick = event.originalEvent.touches[0].pageY;
            $(this).one("touchmove", function(event){

                var yMove = event.originalEvent.touches[0].pageY;
                if( Math.floor(yClick - yMove) > 1 ){
                    $(".carousel").carousel('next');
                }
                else if( Math.floor(yClick - yMove) < -1 ){
                    $(".carousel").carousel('prev');
                }
            });
            $(".carousel").on("touchend", function(){
                $(this).off("touchmove");
            });
        });
      </script> 
   </body>
</html>
