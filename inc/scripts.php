<?php
function site_scripts() {
    if (!is_admin()) {
        wp_deregister_script('jquery');
        wp_register_script('jquery', get_bloginfo('template_url').'/assets/js/jquery.js', false, '1.10.2', true);
        wp_register_script('jquery-ui', get_bloginfo('template_url').'/js/jquery-ui-1.8.23.custom.min.js', false, '1.8.23', true);
        wp_register_script('jquery-mobile', get_bloginfo('template_url').'/js/jquery.mobile.custom.min.js', false, '1.3.0', true);
        wp_register_script('twitter-bootstrap', get_bloginfo('template_url').'/js/bootstrap.min.js', false, '3.0.0', true);
        wp_register_script('infinite-scroll', get_bloginfo('template_url').'/js/jquery.infinitescroll.min.js', false, '2.0.2', true);
      	wp_register_script('n4d-script', get_bloginfo('template_url').'/js/scripts.min.js', false, '1.2', true);
//ADD JS
        //wp_enqueue_script('jquery');
        //wp_enqueue_script('jquery-ui');
        //wp_enqueue_script('jquery-mobile');
        //wp_enqueue_script('twitter-bootstrap');
        //wp_enqueue_script('infinite-scroll');
        wp_enqueue_script('n4d-script');
    }
}
add_action('init', 'site_scripts');