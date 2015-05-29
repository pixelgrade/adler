<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package asd
 */

?>
<div class="widgets-area"><?php
    if (is_active_sidebar('footer-area')) : ?>

        <div id="footer-sidebar" class="footer-area widget-area" role="complementary">
            <?php dynamic_sidebar('footer-area'); ?>
        </div><!-- #footer-sidebar -->

    <?php endif; ?>


</div><!-- .widgets-area -->