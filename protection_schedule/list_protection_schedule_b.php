<?php

global $wpdb;
$bachelor = $wpdb->get_results("SELECT `group_b` FROM sumdu_protection_schedule_b");
$groups = array();
$i = 0;
foreach($bachelor as $r){
  $groups[$i] = $r->group_b;
  $i++;
}
$groups = array_unique($groups);
$result = '
  <div class="s_g2">'.__('Виберіть свою групу', 'sumdu').' 
  <select data-level="b" class="group_select2">';
foreach($groups as $g){
  $result .= '<option value="'.$g.'">'.$g.'</option>';
}
$result .= '</select></div>
  <div class="lists_b_m"><img src="'.get_template_directory_uri().'/images/load.gif"></div>
  <table class="table_style2">
  <tr>
    <th>'.__('Дата', 'sumdu').'</th>
    <th>'.__('Час', 'sumdu').'</th>
    <th>'.__('Студент', 'sumdu').'</th>
    <th>'.__('Тема', 'sumdu').'</th>
    <th>'.__('Керівник', 'sumdu').'</th>
    <th>'.__('Рецензент', 'sumdu').'</th>
  </tr>
';
$result .= '</table>';

?>