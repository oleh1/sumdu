<table>
  <tr>
    <th>ІН номеру комісії</th>
    <th>Номер комісії</th>
  </tr>
  <?php
  $table = 'commission_number';
  $character_answer = $wpdb_dek->get_results("SELECT * FROM $table");
  foreach($character_answer as $result){
    ?>
    <tr data-table="<?php echo $table ?>" data-id_name="id_commission" data-id="<?php echo $result->id_commission; ?>">
      <td data-td="id_commission"><div class="v"><?php echo $result->id_commission; ?></div></td>
      <td data-td="number_of_DEK"><div class="v"><?php echo $result->number_of_DEK; ?></div></td>
    </tr>
    <?php
  }
  ?>
</table>
