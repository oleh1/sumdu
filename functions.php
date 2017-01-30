<?php

require get_stylesheet_directory() . '/includes/functions-css-and-js.php';

function wptuts_setup(){
  register_nav_menu('header_menu', 'Header menu');
}
add_action('after_setup_theme', 'wptuts_setup');







global $wpdb2;

$wpdb2 = new wpdb( 'root', '1', 'DEK', 'localhost' );
if( ! empty($wpdb2->error) ) wp_die( $wpdb2->error );
$results = $wpdb2->get_results("SELECT * FROM student");

//var_dump($results);


?>