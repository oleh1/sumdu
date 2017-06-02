<table data-name_t="report_of_exam" class="add_all report_of_exam">
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
  <tr>
    <td><input class="b1" type="text" placeholder="int(10)"></td>
    <td><input class="b2" type="text" placeholder="int(11) NULL"></td>
    <td><input class="b3" type="text" placeholder="time H:i:s NULL"></td>
    <td><input class="b4" type="text" placeholder="time H:i:s NULL"></td>
    <td><input class="b5" type="text" placeholder="tinyint(3) NULL"></td>
    <td><input class="b6" type="text" placeholder="varchar(45) NULL"></td>
    <td><input class="b7" type="text" placeholder="varchar(45) NULL"></td>
    <td><input class="b8" type="text" placeholder="int(10) NULL"></td>
    <td><input class="b9" type="text" placeholder="int(11) NULL"></td>
    <td><input class="b10" type="text" placeholder="varchar(225) NULL"></td>
    <td><input class="b11" type="text" placeholder="int(10) NULL"></td>
    <td><input class="b12" type="text" placeholder="int(11) NULL"></td>
    <td><input class="b13" type="text" placeholder="varchar(225) NULL"></td>
    <td><input class="b14" type="text" placeholder="int(10) NULL"></td>
    <td><input class="b15" type="text" placeholder="int(11) NULL"></td>
    <td><input class="b16" type="text" placeholder="varchar(225) NULL"></td>
    <td><input class="b17" type="text" placeholder="int(10) NULL"></td>
  </tr>
</table>

<div class="add_student2"><div class="a2">Додати</div><div class="bb2"><img src="<?php echo get_template_directory_uri(); ?>/images/load.gif"></div></div>

<table id="edit_e">
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
    <tr class="<?php echo $table ?>" data-table="<?php echo $table ?>" data-id_name="student_id" data-id="<?php echo $result->student_id; ?>">
      <td class="n" data-td="student_id"><div class="v"><?php echo $result->student_id; ?></div></td>
      <td class="n" data-td="id_ticket"><div class="v"><?php echo $result->id_ticket; ?></div></td>
      <td class="n" data-td="start_time"><div class="v"><?php echo $result->start_time; ?></div></td>
      <td class="n" data-td="end_time"><div class="v"><?php echo $result->end_time; ?></div></td>
      <td class="n" data-td="rating_score"><div class="v"><?php echo $result->rating_score; ?></div></td>
      <td class="n" data-td="national_rate"><div class="v"><?php echo $result->national_rate; ?></div></td>
      <td class="n" data-td="ECTS_rating"><div class="v"><?php echo $result->ECTS_rating; ?></div></td>
      <td class="n" data-td="id_meeting_head"><div class="v"><?php echo $result->id_meeting_head; ?></div></td>
      <td class="n" data-td="question_1"><div class="v"><?php echo $result->question_1; ?></div></td>
      <td class="n" data-td="question_text_1"><div class="v"><?php echo $result->question_text_1; ?></div></td>
      <td class="n" data-td="id_character_answer1"><div class="v"><?php echo $result->id_character_answer1; ?></div></td>
      <td class="n" data-td="question_2"><div class="v"><?php echo $result->question_2; ?></div></td>
      <td class="n" data-td="question_text_2"><div class="v"><?php echo $result->question_text_2; ?></div></td>
      <td class="n" data-td="id_character_answer2"><div class="v"><?php echo $result->id_character_answer2; ?></div></td>
      <td class="n" data-td="question_3"><div class="v"><?php echo $result->question_3; ?></div></td>
      <td class="n" data-td="question_text_3"><div class="v"><?php echo $result->question_text_3; ?></div></td>
      <td class="n" data-td="id_character_answer3"><div class="v"><?php echo $result->id_character_answer3; ?></div></td>
      <td class="img_d" data-id_name="student_id" data-table="<?php echo $table; ?>" data-id="<?php echo $result->student_id; ?>"><img class="del_img" src="<?php echo get_template_directory_uri() ?>/images/delete.png"></td>
    </tr>
    <?php
  }
  ?>
</table>
