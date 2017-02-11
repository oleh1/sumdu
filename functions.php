<?php

require get_stylesheet_directory() . '/includes/functions-css-and-js.php';

function sumdu_setup(){
  add_theme_support('custom-logo');
  register_nav_menu('header_menu', 'Header menu');
}
add_action('after_setup_theme', 'sumdu_setup');

function theme_slug_widgets_init() {
  register_sidebar( array(
    'name' => __( 'Main Sidebar', 'theme-slug' ),
    'id' => 'sidebar-1',
    'description' => __( 'Widgets in this area will be shown on all posts and pages.', 'theme-slug' ),
    'before_widget' => '<li id="%1$s" class="widget %2$s">',
    'after_widget'  => '</li>',
    'before_title'  => '<h2 class="widgettitle">',
    'after_title'   => '</h2>',
  ) );
}
add_action( 'widgets_init', 'theme_slug_widgets_init' );





global $wpdb2;

$wpdb2 = new wpdb( 'root', '1', 'DEK', 'localhost' );
if( ! empty($wpdb2->error) ) wp_die( $wpdb2->error );
$results = $wpdb2->get_results("SELECT * FROM student");

//var_dump($results);


?>