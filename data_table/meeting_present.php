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
  $meeting_present = $wpdb_dek->get_results("SELECT * FROM meeting_present");
  foreach($meeting_present as $result){
    ?>
    <tr>
      <td><?php echo $result->id_meeting_present; ?></td>
      <td><?php echo $result->date; ?></td>
      <td><?php echo $result->start_time; ?></td>
      <td><?php echo $result->end_time; ?></td>
      <td><?php echo $result->id_chief; ?></td>
      <td><?php echo $result->id_present_1; ?></td>
      <td><?php echo $result->id_present_2; ?></td>
      <td><?php echo $result->id_present_3; ?></td>
      <td><?php echo $result->id_present_4; ?></td>
      <td><?php echo $result->id_present_5; ?></td>
      <td><?php echo $result->id_present_6; ?></td>
      <td><?php echo $result->id_present_7; ?></td>
    </tr>
    <?php
  }

//      echo '<pre>';
//      print_r($meeting_present);
//      echo '<pre>';
  ?>
</table>
