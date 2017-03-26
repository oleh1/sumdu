<table>
  <tr>
    <th>ІН номерів протоколів</th>
    <th>Справжній номер протоколу</th>
    <th>Тип протоколу</th>
    <th>ІН номеру засідання</th>
  </tr>
  <?php
  $meeting_head = $wpdb_dek->get_results("SELECT * FROM meeting_head");
  foreach($meeting_head as $result){
    ?>
    <tr>
      <td><?php echo $result->id_meeting_head; ?></td>
      <td><?php echo $result->rate_number_of_protocol; ?></td>
      <td><?php echo $result->type_of_protocol; ?></td>
      <td><?php echo $result->id_meeting_present; ?></td>
    </tr>
    <?php
  }

//    echo '<pre>';
//    print_r($meeting_head);
//    echo '<pre>';
  ?>
</table>
