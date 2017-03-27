<table>
  <tr>
    <th>ІН Викладача</th>
    <th>Прізвище</th>
    <th>Ім`я</th>
    <th>По батькові</th>
    <th>Робота</th>
    <th>Посада</th>
    <th>Науковий ступінь</th>
    <th>Академічне звання</th>
    <th>Керівник</th>
    <th>Рецензент</th>
    <th>Член комісії</th>
    <th>Консультант</th>
  </tr>
  <?php
  $table = 'members';
  $members = $wpdb_dek->get_results("SELECT * FROM $table");
  foreach($members as $result){
    ?>
    <tr data-table="<?php echo $table ?>" data-id_name="id_member" data-id="<?php echo $result->id_member; ?>">
      <td data-td="id_member"><div class="v"><?php echo $result->id_member; ?></div></td>
      <td data-td="surname"><div class="v"><?php echo $result->surname; ?></div></td>
      <td data-td="name"><div class="v"><?php echo $result->name; ?></div></td>
      <td data-td="middle_name"><div class="v"><?php echo $result->middle_name; ?></div></td>
      <td data-td="job"><div class="v"><?php echo $result->job; ?></div></td>
      <td data-td="post"><div class="v"><?php echo $result->post; ?></div></td>
      <td data-td="science_degree"><div class="v"><?php echo $result->science_degree; ?></div></td>
      <td data-td="academic_title"><div class="v"><?php echo $result->academic_title; ?></div></td>
      <td data-td="head"><div class="v"><?php echo $result->head; ?></div></td>
      <td data-td="reviewer"><div class="v"><?php echo $result->reviewer; ?></div></td>
      <td data-td="DEK_member"><div class="v"><?php echo $result->DEK_member; ?></div></td>
      <td data-td="consultant"><div class="v"><?php echo $result->consultant; ?></div></td>
    </tr>
    <?php
  }
  ?>
</table>
