<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php endif; ?>
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="<?php echo bloginfo("template_directory"); ?>/css/owl.carousel.min.css">
<link rel="stylesheet" href="<?php echo bloginfo("template_directory"); ?>/css/owl.theme.default.min.css">
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<div class="site-inner">
		<div class="top-header">
		<div class="container">
			<div class="row"><div class="col-sm-12"></div>
			</div>
		</div>
	</div>
	<div class="header">
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<div class="logo">
                    <a href="http://scheffreslaundry.com";><img src="<?php echo bloginfo("template_directory"); ?>/images/logo.png" class="img-responsive"></a>
                    <?php //the_custom_logo(); ?>
					</div>
				</div>
				<div class="col-sm-9">
					<div class="top-head">
						<div class="col-sm-6">
						<h1>Trust. Pride. Care.</h1>
					</div>
					<div class="col-sm-6">
						<div class="call-action text-center">
							<?php dynamic_sidebar("header-1"); ?>
						</div>
					</div><div class="clearfix"></div>
					</div><div class="clearfix"></div>
					<div class="col-lg-12 col-md-12 hidden-xs hidden-sm">
						<ul class="main_nav">
                        <?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>

			                   </ul>
					</div>	
				</div>
			</div>
		</div>
	</div>
    <?php if(is_front_page()){ ?>
         <div class="slider">
					<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
						<?php
							$sliderargs = array(
								'tax_query' => array(
									array(
										'taxonomy' => 'state_art',
										'field' => 'slug',
										'terms' => array( 'home-page' )
									),
								),
								'post_type' => 'slider',
								'posts_per_page' => -1,
								'order' => 'ASC',
							);
							$slide = 1;
							$slidedotsli = 0;
							$sliderquery = new WP_Query($sliderargs);
					
						?><ol class="carousel-indicators">
							<?php
								while ( $sliderquery->have_posts() ) : $sliderquery->the_post();
							?>
							<li data-target="#carousel-example-generic" data-slide-to="<?php echo $slidedotsli; ?>" class="<?php if($slidedotsli == 0){echo "active";}?>"></li>
							<?php 
							$slidedotsli++;
							endwhile;
							?>
						</ol>
						<div class="carousel-inner" role="listbox">
							<?php
								while ( $sliderquery->have_posts() ) : $sliderquery->the_post();
							?>
							<div class="item <?php if($slide == 1){echo "active";}?>">
								<!--<img src="<?php //echo get_template_directory_uri(); ?>/images/banner-1.jpg" alt="...">-->
								<?php the_post_thumbnail(array(1600, 945)); ?>
								<div class="slider_content">
                                <div class="item active">
        

									<?php the_content(); ?>
								
</div>
</div>
							</div>
							<?php 
								$slide++;
								endwhile;
							?>
					
						<!-- Controls -->
						<a class="left carousel-control custom_sars" href="#carousel-example-generic" role="button" data-slide="prev">
							<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
							<span class="sr-only">Previous</span>
						</a>
						<a class="right carousel-control custom_sars" href="#carousel-example-generic" role="button" data-slide="next">
							<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
							<span class="sr-only">Next</span>
						</a>
					</div>
				</div>
			</div>
		
		<?php } ?>

		<!-- .site-header -->


		<div id="content" class="site-content">
