<?php

add_action("wp_ajax_group_select_protection_schedule_b", "f_group_select_protection_schedule_b");
add_action("wp_ajax_nopriv_group_select_protection_schedule_b", "f_group_select_protection_schedule_b");
function f_group_select_protection_schedule_b()
{
  $group = $_POST['group'];
  global $wpdb_dek;
  $student = 'student';
  $members = 'members';
  $bachelor = $wpdb_dek->get_results("SELECT s.surname AS surname_s, s.`name` AS name_s, s.middle_name AS middle_name_s, topic, `group`, head.surname AS surname_head, head.`name` AS name_head, head.middle_name AS middle_name_head, reviewer.surname AS surname_reviewer, reviewer.`name` AS name_reviewer, reviewer.middle_name AS middle_name_reviewer FROM $student AS s LEFT JOIN $members AS head ON (head.id_member = s.id_head) LEFT JOIN $members AS reviewer ON (reviewer.id_member = s.id_reviewer) WHERE s.id_qualification = 1 AND `group` = '{$group}'");

  $result = '<div class="f_b"><form>
      <input type="hidden" name="level" value="b">
      <b>Дата</b> <input name="date" class="p" type="date"> 
      <b>Час</b> <input name="time" class="p" type="time"> 
      <b>П.І.П</b> <select name="name" class="s_name_b p">';
  foreach($bachelor as $r){
    $result .= '
        <option value="'.$r->surname_s.' '.$r->name_s.' '.$r->middle_name_s.'|+|'.$r->topic.'|+|'.$r->surname_head.' '.$r->name_head.' '.$r->middle_name_head.'|+|'.$r->surname_reviewer.' '.$r->name_reviewer.' '.$r->middle_name_reviewer.'">'.$r->surname_s.' '.$r->name_s.' '.$r->middle_name_s.'</option>
      ';
    /*$result .= '
         <tr class="data_table_themes_p_m">
         <td>'.$r->surname_s.' '.$r->name_s.' '.$r->middle_name_s.'</td>'.
      '<td>'.$r->topic.'</td>'.
      '<td>'.$r->surname_head.' '.$r->name_head.' '.$r->middle_name_head.'</td>'.
      '<td>'.$r->surname_reviewer.' '.$r->name_reviewer.' '.$r->middle_name_reviewer.'</td>
         </tr>';*/
  }
  $result .= '</select> 
    <input class="p s" type="submit" value="Додати">
    </form></div>';
  echo $result;
  wp_die();
}

add_action("wp_ajax_group_select_protection_schedule_m", "f_group_select_protection_schedule_m");
add_action("wp_ajax_nopriv_group_select_protection_schedule_m", "f_group_select_protection_schedule_m");
function f_group_select_protection_schedule_m()
{
  $group = $_POST['group'];
  global $wpdb_dek;
  $student = 'student';
  $members = 'members';
  $bachelor = $wpdb_dek->get_results("SELECT s.surname AS surname_s, s.`name` AS name_s, s.middle_name AS middle_name_s, topic, `group`, head.surname AS surname_head, head.`name` AS name_head, head.middle_name AS middle_name_head, reviewer.surname AS surname_reviewer, reviewer.`name` AS name_reviewer, reviewer.middle_name AS middle_name_reviewer FROM $student AS s LEFT JOIN $members AS head ON (head.id_member = s.id_head) LEFT JOIN $members AS reviewer ON (reviewer.id_member = s.id_reviewer) WHERE s.id_qualification = 3 AND `group` = '{$group}'");

  $result = '<div class="f_m"><form>
      <input type="hidden" name="level" value="m">
      <b>Дата</b> <input name="date" class="p" type="date"> 
      <b>Час</b> <input name="time" class="p" type="time"> 
      <b>П.І.П</b> <select name="name" class="s_name_m p">';
  foreach($bachelor as $r){
    $result .= '
        <option value="'.$r->surname_s.' '.$r->name_s.' '.$r->middle_name_s.'|+|'.$r->topic.'|+|'.$r->surname_head.' '.$r->name_head.' '.$r->middle_name_head.'|+|'.$r->surname_reviewer.' '.$r->name_reviewer.' '.$r->middle_name_reviewer.'">'.$r->surname_s.' '.$r->name_s.' '.$r->middle_name_s.'</option>
      ';
    /*$result .= '
         <tr class="data_table_themes_p_m">
         <td>'.$r->surname_s.' '.$r->name_s.' '.$r->middle_name_s.'</td>'.
      '<td>'.$r->topic.'</td>'.
      '<td>'.$r->surname_head.' '.$r->name_head.' '.$r->middle_name_head.'</td>'.
      '<td>'.$r->surname_reviewer.' '.$r->name_reviewer.' '.$r->middle_name_reviewer.'</td>
         </tr>';*/
  }
  $result .= '</select> 
    <input class="p s" type="submit" value="Додати">
    </form></div>';
  echo $result;
  wp_die();
}

?>