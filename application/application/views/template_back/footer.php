 
<footer>
    <div class="col-lg-12">
    <div class="under-footer">
        
        
        <br>Design: <a href="https://templatemo.com" target="_parent" title="free css templates">TemplateMo</a></p>
        <ul>
            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
            <li><a href="#"><i class="fa fa-behance"></i></a></li>
        </ul>
    </div>
    </div>
</footer>

    <!-- jQuery -->
    <script src="<?php echo base_url()?>assets/js/jquery-2.1.0.min.js"></script>

    <!-- Bootstrap -->
    <script src="<?php echo base_url()?>assets/js/popper.js"></script>
    <script src="<?php echo base_url()?>assets/js/bootstrap.min.js"></script>

    <!-- Plugins -->
    <script src="<?php echo base_url()?>assets/js/owl-carousel.js"></script>
    <script src="<?php echo base_url()?>assets/js/accordions.js"></script>
    <script src="<?php echo base_url()?>assets/js/datepicker.js"></script>
    <script src="<?php echo base_url()?>assets/js/scrollreveal.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/waypoints.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/jquery.counterup.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/imgfix.min.js"></script> 
    <script src="<?php echo base_url()?>assets/js/slick.js"></script> 
    <script src="<?php echo base_url()?>assets/js/lightbox.js"></script> 
    <script src="<?php echo base_url()?>assets/js/isotope.js"></script> 
    
    <!-- Global Init -->
    <script src="<?php echo base_url()?>assets/js/custom.js"></script>

    <script>

        $(function() {
            var selectedClass = "";
            $("p").click(function(){
            selectedClass = $(this).attr("data-rel");
            $("#portfolio").fadeTo(50, 0.1);
                $("#portfolio div").not("."+selectedClass).fadeOut();
            setTimeout(function() {
              $("."+selectedClass).fadeIn();
              $("#portfolio").fadeTo(50, 1);
            }, 500);
                
            });
        });

    </script>
</body>
</html>