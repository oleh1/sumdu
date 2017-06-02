<table data-name_t="members" class="add_all members">
  <tr>
    <th>ІН Викладача</th>
    <th>Прізвище</th>
    <th>Ім`я</th>
    <th>По батькові</th>
    <th>Робота</th>
    <th>Посада</th>
    <th>Науковий ступінь</th>
    <th>Академічне звання</th>
    <th>Керівник</th>
    <th>Рецензент</th>
    <th>Член комісії</th>
    <th>Консультант</th>
  </tr>
  <tr>
    <td><input class="b1" type="text" placeholder="int(10) AUTO_INCREMENT"></td>
    <td><input class="b2" type="text" placeholder="varchar(25)"></td>
    <td><input class="b3" type="text" placeholder="varchar(25)"></td>
    <td><input class="b4" type="text" placeholder="varchar(25)"></td>
    <td><input class="b5" type="text" placeholder="varchar(255) NULL"></td>
    <td><input class="b6" type="text" placeholder="varchar(50) NULL"></td>
    <td><input class="b7" type="text" placeholder="varchar(50) NULL"></td>
    <td><input class="b8" type="text" placeholder="varchar(50) NULL"></td>
    <td><input class="b9" type="text" placeholder="tinyint(1) NULL"></td>
    <td><input class="b10" type="text" placeholder="tinyint(1) NULL"></td>
    <td><input class="b11" type="text" placeholder="tinyint(1) NULL"></td>
    <td><input class="b12" type="text" placeholder="tinyint(1) NULL"></td>
  </tr>
</table>

<div class="add_student2"><div class="a2">Додати</div><div class="bb2"><img src="<?php echo get_template_directory_uri(); ?>/images/load.gif"></div></div>

<table id="edit_e">
  <tr>
    <th>ІН Викладача</th>
    <th>Прізвище</th>
    <th>Ім`я</th>
    <th>По батькові</th>
    <th>Робота</th>
    <th>Посада</th>
    <th>Науковий ступінь</th>
    <th>Академічне звання</th>
    <th>Керівник</th>
    <th>Рецензент</th>
    <th>Член комісії</th>
    <th>Консультант</th>
  </tr>
  <?php
  $table = 'members';
  $members = $wpdb_dek->get_results("SELECT * FROM $table");
  foreach($members as $result){
    ?>
    <tr class="<?php echo $table ?>" data-table="<?php echo $table ?>" data-id_name="id_member" data-id="<?php echo $result->id_member; ?>">
      <td class="n" data-td="id_member"><div class="v"><?php echo $result->id_member; ?></div></td>
      <td class="n" data-td="surname"><div class="v"><?php echo $result->surname; ?></div></td>
      <td class="n" data-td="name"><div class="v"><?php echo $result->name; ?></div></td>
      <td class="n" data-td="middle_name"><div class="v"><?php echo $result->middle_name; ?></div></td>
      <td class="n" data-td="job"><div class="v"><?php echo $result->job; ?></div></td>
      <td class="n" data-td="post"><div class="v"><?php echo $result->post; ?></div></td>
      <td class="n" data-td="science_degree"><div class="v"><?php echo $result->science_degree; ?></div></td>
      <td class="n" data-td="academic_title"><div class="v"><?php echo $result->academic_title; ?></div></td>
      <td class="n" data-td="head"><div class="v"><?php echo $result->head; ?></div></td>
      <td class="n" data-td="reviewer"><div class="v"><?php echo $result->reviewer; ?></div></td>
      <td class="n" data-td="DEK_member"><div class="v"><?php echo $result->DEK_member; ?></div></td>
      <td class="n" data-td="consultant"><div class="v"><?php echo $result->consultant; ?></div></td>
      <td class="img_d" data-id_name="id_member" data-table="<?php echo $table; ?>" data-id="<?php echo $result->id_member; ?>"><img class="del_img" src="<?php echo get_template_directory_uri() ?>/images/delete.png"></td>
    </tr>
    <?php
  }
  ?>
</table>
