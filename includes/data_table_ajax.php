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
  $b3 = $_POST['b3'];
  $b4 = $_POST['b4'];
  $b5 = $_POST['b5'];
  $b6 = $_POST['b6'];
  $b7 = $_POST['b7'];
  $b8 = $_POST['b8'];
  $b9 = $_POST['b9'];
  $b10 = $_POST['b10'];
  $b11 = $_POST['b11'];
  $b12 = $_POST['b12'];

  global $wpdb_dek;

  if($table == 'character_answer') {
    $wpdb_dek->insert($table, array("id_choa" => $b1, "name_of_answer" => $b2), array("%d", "%s"));

  $r = $wpdb_dek->get_results("SELECT * FROM $table");
  foreach ($r as $result) {
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

    $r = $wpdb_dek->get_results("SELECT * FROM $table");
    foreach($r as $result){
      ?>
      <tr class="<?php echo $table ?>" data-table="<?php echo $table ?>" data-id_name="id_commission" data-id="<?php echo $result->id_commission; ?>">
        <td class="n" data-td="id_commission"><div class="v"><?php echo $result->id_commission; ?></div></td>
        <td class="n" data-td="number_of_DEK"><div class="v"><?php echo $result->number_of_DEK; ?></div></td>
        <td class="img_d" data-id_name="id_commission" data-table="<?php echo $table; ?>" data-id="<?php echo $result->id_commission; ?>"><img class="del_img" src="<?php echo get_template_directory_uri() ?>/images/delete.png"></td>
      </tr>
      <?php
    }
  }

  if($table == 'meeting_head') {
    $wpdb_dek->insert($table, array("id_meeting_head" => $b1, "rate_number_of_protocol" => $b2, "type_of_protocol" => $b3, "id_meeting_present" => $b4), array("%d", "%s", "%s", "%d"));

    $r = $wpdb_dek->get_results("SELECT * FROM $table");
    foreach($r as $result){
      ?>
      <tr class="<?php echo $table ?>" data-table="<?php echo $table ?>" data-id_name="id_meeting_head" data-id="<?php echo $result->id_meeting_head; ?>">
        <td class="n" data-td="id_meeting_head"><div class="v"><?php echo $result->id_meeting_head; ?></div></td>
        <td class="n" data-td="rate_number_of_protocol"><div class="v"><?php echo $result->rate_number_of_protocol; ?></div></td>
        <td class="n" data-td="type_of_protocol"><div class="v"><?php echo $result->type_of_protocol; ?></div></td>
        <td class="n" data-td="id_meeting_present"><div class="v"><?php echo $result->id_meeting_present; ?></div></td>
        <td class="img_d" data-id_name="id_meeting_head" data-table="<?php echo $table; ?>" data-id="<?php echo $result->id_meeting_head; ?>"><img class="del_img" src="<?php echo get_template_directory_uri() ?>/images/delete.png"></td>
      </tr>
      <?php
    }
  }

  if($table == 'meeting_present') {

    if(!$b1){ $b1 = NULL; }
    if(!$b2){ $b2 = date('Y-m-d'); }
    if(!$b3){ $b3 = NULL; }
    if(!$b4){ $b4 = NULL; }
    if(!$b5){ $b5 = NULL; }
    if(!$b6){ $b6 = NULL; }
    if(!$b7){ $b7 = NULL; }
    if(!$b8){ $b8 = NULL; }
    if(!$b9){ $b9 = NULL; }
    if(!$b10){ $b10 = NULL; }
    if(!$b11){ $b11 = NULL; }
    if(!$b12){ $b12 = NULL; }

    $wpdb_dek->insert($table, array("id_meeting_present" => $b1, "date" => $b2, "start_time" => $b3, "end_time" => $b4, "id_chief" => $b5, "id_present_1" => $b6, "id_present_2" => $b7, "id_present_3" => $b8, "id_present_4" => $b9, "id_present_5" => $b10, "id_present_6" => $b11, "id_present_7" => $b12), array("%d", "%s", "%s", "%s", "%d", "%d", "%d", "%d", "%d", "%d", "%d", "%d"));
    $r = $wpdb_dek->get_results("SELECT * FROM $table");
    foreach($r as $result){
      ?>
      <tr class="<?php echo $table ?>" data-table="<?php echo $table ?>" data-id_name="id_meeting_present" data-id="<?php echo $result->id_meeting_present; ?>">
        <td class="n" data-td="id_meeting_present"><div class="v"><?php echo $result->id_meeting_present; ?></div></td>
        <td class="n" data-td="date"><div class="v"><?php echo $result->date; ?></div></td>
        <td class="n" data-td="start_time"><div class="v"><?php echo $result->start_time; ?></div></td>
        <td class="n" data-td="end_time"><div class="v"><?php echo $result->end_time; ?></div></td>
        <td class="n" data-td="id_chief"><div class="v"><?php echo $result->id_chief; ?></div></td>
        <td class="n" data-td="id_present_1"><div class="v"><?php echo $result->id_present_1; ?></div></td>
        <td class="n" data-td="id_present_2"><div class="v"><?php echo $result->id_present_2; ?></div></td>
        <td class="n" data-td="id_present_3"><div class="v"><?php echo $result->id_present_3; ?></div></td>
        <td class="n" data-td="id_present_4"><div class="v"><?php echo $result->id_present_4; ?></div></td>
        <td class="n" data-td="id_present_5"><div class="v"><?php echo $result->id_present_5; ?></div></td>
        <td class="n" data-td="id_present_6"><div class="v"><?php echo $result->id_present_6; ?></div></td>
        <td class="n" data-td="id_present_7"><div class="v"><?php echo $result->id_present_7; ?></div></td>
        <td class="img_d" data-id_name="id_meeting_present" data-table="<?php echo $table; ?>" data-id="<?php echo $result->id_meeting_present; ?>"><img class="del_img" src="<?php echo get_template_directory_uri() ?>/images/delete.png"></td>
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