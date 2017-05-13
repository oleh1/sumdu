<?php

global $wpdb_dek;
$student = 'student';
$members = 'members';
$bachelor = $wpdb_dek->get_results("SELECT `group` FROM $student WHERE id_qualification = 1");
$groups = array();
$i = 0;
foreach($bachelor as $r){
  $groups[$i] = $r->group;
  $i++;
}
$loader = '<div class="l_b_m"><div class="l"><div class="loader"><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div></div></div>';
$groups = array_unique($groups);
$result = $loader;
$result .= '
  <div class="s_g_p_b">Виберіть свою групу 
  <select data-level="1" class="group_select_p_b">';
foreach($groups as $g){
  $result .= '<option value="'.$g.'">'.$g.'</option>';
}
$result .= '</select></div>
  <table class="table_style_p_b">
  <tr>
    <th>Дата</th>
    <th>Час</th>
    <th>Студент</th>
    <th>Тема</th>
    <th>Керівник</th>
    <th>Рецензент</th>
  </tr>
';
$result .= '</table>';
echo $result;
?>