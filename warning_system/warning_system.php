<!--<input class="add_mail_i" type="text">-->
<!--<div class="add_mail">Добавить</div>-->


<?php
global $wpdb;
$group = $wpdb->get_results("SELECT * FROM wp_warning_system_group ORDER BY id DESC");

//echo '<pre>';
//print_r( $result );
//echo '</pre>';

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

<style>
  .delete_group{
    cursor: pointer;
    display: inline;
    background: red;
    padding: 3px 6px;
    color: black;
    border-radius: 5px;
  }
  .del_group:hover{
    opacity: 0.7;
  }
  .lo{
    display: none;
    float: left;
  }
  .load{
    top: 6px;
    width: 30px;
    position: absolute;
  }
  .all_groups{
    margin: 10px 0 0 0;
  }
  .text_group{
    margin: -4px 5px 15px 0;
    float: left;
  }
  .add_group{
    display: initial;
    background: #70c767;
    padding: 3px 6px;
    color: black;
    border-radius: 5px;
  }
  .add_group:hover{
    background: rgba(139, 195, 74, 0.47);
    cursor: pointer;
  }
  .warning_grop {
    float: left;
    margin: 0 10px 0 0;
  }
</style>
