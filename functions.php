<?php
/**
 * Scheffres Laundry functions and definitions
 *
 * Set up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * When using a child theme you can override certain functions (those wrapped
 * in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before
 * the parent theme's file, so the child theme functions would be used.
 *
 * @link https://codex.wordpress.org/Theme_Development
 * @link https://codex.wordpress.org/Child_Themes
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are
 * instead attached to a filter or action hook.
 *
 * For more information on hooks, actions, and filters,
 * {@link https://codex.wordpress.org/Plugin_API}
 *
 * @package WordPress
 * @subpackage Scheffres_Laundry
 * @since Scheffres Laundry 1.0
 */

/**
 * Scheffres Laundry only works in WordPress 4.4 or later.
 */
if ( version_compare( $GLOBALS['wp_version'], '4.4-alpha', '<' ) ) {
	require get_template_directory() . '/inc/back-compat.php';
}

if ( ! function_exists( 'scheffreslaundry_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 *
 * Create your own scheffreslaundry_setup() function to override in a child theme.
 *
 * @since Scheffres Laundry 1.0
 */
function scheffreslaundry_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed at WordPress.org. See: https://translate.wordpress.org/projects/wp-themes/scheffreslaundry
	 * If you're building a theme based on Twenty Sixteen, use a find and replace
	 * to change 'scheffreslaundry' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'scheffreslaundry' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for custom logo.
	 *
	 *  @since Twenty Sixteen 1.2
	 */
	add_theme_support( 'custom-logo', array(
		'height'      => 240,
		'width'       => 240,
		'flex-height' => true,
	) );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 1200, 9999 );
	add_image_size( 'home-slider', 1600, 500, true );

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'scheffreslaundry' ),
		'social'  => __( 'Social Links Menu', 'scheffreslaundry' ),
		'footer'  => __( 'Footer Menu', 'scheffreslaundry' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 *
	 * See: https://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
		'gallery',
		'status',
		'audio',
		'chat',
	) );

	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, icons, and column width.
	 */
	add_editor_style( array( 'css/editor-style.css', scheffreslaundry_fonts_url() ) );

	// Indicate widget sidebars can use selective refresh in the Customizer.
	add_theme_support( 'customize-selective-refresh-widgets' );
}
endif; // scheffreslaundry_setup
add_action( 'after_setup_theme', 'scheffreslaundry_setup' );

/**
 * Sets the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 *
 * @since Scheffres Laundry 1.0
 */
function scheffreslaundry_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'scheffreslaundry_content_width', 840 );
}
add_action( 'after_setup_theme', 'scheffreslaundry_content_width', 0 );

/**
 * Registers a widget area.
 *
 * @link https://developer.wordpress.org/reference/functions/register_sidebar/
 *
 * @since Scheffres Laundry 1.0
 */
function scheffreslaundry_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'scheffreslaundry' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Add widgets here to appear in your sidebar.', 'scheffreslaundry' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => __( 'Content Bottom 1', 'scheffreslaundry' ),
		'id'            => 'sidebar-2',
		'description'   => __( 'Appears at the bottom of the content on posts and pages.', 'scheffreslaundry' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => __( 'Content Bottom 2', 'scheffreslaundry' ),
		'id'            => 'sidebar-3',
		'description'   => __( 'Appears at the bottom of the content on posts and pages.', 'scheffreslaundry' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => __( 'Header - Call Today', 'scheffreslaundry' ),
		'id'            => 'header-1',
		'description'   => __( 'Appears at the bottom of the content on posts and pages.', 'scheffreslaundry' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => __( 'Homepage - Services', 'scheffreslaundry' ),
		'id'            => 'homepage-1',
		'description'   => __( 'Appears at the bottom of the content on posts and pages.', 'scheffreslaundry' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

		register_sidebar( array(
		'name'          => __( 'Homepage - Why Choose Us', 'scheffreslaundry' ),
		'id'            => 'homepage-2',
		'description'   => __( 'Appears at the bottom of the content on posts and pages.', 'scheffreslaundry' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	    register_sidebar( array(
		'name'          => __( 'Homepage - Proud Member of', 'scheffreslaundry' ),
		'id'            => 'homepage-3',
		'description'   => __( 'Appears at the bottom of the content on posts and pages.', 'scheffreslaundry' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer - Areas Served', 'scheffreslaundry' ),
		'id'            => 'footer-1',
		'description'   => __( 'Appears at the bottom of the content on posts and pages.', 'scheffreslaundry' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer - About Us', 'scheffreslaundry' ),
		'id'            => 'footer-2',
		'description'   => __( 'Appears at the bottom of the content on posts and pages.', 'scheffreslaundry' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer - Important Links', 'scheffreslaundry' ),
		'id'            => 'footer-3',
		'description'   => __( 'Appears at the bottom of the content on posts and pages.', 'scheffreslaundry' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer - Follow Us', 'scheffreslaundry' ),
		'id'            => 'footer-4',
		'description'   => __( 'Appears at the bottom of the content on posts and pages.', 'scheffreslaundry' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );

		register_sidebar( array(
		'name'          => __( 'Footer - All Right Reserved', 'scheffreslaundry' ),
		'id'            => 'footer-5',
		'description'   => __( 'Appears at the bottom of the content on posts and pages.', 'scheffreslaundry' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'scheffreslaundry_widgets_init' );

if ( ! function_exists( 'scheffreslaundry_fonts_url' ) ) :
/**
 * Register Google fonts for Twenty Sixteen.
 *
 * Create your own scheffreslaundry_fonts_url() function to override in a child theme.
 *
 * @since Scheffres Laundry 1.0
 *
 * @return string Google fonts URL for the theme.
 */
function scheffreslaundry_fonts_url() {
	$fonts_url = '';
	$fonts     = array();
	$subsets   = 'latin,latin-ext';

	/* translators: If there are characters in your language that are not supported by Merriweather, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Merriweather font: on or off', 'scheffreslaundry' ) ) {
		$fonts[] = 'Merriweather:400,700,900,400italic,700italic,900italic';
	}

	/* translators: If there are characters in your language that are not supported by Montserrat, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Montserrat font: on or off', 'scheffreslaundry' ) ) {
		$fonts[] = 'Montserrat:400,700';
	}

	/* translators: If there are characters in your language that are not supported by Inconsolata, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Inconsolata font: on or off', 'scheffreslaundry' ) ) {
		$fonts[] = 'Inconsolata:400';
	}

	if ( $fonts ) {
		$fonts_url = add_query_arg( array(
			'family' => urlencode( implode( '|', $fonts ) ),
			'subset' => urlencode( $subsets ),
		), 'https://fonts.googleapis.com/css' );
	}

	return $fonts_url;
}
endif;

/**
 * Handles JavaScript detection.
 *
 * Adds a `js` class to the root `<html>` element when JavaScript is detected.
 *
 * @since Scheffres Laundry 1.0
 */
function scheffreslaundry_javascript_detection() {
	echo "<script>(function(html){html.className = html.className.replace(/\bno-js\b/,'js')})(document.documentElement);</script>\n";
}
add_action( 'wp_head', 'scheffreslaundry_javascript_detection', 0 );

/**
 * Enqueues scripts and styles.
 *
 * @since Twenty Sixteen 1.0
 */
function scheffreslaundry_scripts() {
	// Add custom fonts, used in the main stylesheet.
	wp_enqueue_style( 'scheffreslaundry-fonts', scheffreslaundry_fonts_url(), array(), null );

	// Add Genericons, used in the main stylesheet.
	wp_enqueue_style( 'genericons', get_template_directory_uri() . '/genericons/genericons.css', array(), '3.4.1' );

	// Theme stylesheet.
	wp_enqueue_style( 'scheffreslaundry-style', get_stylesheet_uri() );

	// Load the Internet Explorer specific stylesheet.
	wp_enqueue_style( 'scheffreslaundry-ie', get_template_directory_uri() . '/css/ie.css', array( 'scheffreslaundry-style' ), '20160816' );
	wp_style_add_data( 'scheffreslaundry-ie', 'conditional', 'lt IE 10' );

	// Load the Internet Explorer 8 specific stylesheet.
	wp_enqueue_style( 'scheffreslaundry-ie8', get_template_directory_uri() . '/css/ie8.css', array( 'scheffreslaundry-style' ), '20160816' );
	wp_style_add_data( 'scheffreslaundry-ie8', 'conditional', 'lt IE 9' );

	// Load the Internet Explorer 7 specific stylesheet.
	wp_enqueue_style( 'scheffreslaundry-ie7', get_template_directory_uri() . '/css/ie7.css', array( 'scheffreslaundry-style' ), '20160816' );
	wp_style_add_data( 'scheffreslaundry-ie7', 'conditional', 'lt IE 8' );

	// Load the html5 shiv.
	wp_enqueue_script( 'scheffreslaundry-html5', get_template_directory_uri() . '/js/html5.js', array(), '3.7.3' );
	wp_script_add_data( 'scheffreslaundry-html5', 'conditional', 'lt IE 9' );

	wp_enqueue_script( 'scheffreslaundry-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20160816', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	if ( is_singular() && wp_attachment_is_image() ) {
		wp_enqueue_script( 'scheffreslaundry-keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array( 'jquery' ), '20160816' );
	}

	wp_enqueue_script( 'scheffreslaundry-script', get_template_directory_uri() . '/js/functions.js', array( 'jquery' ), '20160816', true );

	wp_localize_script( 'scheffreslaundry-script', 'screenReaderText', array(
		'expand'   => __( 'expand child menu', 'scheffreslaundry' ),
		'collapse' => __( 'collapse child menu', 'scheffreslaundry' ),
	) );
}
add_action( 'wp_enqueue_scripts', 'scheffreslaundry_scripts' );

/**
 * Adds custom classes to the array of body classes.
 *
 * @since Scheffres Laundry 1.0
 *
 * @param array $classes Classes for the body element.
 * @return array (Maybe) filtered body classes.
 */
function scheffreslaundry_body_classes( $classes ) {
	// Adds a class of custom-background-image to sites with a custom background image.
	if ( get_background_image() ) {
		$classes[] = 'custom-background-image';
	}

	// Adds a class of group-blog to sites with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	// Adds a class of no-sidebar to sites without active sidebar.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	return $classes;
}
add_filter( 'body_class', 'scheffreslaundry_body_classes' );

/**
 * Converts a HEX value to RGB.
 *
 * @since Scheffres Laundry 1.0
 *
 * @param string $color The original color, in 3- or 6-digit hexadecimal form.
 * @return array Array containing RGB (red, green, and blue) values for the given
 *               HEX code, empty array otherwise.
 */
function scheffreslaundry_hex2rgb( $color ) {
	$color = trim( $color, '#' );

	if ( strlen( $color ) === 3 ) {
		$r = hexdec( substr( $color, 0, 1 ).substr( $color, 0, 1 ) );
		$g = hexdec( substr( $color, 1, 1 ).substr( $color, 1, 1 ) );
		$b = hexdec( substr( $color, 2, 1 ).substr( $color, 2, 1 ) );
	} else if ( strlen( $color ) === 6 ) {
		$r = hexdec( substr( $color, 0, 2 ) );
		$g = hexdec( substr( $color, 2, 2 ) );
		$b = hexdec( substr( $color, 4, 2 ) );
	} else {
		return array();
	}

	return array( 'red' => $r, 'green' => $g, 'blue' => $b );
}

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Add custom image sizes attribute to enhance responsive image functionality
 * for content images
 *
 * @since Scheffres Laundry 1.0
 *
 * @param string $sizes A source size value for use in a 'sizes' attribute.
 * @param array  $size  Image size. Accepts an array of width and height
 *                      values in pixels (in that order).
 * @return string A source size value for use in a content image 'sizes' attribute.
 */
function scheffreslaundry_content_image_sizes_attr( $sizes, $size ) {
	$width = $size[0];

	if ( 840 <= $width ) {
		$sizes = '(max-width: 709px) 85vw, (max-width: 909px) 67vw, (max-width: 1362px) 62vw, 840px';
	}

	if ( 'page' === get_post_type() ) {
		if ( 840 > $width ) {
			$sizes = '(max-width: ' . $width . 'px) 85vw, ' . $width . 'px';
		}
	} else {
		if ( 840 > $width && 600 <= $width ) {
			$sizes = '(max-width: 709px) 85vw, (max-width: 909px) 67vw, (max-width: 984px) 61vw, (max-width: 1362px) 45vw, 600px';
		} elseif ( 600 > $width ) {
			$sizes = '(max-width: ' . $width . 'px) 85vw, ' . $width . 'px';
		}
	}

	return $sizes;
}
add_filter( 'wp_calculate_image_sizes', 'scheffreslaundry_content_image_sizes_attr', 10 , 2 );

/**
 * Add custom image sizes attribute to enhance responsive image functionality
 * for post thumbnails
 *
 * @since Scheffres Laundry 1.0
 *
 * @param array $attr Attributes for the image markup.
 * @param int   $attachment Image attachment ID.
 * @param array $size Registered image size or flat array of height and width dimensions.
 * @return array The filtered attributes for the image markup.
 */
function scheffreslaundry_post_thumbnail_sizes_attr( $attr, $attachment, $size ) {
	if ( 'post-thumbnail' === $size ) {
		if ( is_active_sidebar( 'sidebar-1' ) ) {
			$attr['sizes'] = '(max-width: 709px) 85vw, (max-width: 909px) 67vw, (max-width: 984px) 60vw, (max-width: 1362px) 62vw, 840px';
		} else {
			$attr['sizes'] = '(max-width: 709px) 85vw, (max-width: 909px) 67vw, (max-width: 1362px) 88vw, 1200px';
		}
	}
	return $attr;
}
add_filter( 'wp_get_attachment_image_attributes', 'scheffreslaundry_post_thumbnail_sizes_attr', 10 , 3 );

/**
 * Modifies tag cloud widget arguments to display all tags in the same font size
 * and use list format for better accessibility.
 *
 * @since Scheffres Laundry 1.1
 *
 * @param array $args Arguments for tag cloud widget.
 * @return array The filtered arguments for tag cloud widget.
 */
function scheffreslaundry_widget_tag_cloud_args( $args ) {
	$args['largest']  = 1;
	$args['smallest'] = 1;
	$args['unit']     = 'em';
	$args['format']   = 'list';

	return $args;
}
add_filter( 'widget_tag_cloud_args', 'scheffreslaundry_widget_tag_cloud_args' );

/* code for Slider custom post type start */

	add_action('init', 'slider_sota');



	function slider_sota() {



	register_post_type('slider',

		array(

		'labels' => array(

				'name' => __( 'Homepage Slider' ),

				'singular_name' => __( 'Homepage Slider' ),

				'add_new' => __( 'Add New' ),

				'add_new_item' => __( 'Add New Slider' ),

				'edit' => __( 'Edit' ),

				'edit_item' => __( 'Edit Slider' ),

				'new_item' => __( 'New Slider' ),

				//'view' => __( 'View Slider' ),

				//'view_item' => __( 'View Slider' ),

				'search_items' => __( 'Search Slider' ),

				'not_found' => __( 'No Slider found' ),

				'not_found_in_trash' => __( 'No Slider found in Trash' ),

				'parent' => __( 'Parent Slider' ),

			),

			'public' => false,

			'show_ui' => true,

			'exclude_from_search' => true,

			'hierarchical' => true,

			'supports' => array( 'title', 'editor', 'thumbnail','excerpt' ),

			'query_var' => true,

			'register_meta_box_cb' => 'slider_meta_boxes', // Callback function for custom metaboxes

			)

		);

	}



	function slider_meta_boxes() {

		add_meta_box( 'Extra', 'Heading', 'slider_position_title', 'slider', 'normal', 'high' );

	}



	function slider_position_title()

	{

		global $post;

		$headingvalues = get_post_custom( $post->ID );

		$headingtitle = isset( $headingvalues['heading'] ) ? esc_attr( $jbvalues['heading'][0] ) : '' ;

		//$required_jobtype = isset( $values['required_jobtype'] ) ? esc_attr( $values['required_jobtype'][0] ) : '' ;

		wp_nonce_field( 'my_jobtitleposition_nonce', 'netsterz_jobtitleposition_nonce' );

		?>

		<p>

		<label>Extra Detail</label>

		<input type="text" name="heading" id="heading" value="<?php echo $headingtitle; ?>" />

		</p>

		<!--<label>Job Type</label>

		<select name="required_jobtype" id="required_jobtype">

            <option value="Part" <?php //selected( $required_jobtype, 'Part' ); ?>>Part</option>

            <option value="Full" <?php //selected( $required_jobtype, 'Full' ); ?>>Full</option>

        </select>-->

		<?php

	}



	add_action('save_post', 'stateslider_title_save');



	function stateslider_title_save($post_id)

	{

    // Bail if we're doing an auto save

    if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;



    // if our nonce isn't there, or we can't verify it, bail

    if( !isset( $_POST['stateart_slider_nonce'] ) || !wp_verify_nonce( $_POST['stateart_slider_nonce'], 'my_stateart_slider_nonce' ) ) return;



    // if our current user can't edit this post, bail

    if( !current_user_can( 'edit_post' ) ) return;



		if( isset( $_POST['heading'] ) ) {

			update_post_meta($post_id, 'heading',$_POST['heading']);

		}

		/* if( isset( $_POST['required_jobtype'] ) ) {

        update_post_meta($post_id, 'required_jobtype',$_POST['required_jobtype']);

		}*/



	}





add_action( 'init', 'create_slider_taxonomies', 0 );



function create_slider_taxonomies()

{

  // Add new taxonomy, make it hierarchical (like categories)

  $labels = array(

    'name' => _x( 'Slider Category', 'taxonomy general name' ),

    'singular_name' => _x( 'StateArt', 'taxonomy singular name' ),

    'search_items' =>  __( 'Search StateArt' ),

    'popular_items' => __( 'Popular StateArt' ),

    'all_items' => __( 'All StateArt' ),

    'parent_item' => __( 'Parent StateArt' ),

    'parent_item_colon' => __( 'Parent StateArt:' ),

    'edit_item' => __( 'Edit StateArt' ),

    'update_item' => __( 'Update StateArt' ),

    'add_new_item' => __( 'Add New StateArt' ),

    'new_item_name' => __( 'New StateArt Name' ),

  );

  register_taxonomy('state_art',array('slider'), array(

    'hierarchical' => true,

    'labels' => $labels,

    'show_ui' => true,

	'public' => false,

    'query_var' => true,

    'rewrite' => array( 'slug' => 'state_art' ),

  ));

}



	add_filter('manage_slider_posts_columns', 'ST4_columns_slider_head');

		// ADD TWO NEW COLUMNS

	function ST4_columns_slider_head($defaults) {

		$pcolumns = array(

		'cb' => '<input type="checkbox" />',

        'title' => 'Title',

        'pc' => 'Slider Category',

		'date' => 'Date'

		);



		return $pcolumns;

	}

	add_action('manage_slider_posts_custom_column', 'ST4_columns_slider_content', 10, 2);



	function ST4_columns_slider_content($column_name, $post_ID) {

		$sliderterms = get_the_terms($post->ID, 'state_art' );



		if ($sliderterms && ! is_wp_error($sliderterms)) :

			$testimonialslugs_arr = array();

			foreach ($sliderterms as $sliderterm) {

				$sliderslugs_arr[] = $sliderterm->slug;

			}

			$sliderterms_slug_str = join( ",", $sliderslugs_arr);

		endif;

		echo $sliderterms_slug_str;

	}

	/* code for Slider custom post type stop */


/* code for testimonial custom post type start */

	add_action('init', 'post_type_discog');



	function post_type_discog() {



	register_post_type('testimonial',

		array(

		'labels' => array(

				'name' => __( 'Testimonial' ),

				'singular_name' => __( 'Testimonial' ),

				'add_new' => __( 'Add New' ),

				'add_new_item' => __( 'Add New Testimonial' ),

				'edit' => __( 'Edit' ),

				'edit_item' => __( 'Edit Testimonial' ),

				'new_item' => __( 'New Testimonial' ),

				//'view' => __( 'View Testimonial' ),

				//'view_item' => __( 'View Testimonial' ),

				'search_items' => __( 'Search Testimonial' ),

				'not_found' => __( 'No Testimonial found' ),

				'not_found_in_trash' => __( 'No Testimonial found in Trash' ),

				'parent' => __( 'Parent Testimonial' ),

			),

			'public' => false,

			'show_ui' => true,

			'exclude_from_search' => true,

			'hierarchical' => true,

			'supports' => array( 'title', 'editor', 'thumbnail','excerpt' ),

			'query_var' => true,

			'register_meta_box_cb' => 'testimonials_meta_boxes', // Callback function for custom metaboxes

			)

		);

	}



	function testimonials_meta_boxes() {

		add_meta_box( 'JobPosition', 'Designation', 'testimonial_position_title', 'testimonial', 'normal', 'high' );

	}



	function testimonial_position_title()

	{

		global $post;

		$jbvalues = get_post_custom( $post->ID );

		$jbtitle = isset( $jbvalues['jobposttitle'] ) ? esc_attr( $jbvalues['jobposttitle'][0] ) : '' ;

		//$required_jobtype = isset( $values['required_jobtype'] ) ? esc_attr( $values['required_jobtype'][0] ) : '' ;

		wp_nonce_field( 'my_jobtitleposition_nonce', 'netsterz_jobtitleposition_nonce' );

		?>

		<p>

		<label>Post Designation</label>

		<input type="text" name="jobposttitle" id="jobposttitle" value="<?php echo $jbtitle; ?>" />

		</p>

		<!--<label>Job Type</label>

		<select name="required_jobtype" id="required_jobtype">

            <option value="Part" <?php //selected( $required_jobtype, 'Part' ); ?>>Part</option>

            <option value="Full" <?php //selected( $required_jobtype, 'Full' ); ?>>Full</option>

        </select>-->

		<?php

	}



	add_action('save_post', 'job_position_title_save');



	function job_position_title_save($post_id)

	{

    // Bail if we're doing an auto save

    if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;



    // if our nonce isn't there, or we can't verify it, bail

    if( !isset( $_POST['netsterz_jobtitleposition_nonce'] ) || !wp_verify_nonce( $_POST['netsterz_jobtitleposition_nonce'], 'my_jobtitleposition_nonce' ) ) return;



    // if our current user can't edit this post, bail

    if( !current_user_can( 'edit_post' ) ) return;



		if( isset( $_POST['jobposttitle'] ) ) {

			update_post_meta($post_id, 'jobposttitle',$_POST['jobposttitle']);

		}

		/* if( isset( $_POST['required_jobtype'] ) ) {

        update_post_meta($post_id, 'required_jobtype',$_POST['required_jobtype']);

		}*/



	}





add_action( 'init', 'create_discog_taxonomies', 0 );



function create_discog_taxonomies()

{

  // Add new taxonomy, make it hierarchical (like categories)

  $labels = array(

    'name' => _x( 'Testimonial Category', 'taxonomy general name' ),

    'singular_name' => _x( 'Testi_Cat', 'taxonomy singular name' ),

    'search_items' =>  __( 'Search Testi_Cat' ),

    'popular_items' => __( 'Popular Testi_Cat' ),

    'all_items' => __( 'All Testi_Cat' ),

    'parent_item' => __( 'Parent Testi_Cat' ),

    'parent_item_colon' => __( 'Parent Testi_Cat:' ),

    'edit_item' => __( 'Edit Testi_Cat' ),

    'update_item' => __( 'Update Testi_Cat' ),

    'add_new_item' => __( 'Add New Testi_Cat' ),

    'new_item_name' => __( 'New Testi_Cat Name' ),

  );

  register_taxonomy('testi_Cat',array('testimonial'), array(

    'hierarchical' => true,

    'labels' => $labels,

    'show_ui' => true,

	'public' => false,

    'query_var' => true,

    'rewrite' => array( 'slug' => 'testi_Cat' ),

  ));

}



	add_filter('manage_testimonial_posts_columns', 'ST4_columns_testimonial_head');

		// ADD TWO NEW COLUMNS

	function ST4_columns_testimonial_head($defaults) {

		$pcolumns = array(

		'cb' => '<input type="checkbox" />',

        'title' => 'Title',

        'pc' => 'Testimonial Category',

		'date' => 'Date'

		);



		return $pcolumns;

	}

	add_action('manage_testimonial_posts_custom_column', 'ST4_columns_testimonial_content', 10, 2);



	function ST4_columns_testimonial_content($column_name, $post_ID) {

		$testimonialterms = get_the_terms($post->ID, 'testi_Cat' );



		if ($testimonialterms && ! is_wp_error($testimonialterms)) :

			$testimonialslugs_arr = array();

			foreach ($testimonialterms as $testimonialterm) {

				$testimonialslugs_arr[] = $testimonialterm->slug;

			}

			$testimonialterms_slug_str = join( ",", $testimonialslugs_arr);

		endif;

		echo $testimonialterms_slug_str;

	}

	/* code for testimonial custom post type stop */

	/**
	* ACF Flexible Content.
	*/
	require get_template_directory() . '/inc/acf-flexible-content.php';