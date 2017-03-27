<?php
add_action("wp_ajax_add_mail", "f_add_mail");
add_action("wp_ajax_nopriv_add_mail", "f_add_mail");
function f_add_mail(){
  
  echo $_POST['text'];
  
  global  $wpdb;
//  $wpdb->insert('wp_warning_system_mail', array("id" => '', "mail" => "test", "id_mail" => 1), array("%d", "%s", "%d"));
//  $wpdb->insert('wp_warning_system_group', array("id" => '', "group" => "test", "id_group" => 1), array("%d", "%s", "%d"));

  
  wp_die();
}
?>