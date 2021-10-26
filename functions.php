<?php 

/*
 ========================================
        Functions File
 ========================================
*/

function awesome_theme_scripts() {
    wp_enqueue_style( 'customstyle', get_template_directory_uri() .'/css/awesome.css',array(), '1.0.0' , 'all' );
    wp_enqueue_script( 'customscript', get_template_directory_uri() . '/js/awesome.js', array(), '1.0.0', true );
}
add_action( 'wp_enqueue_scripts', 'awesome_theme_scripts' );