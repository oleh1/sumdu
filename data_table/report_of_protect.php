<table data-name_t="report_of_protect" class="add_all report_of_protect">
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
  <tr>
    <td><input class="b1" type="text" placeholder="int(10)"></td>
    <td><input class="b2" type="text" placeholder="int(10) NULL"></td>
    <td><input class="b3" type="text" placeholder="int(10) NULL"></td>
    <td><input class="b4" type="text" placeholder="int(10) NULL"></td>
    <td><input class="b5" type="text" placeholder="int(10) NULL"></td>
    <td><input class="b6" type="text" placeholder="varchar(25) NULL"></td>
    <td><input class="b7" type="text" placeholder="varchar(25) NULL"></td>
    <td><input class="b8" type="text" placeholder="tinyint(1) NULL"></td>
    <td><input class="b9" type="text" placeholder="tinyint(1) NULL"></td>
    <td><input class="b10" type="text" placeholder="tinyint(1) NULL"></td>
    <td><input class="b11" type="text" placeholder="int(10) NULL"></td>
    <td><input class="b12" type="text" placeholder="varchar(255) NULL"></td>
    <td><input class="b13" type="text" placeholder="int(10) NULL"></td>
    <td><input class="b14" type="text" placeholder="varchar(255) NULL"></td>
    <td><input class="b15" type="text" placeholder="int(10) NULL"></td>
    <td><input class="b16" type="text" placeholder="varchar(255) NULL"></td>
    <td><input class="b17" type="text" placeholder="int(10) NULL"></td>
    <td><input class="b18" type="text" placeholder="varchar(255) NULL"></td>
    <td><input class="b19" type="text" placeholder="int(10) NULL"></td>
    <td><input class="b20" type="text" placeholder="varchar(255) NULL"></td>
    <td><input class="b21" type="text" placeholder="int(10) NULL"></td>
    <td><input class="b22" type="text" placeholder="varchar(25) NULL"></td>
    <td><input class="b23" type="text" placeholder="varchar(1) NULL"></td>
  </tr>
</table>

<div class="add_student2"><div class="a2">Додати</div><div class="bb2"><img src="<?php echo get_template_directory_uri(); ?>/images/load.gif"></div></div>

<table id="edit_e">
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
    <tr class="<?php echo $table ?>" data-table="<?php echo $table ?>" data-id_name="student_id_student" data-id="<?php echo $result->student_id_student; ?>">
      <td class="n" data-td="student_id_student"><div class="v"><?php echo $result->student_id_student; ?></div></td>
      <td class="n" data-td="id_meeting_head"><div class="v"><?php echo $result->id_meeting_head; ?></div></td>
      <td class="n" data-td="pages"><div class="v"><?php echo $result->pages; ?></div></td>
      <td class="n" data-td="slides"><div class="v"><?php echo $result->slides; ?></div></td>
      <td class="n" data-td="duration"><div class="v"><?php echo $result->duration; ?></div></td>
      <td class="n" data-td="rating_by_head"><div class="v"><?php echo $result->rating_by_head; ?></div></td>
      <td class="n" data-td="rating_by_reviewer"><div class="v"><?php echo $result->rating_by_reviewer; ?></div></td>
      <td class="n" data-td="insignia"><div class="v"><?php echo $result->insignia; ?></div></td>
      <td class="n" data-td="postgraduate"><div class="v"><?php echo $result->postgraduate; ?></div></td>
      <td class="n" data-td="english"><div class="v"><?php echo $result->english; ?></div></td>
      <td class="n" data-td="rating_vnz"><div class="v"><?php echo $result->rating_vnz; ?></div></td>
      <td class="n" data-td="rating_national"><div class="v"><?php echo $result->rating_national; ?></div></td>
      <td class="n" data-td="rating_ECTS"><div class="v"><?php echo $result->rating_ECTS; ?></div></td>
      <td class="n" data-td="question_1"><div class="v"><?php echo $result->question_1; ?></div></td>
      <td class="n" data-td="question_text_1"><div class="v"><?php echo $result->question_text_1; ?></div></td>
      <td class="n" data-td="question_2"><div class="v"><?php echo $result->question_2; ?></div></td>
      <td class="n" data-td="question_text_2"><div class="v"><?php echo $result->question_text_2; ?></div></td>
      <td class="n" data-td="question_3"><div class="v"><?php echo $result->question_3; ?></div></td>
      <td class="n" data-td="question_text_3"><div class="v"><?php echo $result->question_text_3; ?></div></td>
      <td class="n" data-td="question_4"><div class="v"><?php echo $result->question_4; ?></div></td>
      <td class="n" data-td="question_text_4"><div class="v"><?php echo $result->question_text_4; ?></div></td>
      <td class="n" data-td="question_5"><div class="v"><?php echo $result->question_5; ?></div></td>
      <td class="n" data-td="question_text_5"><div class="v"><?php echo $result->question_text_5; ?></div></td>
      <td class="img_d" data-id_name="student_id_student" data-table="<?php echo $table; ?>" data-id="<?php echo $result->student_id_student; ?>"><img class="del_img" src="<?php echo get_template_directory_uri() ?>/images/delete.png"></td>
    </tr>
    <?php
  }
  ?>
</table>
