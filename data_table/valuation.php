<table>
  <tr>
    <th>ІН оцінювання</th>
    <th>Національна оцінка</th>
    <th>Оцінка ECTS</th>
    <th>Мінімум</th>
    <th>Максимум</th>
  </tr>
  <?php
  $valuation = $wpdb_dek->get_results("SELECT * FROM valuation");
  foreach($valuation as $result){
    ?>
    <tr>
      <td><?php echo $result->id_valuation; ?></td>
      <td><?php echo $result->national_value; ?></td>
      <td><?php echo $result->ECTS_value; ?></td>
      <td><?php echo $result->min; ?></td>
      <td><?php echo $result->max; ?></td>
    </tr>
    <?php
  }

//                  echo '<pre>';
//                  print_r($valuation);
//                  echo '<pre>';
  ?>
</table>
