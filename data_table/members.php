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
  $members = $wpdb_dek->get_results("SELECT * FROM members");
  foreach($members as $result){
    ?>
    <tr>
      <td><?php echo $result->id_member; ?></td>
      <td><?php echo $result->surname; ?></td>
      <td><?php echo $result->name; ?></td>
      <td><?php echo $result->middle_name; ?></td>
      <td><?php echo $result->job; ?></td>
      <td><?php echo $result->post; ?></td>
      <td><?php echo $result->science_degree; ?></td>
      <td><?php echo $result->academic_title; ?></td>
      <td><?php echo $result->head; ?></td>
      <td><?php echo $result->reviewer; ?></td>
      <td><?php echo $result->DEK_member; ?></td>
      <td><?php echo $result->consultant; ?></td>
    </tr>
    <?php
  }

//        echo '<pre>';
//        print_r($members);
//        echo '<pre>';
  ?>
</table>
