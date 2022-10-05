<?php require('header.php');?>
	</div>
        <div class="container">
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <?php if($memori['id']!=''){?> 
                <div class="alert alert-warning alert-dismissible">
                    Selamat Datang, <a href="profil.php?id=<?=$memori['id'] ?>" class="alert-link"><?= $memori['nama'] ?></a>.
                </div>
            <?php } ?>
            <div class="row">
                <div class="col-sm-4">
                    <div class="best_shoes">
                        <div class="shoes_icon">
                            <img src="images/thumb1.jpg" style="margin-left: 10px;">
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="best_shoes">
                        <div class="shoes_icon">
                            <img src="images/thumb2.jpg" style="margin-left: 10px;">
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="best_shoes">
                        <div class="shoes_icon">
                            <img src="images/thumb3.jpg" style="margin-left: 10px;">
                        </div>
                    </div>
                </div>
        </div>
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
