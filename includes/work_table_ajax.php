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

  global $wpdb;
  $table = 'sumdu_work_table';
  $sumdu_work_table = $wpdb->get_results("SELECT * FROM $table");
  foreach($sumdu_work_table as $result){
    ?>
    <tr data-table="<?php echo $table ?>" data-id_name="id" data-id="<?php echo $result->id; ?>" class="work_tr">
      <td data-td="id" class="id"><div class="v"><?php echo $result->id; ?></td>
      <td data-td="number_theme" class="number_theme"><div class="v"><?php echo $result->number_theme; ?></td>
      <td data-td="okr" class="okr"><div class="v"><?php echo $result->okr; ?></div></td>
      <td data-td="surname" class="surname"><div class="v"><?php echo $result->surname; ?></div></td>
      <td data-td="name_w" class="name_w"><div class="v"><?php echo $result->name_w; ?></div></td>
      <td data-td="middle_name" class="middle_name"><div class="v"><?php echo $result->middle_name; ?></div></td>
      <td data-td="group_w" class="group_w"><div class="v"><?php echo $result->group_w; ?></div></td>
      <td data-td="name_head" class="name_head"><div class="v"><?php echo $result->name_head; ?></div></td>
      <td data-td="name_head_mon" class="name_head_mon"><div class="v"><?php echo $result->name_head_mon; ?></div></td>
      <td data-td="direction_work" class="direction_work"><div class="v"><?php echo $result->direction_work; ?></div></td>
      <td data-td="theme_english" class="theme_english"><div class="v"><?php echo $result->theme_english; ?></div></td>
      <td data-td="name_reviewer" class="name_reviewer"><div class="v"><?php echo $result->name_reviewer; ?></div></td>
    </tr>
    <?php
  }

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

add_action("wp_ajax_w_select", "f_w_select");
add_action("wp_ajax_nopriv_w_select", "f_w_select");
function f_w_select(){

  $id = $_POST['id'];
  $name = $_POST['name'];
  $val = $_POST['val'];
  $r = explode('|+|',$val);
  echo $r[1];

  global $wpdb;
  $wpdb->update( 'sumdu_work_table', array($name => $r[0]), array('id' => $id), array("%s"), array("%d") );
  wp_die();
}
?>