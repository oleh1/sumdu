<?php
global $wpdb_dek;
$data_teacher = $wpdb_dek->get_results("SELECT id_member, surname, `name`, middle_name FROM members");
$data_student = $wpdb_dek->get_results("SELECT id_student, surname, `name`, middle_name FROM student");
?>

<table class="c_work_table">
  <tr>
    <th>Номер теми</th>
    <th>ОКР</th>
    <th>П.І.Б</th>
    <th>Група</th>
    <th>П.І.Б керівника диплома</th>
    <th>П.І.Б керівника диплома за наказом МОН</th>
    <th>Напрям кваліфікаційної роботи</th>
    <th>Тема англійською мовою</th>
    <th>П.І.Б рекомендуємого рецензента</th>
  </tr>

  <tr>
    <td><input class="a1" style="width: 38px;"></td>
    <td>
      <select class="a2">
        <option value="1">Бакалавр</option>
        <option value="3">Магістр</option>
      </select>
    </td>
<!--    <td><input class="a3" style="width: 300px;"></td>-->
<!--    <td><input class="a4" style="width: 100px;"></td>-->
    <td>
      <select class="a3"></select>
    </td>
    <td>
      <select class="a4"></select>
    </td>
    <td>
      <select class="a5">
        <?php
        foreach ($data_teacher as $r){
          ?>
          <option value="<?php echo $r->id_member; ?>"><?php echo $r->surname.' '.$r->name.' '.$r->middle_name; ?></option>
          <?php
        }
        ?>
      </select>
    </td>
    <td>
      <select class="a6">
        <?php
        foreach ($data_teacher as $r){
          ?>
          <option value="<?php echo $r->id_member; ?>"><?php echo $r->surname.' '.$r->name.' '.$r->middle_name; ?></option>
          <?php
        }
        ?>
      </select>
    </td>
    <td><textarea class="a7"></textarea></td>
    <td><textarea class="a8"></textarea></td>
    <td>
      <select class="a9">
        <?php
        foreach ($data_teacher as $r){
          ?>
          <option value="<?php echo $r->id_member; ?>"><?php echo $r->surname.' '.$r->name.' '.$r->middle_name; ?></option>
          <?php
        }
        ?>
      </select>
    </td>
  </tr>
</table>

<div class="add_student"><div class="a">Додати</div><div class="bb"><img src="<?php echo get_template_directory_uri(); ?>/images/load.gif"></div></div>

<div id="work_table">
  
  <div class="edit_t_b">
    <div class="edit_t">Режим редагування</div>
    <div class="can-toggle can-toggle--size-small">
      <input id="b" type="checkbox">
      <label for="b" class="off_on">
        <div class="can-toggle__switch" data-checked="Вкл" data-unchecked="Викл"></div>
      </label>
    </div>
  </div>
    

<table class="work_t">
  <tr>
    <th style="display: none">id</th>
    <th>Номер теми</th>
    <th>ОКР</th>
    <th>П.І.Б</th>
    <th>Група</th>
    <th>П.І.Б керівника диплома</th>
    <th>П.І.Б керівника диплома за наказом МОН</th>
    <th>Напрям кваліфікаційної роботи</th>
    <th>Тема англійською мовою</th>
    <th>П.І.Б рекомендуємого рецензента</th>
  </tr>
  <?php
  global $wpdb;
  $table = 'sumdu_work_table';
  $sumdu_work_table = $wpdb->get_results("SELECT * FROM $table");
  foreach($sumdu_work_table as $result){
    ?>
    <tr data-table="<?php echo $table ?>" data-id_name="id" data-id="<?php echo $result->id; ?>" class="work_tr">
      <td data-td="id" class="id"><div class="v"><?php echo $result->id; ?></div></td>
      <td data-td="number_theme" class="e"><div class="v"><?php echo $result->number_theme; ?></div></td>

      <td>
        <div class="w_t">
          <?php
          $r = $result->okr;
          if($r == 1){
            echo 'Бакалавр';
            $b1 = 'selected';
            $b2 = '';
          }else{
            echo 'Магістр';
            $b1 = '';
            $b2 = 'selected';
          }
          ?>
        </div>

        <div class="w_s">
          <select data-name="okr" data-id="<?php echo $result->id; ?>" data-x="0">
            <option value="1|+|Бакалавр" <?php echo $b1; ?>>Бакалавр</option>
            <option value="3|+|Магістр" <?php echo $b2; ?>>Магістр</option>
          </select>
        </div>
      </td>

      <td>
        <?php
        foreach ($data_student as $r){
          if($r->id_student == $result->id){
            ?>
            <div class="w_t"><?php echo $r->surname.' '.$r->name.' '.$r->middle_name; ?></div>
          <?php } } ?>

        <div class="w_s">
          <select data-name="name_w" data-id="<?php echo $result->id; ?>" data-x="1">
            <?php
            foreach ($data_student as $r){
              if($r->id_student == $result->id) { $c = "selected"; }else{ $c = ''; }
              ?>
              <option data-student="<?php echo $r->id_student; ?>" value="<?php echo $r->id_student; ?>|+|<?php echo $r->surname . ' ' . $r->name . ' ' . $r->middle_name; ?>" <?php echo $c; ?>><?php echo $r->surname . ' ' . $r->name . ' ' . $r->middle_name; ?></option>
              <?php
            }
            ?>
          </select>
        </div>
      </td>

<!--      <td data-td="name_w" class="e"><div class="v">--><?php //echo $result->surname.' '.$result->name_w.' '.$result->middle_name; ?><!--</div></td>-->
      <td data-td="group_w" class="e"><div class="v"><?php echo $result->group_w; ?></div></td>

      <td>
        <?php
        foreach ($data_teacher as $r){
          if($r->id_member == $result->name_head){
            ?>
            <div class="w_t"><?php echo $r->surname.' '.$r->name.' '.$r->middle_name; ?></div>
        <?php } } ?>

        <div class="w_s">
          <select data-name="name_head" data-id="<?php echo $result->id; ?>" data-x="0">
            <?php
            foreach ($data_teacher as $r){
              if($r->id_member == $result->name_head) { $c = "selected"; }else{ $c = ''; }
                ?>
                <option
                  value="<?php echo $r->id_member; ?>|+|<?php echo $r->surname . ' ' . $r->name . ' ' . $r->middle_name; ?>" <?php echo $c; ?>><?php echo $r->surname . ' ' . $r->name . ' ' . $r->middle_name; ?></option>
                <?php
              }
            ?>
          </select>
        </div>
      </td>

      <td>
        <?php
        foreach ($data_teacher as $r){
          if($r->id_member == $result->name_head_mon){
            ?>
            <div class="w_t"><?php echo $r->surname.' '.$r->name.' '.$r->middle_name; ?></div>
        <?php } } ?>

        <div class="w_s">
          <select data-name="name_head_mon" data-id="<?php echo $result->id; ?>" data-x="0">
            <?php
            foreach ($data_teacher as $r){
              if($r->id_member == $result->name_head_mon) { $c = "selected"; }else{ $c = ''; }
                ?>
                <option value="<?php echo $r->id_member; ?>|+|<?php echo $r->surname . ' ' . $r->name . ' ' . $r->middle_name; ?>" <?php echo $c; ?>><?php echo $r->surname . ' ' . $r->name . ' ' . $r->middle_name; ?></option>
                <?php
              }
            ?>
          </select>
        </div>
      </td>

      <td data-td="direction_work" class="e direction_work"><div class="v"><?php echo $result->direction_work; ?></div></td>
      <td data-td="theme_english" class="e theme_english"><div class="v"><?php echo $result->theme_english; ?></div></td>

      <td>
        <?php
          foreach ($data_teacher as $r){
          if($r->id_member == $result->name_reviewer){
        ?>
          <div class="w_t"><?php echo $r->surname.' '.$r->name.' '.$r->middle_name; ?></div>
        <?php } } ?>

        <div class="w_s">
          <select data-name="name_reviewer" data-id="<?php echo $result->id; ?>" data-x="0">
            <?php
            foreach ($data_teacher as $r){
              if($r->id_member == $result->name_reviewer) { $c = "selected"; }else{ $c = ''; }
              ?>
              <option value="<?php echo $r->id_member; ?>|+|<?php echo $r->surname . ' ' . $r->name . ' ' . $r->middle_name; ?>" <?php echo $c; ?>><?php echo $r->surname . ' ' . $r->name . ' ' . $r->middle_name; ?></option>
              <?php
            }
            ?>
          </select>
        </div>
      </td>
      <td class="img_d" data-id="<?php echo $result->id; ?>"><img class="del_img" src="<?php echo get_template_directory_uri() ?>/images/delete.png"></td>

    </tr>
    <?php
  }
  ?>
</table>
</div>