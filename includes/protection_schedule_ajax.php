<?php

add_action("wp_ajax_group_select_protection_schedule_b", "f_group_select_protection_schedule_b");
add_action("wp_ajax_nopriv_group_select_protection_schedule_b", "f_group_select_protection_schedule_b");
function f_group_select_protection_schedule_b()
{
  $cur_user_id = get_current_user_id();
  $access = get_userdata($cur_user_id)->roles[0];
  if($access == null){
    $access = get_userdata($cur_user_id)->roles[1];
  }
  $group = $_POST['group'];
  global $wpdb_dek;
  $student = 'student';
  $members = 'members';
  $bachelor = $wpdb_dek->get_results("SELECT s.surname AS surname_s, s.`name` AS name_s, s.middle_name AS middle_name_s, topic, `group`, head.surname AS surname_head, head.`name` AS name_head, head.middle_name AS middle_name_head, reviewer.surname AS surname_reviewer, reviewer.`name` AS name_reviewer, reviewer.middle_name AS middle_name_reviewer FROM $student AS s LEFT JOIN $members AS head ON (head.id_member = s.id_head) LEFT JOIN $members AS reviewer ON (reviewer.id_member = s.id_reviewer) WHERE s.id_qualification = 1 AND `group` = '{$group}'");

  $result = '<div class="f_b">
      <b>Дата</b> <input class="p" type="date"> 
      <b>Час</b> <input class="p" type="time"> 
      <b>П.І.Б</b> <select class="s_name_b p" data-user_id="'.$cur_user_id.'" data-level="b">';
  foreach($bachelor as $r){
    $result .= '
        <option value="'.$r->surname_s.' '.$r->name_s.' '.$r->middle_name_s.'|+|'.$r->topic.'|+|'.$r->surname_head.' '.$r->name_head.' '.$r->middle_name_head.'|+|'.$r->surname_reviewer.' '.$r->name_reviewer.' '.$r->middle_name_reviewer.'|+|'.$r->group.'">'.$r->surname_s.' '.$r->name_s.' '.$r->middle_name_s.'</option>
      ';
    $g = $r->group;
  }
  $result .= '</select> 
    <div data-access="'.$access.'" data-g="'.$g.'" class="p add_date_time"><b>Додати</b></div><div class="error_p_b"></div></div>';
  echo $result;
  wp_die();
}

add_action("wp_ajax_group_select_protection_schedule_m", "f_group_select_protection_schedule_m");
add_action("wp_ajax_nopriv_group_select_protection_schedule_m", "f_group_select_protection_schedule_m");
function f_group_select_protection_schedule_m()
{
  $cur_user_id = get_current_user_id();
  $access = get_userdata($cur_user_id)->roles[0];
  if($access == null){
    $access = get_userdata($cur_user_id)->roles[1];
  }
  $group = $_POST['group'];
  global $wpdb_dek;
  $student = 'student';
  $members = 'members';
  $master = $wpdb_dek->get_results("SELECT s.surname AS surname_s, s.`name` AS name_s, s.middle_name AS middle_name_s, topic, `group`, head.surname AS surname_head, head.`name` AS name_head, head.middle_name AS middle_name_head, reviewer.surname AS surname_reviewer, reviewer.`name` AS name_reviewer, reviewer.middle_name AS middle_name_reviewer FROM $student AS s LEFT JOIN $members AS head ON (head.id_member = s.id_head) LEFT JOIN $members AS reviewer ON (reviewer.id_member = s.id_reviewer) WHERE s.id_qualification = 3 AND `group` = '{$group}'");

  $result = '<div class="f_m">
      <b>Дата</b> <input class="p" type="date"> 
      <b>Час</b> <input class="p" type="time"> 
      <b>П.І.Б</b> <select class="s_name_m p" data-user_id="'.$cur_user_id.'" data-level="m">';
  foreach($master as $r){
    $result .= '
        <option value="'.$r->surname_s.' '.$r->name_s.' '.$r->middle_name_s.'|+|'.$r->topic.'|+|'.$r->surname_head.' '.$r->name_head.' '.$r->middle_name_head.'|+|'.$r->surname_reviewer.' '.$r->name_reviewer.' '.$r->middle_name_reviewer.'|+|'.$r->group.'">'.$r->surname_s.' '.$r->name_s.' '.$r->middle_name_s.'</option>
      ';
    $g = $r->group;
  }
  $result .= '</select> 
    <div data-access="'.$access.'" data-g="'.$g.'" class="p add_date_time"><b>Додати</b></div><div class="error_p_m"></div></div>';
  echo $result;
  wp_die();
}

add_action("wp_ajax_add_date_time", "f_add_date_time");
add_action("wp_ajax_nopriv_add_date_time", "f_add_date_time");
function f_add_date_time()
{
  $l = $_POST['level'];
  $user_id = $_POST['user_id'];
  $date = $_POST['date'];
  $time = $_POST['time'];
  $name_data = explode('|+|', $_POST['name']);
  $name = $name_data[0];
  $theme = $name_data[1];
  $head = $name_data[2];
  $reviewer = $name_data[3];
  $group = $name_data[4];
  $access = $_POST['access'];
  global $wpdb;
  
  $r_b = $wpdb->get_results("SELECT * FROM sumdu_protection_schedule_b WHERE user_id = '{$user_id}'");
  $r_m = $wpdb->get_results("SELECT * FROM sumdu_protection_schedule_m WHERE user_id = '{$user_id}'");

  if($access == 'administrator' || $access == 'teacher') {
    $r_b2 = $wpdb->get_results("SELECT * FROM sumdu_protection_schedule_b ORDER BY `user_id` DESC");
    $r_m2 = $wpdb->get_results("SELECT * FROM sumdu_protection_schedule_m ORDER BY `user_id` DESC");
    
    $b2 = (int)$r_b2[0]->user_id;
    $m2 = (int)$r_m2[0]->user_id;
    if($b2 >= 77777 && $m2 >= 77777){
      if($b2 > $m2){
        $user_id = $b2 + 1;
      }elseif($b2 < $m2){
        $user_id = $m2 + 1;
      }
    }elseif($b2 >= 77777){
      $user_id = $b2 + 1;
    }elseif($m2 >= 77777){
      $user_id = $m2 + 1;
    }elseif($r_b2 == null && $r_m2 == null || $r_b == null && $r_m == null){
      $user_id = 77777;
    }

    $wpdb->insert('sumdu_protection_schedule_' . $l, array("id" => '', "name_" . $l => $name, "theme_" . $l => $theme, "head_" . $l => $head, "reviewer_" . $l => $reviewer, "date_" . $l => $date, "time_" . $l => $time, "group_" . $l => $group, "user_id" => $user_id), array("%d", "%s", "%s", "%s", "%s", "%s", "%s", "%s", "%d"));

  }elseif($r_b == null && $r_m == null) {
    $wpdb->insert('sumdu_protection_schedule_' . $l, array("id" => '', "name_" . $l => $name, "theme_" . $l => $theme, "head_" . $l => $head, "reviewer_" . $l => $reviewer, "date_" . $l => $date, "time_" . $l => $time, "group_" . $l => $group, "user_id" => $user_id), array("%d", "%s", "%s", "%s", "%s", "%s", "%s", "%s", "%d"));
  }else{
    echo '1';
  }
  wp_die();
}

add_action("wp_ajax_group_select_protection_schedule_b2", "f_group_select_protection_schedule_b2");
add_action("wp_ajax_nopriv_group_select_protection_schedule_b2", "f_group_select_protection_schedule_b2");
function f_group_select_protection_schedule_b2()
{
  $cur_user_id = get_current_user_id();
  $access = get_userdata($cur_user_id)->roles[0];
  if($access == null){
    $access = get_userdata($cur_user_id)->roles[1];
  }
  $group = $_POST['group'];
  global $wpdb;
  $result = $wpdb->get_results("SELECT * FROM sumdu_protection_schedule_b WHERE group_b = '{$group}'");

  foreach ($result as $r){
    ?>
    <tr class="data_table_themes_p_b color_<?php echo $r->user_id; ?>">
      <td><?php echo $r->date_b; ?></td>
      <td><?php echo $r->time_b; ?></td>
      <td><?php echo $r->name_b; ?></td>
      <td><?php echo $r->theme_b; ?></td>
      <td><?php echo $r->head_b; ?></td>
      <td><?php echo $r->reviewer_b; ?></td>
      <?php
      if($r->user_id == $cur_user_id || $access == 'administrator' || $access == 'teacher'){ echo '<td><img data-user_id="'.$r->user_id.'" data-group="'.$r->group_b.'" data-l="b" class="del_date_time" src="'.get_template_directory_uri().'/images/delete.png"></td>'; }
      ?>
    </tr>
    <?php
  }

  wp_die();
}

add_action("wp_ajax_group_select_protection_schedule_m2", "f_group_select_protection_schedule_m2");
add_action("wp_ajax_nopriv_group_select_protection_schedule_m2", "f_group_select_protection_schedule_m2");
function f_group_select_protection_schedule_m2()
{
  $cur_user_id = get_current_user_id();
  $access = get_userdata($cur_user_id)->roles[0];
  if($access == null){
    $access = get_userdata($cur_user_id)->roles[1];
  }
  $group = $_POST['group'];
  global $wpdb;
  $result = $wpdb->get_results("SELECT * FROM sumdu_protection_schedule_m WHERE group_m = '{$group}'");

  foreach ($result as $r){
    ?>
    <tr class="data_table_themes_p_m color_<?php echo $r->user_id; ?>">
      <td><?php echo $r->date_m; ?></td>
      <td><?php echo $r->time_m; ?></td>
      <td><?php echo $r->name_m; ?></td>
      <td><?php echo $r->theme_m; ?></td>
      <td><?php echo $r->head_m; ?></td>
      <td><?php echo $r->reviewer_m; ?></td>
      <?php
      if($r->user_id == $cur_user_id || $access == 'administrator' || $access == 'teacher'){ echo '<td><img data-user_id="'.$r->user_id.'" data-group="'.$r->group_m.'" data-l="m" class="del_date_time" src="'.get_template_directory_uri().'/images/delete.png"></td>'; }
      ?>
    </tr>
    <?php
  }

  wp_die();
}

add_action("wp_ajax_del_date_time", "f_del_date_time");
add_action("wp_ajax_nopriv_del_date_time", "f_del_date_time");
function f_del_date_time()
{
  $user_id = (int)$_POST['user_id'];
  $l =  $_POST['l'];
  $group = $_POST['group'];

  global $wpdb;
  $wpdb->delete( 'sumdu_protection_schedule_'.$l, array( 'user_id' => $user_id, 'group_'.$l => $group ), array( '%d', '%s' ) );

  wp_die();
}

add_action("wp_ajax_group_select_bachelor_master2", "f_group_select_bachelor_master2");
add_action("wp_ajax_nopriv_group_select_bachelor_master2", "f_group_select_bachelor_master2");
function f_group_select_bachelor_master2()
{
  $group = $_POST['group'];
  $l = $_POST['level'];
  global $wpdb;
  $b_m = $wpdb->get_results("SELECT * FROM sumdu_protection_schedule_".$l, ARRAY_N);
  $result = '';
  foreach($b_m as $r){
    $result .= '
         <tr class="data_table_themes2">
         <td>'.$r[5].'</td>'.
      '<td>'.$r[6].'</td>'.
      '<td>'.$r[1].'</td>'.
      '<td>'.$r[2].'</td>'.
      '<td>'.$r[3].'</td>'.
      '<td>'.$r[4].'</td>
         </tr>';
  }
  echo $result;
  wp_die();
}

?>