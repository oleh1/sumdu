<table>
  <tr>
    <th>ІН кваліфікації</th>
    <th>Кваліфікаційний рівень</th>
    <th>Назва спецільності</th>
    <th>Код спеціальності</th>
    <th>Кваліфікація студента</th>
  </tr>
  <?php
  $table = 'qualification';
  $qualification = $wpdb_dek->get_results("SELECT * FROM $table");
  foreach($qualification as $result){
    ?>
    <tr data-table="<?php echo $table ?>" data-id_name="id_qualification" data-id="<?php echo $result->id_qualification; ?>">
      <td data-td="id_qualification"><div class="v"><?php echo $result->id_qualification; ?></div></td>
      <td data-td="skill_level"><div class="v"><?php echo $result->skill_level; ?></div></td>
      <td data-td="name_of_specialty"><div class="v"><?php echo $result->name_of_specialty; ?></div></td>
      <td data-td="code_specialty"><div class="v"><?php echo $result->code_specialty; ?></div></td>
      <td data-td="qualification_of_student"><div class="v"><?php echo $result->qualification_of_student; ?></div></td>
    </tr>
    <?php
  }
  ?>
</table>
