<?php
function vnb_lb_template_editor($shortcode) {
    ob_start();
    ?>
    <div class="vnb-lb-editor">
        <br>
        <p class="text-sc-blocks"><?php _e('Shortcode (áp dụng cho những chỗ không sử dụng được block editor)', DEV_TEXTDOMAIN); ?>:</p>
        <code><?=$shortcode?></code>
    </div>
    <?php
    $result = ob_get_contents();
    ob_end_clean();
    return $result;
}