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
$loader = '<div class="l_b_m"><div class="l"><img src="'.get_template_directory_uri().'/images/load.gif"></div></div>';
$groups = array_unique($groups);
$result = $loader;
$result .= '
  <div class="s_g">'.__('Виберіть свою групу', 'sumdu').' 
  <select data-level="1" class="group_select">';
foreach($groups as $g){
      $result .= '<option value="'.$g.'">'.$g.'</option>';
    }
  $result .= '</select></div>
  <table class="table_style">
  <tr>
    <th>'.__('Студент', 'sumdu').'</th>
    <th>'.__('Тема', 'sumdu').'</th>
    <th>'.__('Керівник', 'sumdu').'</th>
    <th>'.__('Рецензент', 'sumdu').'</th>
  </tr>
';
$result .= '</table>';

?>