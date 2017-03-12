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
function excerpt_more($more){
  global $post;
  return ' <a class="more" href="'.get_permalink($post->ID).'">[ . . . ]</a>';
}

function sumdu_comment($comment, $args, $depth){
  if('div' === $args['style']){
    $tag       = 'div';
    $add_below = 'comment';
  }else{
    $tag       = 'li';
    $add_below = 'div-comment';
  }
  ?>
  <<?php echo $tag ?> <?php comment_class(empty($args['has_children'])? '' : 'parent') ?> id="comment-<?php comment_ID() ?>">
  <?php if('div' != $args['style']): ?>
    <div id="div-comment-<?php comment_ID() ?>" class="comment-body">
  <?php endif; ?>
  <div class="comment-author vcard comment_avatar">
    <?php if($args['avatar_size'] != 0) echo get_avatar($comment, $args['avatar_size']); ?>
    <div class="comment_name_says">
      <?php printf(__('<cite class="fn comment_name">%s</cite> <span class="says">говорить:</span>', 'sumdu'), get_comment_author_link()); ?>
    </div>
  </div>
  <?php if($comment->comment_approved == '0'): ?>
    <em class="comment-awaiting-moderation"><?php _e('Ваш коментар очікує модерації.', 'sumdu'); ?></em>
    <br />
  <?php endif; ?>

  <div class="comment_text">
    <?php comment_text(); ?>
  </div>

  <div class="comment-meta commentmetadata"><div><a href="<?php echo htmlspecialchars(get_comment_link($comment->comment_ID )); ?>">
      <?php
      printf(__('%1$s %2$s', 'sumdu'), get_comment_date('d.m.Y'), get_comment_time()); ?></a></div><?php edit_comment_link(__('Редагувати', 'sumdu'), '<div class="edit_p">', '</div>');
    ?>
  </div>

  <div class="reply reply_p">
    <?php comment_reply_link(array_merge($args, array('add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth']))); ?>
  </div>
  <?php if('div' != $args['style']): ?>
    </div>
  <?php endif; ?>
  <?php
}




global $wpdb2;
$wpdb2 = new wpdb( 'root', '1', 'DEK', 'localhost' );
if( ! empty($wpdb2->error) ) wp_die( $wpdb2->error );
$results = $wpdb2->get_results("SELECT * FROM student");
//var_dump($results);


?>