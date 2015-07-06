<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Adler
 */
?>
	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-info">
			<a href="<?php echo esc_url( 'wordpress.org' ); ?>"><?php printf( __( 'Proudly powered by %s', 'adler' ), 'WordPress' ); ?></a>
			<span class="sep"> | </span>
			<?php printf( __( 'Theme: %1$s by %2$s.', 'adler' ), 'Adler', '<a href="//pixelgrade.com" rel="designer">PixelGrade</a>' ); ?>
		</div><!-- .site-info -->

		<nav id="footer-navigation" class="footer-navigation" role="navigation">
			<button class="menu-toggle" aria-controls="footer-menu" aria-expanded="false">
				<?php _e( 'Footer Menu', 'adler' ); ?>
			</button>
			<?php wp_nav_menu( array( 'theme_location' => 'footer', 'menu_id' => 'footer-menu' ) ); ?>
		</nav><!-- #site-navigation-footer -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php get_sidebar(); ?>
<?php wp_footer(); ?>

</body>
</html>