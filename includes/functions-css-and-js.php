<?php

function add_theme_scripts_css(){
    wp_enqueue_style('style', get_stylesheet_uri() );

    wp_enqueue_script('script', get_template_directory_uri().'/js/script.js', array('jquery'));

    wp_enqueue_style('bootstrap-style', get_template_directory_uri().'/bootstrap-3.3.7-dist/css/bootstrap.min.css');
    wp_deregister_script('jquery' );
    wp_register_script('jquery', get_template_directory_uri().'/jquery-3.1.1.min/jquery-3.1.1.min.js');
    wp_enqueue_script('jquery' );
    wp_enqueue_script('bootstrap-js', get_template_directory_uri().'/bootstrap-3.3.7-dist/js/bootstrap.min.js');
}
add_action( 'wp_enqueue_scripts', 'add_theme_scripts_css' );

function add_styles_admin(){
    wp_enqueue_style('style-admin', get_template_directory_uri().'/css/style-admin.css');
}
add_action('admin_head', 'add_styles_admin');

function add_script_admin(){
    wp_enqueue_script('script-admin', get_template_directory_uri().'/js/script-admin.js', array('jquery'));
}
add_action('admin_enqueue_scripts', 'add_script_admin');

?>