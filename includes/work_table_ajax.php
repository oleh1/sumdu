<?php
add_action("wp_ajax_add_student", "f_add_student");
add_action("wp_ajax_nopriv_add_student", "f_add_student");
function f_add_student()
{

  $a1 = $_POST['a1'];
  $a2 = $_POST['a2'];
  $a3 = $_POST['a3'];
  $student_id = $_POST['student_id'];
  $a4 = $_POST['a4'];
  $a5 = $_POST['a5'];
  $a6 = $_POST['a6'];
  $a7 = $_POST['a7'];
  $a8 = $_POST['a8'];
  $a9 = $_POST['a9'];
  $a10 = $_POST['a10'];

  if(!$a10){
    $a10 = date('Y');
  }

  global $wpdb;
  $wpdb->insert('sumdu_work_table', array("id" => $student_id, "number_theme" => $a1, "okr" => $a2, "name_w" => $a3, "group_w" => $a4, "name_head" => $a5, "name_head_mon" => $a6, "direction_work" => $a7, "theme_english" => $a8, "name_reviewer" => $a9, "year_w" => $a10), array("%d", "%s", "%s", "%s", "%s", "%s", "%s", "%s", "%s", "%s", "%s", "%s", "%d"));
  
  global $wpdb_dek;
  $data_teacher_head = $wpdb_dek->get_results("SELECT id_member, surname, `name`, middle_name FROM members WHERE head = 1");
  $data_teacher_reviewer = $wpdb_dek->get_results("SELECT id_member, surname, `name`, middle_name FROM members WHERE reviewer = 1");

  $data_student = $wpdb_dek->get_results("SELECT id_student, surname, `name`, middle_name FROM student");
  
  global $wpdb;
  $table = 'sumdu_work_table';
  $sumdu_work_table = $wpdb->get_results("SELECT * FROM $table GROUP BY number_theme");
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
          <select data-name="okr" data-id="<?php echo $result->id; ?>" data-x="0">
            <option value="1|+|Бакалавр" <?php echo $b1; ?>>Бакалавр</option>
            <option value="3|+|Магістр" <?php echo $b2; ?>>Магістр</option>
          </select>
        </div>
      </td>

      <td data-td="group_w" class="e"><div class="v"><?php echo $result->group_w; ?></div></td>

      <td>
        <?php
        foreach ($data_student as $r){
          if($r->id_student == $result->id){
            ?>
            <div class="w_t"><?php echo $r->surname.' '.$r->name.' '.$r->middle_name; ?></div>
          <?php } } ?>

        <div class="w_s">
          <select data-name="name_w" data-id="<?php echo $result->id; ?>" data-x="1">
            <?php
            foreach ($data_student as $r){
              if($r->id_student == $result->id) { $c = "selected"; }else{ $c = ''; }
              ?>
              <option data-student="<?php echo $r->id_student; ?>" value="<?php echo $r->id_student; ?>|+|<?php echo $r->surname . ' ' . $r->name . ' ' . $r->middle_name; ?>" <?php echo $c; ?>><?php echo $r->surname . ' ' . $r->name . ' ' . $r->middle_name; ?></option>
              <?php
            }
            ?>
          </select>
        </div>
      </td>

      <td>
        <?php
        foreach ($data_teacher_head as $r){
          if($r->id_member == $result->name_head){
            ?>
            <div class="w_t"><?php echo $r->surname.' '.$r->name.' '.$r->middle_name; ?></div>
          <?php } } ?>

        <div class="w_s">
          <select data-name="name_head" data-id="<?php echo $result->id; ?>" data-x="0">
            <?php
            foreach ($data_teacher_head as $r){
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
        foreach ($data_teacher_head as $r){
          if($r->id_member == $result->name_head_mon){
            ?>
            <div class="w_t"><?php echo $r->surname.' '.$r->name.' '.$r->middle_name; ?></div>
          <?php } } ?>

        <div class="w_s">
          <select data-name="name_head_mon" data-id="<?php echo $result->id; ?>" data-x="0">
            <?php
            foreach ($data_teacher_head as $r){
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
        foreach ($data_teacher_reviewer as $r){
          if($r->id_member == $result->name_reviewer){
            ?>
            <div class="w_t"><?php echo $r->surname.' '.$r->name.' '.$r->middle_name; ?></div>
          <?php } } ?>

        <div class="w_s">
          <select data-name="name_reviewer" data-id="<?php echo $result->id; ?>" data-x="0">
            <?php
            foreach ($data_teacher_reviewer as $r){
              if($r->id_member == $result->name_reviewer) { $c = "selected"; }else{ $c = ''; }
              ?>
              <option value="<?php echo $r->id_member; ?>|+|<?php echo $r->surname . ' ' . $r->name . ' ' . $r->middle_name; ?>" <?php echo $c; ?>><?php echo $r->surname . ' ' . $r->name . ' ' . $r->middle_name; ?></option>
              <?php
            }
            ?>
          </select>
        </div>
      </td>

      <td data-td="year_w" class="e"><div class="v"><?php echo $result->year_w; ?></div></td>
      
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

  global $wpdb;

  $id = $_POST['id'];
  $name = $_POST['name'];
  $val = $_POST['val'];
  $r = explode('|+|',$val);
  $x = $_POST['x'];
  $student = $_POST['student'];
  if($x == 1){
    $wpdb->update( 'sumdu_work_table', array($name => $r[1], 'id' => (int)$r[0]), array('id' => (int)$id), array("%s", "%d"), array("%d") );
  }else{
    $wpdb->update( 'sumdu_work_table', array($name => $r[0]), array('id' => (int)$id), array("%s"), array("%d") );
  }
  echo $r[1];
  
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
  $b_m = $wpdb_dek->get_results("SELECT id_student, surname, `name`, middle_name FROM student WHERE `group` = '{$a4}'");
  
  $result = '';
  foreach($b_m as $g){
    $result .= '<option data-id="'.$g->id_student.'" value="'.$g->surname.' '.$g->name.' '.$g->middle_name.'">'.$g->surname.' '.$g->name.' '.$g->middle_name.'</option>';
  }
  echo $result;

  wp_die();
}

add_action("wp_ajax_import_work_t", "f_import_work_t");
add_action("wp_ajax_nopriv_import_work_t", "f_import_work_t");
function f_import_work_t()
{

  if( $_POST['start'] == 1) {

    global $wpdb_dek;
    global $wpdb;
    $export_import = $wpdb->get_results("SELECT * FROM sumdu_work_table");

    foreach ($export_import as $r){

      $name = explode(' ', $r->name_w, 3);

      echo $name[0];
      echo $name[1];
      echo $name[2];

      if(!$r->group_w){
        $group = NULL;
      }else{
        $group = $r->group_w;
      }

      if(!$r->name_head){
        $name_head = NULL;
      }else{
        $name_head = $r->name_head;
      }

      if(!$r->direction_work){
        $direction_work = NULL;
      }else{
        $direction_work = $r->direction_work;
      }

      if(!$r->name_reviewer){
        $name_reviewer = NULL;
      }else{
        $name_reviewer = $r->name_reviewer;
      }

      if(!$r->year_w){
        $year_w = NULL;
      }else{
        $year_w = $r->year_w;
      }

      $wpdb_dek->update( 'student', array('surname' => $name[0], 'name' => $name[1], 'middle_name' => $name[2], 'topic' => $direction_work, 'group' => $group, 'form_education' => NULL, 'id_head' => $name_head, 'id_reviewer' => $name_reviewer, 'id_consultant_oxranu_truda' => NULL, 'id_consultant_economica' => NULL, 'id_consultant_it_project' => NULL, 'id_qualification' => $r->okr, 'year' => $year_w), array('id_student' => (int)$r->id), array("%s", "%s", "%s", "%s", "%s", "%s", "%d", "%d", "%d", "%d", "%d", "%d", "%d"), array("%d") );

    }

    wp_die();

  }
}
?>
