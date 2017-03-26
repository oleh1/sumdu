<table>
  <tr>
    <th>ІН хар-ки відповіді</th>
    <th>Назва хар-ки відповіді</th>
  </tr>
  <?php
  $table = 'character_answer';
  $character_answer = $wpdb_dek->get_results("SELECT * FROM $table");
  foreach ($character_answer as $result) {
    ?>
    <tr data-table="<?php echo $table ?>" data-id_name="id_choa" data-id="<?php echo $result->id_choa; ?>">
      <td data-td="id_choa"><div class="v"><?php echo $result->id_choa; ?></div></td>
      <td data-td="name_of_answer"><div class="v"><?php echo $result->name_of_answer; ?></div></td>
    </tr>
    <?php
  }
  ?>
</table>
