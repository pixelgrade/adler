<?php
/**
 * @package The Adler
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="entry-wrapper">
		<div class="entry-content">

			<?php the_content(); ?>
			<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'adler_txtd' ),
				'after'  => '</div>',
			) );
			?>

		</div><!-- .entry-content -->

		<footer class="entry-footer">

			<?php the_adler_entry_footer(); ?>

		</footer><!-- .entry-footer -->
	</div>
</article><!-- #post-## -->
