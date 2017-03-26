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
  $student = $wpdb_dek->get_results("SELECT * FROM student");
  foreach($student as $result){
    ?>
    <tr>
      <td><?php echo $result->id_student; ?></td>
      <td><?php echo $result->surname; ?></td>
      <td><?php echo $result->name; ?></td>
      <td><?php echo $result->middle_name; ?></td>
      <td><?php echo $result->topic; ?></td>
      <td><?php echo $result->group; ?></td>
      <td><?php echo $result->form_education; ?></td>
      <td><?php echo $result->id_head; ?></td>
      <td><?php echo $result->id_reviewer; ?></td>
      <td><?php echo $result->id_consultant_oxranu_truda; ?></td>
      <td><?php echo $result->id_consultant_economica; ?></td>
      <td><?php echo $result->id_consultant_it_project; ?></td>
      <td><?php echo $result->id_qualification; ?></td>
      <td><?php echo $result->year; ?></td>
    </tr>
    <?php
  }

//                echo '<pre>';
//                print_r($student);
//                echo '<pre>';
  ?>
</table>
