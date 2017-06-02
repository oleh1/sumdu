<table data-name_t="character_answer" class="add_all character_answer">
  <tr>
    <th>ІН хар-ки відповіді</th>
    <th>Назва хар-ки відповіді</th>
  </tr>
  <tr>
    <td><input class="b1" type="text" placeholder="int(10) AUTO_INCREMENT"></td>
    <td><input class="b2" type="text" placeholder="varchar(25)"></td>
  </tr>
</table>

<div class="add_student2"><div class="a2">Додати</div><div class="bb2"><img src="<?php echo get_template_directory_uri(); ?>/images/load.gif"></div></div>

<table id="edit_e">
  <tr>
    <th>ІН хар-ки відповіді</th>
    <th>Назва хар-ки відповіді</th>
  </tr>
  <?php
  $table = 'character_answer';
  $character_answer = $wpdb_dek->get_results("SELECT * FROM $table");
  foreach ($character_answer as $result) {
    ?>
    <tr class="<?php echo $table ?>" data-table="<?php echo $table ?>" data-id_name="id_choa" data-id="<?php echo $result->id_choa; ?>">
      <td class="n" data-td="id_choa"><div class="v"><?php echo $result->id_choa; ?></div></td>
      <td class="n" data-td="name_of_answer"><div class="v"><?php echo $result->name_of_answer; ?></div></td>
      <td class="img_d" data-id_name="id_choa" data-table="<?php echo $table; ?>" data-id="<?php echo $result->id_choa; ?>"><img class="del_img" src="<?php echo get_template_directory_uri() ?>/images/delete.png"></td>
    </tr>
    <?php
  }
  ?>
</table>