<?php
global $wpdb;
$group = $wpdb->get_results("SELECT * FROM sumdu_warning_system_group ORDER BY id DESC");

if ($group == null) {
  $i = 1;
} else {
  $i = (int)$group[0]->id_group + 1;
}
$load = "<img src='".get_template_directory_uri()."/images/load.gif'>";
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
        <?php
        $all_mails = array();
        $i = 0;
        foreach ($mail as $result_m) {
          $all_mails[$i] = $result_m->sumdu_mail;
          $i++;
        ?>
          <div class="mails">
            <div class="name_mail"><?php echo $result_m->sumdu_mail; ?></div><div data-id="<?php echo $result_m->id; ?>" class="delete_mail"><img src="<?php echo get_template_directory_uri(); ?>/images/warning_system/delete-mail.png"></div><br>
          </div>
        <?php
        }
        $all_mails = implode(",", $all_mails);
        ?>
        <input data-id_group="<?php echo $result_g->id_group; ?>" class="add_mail_i" type="text">
        <div class="a_d"><div class="add_mail">Додати email</div></div>
        <div><input type="text" class="subject_send" placeholder="Тема" value="<?php echo get_option('subject_send-'.$result_g->id_group); ?>"></div>
        <div><input type="text" class="name_send" placeholder="Ім'я" value="<?php echo get_option('name_send-'.$result_g->id_group); ?>"></div>
        <div><input type="text" class="mail_send" placeholder="E-mail" value="<?php echo get_option('mail_send-'.$result_g->id_group); ?>"></div>
        <div class="a_d"><textarea class="message" placeholder="Повідомлення" data-mails="<?php echo $all_mails ?>"><?php echo get_option('message_send-'.$result_g->id_group); ?></textarea></div>
        <div><div class="send_message">Відправити повідомлення</div></div>
        <div class="load_message"><?php echo $load; ?></div>
      </div>
      <?php
    }
    ?>
  </div>
</div>

<style>
  .load_message {
    position: relative;
    top: 5px;
    display: none;
  }
  .message{
    width: 100%;
  }
  .send_message{
    display: initial;
    cursor: pointer;
    background: burlywood;
    padding: 3px 6px;
    color: black;
    border-radius: 5px;
  }
  .send_message:hover{
    opacity: 0.7;
  }
  .delete_mail{
    cursor: pointer;
    width: 15px;
    height: 15px;
    padding: 0 0 0 5px;
    display: inline-block;
  }
  .delete_mail img{
    height: 100%;
    width: 100%;
  }
  .a_d{
    margin: 5px 0 5px 0;
  }
  .add_mail{
    display: initial;
    cursor: pointer;
    background: #70c767;
    padding: 3px 6px;
    color: black;
    border-radius: 5px;
  }
  .add_mail:hover{
    opacity: 0.7;
  }
  .name_mail{
    display: inline-block;
    margin: 5px 0 5px 0;
    font-size: 20px;
  }
  .delete_group{
    cursor: pointer;
    display: inline;
    background: red;
    padding: 3px 6px;
    color: black;
    border-radius: 5px;
  }
  .delete_group:hover{
    opacity: 0.7;
  }
  .lo{
    position: relative;
    top: -11px;
    left: 27px;
    display: none;
    float: left;
  }
  .load{
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
  .warning_grop{
    text-align: center;
    float: left;
    margin: 10px 10px 0 0;
    border: 1px solid silver;
    border-radius: 3px;
    padding: 5px;
  }
  .warning_grop .name_group{
    font-size: 25px;
    margin: 5px 0 3px 0;
    color: maroon;
  }
  .sure{
    display: none;
    color: red;
    font-weight: bold;
    font-size: 17px;
  }
  .sure .y_n{
    margin: 5px 0 10px 0;
  }
  .sure .y{
    cursor: pointer;
    margin: 0 75px 0 0;
    display: initial;
    background: #70c767;
    padding: 3px 6px;
    color: black;
    border-radius: 5px;
  }
  .sure .y:hover{
    opacity: 0.7;
  }
  .sure .n{
    cursor: pointer;
    display: inline;
    background: red;
    padding: 3px 6px;
    color: black;
    border-radius: 5px;
  }
  .sure .n:hover{
    opacity: 0.7;
  }
</style>
