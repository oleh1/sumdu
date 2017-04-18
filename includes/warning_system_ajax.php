<?php
add_action("wp_ajax_add_group", "f_add_group");
add_action("wp_ajax_nopriv_add_group", "f_add_group");
function f_add_group()
{

  $text = $_POST['text'];
  $id = $_POST['id'];

  global $wpdb;
  $wpdb->insert('sumdu_warning_system_group', array("id" => '', "sumdu_group" => $text, "id_group" => $id), array("%d", "%s", "%d"));
  $group = $wpdb->get_results("SELECT * FROM sumdu_warning_system_group ORDER BY id DESC");

  if ($group == null) {
    $i = 1;
  } else {
    $i = (int)$group[0]->id_group + 1;
  }
  $load = "<div class='overlay-loader'><div class='loader'><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div></div>";
  ?>

  <div class="content_warning_group">
    <div class="all_groups">
      <div class="text_group"><input data-id="<?php echo $i; ?>" class="add_group_i" type="text"></div>
      <div class="add_group">Додати групу</div>
      <div class="lo"><div class="load"><?php echo $load; ?></div></div>
    </div>
    <div style="clear: both"></div>

    <div class="warning_grop_all">
      <?php
      foreach ($group as $result_g) {
        $mail = $wpdb->get_results("SELECT * FROM sumdu_warning_system_mail WHERE id_group = $result_g->id_group ORDER BY id DESC");
        ?>
        <div class="warning_grop" data-id="<?php echo $result_g->id_group; ?>">
          <div class="sure">
            <div class="t">Ви точно впевнені?</div>
            <div class="y_n">
              <div class="y">Так</div><div class="n">Ні</div>
            </div>
          </div>
          <div class="delete_group">Видалити групу</div>
          <div class="name_group">
            <?php echo $result_g->sumdu_group; ?>
          </div>
          <?php foreach ($mail as $result_m) { ?>
            <div class="mails">
              <div class="name_mail"><?php echo $result_m->sumdu_mail; ?></div><div data-id="<?php echo $result_m->id; ?>" class="delete_mail"><img src="<?php echo get_template_directory_uri(); ?>/images/warning_system/delete-mail.png"></div><br>
            </div>
          <?php } ?>
          <input data-id_group="<?php echo $result_g->id_group; ?>" class="add_mail_i" type="text">
          <div class="a_d"><div class="add_mail">Додати email</div></div>
          <div class="a_d"><textarea class="message"></textarea></div>
          <div><div class="send_message">Відправити повідомлення</div></div>
        </div>
        <?php
      }
      ?>
    </div>
  </div>
<?php
  wp_die();
}
?>

<?php
add_action("wp_ajax_delete_group", "f_delete_group");
add_action("wp_ajax_nopriv_delete_group", "f_delete_group");
function f_delete_group()
{

  $id = $_POST['id'];

  global $wpdb;
  $sql = $wpdb->prepare("DELETE FROM sumdu_warning_system_group WHERE id_group = %d", $id);
  $wpdb->query($sql);
  $sql = $wpdb->prepare("DELETE FROM sumdu_warning_system_mail WHERE id_group = %d", $id);
  $wpdb->query($sql);

  wp_die();
}
?>

<?php
add_action("wp_ajax_add_mail", "f_add_mail");
add_action("wp_ajax_nopriv_add_mail", "f_add_mail");
function f_add_mail()
{

  $text = $_POST['text'];
  $id_group = $_POST['id_group'];

  global $wpdb;
  $wpdb->insert('sumdu_warning_system_mail', array("id" => '', "sumdu_mail" => $text, "id_group" => $id_group), array("%d", "%s", "%d"));

global $wpdb;
$group = $wpdb->get_results("SELECT * FROM sumdu_warning_system_group ORDER BY id DESC");

if ($group == null) {
  $i = 1;
} else {
  $i = (int)$group[0]->id_group + 1;
}
$load = "<div class='overlay-loader'><div class='loader'><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div></div>";
?>

<div class="content_warning_group">
  <div class="all_groups">
    <div class="text_group"><input data-id="<?php echo $i; ?>" class="add_group_i" type="text"></div>
    <div class="add_group">Додати групу</div>
    <div class="lo"><div class="load"><?php echo $load; ?></div></div>
  </div>
  <div style="clear: both"></div>

  <div class="warning_grop_all">
    <?php
    foreach ($group as $result_g) {
      $mail = $wpdb->get_results("SELECT * FROM sumdu_warning_system_mail WHERE id_group = $result_g->id_group ORDER BY id DESC");
      ?>
      <div class="warning_grop" data-id="<?php echo $result_g->id_group; ?>">
        <div class="sure">
          <div class="t">Ви точно впевнені?</div>
          <div class="y_n">
            <div class="y">Так</div><div class="n">Ні</div>
          </div>
        </div>
        <div class="delete_group">Удалить групу</div>
        <div class="name_group">
          <?php echo $result_g->sumdu_group; ?>
        </div>
        <?php foreach ($mail as $result_m) { ?>
          <div class="mails">
            <div class="name_mail"><?php echo $result_m->sumdu_mail; ?></div><div data-id="<?php echo $result_m->id; ?>" class="delete_mail"><img src="<?php echo get_template_directory_uri(); ?>/images/warning_system/delete-mail.png"></div><br>
          </div>
        <?php } ?>
        <input data-id_group="<?php echo $result_g->id_group; ?>" class="add_mail_i" type="text">
        <div class="a_d"><div class="add_mail">Додати email</div></div>
        <div class="a_d"><textarea class="message"></textarea></div>
        <div><div class="send_message">Відправити повідомлення</div></div>
      </div>
      <?php
    }
    ?>
  </div>
</div>
<?php
  wp_die();
}
?>

<?php
add_action("wp_ajax_delete_mail", "f_delete_mail");
add_action("wp_ajax_nopriv_delete_mail", "f_delete_mail");
function f_delete_mail()
{

  $id = $_POST['id'];

  global $wpdb;
  $sql = $wpdb->prepare("DELETE FROM sumdu_warning_system_mail WHERE id = %d", $id);
  $wpdb->query($sql);

  wp_die();
}
?>
