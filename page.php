<?php
/**
 * The template for displaying pages
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

<div id="primary" class="content-area container">
	<main id="main" class="site-main" role="main">
    <h3><?php the_title(); ?>:</h3>
		<?php
					while ( have_posts() ) : the_post();
						the_content();					
					endwhile;
				?>
</main><!-- .site-main -->

</div><!-- .content-area -->
<?php get_footer(); ?>
