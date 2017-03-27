<table>
  <tr>
    <th>ІН оцінювання</th>
    <th>Національна оцінка</th>
    <th>Оцінка ECTS</th>
    <th>Мінімум</th>
    <th>Максимум</th>
  </tr>
  <?php
  $table = 'valuation';
  $valuation = $wpdb_dek->get_results("SELECT * FROM $table");
  foreach($valuation as $result){
    ?>
    <tr data-table="<?php echo $table ?>" data-id_name="id_valuation" data-id="<?php echo $result->id_valuation; ?>">
      <td data-td="id_valuation"><div class="v"><?php echo $result->id_valuation; ?></div></td>
      <td data-td="national_value"><div class="v"><?php echo $result->national_value; ?></div></td>
      <td data-td="ECTS_value"><div class="v"><?php echo $result->ECTS_value; ?></div></td>
      <td data-td="min"><div class="v"><?php echo $result->min; ?></div></td>
      <td data-td="max"><div class="v"><?php echo $result->max; ?></div></td>
    </tr>
    <?php
  }
  ?>
</table>
