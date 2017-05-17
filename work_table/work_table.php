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

<div class="add_student"><div>Додати</div></div>


<div class="edit_t_b">

  <div class="edit_t">Режим редагування</div>

  <div class="can-toggle can-toggle--size-small">
    <input id="b" type="checkbox">
    <label for="b" class="off_on">
      <div class="can-toggle__switch" data-checked="Вкл" data-unchecked="Викл"></div>
    </label>
  </div>

</div>

<div id="work_table">
<table>
  <tr>
    <th>id</th>
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
    <tr data-table="<?php echo $table ?>" data-id_name="id" data-id="<?php echo $result->id; ?>">
      <td data-td="id"><div class="v"><?php echo $result->id; ?></td>
      <td data-td="number_theme"><div class="v"><?php echo $result->number_theme; ?></td>
      <td data-td="okr"><div class="v"><?php echo $result->okr; ?></div></td>
      <td data-td="surname"><div class="v"><?php echo $result->surname; ?></div></td>
      <td data-td="name_w"><div class="v"><?php echo $result->name_w; ?></div></td>
      <td data-td="middle_name"><div class="v"><?php echo $result->middle_name; ?></div></td>
      <td data-td="group_w"><div class="v"><?php echo $result->group_w; ?></div></td>
      <td data-td="name_head"><div class="v"><?php echo $result->name_head; ?></div></td>
      <td data-td="name_head_mon"><div class="v"><?php echo $result->name_head_mon; ?></div></td>
      <td data-td="direction_work"><div class="v"><?php echo $result->direction_work; ?></div></td>
      <td data-td="theme_english"><div class="v"><?php echo $result->theme_english; ?></div></td>
      <td data-td="name_reviewer"><div class="v"><?php echo $result->name_reviewer; ?></div></td>
    </tr>
    <?php
  }
  ?>
</table>
</div>