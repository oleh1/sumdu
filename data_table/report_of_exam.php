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
  $report_of_exam = $wpdb_dek->get_results("SELECT * FROM report_of_exam");
  foreach($report_of_exam as $result){
    ?>
    <tr>
      <td><?php echo $result->student_id; ?></td>
      <td><?php echo $result->id_ticket; ?></td>
      <td><?php echo $result->start_time; ?></td>
      <td><?php echo $result->end_time; ?></td>
      <td><?php echo $result->rating_score; ?></td>
      <td><?php echo $result->national_rate; ?></td>
      <td><?php echo $result->ECTS_rating; ?></td>
      <td><?php echo $result->id_meeting_head; ?></td>
      <td><?php echo $result->question_1; ?></td>
      <td><?php echo $result->question_text_1; ?></td>
      <td><?php echo $result->id_character_answer1; ?></td>
      <td><?php echo $result->question_2; ?></td>
      <td><?php echo $result->question_text_2; ?></td>
      <td><?php echo $result->id_character_answer2; ?></td>
      <td><?php echo $result->question_3; ?></td>
      <td><?php echo $result->question_text_3; ?></td>
      <td><?php echo $result->id_character_answer3; ?></td>
    </tr>
    <?php
  }

//            echo '<pre>';
//            print_r($report_of_exam);
//            echo '<pre>';
  ?>
</table>
