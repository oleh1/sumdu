<ul class="commentlist comment_g">
  <?php wp_list_comments( 'type=comment&callback=sumdu_comment' ); ?>
</ul>

<?php
$fields =  array(

  'author' =>
    '<p class="comment-form-author"><label for="author">' . __("Ім'я", 'sumdu') . '</label> ' .
    ( $req ? '<span class="required">*</span> ' : '' ) .
    '<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) .
    '" size="30"' . $aria_req . ' /></p>',

  'email' =>
    '<p class="comment-form-email"><label for="email">' . __('E-mail', 'sumdu' ) . '</label> ' .
    ( $req ? '<span class="required">*</span> ' : '' ) .
    '<input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) .
    '" size="30"' . $aria_req . ' /></p>',

  'url' =>
    '<p class="comment-form-url"><label for="url">' . __('Веб-сайт', 'sumdu') . '</label> ' .
    '<input id="url" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) .
    '" size="30" /></p>',
);
$args = array(
  'id_form'           => 'commentform',
  'class_form'        => 'comment-form',
  'id_submit'         => 'submit',
  'class_submit'      => 'submit',
  'name_submit'       => 'submit',
  'title_reply'       => __('Залишити коментар', 'sumdu'),
  'title_reply_to'    => __('Залишити відповідь до %s', 'sumdu'),
  'cancel_reply_link' => __('Скасувати відповідь', 'sumdu'),
  'label_submit'      => __('Оприлюднити коментар', 'sumdu'),
  'format'            => 'xhtml',

  'comment_field' => '<p class="comment-form-comment"><div><label for="comment">' . _x('Коментар', 'sumdu') .
    '</label></div><textarea id="comment" class="comment_form_text" name="comment" cols="45" rows="8" aria-required="true">' .
    '</textarea></p>',

  'must_log_in' => '<p class="must-log-in">' .
    sprintf(
      __('Щоб відправити коментар вам необхідно <a href="%s">авторизуватись</a>.', 'sumdu'),
      wp_login_url(apply_filters('the_permalink', get_permalink()))
    ) . '</p>',

  'logged_in_as' => '<p class="logged-in-as">' .
    sprintf(
      __('Ви увійшли як <a href="%1$s">%2$s</a>. <a href="%3$s" title="Вийти з цього аккаунта">Вийти?</a>', 'sumdu'),
      admin_url('profile.php'),
      $user_identity,
      wp_logout_url(apply_filters('the_permalink', get_permalink()))
    ) . '</p>',

  'comment_notes_before' => '<p class="comment-notes s_comment-notes">' .
    __('Ваша e-mail адреса не оприлюднюватиметься.', 'sumdu') . ($req ? $required_text : '') .
    '</p>',

  'comment_notes_after' => '<p class="form-allowed-tags">' .
    sprintf(
      __('Ви можете використовувати ці <abbr title="Мова розмітки гіпертексту">HTML</abbr> теги і атрибути: %s', 'sumdu'),
      ' <code>' . allowed_tags() . '</code>'
    ) . '</p>',

  'fields' => apply_filters('comment_form_default_fields', $fields),
);
global $post;
comment_form($args, $post->ID);
?>