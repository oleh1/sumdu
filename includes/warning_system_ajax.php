<?php
add_action("wp_ajax_add_mail", "f_add_mail");
add_action("wp_ajax_nopriv_add_mail", "f_add_mail");
function f_add_mail()
{

  echo $_POST['text'];

  global $wpdb;
//  $wpdb->insert('wp_warning_system_mail', array("id" => '', "mail" => "test", "id_mail" => 1), array("%d", "%s", "%d"));


  wp_die();
}
?>

<?php
add_action("wp_ajax_add_group", "f_add_group");
add_action("wp_ajax_nopriv_add_group", "f_add_group");
function f_add_group()
{

  $text = $_POST['text'];
  $id = $_POST['id'];

  global $wpdb;
  $wpdb->insert('wp_warning_system_group', array("id" => '', "group" => $text, "id_group" => $id), array("%d", "%s", "%d"));
  $group = $wpdb->get_results("SELECT * FROM wp_warning_system_group ORDER BY id DESC");

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
      <div class="add_group">Добавить групу</div>
      <div class="lo"><div class="load"><?php echo $load; ?></div></div>
    </div>
    <div style="clear: both"></div>

    <div class="warning_grop_all">
      <?php
      foreach ($group as $result) {
        ?>
        <div class="warning_grop">
          <div class="delete_group" data-id="<?php echo $result->id_group; ?>">Удалить групу</div>
          <div>
            <?php echo $result->group; ?>
          </div>
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
  $sql = $wpdb->prepare("DELETE FROM wp_warning_system_group WHERE id_group = %d", $id);
  $wpdb->query($sql);

  wp_die();
}
?>
