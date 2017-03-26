<table>
  <tr>
    <th>ІН студента</th>
    <th>ІН протоколу</th>
    <th>Кіл-сть сторінок</th>
    <th>Кіл-сть слайдів</th>
    <th>Тривалість захисту у хв</th>
    <th>Оцінка керівника</th>
    <th>Оцінка рецензента</th>
    <th>Відзнакою</th>
    <th>Аспірантура</th>
    <th>Англійскою</th>
    <th>Рейтингова оцінка</th>
    <th>Національна оцінка</th>
    <th>Оцінка ECTS</th>
    <th>Хто поставив питання 1</th>
    <th>Текст питання 1</th>
    <th>Хто поставив питання 2</th>
    <th>Текст питання 2</th>
    <th>Хто поставив питання 3</th>
    <th>Текст питання 3</th>
    <th>Хто поставив питання 4</th>
    <th>Текст питання 4</th>
    <th>Хто поставив питання 5</th>
    <th>Текст питання 5</th>
  </tr>
  <?php
  $report_of_protect = $wpdb_dek->get_results("SELECT * FROM report_of_protect");
  foreach($report_of_protect as $result){
    ?>
    <tr>
      <td><?php echo $result->student_id_student; ?></td>
      <td><?php echo $result->id_meeting_head; ?></td>
      <td><?php echo $result->pages; ?></td>
      <td><?php echo $result->slides; ?></td>
      <td><?php echo $result->duration; ?></td>
      <td><?php echo $result->rating_by_head; ?></td>
      <td><?php echo $result->rating_by_reviewer; ?></td>
      <td><?php echo $result->insignia; ?></td>
      <td><?php echo $result->postgraduate; ?></td>
      <td><?php echo $result->english; ?></td>
      <td><?php echo $result->rating_vnz; ?></td>
      <td><?php echo $result->rating_national; ?></td>
      <td><?php echo $result->rating_ECTS; ?></td>
      <td><?php echo $result->question_1; ?></td>
      <td><?php echo $result->question_text_1; ?></td>
      <td><?php echo $result->question_2; ?></td>
      <td><?php echo $result->question_text_2; ?></td>
      <td><?php echo $result->question_3; ?></td>
      <td><?php echo $result->question_text_3; ?></td>
      <td><?php echo $result->question_4; ?></td>
      <td><?php echo $result->question_text_4; ?></td>
      <td><?php echo $result->question_5; ?></td>
      <td><?php echo $result->question_text_5; ?></td>
    </tr>
    <?php
  }

//              echo '<pre>';
//              print_r($report_of_protect);
//              echo '<pre>';
  ?>
</table>
