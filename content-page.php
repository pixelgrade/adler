<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package Adler
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="entry-wrapper">
		<div class="entry-content">

			<?php the_content(); ?>
			<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'adler' ),
				'after'  => '</div>',
			) );
			?>

		</div><!-- .entry-content -->

		<footer class="entry-footer">
			<?php edit_post_link( __( 'Edit', 'adler' ), '<span class="edit-link">', '</span>' ); ?>
		</footer><!-- .entry-footer-->
	</div>
</article><!-- #post-## -->
