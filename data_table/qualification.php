<table>
  <tr>
    <th>ІН кваліфікації</th>
    <th>Кваліфікаційний рівень</th>
    <th>Назва спецільності</th>
    <th>Код спеціальності</th>
    <th>Кваліфікація студента</th>
  </tr>
  <?php
  $qualification = $wpdb_dek->get_results("SELECT * FROM qualification");
  foreach($qualification as $result){
    ?>
    <tr>
      <td><?php echo $result->id_qualification; ?></td>
      <td><?php echo $result->skill_level; ?></td>
      <td><?php echo $result->name_of_specialty; ?></td>
      <td><?php echo $result->code_specialty; ?></td>
      <td><?php echo $result->qualification_of_student; ?></td>
    </tr>
    <?php
  }

//          echo '<pre>';
//          print_r($qualification);
//          echo '<pre>';
  ?>
</table>
