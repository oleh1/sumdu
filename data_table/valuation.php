<table data-name_t="valuation" class="add_all valuation">
  <tr>
    <th>ІН оцінювання</th>
    <th>Національна оцінка</th>
    <th>Оцінка ECTS</th>
    <th>Мінімум</th>
    <th>Максимум</th>
  </tr>
  <tr>
    <td><input class="b1" type="text" placeholder="int(11) AUTO_INCREMENT"></td>
    <td><input class="b2" type="text" placeholder="varchar(45)"></td>
    <td><input class="b3" type="text" placeholder="varchar(45) NULL"></td>
    <td><input class="b4" type="text" placeholder="int(11) NULL"></td>
    <td><input class="b5" type="text" placeholder="int(11) NULL"></td>
  </tr>
</table>

<div class="add_student2"><div class="a2">Додати</div><div class="bb2"><img src="<?php echo get_template_directory_uri(); ?>/images/load.gif"></div></div>

<table id="edit_e">
  <tr>
    <th>ІН оцінювання</th>
    <th>Національна оцінка</th>
    <th>Оцінка ECTS</th>
    <th>Мінімум</th>
    <th>Максимум</th>
  </tr>
  <?php
  $table = 'valuation';
  $valuation = $wpdb_dek->get_results("SELECT * FROM $table");
  foreach($valuation as $result){
    ?>
    <tr class="<?php echo $table ?>" data-table="<?php echo $table ?>" data-id_name="id_valuation" data-id="<?php echo $result->id_valuation; ?>">
      <td class="n" data-td="id_valuation"><div class="v"><?php echo $result->id_valuation; ?></div></td>
      <td class="n" data-td="national_value"><div class="v"><?php echo $result->national_value; ?></div></td>
      <td class="n" data-td="ECTS_value"><div class="v"><?php echo $result->ECTS_value; ?></div></td>
      <td class="n" data-td="min"><div class="v"><?php echo $result->min; ?></div></td>
      <td class="n" data-td="max"><div class="v"><?php echo $result->max; ?></div></td>
      <td class="img_d" data-id_name="id_valuation" data-table="<?php echo $table; ?>" data-id="<?php echo $result->id_valuation; ?>"><img class="del_img" src="<?php echo get_template_directory_uri() ?>/images/delete.png"></td>
    </tr>
    <?php
  }
  ?>
</table>
