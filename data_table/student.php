<table>
  <tr>
    <th>ІН студента</th>
    <th>Прізвище</th>
    <th>Ім`я</th>
    <th>По батькові</th>
    <th>Тема</th>
    <th>Група</th>
    <th>Форма навчання</th>
    <th>ІН керівника</th>
    <th>ІН рецензента</th>
    <th>ІН консл. з охорони праці</th>
    <th>ІН консл. з економіки</th>
    <th>ІН консл. з ІТ проектів</th>
    <th>ІН Кваліфікації</th>
    <th>Рік запису</th>
  </tr>
  <?php
  $table = 'student';
  $student = $wpdb_dek->get_results("SELECT * FROM $table");
  foreach($student as $result){
    ?>
    <tr data-table="<?php echo $table ?>" data-id_name="id_student" data-id="<?php echo $result->id_student; ?>">
      <td data-td="id_student"><div class="v"><?php echo $result->id_student; ?></div></td>
      <td data-td="surname"><div class="v"><?php echo $result->surname; ?></div></td>
      <td data-td="name"><div class="v"><?php echo $result->name; ?></div></td>
      <td data-td="middle_name"><div class="v"><?php echo $result->middle_name; ?></div></td>
      <td data-td="topic"><div class="v"><?php echo $result->topic; ?></div></td>
      <td data-td="group"><div class="v"><?php echo $result->group; ?></div></td>
      <td data-td="form_education"><div class="v"><?php echo $result->form_education; ?></div></td>
      <td data-td="id_head"><div class="v"><?php echo $result->id_head; ?></div></td>
      <td data-td="id_reviewer"><div class="v"><?php echo $result->id_reviewer; ?></div></td>
      <td data-td="id_consultant_oxranu_truda"><div class="v"><?php echo $result->id_consultant_oxranu_truda; ?></div></td>
      <td data-td="id_consultant_economica"><div class="v"><?php echo $result->id_consultant_economica; ?></div></td>
      <td data-td="id_consultant_it_project"><div class="v"><?php echo $result->id_consultant_it_project; ?></div></td>
      <td data-td="id_qualification"><div class="v"><?php echo $result->id_qualification; ?></div></td>
      <td data-td="year"><div class="v"><?php echo $result->year; ?></div></td>
    </tr>
    <?php
  }
  ?>
</table>
