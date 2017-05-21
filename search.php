<?php
get_header();
get_sidebar();
?>
  <div id="content_sumdu">
    <div class="search_t">
      <?php printf(__( 'Результати пошуку за запитом: %s', 'sumdu' ), '<span>'.get_search_query().'</span>'); ?>
    </div>
    <div class="search_c">
      <?php
      _e('Знайдено результатів: ', 'sumdu');
      ?>
      <span>
        <?php
        global $wp_query;
        echo $wp_query->found_posts;
        ?>
      </span>
    </div>
    <?php
    if (have_posts()): while (have_posts()): the_post();
      ?>
      <div class="one_content">
        <div align="center" class="title_index"><a href="<?php the_permalink(); ?>"><h1><?php the_title(); ?></h1></a></div>

        <div class="cont_content_index">
          <?php the_excerpt(); ?>
        </div>

        <div class="author_d"><?php _e('Автор', 'sumdu') ?>: <?php the_author(); ?></div>
        <div class="date_d"><?php _e('Дата публікації', 'sumdu') ?>: <?php the_date('d.m.Y'); ?> <?php the_time(); ?></div>
      </div>
      <?php
    endwhile;
    endif;
    ?>
  </div>
<?php
get_footer();
?>