<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title></title>
    <?php wp_head(); ?>
</head>
<body>
<header id="header">
        <div class="logo">
            <?php if(has_custom_logo()) the_custom_logo(); ?>
        </div>
        <div class="name_site">
            <?php bloginfo(); ?>
        </div>
        <?php
            wp_nav_menu(array(
                'theme_location' => 'header_menu',
                'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                'menu_class' => 'header-menu'
            ));
        ?>
        <div class="lang">
            <ul>
                <li><a href="http://sumdu/ua/" hreflang="ua" title="Українська (ua)"><img src="<?php echo get_template_directory_uri() ?>/images/lang/ua.png" alt="Українська (ua)" /></a></li>
                <li><a href="http://sumdu/ru/" hreflang="ru" title="Русский (ru)"><img src="<?php echo get_template_directory_uri() ?>/images/lang/ru.png" alt="Русский (ru)" /></a></li>
                <li><a href="http://sumdu/en/" hreflang="en" title="English (en)"><img src="<?php echo get_template_directory_uri() ?>/images/lang/en.png" alt="English (en)" /></a></li>
            </ul>
        </div>
</header>