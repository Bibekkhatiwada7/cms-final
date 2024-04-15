<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ShopMax
 */

?>

	<footer id="colophon" class="site-footer">
		<div class="site-info">
			<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'shopmax' ) ); ?>">
				<?php
				printf( esc_html__( 'Proudly powered by %s', 'shopmax' ), 'WordPress' );
				?>
			</a>
			<span class="sep"> | </span>
				<?php
				/* translators: 1: Theme name, 2: Theme author. */
				printf( esc_html__( 'Theme: %1$s by %2$s.', 'shopmax' ), 'shopmax', '<a href="http://Sugam">Sugam</a>' );
				?>

	<div class="footer-content">
        <div class="about">
            <p><a href="<?php echo esc_url(get_permalink(get_page_by_title('About'))); ?>">About</a></p>
        </div>
        <div class="contact">
            <p><a href="<?php echo esc_url(get_permalink(get_page_by_title('Contact'))); ?>">Contact</a></p>
        </div>
        <p>&copy; 2024 Shop Max. All rights reserved.</p>

    </div>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
