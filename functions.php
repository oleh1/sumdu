<?php

//Подключение css и javascript
require get_stylesheet_directory() . '/includes/functions-css-and-js.php';


global $wpdb2;

$wpdb2 = new wpdb( 'root', '1', 'DEK', 'localhost' );
if( ! empty($wpdb2->error) ) wp_die( $wpdb2->error );
$results = $wpdb2->get_results("SELECT * FROM student");

//var_dump($results);


?>