<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title></title>
    <?php wp_head(); ?>
</head>
<body>
<header>
    <div>
        <?php if(has_custom_logo()) the_custom_logo(); ?>
    </div>
    <div>
        <?php bloginfo(); ?>
    </div>
    <div>
        <?php dynamic_sidebar( 'sidebar-1' ); ?>
    </div>
    <div>
        <?php
            wp_nav_menu(array(
                'theme_location' => 'header_menu',
                'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                'menu_class' => 'header-menu',
            ));
        ?>
    </div>
</header>