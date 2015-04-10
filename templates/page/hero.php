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
		</div>
		<!-- Down arrow -->
		<a class="arrow-wrap" href="#post-<?php echo $post->ID; ?>">
			<span class="arrow"></span>
		</a>
	</div>

<?php } else { ?>

	<div class="header-content">
		<h1 class="hero__title">
			<span class="title"><?php echo $split_titles[0]; ?></span>
			<span class="sub-title"><?php echo $split_titles[1]; ?></span>
		</h1>
	</div>

<?php } ?>