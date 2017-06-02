<table data-name_t="commission_number" class="add_all commission_number">
  <tr>
    <th>ІН номеру комісії</th>
    <th>Номер комісії</th>
  </tr>
  <tr>
    <td><input class="b1" type="text" placeholder="int(10) AUTO_INCREMENT"></td>
    <td><input class="b2" type="text" placeholder="varchar(45)"></td>
  </tr>
</table>

<div class="add_student2"><div class="a2">Додати</div><div class="bb2"><img src="<?php echo get_template_directory_uri(); ?>/images/load.gif"></div></div>

<table id="edit_e">
  <tr>
    <th>ІН номеру комісії</th>
    <th>Номер комісії</th>
  </tr>
  <?php
  $table = 'commission_number';
  $character_answer = $wpdb_dek->get_results("SELECT * FROM $table");
  foreach($character_answer as $result){
    ?>
    <tr class="<?php echo $table ?>" data-table="<?php echo $table ?>" data-id_name="id_commission" data-id="<?php echo $result->id_commission; ?>">
      <td class="n" data-td="id_commission"><div class="v"><?php echo $result->id_commission; ?></div></td>
      <td class="n" data-td="number_of_DEK"><div class="v"><?php echo $result->number_of_DEK; ?></div></td>
      <td class="img_d" data-id_name="id_commission" data-table="<?php echo $table; ?>" data-id="<?php echo $result->id_commission; ?>"><img class="del_img" src="<?php echo get_template_directory_uri() ?>/images/delete.png"></td>
    </tr>
    <?php
  }
  ?>
</table>
