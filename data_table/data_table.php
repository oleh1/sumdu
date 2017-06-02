<div class="edit_t_b">

  <div class="edit_t">Режим редагування</div>
  
  <div class="can-toggle can-toggle--size-small">
    <input id="b" type="checkbox">
    <label for="b" class="off_on">
      <div class="can-toggle__switch" data-checked="Вкл" data-unchecked="Викл"></div>
    </label>
  </div>

</div>

<div id="tab">
  <input type="radio" name="tabs" id="n1" checked />
  <label for="n1">Характеристики відповідей</label>
  <input type="radio" name="tabs" id="n2" />
  <label for="n2">Номери комісій</label>
  <input type="radio" name="tabs" id="n3" />
  <label for="n3">Номера протоколів</label>
  <input type="radio" name="tabs" id="n4" />
  <label for="n4">Засідання</label>
  <input type="radio" name="tabs" id="n5" />
  <label for="n5">Члени комісії</label>
  <input type="radio" name="tabs" id="n6" />
  <label for="n6">Кваліфікації</label>
  <input type="radio" name="tabs" id="n7" />
  <label for="n7">Результати державного іспиту</label>
  <input type="radio" name="tabs" id="n8" />
  <label for="n8">Результати захисту дипломних робіт</label>
  <input type="radio" name="tabs" id="n9" />
  <label for="n9">Студенти</label>
  <input type="radio" name="tabs" id="n10" />
  <label for="n10">Оцінювання</label>
  <div id="tabs">
    <div>
      <?php include 'character_answer.php'; ?>
    </div>
    <div>
      <?php include 'commission_number.php'; ?>
    </div>
    <div>
      <?php include 'meeting_head.php'; ?>
    </div>
    <div>
      <?php include 'meeting_present.php'; ?>
    </div>
    <div>
      <?php include 'members.php'; ?>
    </div>
    <div>
      <?php include 'qualification.php'; ?>
    </div>
    <div>
      <?php include 'report_of_exam.php'; ?>
    </div>
    <div>
      <?php include 'report_of_protect.php'; ?>
    </div>
    <div>
      <?php include 'student.php'; ?>
    </div>
    <div>
      <?php include 'valuation.php'; ?>
    </div>
  </div>
</div>