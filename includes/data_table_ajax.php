<?php
add_action("wp_ajax_edit_form", "f_edit_form");
add_action("wp_ajax_nopriv_edit_form", "f_edit_form");
function f_edit_form(){
  
  $td = $_POST['td'];
  $table = $_POST['table'];
  $id_name = $_POST['id_name'];
  $id = $_POST['id'];
  $text = $_POST['text'];
  echo $text;

  global $wpdb_dek;
  $wpdb_dek->update( $table, array($td => $text), array($id_name => $id), array("%s"), array("%d") );
  wp_die();
}


add_action("wp_ajax_add_all", "f_add_all");
add_action("wp_ajax_nopriv_add_all", "f_add_all");
function f_add_all(){

  $table = $_POST['table'];
  $b1 = $_POST['b1'];
  $b2 = $_POST['b2'];
  $b3 = $_POST['b3'];
  $b4 = $_POST['b4'];
  $b5 = $_POST['b5'];
  $b6 = $_POST['b6'];
  $b7 = $_POST['b7'];
  $b8 = $_POST['b8'];
  $b9 = $_POST['b9'];
  $b10 = $_POST['b10'];
  $b11 = $_POST['b11'];
  $b12 = $_POST['b12'];
  $b13 = $_POST['b13'];
  $b14 = $_POST['b14'];
  $b15 = $_POST['b15'];
  $b16 = $_POST['b16'];
  $b17 = $_POST['b17'];
  $b18 = $_POST['b18'];
  $b19 = $_POST['b19'];
  $b20 = $_POST['b20'];
  $b21 = $_POST['b21'];
  $b22 = $_POST['b22'];
  $b23 = $_POST['b23'];

  global $wpdb_dek;

  if($table == 'character_answer') {
    $wpdb_dek->insert($table, array("id_choa" => $b1, "name_of_answer" => $b2), array("%d", "%s"));

  $r = $wpdb_dek->get_results("SELECT * FROM $table");
  foreach ($r as $result) {
    ?>
    <tr class="<?php echo $table ?>" data-table="<?php echo $table ?>" data-id_name="id_choa" data-id="<?php echo $result->id_choa; ?>">
      <td class="n" data-td="id_choa"><div class="v"><?php echo $result->id_choa; ?></div></td>
      <td class="n" data-td="name_of_answer"><div class="v"><?php echo $result->name_of_answer; ?></div></td>
      <td class="img_d" data-id_name="id_choa" data-table="<?php echo $table; ?>" data-id="<?php echo $result->id_choa; ?>"><img class="del_img" src="<?php echo get_template_directory_uri() ?>/images/delete.png"></td>
    </tr>
    <?php
    }
  }

  if($table == 'commission_number') {
    $wpdb_dek->insert($table, array("id_commission" => $b1, "number_of_DEK" => $b2), array("%d", "%s"));

    $r = $wpdb_dek->get_results("SELECT * FROM $table");
    foreach($r as $result){
      ?>
      <tr class="<?php echo $table ?>" data-table="<?php echo $table ?>" data-id_name="id_commission" data-id="<?php echo $result->id_commission; ?>">
        <td class="n" data-td="id_commission"><div class="v"><?php echo $result->id_commission; ?></div></td>
        <td class="n" data-td="number_of_DEK"><div class="v"><?php echo $result->number_of_DEK; ?></div></td>
        <td class="img_d" data-id_name="id_commission" data-table="<?php echo $table; ?>" data-id="<?php echo $result->id_commission; ?>"><img class="del_img" src="<?php echo get_template_directory_uri() ?>/images/delete.png"></td>
      </tr>
      <?php
    }
  }

  if($table == 'meeting_head') {
    $wpdb_dek->insert($table, array("id_meeting_head" => $b1, "rate_number_of_protocol" => $b2, "type_of_protocol" => $b3, "id_meeting_present" => $b4), array("%d", "%s", "%s", "%d"));

    $r = $wpdb_dek->get_results("SELECT * FROM $table");
    foreach($r as $result){
      ?>
      <tr class="<?php echo $table ?>" data-table="<?php echo $table ?>" data-id_name="id_meeting_head" data-id="<?php echo $result->id_meeting_head; ?>">
        <td class="n" data-td="id_meeting_head"><div class="v"><?php echo $result->id_meeting_head; ?></div></td>
        <td class="n" data-td="rate_number_of_protocol"><div class="v"><?php echo $result->rate_number_of_protocol; ?></div></td>
        <td class="n" data-td="type_of_protocol"><div class="v"><?php echo $result->type_of_protocol; ?></div></td>
        <td class="n" data-td="id_meeting_present"><div class="v"><?php echo $result->id_meeting_present; ?></div></td>
        <td class="img_d" data-id_name="id_meeting_head" data-table="<?php echo $table; ?>" data-id="<?php echo $result->id_meeting_head; ?>"><img class="del_img" src="<?php echo get_template_directory_uri() ?>/images/delete.png"></td>
      </tr>
      <?php
    }
  }

  if($table == 'meeting_present') {

    if(!$b1){ $b1 = NULL; }
    if(!$b2){ $b2 = date('Y-m-d'); }
    if(!$b3){ $b3 = NULL; }
    if(!$b4){ $b4 = NULL; }
    if(!$b5){ $b5 = NULL; }
    if(!$b6){ $b6 = NULL; }
    if(!$b7){ $b7 = NULL; }
    if(!$b8){ $b8 = NULL; }
    if(!$b9){ $b9 = NULL; }
    if(!$b10){ $b10 = NULL; }
    if(!$b11){ $b11 = NULL; }
    if(!$b12){ $b12 = NULL; }

    $wpdb_dek->insert($table, array("id_meeting_present" => $b1, "date" => $b2, "start_time" => $b3, "end_time" => $b4, "id_chief" => $b5, "id_present_1" => $b6, "id_present_2" => $b7, "id_present_3" => $b8, "id_present_4" => $b9, "id_present_5" => $b10, "id_present_6" => $b11, "id_present_7" => $b12), array("%d", "%s", "%s", "%s", "%d", "%d", "%d", "%d", "%d", "%d", "%d", "%d"));

    $r = $wpdb_dek->get_results("SELECT * FROM $table");
    foreach($r as $result){
      ?>
      <tr class="<?php echo $table ?>" data-table="<?php echo $table ?>" data-id_name="id_meeting_present" data-id="<?php echo $result->id_meeting_present; ?>">
        <td class="n" data-td="id_meeting_present"><div class="v"><?php echo $result->id_meeting_present; ?></div></td>
        <td class="n" data-td="date"><div class="v"><?php echo $result->date; ?></div></td>
        <td class="n" data-td="start_time"><div class="v"><?php echo $result->start_time; ?></div></td>
        <td class="n" data-td="end_time"><div class="v"><?php echo $result->end_time; ?></div></td>
        <td class="n" data-td="id_chief"><div class="v"><?php echo $result->id_chief; ?></div></td>
        <td class="n" data-td="id_present_1"><div class="v"><?php echo $result->id_present_1; ?></div></td>
        <td class="n" data-td="id_present_2"><div class="v"><?php echo $result->id_present_2; ?></div></td>
        <td class="n" data-td="id_present_3"><div class="v"><?php echo $result->id_present_3; ?></div></td>
        <td class="n" data-td="id_present_4"><div class="v"><?php echo $result->id_present_4; ?></div></td>
        <td class="n" data-td="id_present_5"><div class="v"><?php echo $result->id_present_5; ?></div></td>
        <td class="n" data-td="id_present_6"><div class="v"><?php echo $result->id_present_6; ?></div></td>
        <td class="n" data-td="id_present_7"><div class="v"><?php echo $result->id_present_7; ?></div></td>
        <td class="img_d" data-id_name="id_meeting_present" data-table="<?php echo $table; ?>" data-id="<?php echo $result->id_meeting_present; ?>"><img class="del_img" src="<?php echo get_template_directory_uri() ?>/images/delete.png"></td>
      </tr>
      <?php
    }
  }

  if($table == 'members') {

    $wpdb_dek->insert($table, array("id_member" => $b1, "surname" => $b2, "name" => $b3, "middle_name" => $b4, "job" => $b5, "post" => $b6, "science_degree" => $b7, "academic_title" => $b8, "head" => $b9, "reviewer" => $b10, "DEK_member" => $b11, "consultant" => $b12), array("%d", "%s", "%s", "%s", "%s", "%s", "%s", "%s", "%d", "%d", "%d", "%d"));

    $r = $wpdb_dek->get_results("SELECT * FROM $table");
    foreach($r as $result){
      ?>
      <tr class="<?php echo $table ?>" data-table="<?php echo $table ?>" data-id_name="id_member" data-id="<?php echo $result->id_member; ?>">
        <td class="n" data-td="id_member"><div class="v"><?php echo $result->id_member; ?></div></td>
        <td class="n" data-td="surname"><div class="v"><?php echo $result->surname; ?></div></td>
        <td class="n" data-td="name"><div class="v"><?php echo $result->name; ?></div></td>
        <td class="n" data-td="middle_name"><div class="v"><?php echo $result->middle_name; ?></div></td>
        <td class="n" data-td="job"><div class="v"><?php echo $result->job; ?></div></td>
        <td class="n" data-td="post"><div class="v"><?php echo $result->post; ?></div></td>
        <td class="n" data-td="science_degree"><div class="v"><?php echo $result->science_degree; ?></div></td>
        <td class="n" data-td="academic_title"><div class="v"><?php echo $result->academic_title; ?></div></td>
        <td class="n" data-td="head"><div class="v"><?php echo $result->head; ?></div></td>
        <td class="n" data-td="reviewer"><div class="v"><?php echo $result->reviewer; ?></div></td>
        <td class="n" data-td="DEK_member"><div class="v"><?php echo $result->DEK_member; ?></div></td>
        <td class="n" data-td="consultant"><div class="v"><?php echo $result->consultant; ?></div></td>
        <td class="img_d" data-id_name="id_member" data-table="<?php echo $table; ?>" data-id="<?php echo $result->id_member; ?>"><img class="del_img" src="<?php echo get_template_directory_uri() ?>/images/delete.png"></td>
      </tr>
      <?php
    }
  }

  if($table == 'qualification') {

    $wpdb_dek->insert($table, array("id_qualification" => $b1, "skill_level" => $b2, "name_of_specialty" => $b3, "code_specialty" => $b4, "qualification_of_student" => $b5), array("%d", "%s", "%s", "%s", "%s"));

    $r = $wpdb_dek->get_results("SELECT * FROM $table");
    foreach($r as $result){
      ?>
      <tr class="<?php echo $table ?>" data-table="<?php echo $table ?>" data-id_name="id_qualification" data-id="<?php echo $result->id_qualification; ?>">
        <td class="n" data-td="id_qualification"><div class="v"><?php echo $result->id_qualification; ?></div></td>
        <td class="n" data-td="skill_level"><div class="v"><?php echo $result->skill_level; ?></div></td>
        <td class="n" data-td="name_of_specialty"><div class="v"><?php echo $result->name_of_specialty; ?></div></td>
        <td class="n" data-td="code_specialty"><div class="v"><?php echo $result->code_specialty; ?></div></td>
        <td class="n" data-td="qualification_of_student"><div class="v"><?php echo $result->qualification_of_student; ?></div></td>
        <td class="img_d" data-id_name="id_qualification" data-table="<?php echo $table; ?>" data-id="<?php echo $result->id_qualification; ?>"><img class="del_img" src="<?php echo get_template_directory_uri() ?>/images/delete.png"></td>
      </tr>
      <?php
    }
  }

  if($table == 'report_of_exam') {

    if(!$b2){ $b2 = NULL; }
    if(!$b3){ $b3 = NULL; }
    if(!$b4){ $b4 = NULL; }
    if(!$b5){ $b5 = NULL; }
    if(!$b6){ $b6 = NULL; }
    if(!$b7){ $b7 = NULL; }
    if(!$b8){ $b8 = NULL; }
    if(!$b9){ $b9 = NULL; }
    if(!$b10){ $b10 = NULL; }
    if(!$b11){ $b11 = NULL; }
    if(!$b12){ $b12 = NULL; }
    if(!$b13){ $b13 = NULL; }
    if(!$b14){ $b14 = NULL; }
    if(!$b15){ $b15 = NULL; }
    if(!$b16){ $b16 = NULL; }
    if(!$b17){ $b17 = NULL; }

    $wpdb_dek->insert($table, array("student_id" => $b1, "id_ticket" => $b2, "start_time" => $b3, "end_time" => $b4, "rating_score" => $b5, "national_rate" => $b6, "ECTS_rating" => $b7, "id_meeting_head" => $b8, "question_1" => $b9, "question_text_1" => $b10, "id_character_answer1" => $b11, "question_2" => $b12, "question_text_2" => $b13, "id_character_answer2" => $b14, "question_3" => $b15, "question_text_3" => $b16, "id_character_answer3" => $b17), array("%d", "%d", "%s", "%s", "%d", "%s", "%s", "%d", "%d", "%s", "%d", "%d", "%s", "%d", "%d", "%s", "%d"));

    $r = $wpdb_dek->get_results("SELECT * FROM $table");
    foreach($r as $result){
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
  }

  if($table == 'report_of_protect') {

    if(!$b2){ $b2 = NULL; }
    if(!$b3){ $b3 = NULL; }
    if(!$b4){ $b4 = NULL; }
    if(!$b5){ $b5 = NULL; }
    if(!$b6){ $b6 = NULL; }
    if(!$b7){ $b7 = NULL; }
    if(!$b8){ $b8 = NULL; }
    if(!$b9){ $b9 = NULL; }
    if(!$b10){ $b10 = NULL; }
    if(!$b11){ $b11 = NULL; }
    if(!$b12){ $b12 = NULL; }
    if(!$b13){ $b13 = NULL; }
    if(!$b14){ $b14 = NULL; }
    if(!$b15){ $b15 = NULL; }
    if(!$b16){ $b16 = NULL; }
    if(!$b17){ $b17 = NULL; }
    if(!$b18){ $b18 = NULL; }
    if(!$b19){ $b19 = NULL; }
    if(!$b20){ $b20 = NULL; }
    if(!$b21){ $b21 = NULL; }
    if(!$b22){ $b22 = NULL; }
    if(!$b23){ $b23 = NULL; }

    $wpdb_dek->insert($table, array("student_id_student" => $b1, "id_meeting_head" => $b2, "pages" => $b3, "slides" => $b4, "duration" => $b5, "rating_by_head" => $b6, "rating_by_reviewer" => $b7, "insignia" => $b8, "postgraduate" => $b9, "english" => $b10, "question_1" => $b11, "question_text_1" => $b12, "question_2" => $b13, "question_text_2" => $b14, "question_3" => $b15, "question_text_3" => $b16, "question_4" => $b17, "question_text_4" => $b18, "question_5" => $b19, "question_text_5" => $b20, "rating_vnz" => $b21, "rating_national" => $b22, "rating_ECTS" => $b23), array("%d", "%d", "%d", "%d", "%d", "%s", "%s", "%d", "%d", "%d", "%d", "%s", "%d", "%s", "%d", "%s", "%d", "%s", "%d", "%s", "%d", "%s", "%s"));

    $r = $wpdb_dek->get_results("SELECT * FROM $table");
    foreach($r as $result){
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
  }

  if($table == 'student') {

    if(!$b5){ $b5 = NULL; }
    if(!$b6){ $b6 = NULL; }
    if(!$b7){ $b7 = NULL; }
    if(!$b8){ $b8 = NULL; }
    if(!$b9){ $b9 = NULL; }
    if(!$b10){ $b10 = NULL; }
    if(!$b11){ $b11 = NULL; }
    if(!$b12){ $b12 = NULL; }
    if(!$b14){ $b14 = date('Y'); }

    $wpdb_dek->insert($table, array("id_student" => $b1, "surname" => $b2, "name" => $b3, "middle_name" => $b4, "topic" => $b5, "group" => $b6, "form_education" => $b7, "id_head" => $b8, "id_reviewer" => $b9, "id_consultant_oxranu_truda" => $b10, "id_consultant_economica" => $b11, "id_consultant_it_project" => $b12, "id_qualification" => $b13, "year" => $b14), array("%d", "%s", "%s", "%s", "%s", "%s", "%s", "%d", "%d", "%d", "%d", "%d", "%d", "%s"));

    $student = $wpdb_dek->get_results("SELECT * FROM $table");
    foreach($student as $result){
      ?>
      <tr class="<?php echo $table ?>" data-table="<?php echo $table ?>" data-id_name="id_student" data-id="<?php echo $result->id_student; ?>">
        <td class="n" data-td="id_student"><div class="v"><?php echo $result->id_student; ?></div></td>
        <td class="n" data-td="surname"><div class="v"><?php echo $result->surname; ?></div></td>
        <td class="n" data-td="name"><div class="v"><?php echo $result->name; ?></div></td>
        <td class="n" data-td="middle_name"><div class="v"><?php echo $result->middle_name; ?></div></td>
        <td class="n" data-td="topic"><div class="v"><?php echo $result->topic; ?></div></td>
        <td class="n" data-td="group"><div class="v"><?php echo $result->group; ?></div></td>
        <td class="n" data-td="form_education"><div class="v"><?php echo $result->form_education; ?></div></td>
        <td class="n" data-td="id_head"><div class="v"><?php echo $result->id_head; ?></div></td>
        <td class="n" data-td="id_reviewer"><div class="v"><?php echo $result->id_reviewer; ?></div></td>
        <td class="n" data-td="id_consultant_oxranu_truda"><div class="v"><?php echo $result->id_consultant_oxranu_truda; ?></div></td>
        <td class="n" data-td="id_consultant_economica"><div class="v"><?php echo $result->id_consultant_economica; ?></div></td>
        <td class="n" data-td="id_consultant_it_project"><div class="v"><?php echo $result->id_consultant_it_project; ?></div></td>
        <td class="n" data-td="id_qualification"><div class="v"><?php echo $result->id_qualification; ?></div></td>
        <td class="n" data-td="year"><div class="v"><?php echo $result->year; ?></div></td>
        <td class="img_d" data-id_name="id_student" data-table="<?php echo $table; ?>" data-id="<?php echo $result->id_student; ?>"><img class="del_img" src="<?php echo get_template_directory_uri() ?>/images/delete.png"></td>
      </tr>
      <?php
    }
  }

  if($table == 'valuation') {

    $wpdb_dek->insert($table, array("id_valuation" => $b1, "national_value" => $b2, "ECTS_value" => $b3, "min" => $b4, "max" => $b5), array("%d", "%s", "%s", "%d", "%d"));

    $valuation = $wpdb_dek->get_results("SELECT * FROM $table");
    foreach($valuation as $result){
      ?>
      <tr class="<?php echo $table ?>" data-table="<?php echo $table ?>" data-id_name="id_valuation" data-id="<?php echo $result->id_valuation; ?>">
        <td class="n" data-td="id_valuation"><div class="v"><?php echo $result->id_valuation; ?></div></td>
        <td class="n" data-td="national_value"><div class="v"><?php echo $result->national_value; ?></div></td>
        <td class="n" data-td="ECTS_value"><div class="v"><?php echo $result->ECTS_value; ?></div></td>
        <td class="n" data-td="min"><div class="v"><?php echo $result->min; ?></div></td>
        <td class="n" data-td="max"><div class="v"><?php echo $result->max; ?></div></td>
        <td class="img_d" data-id_name="id_valuation" data-table="<?php echo $table; ?>" data-id="<?php echo $result->id_valuation; ?>"><img class="del_img" src="<?php echo get_template_directory_uri() ?>/images/delete.png"></td>
      </tr>
      <?php
    }
  }

  wp_die();
}

add_action("wp_ajax_del_img2", "f_del_img2");
add_action("wp_ajax_nopriv_del_img2", "f_del_img2");
function f_del_img2()
{
  $id = $_POST['id'];
  $table = $_POST['table'];
  $id_name = $_POST['id_name'];

  global $wpdb_dek;
  $wpdb_dek->delete( $table, array( $id_name => $id ), array( '%d' ) );

  wp_die();
}
?>