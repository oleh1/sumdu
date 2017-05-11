<?php

global $wpdb_dek;
$student = 'student';
$members = 'members';
$bachelor = $wpdb_dek->get_results("SELECT s.surname AS surname_s, s.`name` AS name_s, s.middle_name AS middle_name_s, topic, `group`, head.surname AS surname_head, head.`name` AS name_head, head.middle_name AS middle_name_head, reviewer.surname AS surname_reviewer, reviewer.`name` AS name_reviewer, reviewer.middle_name AS middle_name_reviewer FROM $student AS s LEFT JOIN $members AS head ON (head.id_member = s.id_head) LEFT JOIN $members AS reviewer ON (reviewer.id_member = s.id_reviewer) WHERE id_qualification = 1");
$groups = array();
$i = 0;
foreach($bachelor as $r){
  $groups[$i] = $r->group;
  $i++;
}
$groups = array_unique($groups);
$result = '
  Виберіть свою групу 
  <select data-level="1" class="group_select">';
foreach($groups as $g){
      $result .= '<option data-level="1" value="'.$g.'">'.$g.'</option>';
    }
  $result .= '</select>
  <table class="table_style">
  <tr>
    <th>Студент</th>
    <th>Тема</th>
    <th>Керівник</th>
    <th>Рецензент</th>
  </tr>
  <tr class="l"><td colspan="4"><div class="loader"><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div></td></tr>
';

$result .= '</table>';

?>