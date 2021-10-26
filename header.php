<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>The Awesome Theme</title>
        <?php wp_head(); ?>
    </head>
    <?php
    if(is_front_page()):
        $class = "home-class";
    else:
        $class ="other-pages-class";
    endif;
    ?>

    <body  <?php body_class($class); ?>>

    <?php wp_nav_menu( array(
            'theme_location' => 'primary_menu',
        ) );
?>
    <p>This is the header Section</p>