<?php
/**
 * Template Name: Testimonial Template
 *
 * Description: A page template that provides a key component of WordPress as a CMS
 * by meeting the need for a carefully crafted introductory page. The front page template
 * in SOTA consists of a page content area for adding text, images, video --
 * anything you'd like -- followed by front-page-only widgets in one or two columns.
 *
 * @package WordPress
 * @subpackage Scheffres_Laundry
 * @since Scheffres Laundry 1.0
 */
get_header(); ?>
<section class="about_content">
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <h3><?php the_title(); ?>:</h3>
        <div class="about">
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
             //echo '<pre>'; print_r($args); echo '</pre>'; 
             $testi = 1;
             $query = new WP_Query( $args  );
              while ( $query->have_posts() ) : $query->the_post();	
             ?>
            <div class="testisitems">
            <?php the_content(); ?>
            <h4 class="pull-right text-right">-<?php the_title(); ?></h4>
            <div class="clearfix"></div>
            </div>
                  <?php 
                    $testi++;
            		endwhile;
                    ?>
          <?php while ( have_posts() ) : the_post(); ?>
          <?php get_template_part( 'content', 'page' ); ?>
          <?php endwhile; // end of the loop. ?>
        </div>
      </div>
    </div>
    <!-- #row --> 
  </div>
  </section>
  <!-- #container --> 
</div>
<!-- #otherinner -->
<?php get_footer(); ?>
