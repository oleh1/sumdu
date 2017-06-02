<table data-name_t="qualification" class="add_all qualification">
  <tr>
    <th>ІН кваліфікації</th>
    <th>Кваліфікаційний рівень</th>
    <th>Назва спецільності</th>
    <th>Код спеціальності</th>
    <th>Кваліфікація студента</th>
  </tr>
  <tr>
    <td><input class="b1" type="text" placeholder="int(10) AUTO_INCREMENT"></td>
    <td><input class="b2" type="text" placeholder="varchar(15)"></td>
    <td><input class="b3" type="text" placeholder="varchar(80) NULL"></td>
    <td><input class="b4" type="text" placeholder="varchar(25) NULL"></td>
    <td><input class="b5" type="text" placeholder="varchar(255) NULL"></td>
  </tr>
</table>

<div class="add_student2"><div class="a2">Додати</div><div class="bb2"><img src="<?php echo get_template_directory_uri(); ?>/images/load.gif"></div></div>

<table id="edit_e">
  <tr>
    <th>ІН кваліфікації</th>
    <th>Кваліфікаційний рівень</th>
    <th>Назва спецільності</th>
    <th>Код спеціальності</th>
    <th>Кваліфікація студента</th>
  </tr>
  <?php
  $table = 'qualification';
  $qualification = $wpdb_dek->get_results("SELECT * FROM $table");
  foreach($qualification as $result){
    ?>
    <tr class="<?php echo $table ?>" data-table="<?php echo $table ?>" data-id_name="id_qualification" data-id="<?php echo $result->id_qualification; ?>">
      <td class="n" data-td="id_qualification"><div class="v"><?php echo $result->id_qualification; ?></div></td>
      <td class="n" data-td="skill_level"><div class="v"><?php echo $result->skill_level; ?></div></td>
      <td class="n" data-td="name_of_specialty"><div class="v"><?php echo $result->name_of_specialty; ?></div></td>
      <td class="n" data-td="code_specialty"><div class="v"><?php echo $result->code_specialty; ?></div></td>
      <td class="n" data-td="qualification_of_student"><div class="v"><?php echo $result->qualification_of_student; ?></div></td>
      <td class="img_d" data-id_name="id_qualification" data-table="<?php echo $table; ?>" data-id="<?php echo $result->id_qualification; ?>"><img class="del_img" src="<?php echo get_template_directory_uri() ?>/images/delete.png"></td>
    </tr>
    <?php
  }
  ?>
</table>
