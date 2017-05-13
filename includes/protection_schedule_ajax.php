<?php

add_action("wp_ajax_group_select_protection_schedule_b", "f_group_select_protection_schedule_b");
add_action("wp_ajax_nopriv_group_select_protection_schedule_b", "f_group_select_protection_schedule_b");
function f_group_select_protection_schedule_b()
{
  $cur_user_id = get_current_user_id();
  $group = $_POST['group'];
  global $wpdb_dek;
  $student = 'student';
  $members = 'members';
  $bachelor = $wpdb_dek->get_results("SELECT s.surname AS surname_s, s.`name` AS name_s, s.middle_name AS middle_name_s, topic, `group`, head.surname AS surname_head, head.`name` AS name_head, head.middle_name AS middle_name_head, reviewer.surname AS surname_reviewer, reviewer.`name` AS name_reviewer, reviewer.middle_name AS middle_name_reviewer FROM $student AS s LEFT JOIN $members AS head ON (head.id_member = s.id_head) LEFT JOIN $members AS reviewer ON (reviewer.id_member = s.id_reviewer) WHERE s.id_qualification = 1 AND `group` = '{$group}'");

  $result = '<div class="f_b">
      <b>Дата</b> <input class="p" type="date"> 
      <b>Час</b> <input class="p" type="time"> 
      <b>П.І.П</b> <select class="s_name_b p" data-user_id="'.$cur_user_id.'" data-level="b">';
  foreach($bachelor as $r){
    $result .= '
        <option value="'.$r->surname_s.' '.$r->name_s.' '.$r->middle_name_s.'|+|'.$r->topic.'|+|'.$r->surname_head.' '.$r->name_head.' '.$r->middle_name_head.'|+|'.$r->surname_reviewer.' '.$r->name_reviewer.' '.$r->middle_name_reviewer.'|+|'.$r->group.'">'.$r->surname_s.' '.$r->name_s.' '.$r->middle_name_s.'</option>
      ';
    $g = $r->group;
  }
  $result .= '</select> 
    <button data-g="'.$g.'" class="p add_date_time">Додати</button></div>';
  echo $result;
  wp_die();
}

add_action("wp_ajax_group_select_protection_schedule_m", "f_group_select_protection_schedule_m");
add_action("wp_ajax_nopriv_group_select_protection_schedule_m", "f_group_select_protection_schedule_m");
function f_group_select_protection_schedule_m()
{
  $cur_user_id = get_current_user_id();
  $group = $_POST['group'];
  global $wpdb_dek;
  $student = 'student';
  $members = 'members';
  $master = $wpdb_dek->get_results("SELECT s.surname AS surname_s, s.`name` AS name_s, s.middle_name AS middle_name_s, topic, `group`, head.surname AS surname_head, head.`name` AS name_head, head.middle_name AS middle_name_head, reviewer.surname AS surname_reviewer, reviewer.`name` AS name_reviewer, reviewer.middle_name AS middle_name_reviewer FROM $student AS s LEFT JOIN $members AS head ON (head.id_member = s.id_head) LEFT JOIN $members AS reviewer ON (reviewer.id_member = s.id_reviewer) WHERE s.id_qualification = 3 AND `group` = '{$group}'");

  $result = '<div class="f_m">
      <b>Дата</b> <input class="p" type="date"> 
      <b>Час</b> <input class="p" type="time"> 
      <b>П.І.П</b> <select class="s_name_m p" data-user_id="'.$cur_user_id.'" data-level="m">';
  foreach($master as $r){
    $result .= '
        <option value="'.$r->surname_s.' '.$r->name_s.' '.$r->middle_name_s.'|+|'.$r->topic.'|+|'.$r->surname_head.' '.$r->name_head.' '.$r->middle_name_head.'|+|'.$r->surname_reviewer.' '.$r->name_reviewer.' '.$r->middle_name_reviewer.'|+|'.$r->group.'">'.$r->surname_s.' '.$r->name_s.' '.$r->middle_name_s.'</option>
      ';
    $g = $r->group;
  }
  $result .= '</select> 
    <button data-g="'.$g.'" class="p add_date_time">Додати</button></div>';
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
  global $wpdb;
  $wpdb->insert('sumdu_protection_schedule_'.$l, array("id" => '', "name_".$l => $name, "theme_".$l => $theme, "head_".$l => $head, "reviewer_".$l => $reviewer, "date_".$l => $date, "time_".$l => $time, "group_".$l => $group, "user_id" => $user_id), array("%d", "%s", "%s", "%s", "%s", "%s", "%s", "%s", "%d"));

  wp_die();
}

add_action("wp_ajax_group_select_protection_schedule_b2", "f_group_select_protection_schedule_b2");
add_action("wp_ajax_nopriv_group_select_protection_schedule_b2", "f_group_select_protection_schedule_b2");
function f_group_select_protection_schedule_b2()
{
  $group = $_POST['group'];
  global $wpdb;
  $result = $wpdb->get_results("SELECT * FROM sumdu_protection_schedule_b WHERE group_b = '{$group}'");

  foreach ($result as $r){
    ?>
    <tr class="data_table_themes_p_b">
      <td><?php echo $r->date_b; ?></td>
      <td><?php echo $r->time_b; ?></td>
      <td><?php echo $r->name_b; ?></td>
      <td><?php echo $r->theme_b; ?></td>
      <td><?php echo $r->head_b; ?></td>
      <td><?php echo $r->reviewer_b; ?></td>
    </tr>
    <?php
  }

  wp_die();
}

add_action("wp_ajax_group_select_protection_schedule_m2", "f_group_select_protection_schedule_m2");
add_action("wp_ajax_nopriv_group_select_protection_schedule_m2", "f_group_select_protection_schedule_m2");
function f_group_select_protection_schedule_m2()
{
  $group = $_POST['group'];
  global $wpdb;
  $result = $wpdb->get_results("SELECT * FROM sumdu_protection_schedule_m WHERE group_m = '{$group}'");

  foreach ($result as $r){
    ?>
    <tr class="data_table_themes_p_m">
      <td><?php echo $r->date_m; ?></td>
      <td><?php echo $r->time_m; ?></td>
      <td><?php echo $r->name_m; ?></td>
      <td><?php echo $r->theme_m; ?></td>
      <td><?php echo $r->head_m; ?></td>
      <td><?php echo $r->reviewer_m; ?></td>
    </tr>
    <?php
  }

  wp_die();
}

?>