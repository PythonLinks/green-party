<?php
/**
 * The left sidebar.
 * 
 * @package bootstrap-basic4
 */


global $bootstrapbasic4_sidebar_left_size;
if (empty($bootstrapbasic4_sidebar_left_size) || !is_numeric($bootstrapbasic4_sidebar_left_size)) {
    $bootstrapbasic4_sidebar_left_size = 3;
}

if (is_active_sidebar('sidebar-left')) {
?> 
                <div id="sidebar-left" class="col-12 col-md-3 col-lg-3 order-md-1 order-11">
                    <?php do_action('before_sidebar'); ?> 
                    <?php dynamic_sidebar('sidebar-left'); ?> 
                </div>
<?php
}