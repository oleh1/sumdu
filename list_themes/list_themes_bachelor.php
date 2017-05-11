<?php

global $wpdb_dek;
$student = 'student';
$members = 'members';
$bachelor = $wpdb_dek->get_results("SELECT s.surname AS surname_s, s.`name` AS name_s, s.middle_name AS middle_name_s, topic, `group`, head.surname AS surname_head, head.`name` AS name_head, head.middle_name AS middle_name_head, reviewer.surname AS surname_reviewer, reviewer.`name` AS name_reviewer, reviewer.middle_name AS middle_name_reviewer FROM $student AS s LEFT JOIN $members AS head ON (head.id_member = s.id_head) LEFT JOIN $members AS reviewer ON (reviewer.id_member = s.id_reviewer) WHERE id_qualification = 1");
$result = '
  <table class="table_style">
  <tr>
    <th>Студент</th>
    <th>Тема</th>
    <th>Група</th>
    <th>Керівник</th>
    <th>Рецензент</th>
  </tr>
  ';
foreach($bachelor as $r){
  $result .= '
       <tr>
       <td>'.$r->surname_s.' '.$r->name_s.' '.$r->middle_name_s.'</td>'.
    '<td>'.$r->topic.'</td>'.
    '<td>'.$r->group.'</td>'.
    '<td>'.$r->surname_head.' '.$r->name_head.' '.$r->middle_name_head.'</td>'.
    '<td>'.$r->surname_reviewer.' '.$r->name_reviewer.' '.$r->middle_name_reviewer.'</td>
       </tr>';
}
$result .= '</table>';

//  echo '<pre>';
//  var_dump($bachelor);
//  echo '</pre>';

?>