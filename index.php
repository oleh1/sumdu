<?php
get_header();
get_sidebar();
?>
  <div id="content">
    <?php
    if (have_posts()): while (have_posts()): the_post();
?>
      <div align="center" class="title_index"><a href="<?php the_permalink(); ?>"><h1><?php the_title(); ?></h1></a></div>
<?php
      the_content();
      the_author();
      the_date('Y-m-d', '<div class="date_index">', '</div>');
    endwhile;
    endif;
    ?>
  </div>
<?php
get_footer();
?>