<?php
add_action("wp_ajax_add_student", "f_add_student");
add_action("wp_ajax_nopriv_add_student", "f_add_student");
function f_add_student()
{

  $a1 = $_POST['a1'];
  $a2 = $_POST['a2'];
  $a3 = $_POST['a3'];
  $a4 = $_POST['a4'];
  $a5 = $_POST['a5'];
  $a6 = $_POST['a6'];
  $a7 = $_POST['a7'];
  $a8 = $_POST['a8'];
  $a9 = $_POST['a9'];
  $a10 = $_POST['a10'];
  $a11 = $_POST['a11'];

  global $wpdb;
  $wpdb->insert('sumdu_work_table', array("id" => '', "number_theme" => $a1, "okr" => $a2, "surname" => $a3, "name_w" => $a4, "middle_name" => $a5, "group_w" => $a6, "name_head" => $a7, "name_head_mon" => $a8, "direction_work" => $a9, "theme_english" => $a10 , "name_reviewer" => $a11), array("%d", "%s", "%s", "%s", "%s", "%s", "%s", "%s", "%s", "%s", "%s", "%s"));

  wp_die();
}

add_action("wp_ajax_edit_form2", "f_edit_form2");
add_action("wp_ajax_nopriv_edit_form2", "f_edit_form2");
function f_edit_form2(){

  $td = $_POST['td'];
  $table = $_POST['table'];
  $id_name = $_POST['id_name'];
  $id = $_POST['id'];
  $text = $_POST['text'];
  echo $text;

  global $wpdb;
  $wpdb->update( $table, array($td => $text), array($id_name => $id), array("%s"), array("%d") );
  wp_die();
}
?>
