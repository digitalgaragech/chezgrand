<?php 
add_action( 'wp_enqueue_scripts', 'writepress_child_enqueue_styles');
function writepress_child_enqueue_styles() {	
    wp_enqueue_style( 'writepress-child-style', get_template_directory_uri() . '/style.css');
}
/**
* Allow shortcodes in Contact Form 7
*/
function shortcodes_in_cf7( $form ) {
$form = do_shortcode( $form );
return $form;
}
add_filter( 'wpcf7_form_elements', 'shortcodes_in_cf7' );

add_image_size( 'fullwidthBanner', 2000, 1000, true ); // 2000 pixels wide by 500 pixels tall, hard crop mode
add_image_size( 'mobileBanner', 1000, 500, true ); // 2000 pixels wide by 500 pixels tall, hard crop mode
?>