<?php

add_action("wp_ajax_group_select_bachelor_master", "f_group_select_bachelor_master");
add_action("wp_ajax_nopriv_group_select_bachelor_master", "f_group_select_bachelor_master");
function f_group_select_bachelor_master()
{
  $group = $_POST['group'];
  $level = $_POST['level'];
  global $wpdb_dek;
  $student = 'student';
  $members = 'members';
  $bachelor = $wpdb_dek->get_results("SELECT s.surname AS surname_s, s.`name` AS name_s, s.middle_name AS middle_name_s, topic, `group`, head.surname AS surname_head, head.`name` AS name_head, head.middle_name AS middle_name_head, reviewer.surname AS surname_reviewer, reviewer.`name` AS name_reviewer, reviewer.middle_name AS middle_name_reviewer FROM $student AS s LEFT JOIN $members AS head ON (head.id_member = s.id_head) LEFT JOIN $members AS reviewer ON (reviewer.id_member = s.id_reviewer) WHERE s.id_qualification = $level AND `group` = '{$group}'");

  $result = '';
  foreach($bachelor as $r){
    $result .= '
         <tr class="data_table_themes">
         <td>'.$r->surname_s.' '.$r->name_s.' '.$r->middle_name_s.'</td>'.
      '<td>'.$r->topic.'</td>'.
      '<td>'.$r->surname_head.' '.$r->name_head.' '.$r->middle_name_head.'</td>'.
      '<td>'.$r->surname_reviewer.' '.$r->name_reviewer.' '.$r->middle_name_reviewer.'</td>
         </tr>';
  }
  echo $result;
  wp_die();
}

?>