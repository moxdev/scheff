<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 * @package WordPress
 * @subpackage Scheffres_Laundry
 * @since Scheffres Laundry 1.0
 */
?>

		</div><!-- .site-content -->
<section class="blue-color"></section>
<footer class="footer">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
 <h3 class="footer-line">Trust. Pride. Care.</h3>
			</div>
			<div class="col-sm-2">
<?php dynamic_sidebar("footer-1"); ?>
	</div>
	<div class="col-sm-5">
<?php dynamic_sidebar("footer-2");?>
	</div>
	<div class="col-sm-2">
<ul> <?php dynamic_sidebar("footer-3");?></ul>
	</div>
	<div class="col-sm-3">
		
 <?php dynamic_sidebar("footer-4");?>



	</div>

		</div>


		<div class="row">

      <?php dynamic_sidebar("footer-5"); ?>
       
    </div>
	</div>

</footer>
		<!-- .site-footer -->
	</div><!-- .site-inner -->
</div><!-- .site -->
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script> 
<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
 <script src="<?php echo bloginfo("template_directory"); ?>/js/owl.carousel.js"></script>

    <script>
            $(document).ready(function() {
              $('#testi').owlCarousel({
                items: 1,
                margin: 0,
				loop: true,
                autoplay:true,
              });
            })
          </script>

<?php wp_footer(); ?>
</body>
</html>
