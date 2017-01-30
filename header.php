<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title></title>
    <?php wp_head(); ?>
</head>
<body>
<header>
    <?php
        wp_nav_menu(array(
            'theme_location' => 'header_menu',
            'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
            'menu_class' => 'header-menu',
        ));
    ?>
</header>