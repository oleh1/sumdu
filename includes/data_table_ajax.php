<?php
add_action("wp_ajax_edit_form", "f_edit_form");
add_action("wp_ajax_nopriv_edit_form", "f_edit_form");
function f_edit_form(){
  
  $td = $_POST['td'];
  $table = $_POST['table'];
  $id_name = $_POST['id_name'];
  $id = $_POST['id'];
  $text = $_POST['text'];
  echo $text;

  global $wpdb_dek;
  $wpdb_dek->update( $table, array($td => $text), array($id_name => $id), array("%s"), array("%d") );
  wp_die();
}
?>