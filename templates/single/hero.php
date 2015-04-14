<?php

global $post;

$hero_class   = "";
$hero_style   = "";
$split_titles = adler_split_title_half( get_the_title() );

if ( has_post_thumbnail() ) {
	$attachment_image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full' );
	$image_url        = $attachment_image[0];
	$hero_class .= "hero_has_image";
	$hero_style .= ' style="background-image: url(\'' . $image_url . '\')"'; ?>

	<div class="hero__content">
		<div class="hero__bg <?php echo $hero_class; ?>" <?php echo $hero_style; ?>></div>
		<div class="hero__content-wrap content align-center">
			<!-- The title of page divided in two parts-->
			<h1 class="hero__title">
				<span class="title"><?php echo $split_titles[0]; ?></span>
				<span class="sub-title"><?php echo $split_titles[1]; ?></span>
			</h1>
			<!--Create wrapper for categories and date -->
			<div class="hero__meta">
				<div class="hero_categories">

					<?php
					//Display the categories of the post
					$categories = get_the_category();
					$separator  = ' ';
					$output     = '';
					if ( $categories ) {
						foreach ( $categories as $category ) {
							$output .= '<a href="' . get_category_link( $category->term_id ) . '" title="' . esc_attr( sprintf( __( "View all posts in %s", 'adler' ), $category->name ) ) . '">' . $category->cat_name . '</a>' . $separator;
						}
						echo trim( $output, $separator );
					} ?>

				</div>
				<div class="hero_date">
					<?php
					//Posted date
					the_time( get_option( 'date_format' ) );
					?>
				</div>
			</div>
		</div>
		<!-- Down arrow -->
		<a class="arrow-wrap" href="#post-<?php echo $post->ID; ?>">
			<span class="arrow"></span>
		</a>
	</div>

<?php } else { ?>

	<div class="header-content">
		<!-- The title of page divided in two parts-->
		<h1 class="hero__title">
			<span class="title"><?php echo $split_titles[0]; ?></span>
			<span class="sub-title"><?php echo $split_titles[1]; ?></span>
		</h1>
		<!--Create wrapper for categories and date -->
		<div class="hero__meta">
			<div class="hero_categories">

				<?php //Display the categories of the post
				$categories = get_the_category();
				$separator  = ' ';
				$output     = '';
				if ( $categories ) {
					foreach ( $categories as $category ) {
						$output .= '<a href="' . get_category_link( $category->term_id ) . '" title="' . esc_attr( sprintf( __( "View all posts in %s", 'adler' ), $category->name ) ) . '">' . $category->cat_name . '</a>' . $separator;
					}
					echo trim( $output, $separator );
				} ?>

			</div>
			<div class="hero_date">
				<?php
				//Posted date
				the_time( get_option( 'date_format' ) );
				?>
			</div>
		</div>
	</div>
<?php } ?>