<?php
/**
 * ACF Flexible Content
 *
 * Functions used to display ACF flexible content in page templates
 *
 * @package WordPress
 */

if ( ! function_exists( 'scheffreslaundry_flexible_content' ) ) :
	/**
	 * Sheffres Laundry Flexible Content Areas
	 */
	function scheffreslaundry_flexible_content() {
		if ( function_exists( 'get_field' ) ) {
			if ( have_rows( 'flexible_content_areas' ) ) :
				while ( have_rows( 'flexible_content_areas' ) ) :
					the_row();
					if ( get_row_layout() === 'highlight_content' ) :
						scheffreslaundry_flexible_highlight_content();
					elseif ( get_row_layout() === 'flexible_highlight_cards' ) :
						scheffreslaundry_highlight_cards();
					endif;
				endwhile;
			endif;
		}
	}
endif;

/**
 * Sheffres Laundry Flexible Highlight Content
 *
 * @return void
 */
function scheffreslaundry_flexible_highlight_content() {
	$count = count( get_sub_field( 'highlight_content_areas' ) );
	if ( have_rows( 'highlight_content_areas' ) ) : ?>
		<div class="flex-highlight-outer">
			<div class="flexible-highlight-inner wrapper col-<?php echo esc_attr( $count ); ?>">
				<?php
				while ( have_rows( 'highlight_content_areas' ) ) :
					the_row();
					$bkgd_img = get_sub_field( 'highlight_background_image' );
					$title    = get_sub_field( 'highlight_title' );
					$btn_txt  = get_sub_field( 'highlight_button_text' );
					$btn_url  = get_sub_field( 'highlight_button_url' );
					?>
					<a class="highlight-item"
					<?php if ( $btn_url ) : ?>
						href="
						<?php
						echo esc_url( $btn_url );
						?>
						">
					<?php endif; ?>
						<div>
							<?php
							if ( $title ) :
								?>
								<h2 class="highlight-title"><?php echo esc_html( $title ); ?></h2>
								<?php
							endif;
							if ( $btn_txt ) :
								?>
								<span class="btn highlight-btn"><?php echo esc_html( $btn_txt ); ?> &raquo;</span><?php endif; ?>
						</div>
						<?php if ( $bkgd_img ) : ?>
							<img src="<?php echo esc_url( $bkgd_img['sizes']['medium'] ); ?>" srcset="<?php echo esc_url( $bkgd_img['sizes']['medium'] ); ?> 300w, <?php echo esc_url( $bkgd_img['sizes']['large'] ); ?> 640w, <?php echo esc_url( $bkgd_img['sizes']['x-large'] ); ?> 1280w" sizes="(max-width: 750px) 100vw, 50vw" alt="<?php echo esc_attr( $bkgd_img['alt'] ); ?>" class="highlight-img">

							<?php
							wp_enqueue_script( 'mm4-you-object-fit-library', get_template_directory_uri() . '/js/vendor/ofi.min.js', array(), '20181106', true );
							add_action( 'wp_footer', 'mm4_you_object_fit_js', 100 );
						endif;
						?>
					</a>
				<?php endwhile; ?>
			</div>
		</div>
		<?php
	endif;
}

/**
 * Sheffres Laundry Repeater of "card" content
 *
 * @return void
 */
function scheffreslaundry_highlight_cards() {
	if ( have_rows( 'flexible_cards' ) ) :
		?>
		<div class="epms-fc-cards">
			<div class="content-wrapper">
				<?php
				while ( have_rows( 'flexible_cards' ) ) :
					the_row();
					$title    = get_sub_field( 'title' );
					$content  = get_sub_field( 'content' );
					$btn_txt  = get_sub_field( 'button_text' );
					$btn_link = get_sub_field( 'button_link' );
					?>
					<div class="card">
						<div class="card-inner">
							<?php
							if ( $title ) :
								?>
								<span class="card-title"><?php echo esc_html( $title ); ?></span>
								<?php
							endif;
							echo wp_kses_post( $content );
							if ( $btn_txt && $btn_link ) :
								?>
								<a href="<?php echo esc_url( $btn_link ); ?>" class="btn"><?php echo esc_html( $btn_txt ); ?></a>
								<?php
							endif;
							?>
						</div>
					</div>
					<?php
				endwhile;
				?>
			</div><!-- .content-wrapper -->
		</div><!-- .epms-fc-cards -->
		<?php
	endif;
}
