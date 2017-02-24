<?php
get_header();
get_sidebar();
?>
  <div id="content">
    <?php
    if (have_posts()): while (have_posts()): the_post();
      the_title();
      the_content();
    endwhile;
    endif;
    ?>
  </div>
<?php
get_footer();
?>