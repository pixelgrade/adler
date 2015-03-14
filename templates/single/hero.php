<?php

global $post;
?>
<div class="hero__content <?php //echo $hero_content_style; ?>">

	<?php
	$hero_class = "";
	$hero_style = "";
	if ( has_post_thumbnail() ) {
		$attachment_image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full' );
		$image_url        = $attachment_image[0];
		$hero_class .= "hero_has_image";
		$hero_style .= ' style="background-image: url(\'' . $image_url . '\')"';
	} else {
		$hero_class .= "hero_no_image";
		$hero_style .= ' style="background-color: #EBEBEB"';
	} ?>
	<div class="hero__bg <?php echo $hero_class; ?>" <?php echo $hero_style; ?>>

	</div>

	<?php //Wrapper for elements on hero area ?>
	<div class="hero__content-wrap  content  align-center">
		<div class="hero__meta">
			<div class="hero_categories">
				<?php

				//Display the categories of the post
				$categories = get_the_category();
				$separator  = ' ';
				$output     = '';
				if ( $categories ) {
					foreach ( $categories as $category ) {
						$output .= '<a href="' . get_category_link( $category->term_id ) . '" title="' . esc_attr( sprintf( __( "View all posts in %s" ), $category->name ) ) . '">' . $category->cat_name . '</a>' . $separator;
					}
					echo trim( $output, $separator );
				} ?>
			</div>
			<div class="hero_date">
				<?php
				//Posted date
				the_date( 'j F, Y', '<h2>', '</h2>' );
				?>
			</div>
		</div>

		<?php
		//Display the title of the post
		the_title( '<h1 class="hero__title  large">', '</h1>' );
		?>

		<div class="entry-content">
			<?php
			global $post;
			// Check the content for the more text
			$has_more = strpos( $post->post_content, '<!--more' );

			if ( $has_more ) {
				the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'adler_txtd' ) );
			} else {
				the_excerpt(); ?>
				<div class="hero_read_more">
					<a href="<?php the_permalink(); ?>">Read More</a>
				</div>
			<?php
			}
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'adler_txtd' ),
				'after'  => '</div>',
			) ); ?>
		</div>
		<!-- .entry-content -->

	</div>

</div>