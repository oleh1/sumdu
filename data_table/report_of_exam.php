<table>
  <tr>
    <th>ІН студента</th>
    <th>Час початку екзамену</th>
    <th>Час закінчення екзамену</th>
    <th>Номер білету</th>
    <th>Рейтингова оцінка</th>
    <th>Національна оцінка</th>
    <th>Оцінка ECTS</th>
    <th>ІН номеру протоколу</th>
    <th>Хто задав питання 1</th>
    <th>Текст питання 1</th>
    <th>Хар-ка відповіді на питання 1</th>
    <th>Хто задав питання 2</th>
    <th>Текст питання 2</th>
    <th>Хар-ка відповіді на питання 2</th>
    <th>Хто задав питання 3</th>
    <th>Текст питання 3</th>
    <th>Хар-ка відповіді на питання 3</th>
  </tr>
  <?php
  $table = 'report_of_exam';
  $report_of_exam = $wpdb_dek->get_results("SELECT * FROM $table");
  foreach($report_of_exam as $result){
    ?>
    <tr data-table="<?php echo $table ?>" data-id_name="student_id" data-id="<?php echo $result->student_id; ?>">
      <td data-td="student_id"><div class="v"><?php echo $result->student_id; ?></div></td>
      <td data-td="id_ticket"><div class="v"><?php echo $result->id_ticket; ?></div></td>
      <td data-td="start_time"><div class="v"><?php echo $result->start_time; ?></div></td>
      <td data-td="end_time"><div class="v"><?php echo $result->end_time; ?></div></td>
      <td data-td="rating_score"><div class="v"><?php echo $result->rating_score; ?></div></td>
      <td data-td="national_rate"><div class="v"><?php echo $result->national_rate; ?></div></td>
      <td data-td="ECTS_rating"><div class="v"><?php echo $result->ECTS_rating; ?></div></td>
      <td data-td="id_meeting_head"><div class="v"><?php echo $result->id_meeting_head; ?></div></td>
      <td data-td="question_1"><div class="v"><?php echo $result->question_1; ?></div></td>
      <td data-td="question_text_1"><div class="v"><?php echo $result->question_text_1; ?></div></td>
      <td data-td="id_character_answer1"><div class="v"><?php echo $result->id_character_answer1; ?></div></td>
      <td data-td="question_2"><div class="v"><?php echo $result->question_2; ?></div></td>
      <td data-td="question_text_2"><div class="v"><?php echo $result->question_text_2; ?></div></td>
      <td data-td="id_character_answer2"><div class="v"><?php echo $result->id_character_answer2; ?></div></td>
      <td data-td="question_3"><div class="v"><?php echo $result->question_3; ?></div></td>
      <td data-td="question_text_3"><div class="v"><?php echo $result->question_text_3; ?></div></td>
      <td data-td="id_character_answer3"><div class="v"><?php echo $result->id_character_answer3; ?></div></td>
    </tr>
    <?php
  }
  ?>
</table>
