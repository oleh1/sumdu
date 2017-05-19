<?php
global $wpdb_dek;
$data_teacher = $wpdb_dek->get_results("SELECT id_member, surname, `name`, middle_name FROM members");
?>

<table class="work_table">
  <tr>
    <th>Номер теми</th>
    <th>ОКР</th>
    <th>Прізвище студента</th>
    <th>Ім'я студента</th>
    <th>По батькові студента</th>
    <th>Група</th>
    <th>ПІБ керівника диплома</th>
    <th>ПІБ керівника диплома за наказом МОН</th>
    <th>Напрям кваліфікаційної роботи</th>
    <th>Тема англійською мовою</th>
    <th>ПІБ рекомендуємого рецензента</th>
  </tr>

  <tr>
    <td><input class="a1" style="width: 38px;"></td>
    <td>
      <select class="a2">
        <option value="1">Бакалавр</option>
        <option value="3">Магістр</option>
      </select>
    </td>
    <td><input class="a3" style="width: 145px;"></td>
    <td><input class="a4" style="width: 145px;"></td>
    <td><input class="a5" style="width: 145px;"></td>
    <td><input class="a6" style="width: 100px;"></td>
    <td>
      <select class="a7">
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
      <select class="a8">
        <?php
        foreach ($data_teacher as $r){
          ?>
          <option value="<?php echo $r->id_member; ?>"><?php echo $r->surname.' '.$r->name.' '.$r->middle_name; ?></option>
          <?php
        }
        ?>
      </select>
    </td>
    <td><textarea class="a9"></textarea></td>
    <td><textarea class="a10"></textarea></td>
    <td>
      <select class="a11">
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
    <th>Прізвище студента</th>
    <th>Ім'я студента</th>
    <th>По батькові студента</th>
    <th>Група</th>
    <th>ПІБ керівника диплома</th>
    <th>ПІБ керівника диплома за наказом МОН</th>
    <th>Напрям кваліфікаційної роботи</th>
    <th>Тема англійською мовою</th>
    <th>ПІБ рекомендуємого рецензента</th>
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
          <select data-name="okr" data-id="<?php echo $result->id; ?>">
            <option value="1|+|Бакалавр" <?php echo $b1; ?>>Бакалавр</option>
            <option value="3|+|Магістр" <?php echo $b2; ?>>Магістр</option>
          </select>
        </div>
      </td>

      <td data-td="surname" class="e"><div class="v"><?php echo $result->surname; ?></div></td>
      <td data-td="name_w" class="e"><div class="v"><?php echo $result->name_w; ?></div></td>
      <td data-td="middle_name" class="e"><div class="v"><?php echo $result->middle_name; ?></div></td>
      <td data-td="group_w" class="e"><div class="v"><?php echo $result->group_w; ?></div></td>

      <td>
        <?php
        foreach ($data_teacher as $r){
          if($r->id_member == $result->name_head){
            ?>
            <div class="w_t"><?php echo $r->surname.' '.$r->name.' '.$r->middle_name; ?></div>
        <?php } } ?>

        <div class="w_s">
          <select data-name="name_head" data-id="<?php echo $result->id; ?>">
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
          <select data-name="name_head_mon" data-id="<?php echo $result->id; ?>">
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
          <select data-name="name_reviewer" data-id="<?php echo $result->id; ?>">
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

    </tr>
    <?php
  }
  ?>
</table>
</div>