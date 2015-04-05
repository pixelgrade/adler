<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package asd
 */

?>
<div class="widgets-area"><?php
    if (is_active_sidebar('sidebar-left')) { ?>
        <div id="left-sidebar" class="left-sidebar widget-area" role="complementary">
            <?php dynamic_sidebar('sidebar-left'); ?>
        </div><!-- #left-sidebar -->
    <?php }
    if (is_active_sidebar('sidebar-center')) { ?>
        <div id="center-sidebar" class="center-sidebar widget-area" role="complementary">
            <?php dynamic_sidebar('sidebar-center'); ?>
        </div><!-- #center-sidebar -->
    <?php }
    if (is_active_sidebar('sidebar-right')) { ?>
        <div id="right-sidebar" class="right-sidebar widget-area" role="complementary">
            <?php dynamic_sidebar('sidebar-right'); ?>
        </div><!-- #right-sidebar -->
    <?php } ?> </div>
