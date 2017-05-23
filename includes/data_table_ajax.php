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


add_action("wp_ajax_add_all", "f_add_all");
add_action("wp_ajax_nopriv_add_all", "f_add_all");
function f_add_all(){

  $table = $_POST['table'];
  $b1 = $_POST['b1'];
  $b2 = $_POST['b2'];

  global $wpdb_dek;

  if($table == 'character_answer') {
    $wpdb_dek->insert($table, array("id_choa" => $b1, "name_of_answer" => $b2), array("%d", "%s"));

  $character_answer = $wpdb_dek->get_results("SELECT * FROM $table");
  foreach ($character_answer as $result) {
    ?>
    <tr class="<?php echo $table ?>" data-table="<?php echo $table ?>" data-id_name="id_choa" data-id="<?php echo $result->id_choa; ?>">
      <td class="n" data-td="id_choa"><div class="v"><?php echo $result->id_choa; ?></div></td>
      <td class="n" data-td="name_of_answer"><div class="v"><?php echo $result->name_of_answer; ?></div></td>
      <td class="img_d" data-id_name="id_choa" data-table="<?php echo $table; ?>" data-id="<?php echo $result->id_choa; ?>"><img class="del_img" src="<?php echo get_template_directory_uri() ?>/images/delete.png"></td>
    </tr>
    <?php
    }
  }

  if($table == 'commission_number') {
    $wpdb_dek->insert($table, array("id_commission" => $b1, "number_of_DEK" => $b2), array("%d", "%s"));

    $character_answer = $wpdb_dek->get_results("SELECT * FROM $table");
    foreach($character_answer as $result){
      ?>
      <tr class="<?php echo $table ?>" data-table="<?php echo $table ?>" data-id_name="id_commission" data-id="<?php echo $result->id_commission; ?>">
        <td class="n" data-td="id_commission"><div class="v"><?php echo $result->id_commission; ?></div></td>
        <td class="n" data-td="number_of_DEK"><div class="v"><?php echo $result->number_of_DEK; ?></div></td>
        <td class="img_d" data-id_name="id_commission" data-table="<?php echo $table; ?>" data-id="<?php echo $result->id_commission; ?>"><img class="del_img" src="<?php echo get_template_directory_uri() ?>/images/delete.png"></td>
      </tr>
      <?php
    }
  }

  wp_die();
}

add_action("wp_ajax_del_img2", "f_del_img2");
add_action("wp_ajax_nopriv_del_img2", "f_del_img2");
function f_del_img2()
{
  $id = $_POST['id'];
  $table = $_POST['table'];
  $id_name = $_POST['id_name'];

  global $wpdb_dek;
  $wpdb_dek->delete( $table, array( $id_name => $id ), array( '%d' ) );

  wp_die();
}
?>