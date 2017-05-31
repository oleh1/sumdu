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

  global $wpdb;
  $wpdb->insert('sumdu_work_table', array("id" => '', "number_theme" => $a1, "okr" => $a2, "name_w" => $a3, "group_w" => $a4, "name_head" => $a5, "name_head_mon" => $a6, "direction_work" => $a7, "theme_english" => $a8 , "name_reviewer" => $a9), array("%d", "%s", "%s", "%s", "%s", "%s", "%s", "%s", "%s", "%s", "%s", "%s"));
  
  global $wpdb_dek;
  $data_teacher = $wpdb_dek->get_results("SELECT id_member, surname, `name`, middle_name FROM members");

  global $wpdb;
  $table = 'sumdu_work_table';
  $sumdu_work_table = $wpdb->get_results("SELECT * FROM $table");
  foreach($sumdu_work_table as $result){
    ?>
    <tr data-table="<?php echo $table ?>" data-id_name="id" data-id="<?php echo $result->id; ?>" class="work_tr">
      <td data-td="id" class="id"><div class="v"><?php echo $result->id; ?></div></td>
      <td data-td="number_theme" class="e"><div class="v"><?php echo $result->number_theme; ?></div></td>

      <td>
        <div class="w_t">
          <?php
          $r = $result->okr;
          if($r == 1){
            echo 'Бакалавр';
            $b1 = 'selected';
            $b2 = '';
          }else{
            echo 'Магістр';
            $b1 = '';
            $b2 = 'selected';
          }
          ?>
        </div>

        <div class="w_s">
          <select data-name="okr" data-id="<?php echo $result->id; ?>">
            <option value="1|+|Бакалавр" <?php echo $b1; ?>>Бакалавр</option>
            <option value="3|+|Магістр" <?php echo $b2; ?>>Магістр</option>
          </select>
        </div>
      </td>

      <td data-td="name_w" class="e"><div class="v"><?php echo $result->surname.' '.$result->name_w.' '.$result->middle_name; ?></div></td>
      <td data-td="group_w" class="e"><div class="v"><?php echo $result->group_w; ?></div></td>

      <td>
        <?php
        foreach ($data_teacher as $r){
          if($r->id_member == $result->name_head){
            ?>
            <div class="w_t"><?php echo $r->surname.' '.$r->name.' '.$r->middle_name; ?></div>
          <?php } } ?>

        <div class="w_s">
          <select data-name="name_head" data-id="<?php echo $result->id; ?>">
            <?php
            foreach ($data_teacher as $r){
              if($r->id_member == $result->name_head) { $c = "selected"; }else{ $c = ''; }
              ?>
              <option
                value="<?php echo $r->id_member; ?>|+|<?php echo $r->surname . ' ' . $r->name . ' ' . $r->middle_name; ?>" <?php echo $c; ?>><?php echo $r->surname . ' ' . $r->name . ' ' . $r->middle_name; ?></option>
              <?php
            }
            ?>
          </select>
        </div>
      </td>

      <td>
        <?php
        foreach ($data_teacher as $r){
          if($r->id_member == $result->name_head_mon){
            ?>
            <div class="w_t"><?php echo $r->surname.' '.$r->name.' '.$r->middle_name; ?></div>
          <?php } } ?>

        <div class="w_s">
          <select data-name="name_head_mon" data-id="<?php echo $result->id; ?>">
            <?php
            foreach ($data_teacher as $r){
              if($r->id_member == $result->name_head_mon) { $c = "selected"; }else{ $c = ''; }
              ?>
              <option value="<?php echo $r->id_member; ?>|+|<?php echo $r->surname . ' ' . $r->name . ' ' . $r->middle_name; ?>" <?php echo $c; ?>><?php echo $r->surname . ' ' . $r->name . ' ' . $r->middle_name; ?></option>
              <?php
            }
            ?>
          </select>
        </div>
      </td>

      <td data-td="direction_work" class="e direction_work"><div class="v"><?php echo $result->direction_work; ?></div></td>
      <td data-td="theme_english" class="e theme_english"><div class="v"><?php echo $result->theme_english; ?></div></td>

      <td>
        <?php
        foreach ($data_teacher as $r){
          if($r->id_member == $result->name_reviewer){
            ?>
            <div class="w_t"><?php echo $r->surname.' '.$r->name.' '.$r->middle_name; ?></div>
          <?php } } ?>

        <div class="w_s">
          <select data-name="name_reviewer" data-id="<?php echo $result->id; ?>">
            <?php
            foreach ($data_teacher as $r){
              if($r->id_member == $result->name_reviewer) { $c = "selected"; }else{ $c = ''; }
              ?>
              <option value="<?php echo $r->id_member; ?>|+|<?php echo $r->surname . ' ' . $r->name . ' ' . $r->middle_name; ?>" <?php echo $c; ?>><?php echo $r->surname . ' ' . $r->name . ' ' . $r->middle_name; ?></option>
              <?php
            }
            ?>
          </select>
        </div>
      </td>
      <td class="img_d" data-id="<?php echo $result->id; ?>"><img class="del_img" src="<?php echo get_template_directory_uri() ?>/images/delete.png"></td>

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

add_action("wp_ajax_del_img", "f_del_img");
add_action("wp_ajax_nopriv_del_img", "f_del_img");
function f_del_img()
{
  $id = $_POST['id'];
  
  global $wpdb;
  $wpdb->delete( 'sumdu_work_table', array( 'id' => $id ), array( '%d' ) );

  wp_die();
}

add_action("wp_ajax_select_a2", "f_select_a2");
add_action("wp_ajax_nopriv_select_a2", "f_select_a2");
function f_select_a2()
{
  
  $a2 = $_POST['a2'];

  global $wpdb_dek;
  $b_m = $wpdb_dek->get_results("SELECT `group` FROM student WHERE id_qualification = $a2");

  $groups = array();
  $i = 0;
  foreach($b_m as $r){
    $groups[$i] = $r->group;
    $i++;
  }
  $groups = array_unique($groups);

  $result = '';
  foreach($groups as $g){
    $result .= '<option value="'.$g.'">'.$g.'</option>';
  }
  echo $result;

  wp_die();
}

add_action("wp_ajax_select_a4", "f_select_a4");
add_action("wp_ajax_nopriv_select_a4", "f_select_a4");
function f_select_a4()
{

  $a4 = $_POST['a4'];

  global $wpdb_dek;
  $b_m = $wpdb_dek->get_results("SELECT surname, `name`, middle_name FROM student WHERE `group` = '{$a4}'");
  
  $result = '';
  foreach($b_m as $g){
    $result .= '<option value="'.$g->surname.'|+|'.$g->name.'|+|'.$g->middle_name.'">'.$g->surname.' '.$g->name.' '.$g->middle_name.'</option>';
  }
  echo $result;

  wp_die();
}
?>
