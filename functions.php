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

  <div class="comment-meta commentmetadata com_data">
    <a href="<?php echo htmlspecialchars(get_comment_link($comment->comment_ID )); ?>">
      <?php printf(__('%1$s в %2$s', 'sumdu'), get_comment_date('d.m.Y'), get_comment_time()); ?>
    </a>
  </div>

  <div class="edit_p_reply_p">
    <?php edit_comment_link(__('Редагувати', 'sumdu'), '<div class="edit_p">', '</div>'); ?>
    <div class="reply reply_p">
      <?php comment_reply_link(array_merge($args, array('add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth']))); ?>
    </div>
  </div>
  <?php if('div' != $args['style']): ?>
    </div>
  <?php endif; ?>
  <?php
}

/*disabled update wordpress*/
add_filter('pre_site_transient_update_core',create_function('$a', "return null;"));
wp_clear_scheduled_hook('wp_version_check');
/*disabled update wordpress*/

/*disabled update plugins*/
remove_action( 'load-update-core.php', 'wp_update_plugins' );
add_filter( 'pre_site_transient_update_plugins', create_function( '$a', "return null;" ) );
wp_clear_scheduled_hook( 'wp_update_plugins' );
/*disabled update plugins*/

/*disabled update themes*/
remove_action('load-update-core.php','wp_update_themes');
add_filter('pre_site_transient_update_themes',create_function('$a', "return null;"));
wp_clear_scheduled_hook('wp_update_themes');
/*disabled update themes*/

/*data_base*/
add_action('admin_menu', function(){
  add_menu_page(__('База даних', 'sumdu'), __('База даних', 'sumdu'), 'manage_options', 'data_base', 'data_base', '', 81);
} );
$data_db = include 'config.php';
$wpdb_dek = new wpdb($data_db['user'], $data_db['password'], $data_db['dbname'], $data_db['host']);
function data_base(){
  global $wpdb_dek;
  if(!empty($wpdb_dek->error)){ wp_die( $wpdb_dek->error); }
  include 'data_table/data_table.php';
}
include 'includes/data_table_ajax.php';
/*data_base*/

/*warning_system*/
add_action('admin_menu', function(){
  add_menu_page(__('Система оповіщення', 'sumdu'), __('Система оповіщення', 'sumdu'), 'manage_options', 'warning_system', 'warning_system', '', 82);
} );
function warning_system(){
  include 'warning_system/warning_system.php';
}
include 'includes/warning_system_ajax.php';
/*warning_system*/

/*list_themes_bachelor_master*/
add_shortcode('list_themes_bachelor', 'list_themes_bachelor');
function list_themes_bachelor(){
  include 'list_themes/list_themes_bachelor.php';
  return $result;
}

add_shortcode('list_themes_master', 'list_themes_master');
function list_themes_master(){
  include 'list_themes/list_themes_master.php';
  return $result;
}
include 'includes/list_themes_bachelor_master_ajax.php';
/*list_themes_bachelor_master*/

/*roles*/
//remove_role( 'student' );

function add_roles(){
add_role(
  'student',
  'Студент',
  array(
//            'switch_themes' => true,
//            'edit_themes' => true,
//            'activate_plugins' => true,
//            'edit_plugins' => true,
//            'edit_users' => true,
//            'edit_files' => true,
//            'manage_options' => true,
//            'moderate_comments' => true,
//            'manage_categories' => true,
//            'manage_links' => true,
            'upload_files' => true,
//            'import' => true,
            'unfiltered_html' => true,
            'edit_posts' => true,
//            'edit_others_posts' => true,
            'edit_published_posts' => true,
//            'publish_posts' => true,
//            'edit_pages' => true,
            'read' =>  true,
//            'level_10' => true,
//            'level_9' => true,
//            'level_8' => true,
//            'level_7' => true,
//            'level_6' => true,
//            'level_5' => true,
//            'level_4' => true,
//            'level_3' => true,
//            'level_2' => true,
//            'level_1' => true,
//            'level_0' => true,
//            'edit_others_pages' => true,
//            'edit_published_pages' => true,
//            'publish_pages' => true,
//            'delete_pages' => true,
//            'delete_others_pages' => true,
//            'delete_published_pages' => true,
            'delete_posts' => true,
//            'delete_others_posts' => true,
            'delete_published_posts' => true,
//            'delete_private_posts' => true,
//            'edit_private_posts' => true,
//            'read_private_posts' => true,
//            'delete_private_pages' => true,
//            'edit_private_pages' => true,
//            'read_private_pages' => true,
//            'delete_users' => true,
//            'create_users' => true,
//            'unfiltered_upload' => true,
//            'edit_dashboard' => true,
//            'update_plugins' => true,
//            'delete_plugins' => true,
//            'install_plugins' => true,
//            'update_themes' => true,
//            'install_themes' => true,
//            'update_core' => true,
//            'list_users' => true,
//            'remove_users' => true,
//            'promote_users' => true,
//            'edit_theme_options' => true,
//            'delete_themes' => true,
//            'export' => true
  )
);

add_role(
  'teacher',
  'Викладач',
  array(
//            'switch_themes' => true,
//            'edit_themes' => true,
//            'activate_plugins' => true,
//            'edit_plugins' => true,
//            'edit_users' => true,
//            'edit_files' => true,
//            'manage_options' => true,
            'moderate_comments' => true,
            'manage_categories' => true,
//            'manage_links' => true,
            'upload_files' => true,
//            'import' => true,
            'unfiltered_html' => true,
      'edit_posts' => true,
            'edit_others_posts' => true,
      'edit_published_posts' => true,
            'publish_posts' => true,
            'edit_pages' => true,
      'read' =>  true,
//            'level_10' => true,
//            'level_9' => true,
//            'level_8' => true,
//            'level_7' => true,
//            'level_6' => true,
//            'level_5' => true,
//            'level_4' => true,
//            'level_3' => true,
//            'level_2' => true,
//            'level_1' => true,
//            'level_0' => true,
            'edit_others_pages' => true,
            'edit_published_pages' => true,
            'publish_pages' => true,
            'delete_pages' => true,
            'delete_others_pages' => true,
            'delete_published_pages' => true,
      'delete_posts' => true,
            'delete_others_posts' => true,
      'delete_published_posts' => true,
            'delete_private_posts' => true,
            'edit_private_posts' => true,
            'read_private_posts' => true,
            'delete_private_pages' => true,
            'edit_private_pages' => true,
            'read_private_pages' => true,
//            'delete_users' => true,
//            'create_users' => true,
//            'unfiltered_upload' => true,
//            'edit_dashboard' => true,
//            'update_plugins' => true,
//            'delete_plugins' => true,
//            'install_plugins' => true,
//            'update_themes' => true,
//            'install_themes' => true,
//            'update_core' => true,
//            'list_users' => true,
//            'remove_users' => true,
//            'promote_users' => true,
//            'edit_theme_options' => true,
//            'delete_themes' => true,
//            'export' => true
    )
  );

  add_role('deny_access', 'Запретить доступ', array());
}
add_action( 'load-themes.php', 'add_roles' );
/*roles*/

/*protection_schedule*/
//$my_role = get_role( 'administrator' ); // указываем роль, которая нам нужна
//echo '<pre>';
//print_r( $my_role ); // так можно вывести содержимое объекта
//echo '</pre>';

$cur_user_id = get_current_user_id();
$roles = get_userdata($cur_user_id)->roles[0];

if($roles == 'student' || $roles == 'teacher'){
  add_action( 'admin_menu', 'remove_menu' );
  function remove_menu() {
    remove_menu_page('tools.php');
  }
}

add_action('admin_menu', function(){
  add_menu_page(__('Графік захистів дипломних робіт', 'sumdu'), __('Графік захистів дипломних робіт', 'sumdu'), 'read', 'protection_schedule', 'protection_schedule', '', 83);
} );
function protection_schedule(){
  include 'protection_schedule/protection_schedule.php';
}

add_shortcode('list_protection_schedule_b', 'list_protection_schedule_b');
function list_protection_schedule_b(){
  include 'protection_schedule/list_protection_schedule_b.php';
  return $result;
}
add_shortcode('list_protection_schedule_m', 'list_protection_schedule_m');
function list_protection_schedule_m(){
  include 'protection_schedule/list_protection_schedule_m.php';
  return $result;
}
include 'includes/protection_schedule_ajax.php';
/*protection_schedule*/

/*work_table*/
add_action('admin_menu', function(){
  add_menu_page(__('Робоча таблиця', 'sumdu'), __('Робоча таблиця', 'sumdu'), 'edit_pages', 'work_table', 'work_table', '', 84);
} );
function work_table(){
  include 'work_table/work_table.php';
}
include 'includes/work_table_ajax.php';
/*work_table*/

function dimox_breadcrumbs() {

  /* === ОПЦИИ === */
  $text['home'] = 'Главная'; // текст ссылки "Главная"
  $text['category'] = '%s'; // текст для страницы рубрики
  $text['search'] = 'Результаты поиска по запросу "%s"'; // текст для страницы с результатами поиска
  $text['tag'] = 'Записи с тегом "%s"'; // текст для страницы тега
  $text['author'] = 'Статьи автора %s'; // текст для страницы автора
  $text['404'] = 'Ошибка 404'; // текст для страницы 404
  $text['page'] = 'Страница %s'; // текст 'Страница N'
  $text['cpage'] = 'Страница комментариев %s'; // текст 'Страница комментариев N'

  $wrap_before = '<div class="breadcrumbs" itemscope itemtype="http://schema.org/BreadcrumbList">'; // открывающий тег обертки
  $wrap_after = '</div><!-- .breadcrumbs -->'; // закрывающий тег обертки
  $sep = '›'; // разделитель между "крошками"
  $sep_before = '<span class="sep">'; // тег перед разделителем
  $sep_after = '</span>'; // тег после разделителя
  $show_home_link = 0; // 1 - показывать ссылку "Главная", 0 - не показывать
  $show_on_home = 0; // 1 - показывать "хлебные крошки" на главной странице, 0 - не показывать
  $show_current = 1; // 1 - показывать название текущей страницы, 0 - не показывать
  $before = '<span class="current">'; // тег перед текущей "крошкой"
  $after = '</span>'; // тег после текущей "крошки"
  /* === КОНЕЦ ОПЦИЙ === */

  global $post;
  $home_url = home_url('/');
  $link_before = '<span itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">';
  $link_after = '</span>';
  $link_attr = ' itemprop="item"';
  $link_in_before = '<span itemprop="name">';
  $link_in_after = '</span>';
  $link = $link_before . '<a href="%1$s"' . $link_attr . '>' . $link_in_before . '%2$s' . $link_in_after . '</a>' . $link_after;
  $frontpage_id = get_option('page_on_front');
  $parent_id = ($post) ? $post->post_parent : '';
  $sep = ' ' . $sep_before . $sep . $sep_after . ' ';
  $home_link = $link_before . '<a href="' . $home_url . '"' . $link_attr . ' class="home">' . $link_in_before . $text['home'] . $link_in_after . '</a>' . $link_after;

  if (is_home() || is_front_page()) {

    if ($show_on_home) echo $wrap_before . $home_link . $wrap_after;

  } else {

    echo $wrap_before;
    if ($show_home_link) echo $home_link;

    if ( is_category() ) {
      $cat = get_category(get_query_var('cat'), false);
      if ($cat->parent != 0) {
        $cats = get_category_parents($cat->parent, TRUE, $sep);
        $cats = preg_replace("#^(.+)$sep$#", "$1", $cats);
        $cats = preg_replace('#<a([^>]+)>([^<]+)<\/a>#', $link_before . '<a$1' . $link_attr .'>' . $link_in_before . '$2' . $link_in_after .'</a>' . $link_after, $cats);
        if ($show_home_link) echo $sep;
        echo $cats;
      }
      if ( get_query_var('paged') ) {
        $cat = $cat->cat_ID;
        echo $sep . sprintf($link, get_category_link($cat), get_cat_name($cat)) . $sep . $before . sprintf($text['page'], get_query_var('paged')) . $after;
      } else {
        if ($show_current) echo $sep . $before . sprintf($text['category'], single_cat_title('', false)) . $after;
      }

    } elseif ( is_search() ) {
      if (have_posts()) {
        if ($show_home_link && $show_current) echo $sep;
        if ($show_current) echo $before . sprintf($text['search'], get_search_query()) . $after;
      } else {
        if ($show_home_link) echo $sep;
        echo $before . sprintf($text['search'], get_search_query()) . $after;
      }

    } elseif ( is_day() ) {
      if ($show_home_link) echo $sep;
      echo sprintf($link, get_year_link(get_the_time('Y')), get_the_time('Y')) . $sep;
      echo sprintf($link, get_month_link(get_the_time('Y'), get_the_time('m')), get_the_time('F'));
      if ($show_current) echo $sep . $before . get_the_time('d') . $after;

    } elseif ( is_month() ) {
      if ($show_home_link) echo $sep;
      echo sprintf($link, get_year_link(get_the_time('Y')), get_the_time('Y'));
      if ($show_current) echo $sep . $before . get_the_time('F') . $after;

    } elseif ( is_year() ) {
      if ($show_home_link && $show_current) echo $sep;
      if ($show_current) echo $before . get_the_time('Y') . $after;

    } elseif ( is_single() && !is_attachment() ) {
      if ($show_home_link) echo $sep;
      if ( get_post_type() != 'post' ) {
        $post_type = get_post_type_object(get_post_type());
        $slug = $post_type->rewrite;
        printf($link, $home_url . $slug['slug'] . '/', $post_type->labels->singular_name);
        if ($show_current) echo $sep . $before . get_the_title() . $after;
      } else {
        $cat = get_the_category(); $cat = $cat[0];
        $cats = get_category_parents($cat, TRUE, $sep);
        if (!$show_current || get_query_var('cpage')) $cats = preg_replace("#^(.+)$sep$#", "$1", $cats);
        $cats = preg_replace('#<a([^>]+)>([^<]+)<\/a>#', $link_before . '<a$1' . $link_attr .'>' . $link_in_before . '$2' . $link_in_after .'</a>' . $link_after, $cats);
        echo $cats;
        if ( get_query_var('cpage') ) {
          echo $sep . sprintf($link, get_permalink(), get_the_title()) . $sep . $before . sprintf($text['cpage'], get_query_var('cpage')) . $after;
        } else {
          if ($show_current) echo $before . get_the_title() . $after;
        }
      }

      // custom post type
    } elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {
      $post_type = get_post_type_object(get_post_type());
      if ( get_query_var('paged') ) {
        echo $sep . sprintf($link, get_post_type_archive_link($post_type->name), $post_type->label) . $sep . $before . sprintf($text['page'], get_query_var('paged')) . $after;
      } else {
        if ($show_current) echo $sep . $before . $post_type->label . $after;
      }

    } elseif ( is_attachment() ) {
      if ($show_home_link) echo $sep;
      $parent = get_post($parent_id);
      $cat = get_the_category($parent->ID); $cat = $cat[0];
      if ($cat) {
        $cats = get_category_parents($cat, TRUE, $sep);
        $cats = preg_replace('#<a([^>]+)>([^<]+)<\/a>#', $link_before . '<a$1' . $link_attr .'>' . $link_in_before . '$2' . $link_in_after .'</a>' . $link_after, $cats);
        echo $cats;
      }
      printf($link, get_permalink($parent), $parent->post_title);
      if ($show_current) echo $sep . $before . get_the_title() . $after;

    } elseif ( is_page() && !$parent_id ) {
      if ($show_current) echo $sep . $before . get_the_title() . $after;

    } elseif ( is_page() && $parent_id ) {
      if ($show_home_link) echo $sep;
      if ($parent_id != $frontpage_id) {
        $breadcrumbs = array();
        while ($parent_id) {
          $page = get_page($parent_id);
          if ($parent_id != $frontpage_id) {
            $breadcrumbs[] = sprintf($link, get_permalink($page->ID), get_the_title($page->ID));
          }
          $parent_id = $page->post_parent;
        }
        $breadcrumbs = array_reverse($breadcrumbs);
        for ($i = 0; $i < count($breadcrumbs); $i++) {
          echo $breadcrumbs[$i];
          if ($i != count($breadcrumbs)-1) echo $sep;
        }
      }
      if ($show_current) echo $sep . $before . get_the_title() . $after;

    } elseif ( is_tag() ) {
      if ( get_query_var('paged') ) {
        $tag_id = get_queried_object_id();
        $tag = get_tag($tag_id);
        echo $sep . sprintf($link, get_tag_link($tag_id), $tag->name) . $sep . $before . sprintf($text['page'], get_query_var('paged')) . $after;
      } else {
        if ($show_current) echo $sep . $before . sprintf($text['tag'], single_tag_title('', false)) . $after;
      }

    } elseif ( is_author() ) {
      global $author;
      $author = get_userdata($author);
      if ( get_query_var('paged') ) {
        if ($show_home_link) echo $sep;
        echo sprintf($link, get_author_posts_url($author->ID), $author->display_name) . $sep . $before . sprintf($text['page'], get_query_var('paged')) . $after;
      } else {
        if ($show_home_link && $show_current) echo $sep;
        if ($show_current) echo $before . sprintf($text['author'], $author->display_name) . $after;
      }

    } elseif ( is_404() ) {
      if ($show_home_link && $show_current) echo $sep;
      if ($show_current) echo $before . $text['404'] . $after;

    } elseif ( has_post_format() && !is_singular() ) {
      if ($show_home_link) echo $sep;
      echo get_post_format_string( get_post_format() );
    }

    echo $wrap_after;

  }
} // end of dimox_breadcrumbs()

?>