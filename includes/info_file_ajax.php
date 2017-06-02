<?php
add_action("wp_ajax_delete_file", "f_delete_file");
add_action("wp_ajax_nopriv_delete_file", "f_delete_file");
function f_delete_file(){

  $file = $_POST['file'];
  delete_option($file);
  unlink( __DIR__.'/../download/'.$file );

  wp_die();
}
?>