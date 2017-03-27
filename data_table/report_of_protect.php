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
  $table = 'report_of_protect';
  $report_of_protect = $wpdb_dek->get_results("SELECT * FROM $table");
  foreach($report_of_protect as $result){
    ?>
    <tr data-table="<?php echo $table ?>" data-id_name="student_id_student" data-id="<?php echo $result->student_id_student; ?>">
      <td data-td="student_id_student"><div class="v"><?php echo $result->student_id_student; ?></div></td>
      <td data-td="id_meeting_head"><div class="v"><?php echo $result->id_meeting_head; ?></div></td>
      <td data-td="pages"><div class="v"><?php echo $result->pages; ?></div></td>
      <td data-td="slides"><div class="v"><?php echo $result->slides; ?></div></td>
      <td data-td="duration"><div class="v"><?php echo $result->duration; ?></div></td>
      <td data-td="rating_by_head"><div class="v"><?php echo $result->rating_by_head; ?></div></td>
      <td data-td="rating_by_reviewer"><div class="v"><?php echo $result->rating_by_reviewer; ?></div></td>
      <td data-td="insignia"><div class="v"><?php echo $result->insignia; ?></div></td>
      <td data-td="postgraduate"><div class="v"><?php echo $result->postgraduate; ?></div></td>
      <td data-td="english"><div class="v"><?php echo $result->english; ?></div></td>
      <td data-td="rating_vnz"><div class="v"><?php echo $result->rating_vnz; ?></div></td>
      <td data-td="rating_national"><div class="v"><?php echo $result->rating_national; ?></div></td>
      <td data-td="rating_ECTS"><div class="v"><?php echo $result->rating_ECTS; ?></div></td>
      <td data-td="question_1"><div class="v"><?php echo $result->question_1; ?></div></td>
      <td data-td="question_text_1"><div class="v"><?php echo $result->question_text_1; ?></div></td>
      <td data-td="question_2"><div class="v"><?php echo $result->question_2; ?></div></td>
      <td data-td="question_text_2"><div class="v"><?php echo $result->question_text_2; ?></div></td>
      <td data-td="question_3"><div class="v"><?php echo $result->question_3; ?></div></td>
      <td data-td="question_text_3"><div class="v"><?php echo $result->question_text_3; ?></div></td>
      <td data-td="question_4"><div class="v"><?php echo $result->question_4; ?></div></td>
      <td data-td="question_text_4"><div class="v"><?php echo $result->question_text_4; ?></div></td>
      <td data-td="question_5"><div class="v"><?php echo $result->question_5; ?></div></td>
      <td data-td="question_text_5"><div class="v"><?php echo $result->question_text_5; ?></div></td>
    </tr>
    <?php
  }
  ?>
</table>
