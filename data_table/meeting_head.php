<table data-name_t="meeting_head" class="add_all meeting_head">
  <tr>
    <th>ІН номерів протоколів</th>
    <th>Справжній номер протоколу</th>
    <th>Тип протоколу</th>
    <th>ІН номеру засідання</th>
  </tr>
  <tr>
    <td><input class="b1" type="text" placeholder="int(10) AUTO_INCREMENT"></td>
    <td><input class="b2" type="text" placeholder="varchar(25)"></td>
    <td><input class="b3" type="text" placeholder="varchar(45) NULL"></td>
    <td><input class="b4" type="text" placeholder="int(10) NULL"></td>
  </tr>
</table>

<div class="add_student2"><div class="a2">Додати</div><div class="bb2"><img src="<?php echo get_template_directory_uri(); ?>/images/load.gif"></div></div>

<table id="edit_e">
  <tr>
    <th>ІН номерів протоколів</th>
    <th>Справжній номер протоколу</th>
    <th>Тип протоколу</th>
    <th>ІН номеру засідання</th>
  </tr>
  <?php
  $table = 'meeting_head';
  $r = $wpdb_dek->get_results("SELECT * FROM $table");
  foreach($r as $result){
    ?>
    <tr class="<?php echo $table ?>" data-table="<?php echo $table ?>" data-id_name="id_meeting_head" data-id="<?php echo $result->id_meeting_head; ?>">
      <td class="n" data-td="id_meeting_head"><div class="v"><?php echo $result->id_meeting_head; ?></div></td>
      <td class="n" data-td="rate_number_of_protocol"><div class="v"><?php echo $result->rate_number_of_protocol; ?></div></td>
      <td class="n" data-td="type_of_protocol"><div class="v"><?php echo $result->type_of_protocol; ?></div></td>
      <td class="n" data-td="id_meeting_present"><div class="v"><?php echo $result->id_meeting_present; ?></div></td>
      <td class="img_d" data-id_name="id_meeting_head" data-table="<?php echo $table; ?>" data-id="<?php echo $result->id_meeting_head; ?>"><img class="del_img" src="<?php echo get_template_directory_uri() ?>/images/delete.png"></td>
    </tr>
    <?php
  }
  ?>
</table>
