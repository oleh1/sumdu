<table>
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
    <tr data-table="<?php echo $table ?>" data-id_name="id_meeting_present" data-id="<?php echo $result->id_meeting_present; ?>">
      <td data-td="id_meeting_present"><div class="v"><?php echo $result->id_meeting_present; ?></td>
      <td data-td="date"><div class="v"><?php echo $result->date; ?></td>
      <td data-td="start_time"><div class="v"><?php echo $result->start_time; ?></div></td>
      <td data-td="end_time"><div class="v"><?php echo $result->end_time; ?></div></td>
      <td data-td="id_chief"><div class="v"><?php echo $result->id_chief; ?></div></td>
      <td data-td="id_present_1"><div class="v"><?php echo $result->id_present_1; ?></div></td>
      <td data-td="id_present_2"><div class="v"><?php echo $result->id_present_2; ?></div></td>
      <td data-td="id_present_3"><div class="v"><?php echo $result->id_present_3; ?></div></td>
      <td data-td="id_present_4"><div class="v"><?php echo $result->id_present_4; ?></div></td>
      <td data-td="id_present_5"><div class="v"><?php echo $result->id_present_5; ?></div></td>
      <td data-td="id_present_6"><div class="v"><?php echo $result->id_present_6; ?></div></td>
      <td data-td="id_present_7"><div class="v"><?php echo $result->id_present_7; ?></div></td>
    </tr>
    <?php
  }
  ?>
</table>
