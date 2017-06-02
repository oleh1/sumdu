<table data-name_t="meeting_present" class="add_all meeting_present">
  <tr>
    <th>ІН засідання</th>
    <th>Дата</th>
    <th>Час початку</th>
    <th>Час закінчення</th>
    <th>ІН голови</th>
    <th>Присутній 1</th>
    <th>Присутній 2</th>
    <th>Присутній 3</th>
    <th>Присутній 4</th>
    <th>Присутній 5</th>
    <th>Присутній 6</th>
    <th>Присутній 7</th>
  </tr>
  <tr>
    <td><input class="b1" type="text" placeholder="int(10) AUTO_INCREMENT"></td>
    <td><input class="b2" type="text" placeholder="date Y-m-d"></td>
    <td><input class="b3" type="text" placeholder="time H:i:s NULL"></td>
    <td><input class="b4" type="text" placeholder="time H:i:s NULL"></td>
    <td><input class="b5" type="text" placeholder="int(10) NULL"></td>
    <td><input class="b6" type="text" placeholder="int(10) NULL"></td>
    <td><input class="b7" type="text" placeholder="int(10) NULL"></td>
    <td><input class="b8" type="text" placeholder="int(10) NULL"></td>
    <td><input class="b9" type="text" placeholder="int(10) NULL"></td>
    <td><input class="b10" type="text" placeholder="int(10) NULL"></td>
    <td><input class="b11" type="text" placeholder="int(10) NULL"></td>
    <td><input class="b12" type="text" placeholder="int(10) NULL"></td>
  </tr>
</table>

<div class="add_student2"><div class="a2">Додати</div><div class="bb2"><img src="<?php echo get_template_directory_uri(); ?>/images/load.gif"></div></div>

<table id="edit_e">
  <tr>
    <th>ІН засідання</th>
    <th>Дата</th>
    <th>Час початку</th>
    <th>Час закінчення</th>
    <th>ІН голови</th>
    <th>Присутній 1</th>
    <th>Присутній 2</th>
    <th>Присутній 3</th>
    <th>Присутній 4</th>
    <th>Присутній 5</th>
    <th>Присутній 6</th>
    <th>Присутній 7</th>
  </tr>
  <?php
  $table = 'meeting_present';
  $meeting_present = $wpdb_dek->get_results("SELECT * FROM $table");
  foreach($meeting_present as $result){
    ?>
    <tr class="<?php echo $table ?>" data-table="<?php echo $table ?>" data-id_name="id_meeting_present" data-id="<?php echo $result->id_meeting_present; ?>">
      <td class="n" data-td="id_meeting_present"><div class="v"><?php echo $result->id_meeting_present; ?></div></td>
      <td class="n" data-td="date"><div class="v"><?php echo $result->date; ?></div></td>
      <td class="n" data-td="start_time"><div class="v"><?php echo $result->start_time; ?></div></td>
      <td class="n" data-td="end_time"><div class="v"><?php echo $result->end_time; ?></div></td>
      <td class="n" data-td="id_chief"><div class="v"><?php echo $result->id_chief; ?></div></td>
      <td class="n" data-td="id_present_1"><div class="v"><?php echo $result->id_present_1; ?></div></td>
      <td class="n" data-td="id_present_2"><div class="v"><?php echo $result->id_present_2; ?></div></td>
      <td class="n" data-td="id_present_3"><div class="v"><?php echo $result->id_present_3; ?></div></td>
      <td class="n" data-td="id_present_4"><div class="v"><?php echo $result->id_present_4; ?></div></td>
      <td class="n" data-td="id_present_5"><div class="v"><?php echo $result->id_present_5; ?></div></td>
      <td class="n" data-td="id_present_6"><div class="v"><?php echo $result->id_present_6; ?></div></td>
      <td class="n" data-td="id_present_7"><div class="v"><?php echo $result->id_present_7; ?></div></td>
      <td class="img_d" data-id_name="id_meeting_present" data-table="<?php echo $table; ?>" data-id="<?php echo $result->id_meeting_present; ?>"><img class="del_img" src="<?php echo get_template_directory_uri() ?>/images/delete.png"></td>
    </tr>
    <?php
  }
  ?>
</table>
