<div class="zolo_footer_row">
<?php if ( is_active_sidebar( 'footer_widget1' ) ) { ?>
<div class="footercolumn footer_column2_3"><?php dynamic_sidebar('footer_widget1'); ?></div>
<?php } ?>
<?php if ( is_active_sidebar( 'footer_widget2' ) ) { ?>
<div class="footercolumn footer_column3"><?php dynamic_sidebar('footer_widget2'); ?></div>
<?php } ?>
</div>