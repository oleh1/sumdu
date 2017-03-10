<?php

require get_stylesheet_directory() . '/includes/functions-css-and-js.php';

function sumdu_setup(){
  add_theme_support('custom-logo');
  register_nav_menu('header_menu', 'Header menu');
  load_theme_textdomain( 'sumdu', get_template_directory().'/languages' );
}
add_action('after_setup_theme', 'sumdu_setup');

function sumdu_sidebar() {
  register_sidebar( array(
    'name' => __('Ліва бічна панель', 'sumdu'),
    'id' => 'left_sidebar',
  ) );
}
add_action('widgets_init', 'sumdu_sidebar');

function show_lang($lang){
  $lang_url = $_SERVER['REQUEST_URI'];
  $lang_url = explode('/', $lang_url);
  if($lang_url[1] != 'ru' && $lang_url[1] != 'en') $lang_url[1] = 'ua';
  switch($lang_url[1]) {
    case $lang:
      echo $active_lang = 'class="active_lang"';
      break;
    case $lang:
      echo $active_lang = 'class="active_lang"';
      break;
    case $lang:
      echo $active_lang = 'class="active_lang"';
      break;
  }
}

function url_country($country){
  $g_s_u = get_site_url();
  $r_u = $_SERVER['REQUEST_URI'];
  $p_m_a = preg_match_all("#($g_s_u)/[uaren]{2}/#i", $g_s_u.$r_u);
  if($p_m_a == 0){
    $r = preg_replace("#($g_s_u)#i", "$1/$country", $g_s_u.$r_u);
  }else{
    $r = preg_replace("#($g_s_u)/[uaren]{2}/#i", "$1/$country/", $g_s_u.$r_u);
  }
  echo $r;
}

add_filter('excerpt_more', 'excerpt_more');
function excerpt_more($more) {
  global $post;
  return ' <a href="'.get_permalink($post->ID).'">[…]</a>';
}



global $wpdb2;
$wpdb2 = new wpdb( 'root', '1', 'DEK', 'localhost' );
if( ! empty($wpdb2->error) ) wp_die( $wpdb2->error );
$results = $wpdb2->get_results("SELECT * FROM student");
//var_dump($results);


?>