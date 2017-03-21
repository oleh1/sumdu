<?php
get_header();
get_sidebar();
?>
  <div id="content_sumdu">
    <?php
    if (have_posts()): while (have_posts()): the_post();
      ?>
      <div class="one_content">
        <div align="center" class="title_index"><a href="<?php the_permalink(); ?>"><h1><?php the_title(); ?></h1></a></div>

        <div class="cont_content_index">
          <?php the_excerpt(); ?>
        </div>

        <div><?php _e('Автор', 'sumdu') ?>: <?php the_author(); ?></div>
        <div><?php _e('Дата публікації', 'sumdu') ?>: <?php the_date('d.m.Y'); ?> <?php the_time(); ?></div>
      </div>
      <?php
    endwhile;
    endif;
    
    the_posts_pagination(array(
      'mid_size' => 10,
      'prev_text' => '<div class="arrow"><img src="'.get_template_directory_uri().'/images/pagination/prev.png"></div>',
      'next_text' => '<div class="arrow"><img src="'.get_template_directory_uri().'/images/pagination/next.png"></div>',
    ));
    ?>
  </div>
<?php
get_footer();
?>