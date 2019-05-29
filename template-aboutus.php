<?php
/**
 * Template Name: About Us Template
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

<div class="slider_bgsinner">
			<?php if (!is_page_template( 'page-templates/front-page.php' ) ) : ?>
				<?php the_post_thumbnail('full', array('class'=> 'img-responsive' )); ?>
			<?php endif; ?>
		</div>
        
        <section class="about_content">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
            <h3><?php the_title(); ?>:</h3>
          <?php
					while ( have_posts() ) : the_post();
						the_content();					
					endwhile;
				?>
         
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
	</div>
</section>

<?php get_footer(); ?>	