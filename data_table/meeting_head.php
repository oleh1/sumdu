<table>
  <tr>
    <th>ІН номерів протоколів</th>
    <th>Справжній номер протоколу</th>
    <th>Тип протоколу</th>
    <th>ІН номеру засідання</th>
  </tr>
  <?php
  $table = 'meeting_head';
  $meeting_head = $wpdb_dek->get_results("SELECT * FROM $table");
  foreach($meeting_head as $result){
    ?>
    <tr data-table="<?php echo $table ?>" data-id_name="id_meeting_head" data-id="<?php echo $result->id_meeting_head; ?>">
      <td data-td="id_meeting_head"><div class="v"><?php echo $result->id_meeting_head; ?></div></td>
      <td data-td="rate_number_of_protocol"><div class="v"><?php echo $result->rate_number_of_protocol; ?></div></td>
      <td data-td="type_of_protocol"><div class="v"><?php echo $result->type_of_protocol; ?></div></td>
      <td data-td="id_meeting_present"><div class="v"><?php echo $result->id_meeting_present; ?></div></td>
    </tr>
    <?php
  }
  ?>
</table>
