<form role="search" method="get" id="searchform" class="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
  <div>
    <input type="text" value="<?php echo get_search_query(); ?>" name="s" id="s" class="search_text" placeholder="<?php _e('Пошук', 'sumdu'); ?>" />
    <input type="submit" id="searchsubmit" value="<?php _e('Шукати', 'sumdu'); ?>" />
  </div>
</form>