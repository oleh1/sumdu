<?php
get_header();
get_sidebar();
?>
  <div id="content_sumdu">
    <?php
    if (have_posts()): while (have_posts()): the_post();
      ?>
      <div class="one_content">
        <div align="left" class="title_index"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>

        <div class="cont_content_index">
          <?php the_excerpt(); ?>
        </div>

<!--        <div class="author_d">--><?php //_e('Автор', 'sumdu') ?><!--: --><?php //the_author(); ?><!--</div>-->
<!--        <div class="date_d">--><?php //_e('Дата публікації', 'sumdu') ?><!--: --><?php //the_date('d.m.Y'); ?><!-- --><?php //the_time(); ?><!--</div>-->
      </div>
    <?php endwhile; ?>
      <div align="center">
        <?php
        the_posts_pagination(array(
          'mid_size' => 6,
          'prev_text' => '<div class="arrow"><img src="'.get_template_directory_uri().'/images/pagination/prev.png"></div>',
          'next_text' => '<div class="arrow"><img src="'.get_template_directory_uri().'/images/pagination/next.png"></div>',
        ));
        ?>
      </div>
    <?php else: ?>
      <div align="center" class="zero_posts"><?php _e('Ще не було жодного запису.', 'sumdu'); ?></div>
    <?php endif; ?>
  </div>
<?php
get_footer();
?>