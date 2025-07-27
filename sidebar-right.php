<?php
/**
 * The right sidebar.
 * 
 * @package bootstrap-basic4
 */


global $bootstrapbasic4_sidebar_right_size;
if (empty($bootstrapbasic4_sidebar_right_size) || !is_numeric($bootstrapbasic4_sidebar_right_size)) {
    $bootstrapbasic4_sidebar_right_size = 3;
}

if (is_active_sidebar('sidebar-right')) {
?> 
                <div id="sidebar-right" class="col-12 col-md-3 col-lg-3 order-12">
                    <?php do_action('before_sidebar'); ?> 
                    <?php dynamic_sidebar('sidebar-right'); ?> 
                </div>
<?php
}