<table>
  <tr>
    <th>ІН номеру комісії</th>
    <th>Номер комісії</th>
  </tr>
  <?php
  $character_answer = $wpdb_dek->get_results("SELECT * FROM commission_number");
  foreach($character_answer as $result){
    ?>
    <tr>
      <td><?php echo $result->id_commission; ?></td>
      <td><?php echo $result->number_of_DEK; ?></td>
    </tr>
    <?php
  }

//  echo '<pre>';
//  print_r($character_answer);
//  echo '<pre>';
  ?>
</table>
