<?php
get_header();
get_sidebar();
?>
  <div id="content">
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
    ?>
  </div>
<?php
get_footer();
?>