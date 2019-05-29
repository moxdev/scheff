<?php
/**
 * Template Name: Homepage Template
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other "pages" on your WordPress site will use a different template.
 *
 * @package WordPress
 * @subpackage Scheffres_Laundry
 * @since Scheffres Laundry 1.0
 */

get_header(); ?>
<?php
if (is_page('home')) { ?>
<style>
.entry-header {
	display:none;
}
</style>
<?php }
?>

<div id="primary" class="content-area">
  <main id="main" class="site-main" role="main">
    <section class="welcome">
      <div class="container">
        <div class="row">
          <div class="col-sm-12">
            <?php
					while ( have_posts() ) : the_post();
						the_content();					
					endwhile;
				?>
          </div>
        </div>
      </div>
    </section>
      <?php dynamic_sidebar("homepage-1"); ?> 
    <section class="chhose">
      <div class="container">
        <div class="row">
        <div class="col-sm-12">
        <div class="chose-list">
          <?php dynamic_sidebar("homepage-2"); ?> 
          </div>
          </div>
          <div class="clearfix"></div>
          <div class="col-sm-12">
            <div class="text-center "><a href="http://scheffreslaundry.com/why-choose-us/" class="lern_b text-white">Learn More <i class="fa fa-angle-double-right"></i></a></div>
          </div>
        </div>
      </div>
    </section>
    <section class="testimonial">
<div class="container">
 <div class="row">
      <div class="col-sm-12">
		<div id="testi" class="owl-carousel owl-theme">
       
				<?php
					$args = array(
						'tax_query' => array(
							array(
								'taxonomy' => 'testi_Cat',
								'field' => 'slug',
								'terms' => array( 'testimonials' )
							),
						),
						'post_type' => 'testimonial',
						'posts_per_page' => -1,
					);
					$testi = 1;
					$dotsli = 0;
					$query = new WP_Query( $args  );
			
				?>
		
			<!-- Wrapper for slides -->
				
				<?php
					while ( $query->have_posts() ) : $query->the_post();
				?>
				  <div class="item <?php if($testi == 1){echo "active";}?>">
                  <div class="col-sm-12"> 
          <?php $content = get_the_content();
  $trimmed_content = wp_trim_words( $content,68, '<a href="http://scheffreslaundry.com/testimonials/">...Continue Reading</a>' ); ?>
  <p class="testi-para"><?php echo $trimmed_content; ?></p>
                     </div> 
                         <div class="clearfix"></div>
						   <p class="text-center testi-name">-<?php the_title(); ?></p>
	                </div>				
			<?php 
				$testi++;
				endwhile;
			?>
          
		
		</div>
        </div>
        </div>
	</div>
   
    </section>
    
    <section class="proud_member text-center">
      <div class="container">
        <div class="row">
          <div class="col-sm-12">
          <?php dynamic_sidebar("homepage-3"); ?> 
          </div>
          
      </div>
    </section>
  </main>
  <!-- .site-main -->
  
  <?php //get_sidebar( 'content-bottom' ); ?>
</div>
<!-- .content-area -->

<?php //get_sidebar(); ?>
<?php get_footer(); ?>
