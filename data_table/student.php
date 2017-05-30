<table data-name_t="student" class="add_all student">
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
  <tr>
    <td><input class="b1" type="text" placeholder="int(10) AUTO_INCREMENT"></td>
    <td><input class="b2" type="text" placeholder="varchar(25)"></td>
    <td><input class="b3" type="text" placeholder="varchar(25)"></td>
    <td><input class="b4" type="text" placeholder="varchar(25)"></td>
    <td><input class="b5" type="text" placeholder="varchar(255) NULL"></td>
    <td><input class="b6" type="text" placeholder="varchar(25) NULL"></td>
    <td><input class="b7" type="text" placeholder="	varchar(25) NULL"></td>
    <td><input class="b8" type="text" placeholder="int(10) NULL"></td>
    <td><input class="b9" type="text" placeholder="int(10) NULL"></td>
    <td><input class="b10" type="text" placeholder="int(10) NULL"></td>
    <td><input class="b11" type="text" placeholder="int(10) NULL"></td>
    <td><input class="b12" type="text" placeholder="int(10) NULL"></td>
    <td><input class="b13" type="text" placeholder="int(10)"></td>
    <td><input class="b14" type="text" placeholder="year(4)"></td>
  </tr>
</table>

<div class="add_student2"><div class="a2">Додати</div><div class="bb2"><img src="<?php echo get_template_directory_uri(); ?>/images/load.gif"></div></div>

<table id="edit_e">
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
    <tr class="<?php echo $table ?>" data-table="<?php echo $table ?>" data-id_name="id_student" data-id="<?php echo $result->id_student; ?>">
      <td class="n" data-td="id_student"><div class="v"><?php echo $result->id_student; ?></div></td>
      <td class="n" data-td="surname"><div class="v"><?php echo $result->surname; ?></div></td>
      <td class="n" data-td="name"><div class="v"><?php echo $result->name; ?></div></td>
      <td class="n" data-td="middle_name"><div class="v"><?php echo $result->middle_name; ?></div></td>
      <td class="n" data-td="topic"><div class="v"><?php echo $result->topic; ?></div></td>
      <td class="n" data-td="group"><div class="v"><?php echo $result->group; ?></div></td>
      <td class="n" data-td="form_education"><div class="v"><?php echo $result->form_education; ?></div></td>
      <td class="n" data-td="id_head"><div class="v"><?php echo $result->id_head; ?></div></td>
      <td class="n" data-td="id_reviewer"><div class="v"><?php echo $result->id_reviewer; ?></div></td>
      <td class="n" data-td="id_consultant_oxranu_truda"><div class="v"><?php echo $result->id_consultant_oxranu_truda; ?></div></td>
      <td class="n" data-td="id_consultant_economica"><div class="v"><?php echo $result->id_consultant_economica; ?></div></td>
      <td class="n" data-td="id_consultant_it_project"><div class="v"><?php echo $result->id_consultant_it_project; ?></div></td>
      <td class="n" data-td="id_qualification"><div class="v"><?php echo $result->id_qualification; ?></div></td>
      <td class="n" data-td="year"><div class="v"><?php echo $result->year; ?></div></td>
      <td class="img_d" data-id_name="id_student" data-table="<?php echo $table; ?>" data-id="<?php echo $result->id_student; ?>"><img class="del_img" src="<?php echo get_template_directory_uri() ?>/images/delete.png"></td>
    </tr>
    <?php
  }
  ?>
</table>
