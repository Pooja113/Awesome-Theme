<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset=" <?php bloginfo('charset'); ?>">
        <title><?php bloginfo( 'name' ); ?><?php wp_title('|'); ?></title>
        <?php wp_head(); ?>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    </head>
    <?php
    if(is_front_page()):
        $class = "home-class";
    else:
        $class ="other-pages-class";
    endif;
    ?>

    <body  <?php body_class($class); ?>>
    <div class="container">
    <img alt="" src="<?php header_image(); ?>" width="400<?php //echo absint( get_custom_header()->width ); ?>" height="400<?php //echo absint( get_custom_header()->height ); ?>">

    <?php wp_nav_menu( array(
            'theme_location' => 'primary_menu',
           // 'walker' => new Walker_Nav_Primary(),
        ) );
?>
<?php echo get_search_form() ?>

    <p>This is the header Section</p>