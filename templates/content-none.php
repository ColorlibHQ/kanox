<?php 
// Block direct access
if( !defined( 'ABSPATH' ) ){
	exit( 'Direct script access denied.' );
}
/**
 * @Packge     : Kanox
 * @Version    : 1.0
 * @Author     : Colorlib
 * @Author URI : http://colorlib.com/wp/
 *
 */
?>
<article>
<div class="text-center">
	<h1 class="blog-item-title p-b-30"><?php esc_html_e( 'Nothing Found', 'kanox' ); ?></h1>

	<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

	    <p><?php echo sprintf( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'kanox' ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>

	<?php elseif ( is_search() ) : ?>
		
	    <p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'kanox' ); ?></p>
	   
			<div class="backtohome">
				<?php 
				$anchor = kanox_anchor_tag(
					array(
						'url' 	 => esc_url( site_url( '/' ) ),
						'class'	 => 'button button-contactForm',
						'text' 	 => esc_html__( 'Back to home page', 'kanox' ),
					)
				);
				echo wp_kses_post( $anchor );
				?>
			</div>

	<?php else : ?>

	    <p><?php wp_kses_post( _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'kanox' ) ); ?></p>
	    <?php get_search_form(); ?>

	<?php endif; ?>
</div>
</article>