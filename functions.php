<?php 

/*
 ========================================
    Add Custom Menus
 ========================================
*/
//add_theme_support( 'post-thumbnails' );

if ( ! function_exists( 'awesometheme_register_nav_menu' ) ) {
 
    function awesometheme_register_nav_menu(){
        register_nav_menus( array(
            'primary_menu' => __( 'Primary Menu', 'text_domain' ),
            //'footer_menu'  => __( 'Footer Menu', 'text_domain' ),
        ) );
    }
    add_action( 'after_setup_theme', 'awesometheme_register_nav_menu', 0 );
}


/*
 ========================================
        Enqueue Style and Script Files
 ========================================
*/

function awesome_theme_scripts() {
    wp_enqueue_style( 'customstyle', get_template_directory_uri() .'/css/awesome.css',array(), '1.0.0' , 'all' );
    wp_enqueue_script( 'customscript', get_template_directory_uri() . '/js/awesome.js', array(), '1.0.0', true );
}
add_action( 'wp_enqueue_scripts', 'awesome_theme_scripts' );


/*
 ========================================
    Add Theme Support
 ========================================
*/

add_theme_support( 'custom-background' );
add_theme_support( 'custom-header' );
add_theme_support( 'post-thumbnails' );
add_theme_support( 'post-formats', array( 'aside', 'gallery','video','image' ) );
function awesome_search() {
    add_theme_support( 'html5', array( 'search-form' ) );
}
add_action( 'after_setup_theme', 'awesome_search' );

/*
 ========================================
    Add Sidebar
 ========================================
 */
function awesome_theme_widgets() {
    register_sidebar( array(
        'name'          => __( 'Custom Sidebar', 'textdomain' ),
        'id'            => 'sidebar-1',
        'description'   => __( 'Widgets in this area will be shown on all posts and pages.', 'textdomain' ),
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
        'after_widget'  => '</li>',
        'before_title'  => '<h2 class="widgettitle">',
        'after_title'   => '</h2>',
    ) );
}
add_action( 'widgets_init', 'awesome_theme_widgets' );
