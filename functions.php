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

/*
 ========================================
    Walker Class
 ========================================
 */

require get_template_directory(). '/inc/walker.php';

/*
 ========================================
    Remove Version
 ========================================
 */

function remove_version(){
    return "" ;
}

add_filter('the_generator','remove_version');



/*
 ========================================
    Register Custom Post Type
 ========================================
 */

function wpdocs_codex_book_init() {
    $labels = array(
        'name'                  => _x( 'Books', 'Post type general name', 'textdomain' ),
        'singular_name'         => _x( 'Book', 'Post type singular name', 'textdomain' ),
        'menu_name'             => _x( 'Books', 'Admin Menu text', 'textdomain' ),
        'name_admin_bar'        => _x( 'Book', 'Add New on Toolbar', 'textdomain' ),
        'add_new'               => __( 'Add New', 'textdomain' ),
        'add_new_item'          => __( 'Add New Book', 'textdomain' ),
        'new_item'              => __( 'New Book', 'textdomain' ),
        'edit_item'             => __( 'Edit Book', 'textdomain' ),
        'view_item'             => __( 'View Book', 'textdomain' ),
        'all_items'             => __( 'All Books', 'textdomain' ),
        'search_items'          => __( 'Search Books', 'textdomain' ),
        'parent_item_colon'     => __( 'Parent Books:', 'textdomain' ),
        'not_found'             => __( 'No books found.', 'textdomain' ),
        'not_found_in_trash'    => __( 'No books found in Trash.', 'textdomain' ),
        'featured_image'        => _x( 'Book Cover Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'textdomain' ),
        'set_featured_image'    => _x( 'Set cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
        'remove_featured_image' => _x( 'Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
        'use_featured_image'    => _x( 'Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
        'archives'              => _x( 'Book archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'textdomain' ),
        'insert_into_item'      => _x( 'Insert into book', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'textdomain' ),
        'uploaded_to_this_item' => _x( 'Uploaded to this book', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'textdomain' ),
        'filter_items_list'     => _x( 'Filter books list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'textdomain' ),
        'items_list_navigation' => _x( 'Books list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'textdomain' ),
        'items_list'            => _x( 'Books list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'textdomain' ),
    );
 
    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'book' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments', 'custom-fields' ),
        //'taxonomies'         => array( 'category', 'post_tag' ),  
    );
 
    register_post_type( 'book', $args );

    
}
 
add_action( 'init', 'wpdocs_codex_book_init' );

/*
 ========================================
    Register Taxonomy
 ========================================
 */

function wpdocs_create_book_taxonomies() {
    // Add new taxonomy, make it hierarchical (like categories)
    $labels = array(
        'name'              => _x( 'Genres', 'taxonomy general name', 'textdomain' ),
        'singular_name'     => _x( 'Genre', 'taxonomy singular name', 'textdomain' ),
        'search_items'      => __( 'Search Genres', 'textdomain' ),
        'all_items'         => __( 'All Genres', 'textdomain' ),
        'parent_item'       => __( 'Parent Genre', 'textdomain' ),
        'parent_item_colon' => __( 'Parent Genre:', 'textdomain' ),
        'edit_item'         => __( 'Edit Genre', 'textdomain' ),
        'update_item'       => __( 'Update Genre', 'textdomain' ),
        'add_new_item'      => __( 'Add New Genre', 'textdomain' ),
        'new_item_name'     => __( 'New Genre Name', 'textdomain' ),
        'menu_name'         => __( 'Genre', 'textdomain' ),
    );
 
    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'genre' ),
    );
 
    register_taxonomy( 'genre', array( 'book' ), $args );

            // Add new taxonomy, NOT hierarchical (like tags)

    register_taxonomy( 'writer', 'book',  array(
                'label'                => 'Writer',
                'rewrite'               => array( 'slug' => 'writer' ),
                'hierarchical'          => false,
            ));

}

add_action( 'init', 'wpdocs_create_book_taxonomies' );   



function post_taxonomy_slug_array( $tax_name ) {
 
    $terms = wp_get_post_terms( get_the_ID(), $tax_name);
    if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
        $term_array = " ";
        foreach ( $terms as $term ) {
            $term_array .= '<a href="'.get_term_link($term) .'">'.$term->name.'</a><br>' ;

        }
        return $term_array;
    }
    return '';
}

/*
 ========================================
    Excerpt Length
 ========================================
 */ 

function mytheme_custom_excerpt_length( $length ) {
    return 10;
}
add_filter( 'excerpt_length', 'mytheme_custom_excerpt_length', 999 );


/*
 ========================================
    Custom Widgets
 ========================================
 */

 class Awesome_Profile_Widget extends WP_Widget {

    public function __construct(){
        $widget_ops = array(
            'classname'                   => 'widget_recent_entries',
            'description'                 => __( 'Popular Posts Widgets' ),
            // 'customize_selective_refresh' => true,
            // 'show_instance_in_rest'       => true,
        );
        parent::__construct( 'popular-posts', __( 'Popular Posts' ), $widget_ops );
        //$this->alt_option_name = 'widget_recent_entries';
    }

    public function widget( $args, $instance ){
        if ( ! isset( $args['widget_id'] ) ) {
            $args['widget_id'] = $this->id;
        }
 
        $default_title = __( 'Recent Posts' );
        $title         = ( ! empty( $instance['title'] ) ) ? $instance['title'] : $default_title;
 
        /** This filter is documented in wp-includes/widgets/class-wp-widget-pages.php */
        $title = apply_filters( 'widget_title', $title, $instance, $this->id_base );
 
        $number = ( ! empty( $instance['number'] ) ) ? absint( $instance['number'] ) : 5;
        if ( ! $number ) {
            $number = 5;
        }
        $show_date = isset( $instance['show_date'] ) ? $instance['show_date'] : false;
 
        $r = new WP_Query(
            apply_filters(
                'widget_posts_args',
                array(
                    'posts_per_page'      => $number,
                    'no_found_rows'       => true,
                    'post_status'         => 'publish',
                    'ignore_sticky_posts' => true,
                ),
                $instance
            )
        );
 
        if ( ! $r->have_posts() ) {
            return;
        }
        ?>
 
        <?php echo $args['before_widget']; ?>
 
        <?php
        if ( $title ) {
            echo $args['before_title'] . $title . $args['after_title'];
        }
 
        $format = current_theme_supports( 'html5', 'navigation-widgets' ) ? 'html5' : 'xhtml';
 
        /** This filter is documented in wp-includes/widgets/class-wp-nav-menu-widget.php */
        $format = apply_filters( 'navigation_widgets_format', $format );
 
        if ( 'html5' === $format ) {
            // The title may be filtered: Strip out HTML and make sure the aria-label is never empty.
            $title      = trim( strip_tags( $title ) );
            $aria_label = $title ? $title : $default_title;
            echo '<nav role="navigation" aria-label="' . esc_attr( $aria_label ) . '">';
        }
        ?>
 
        <ul>
            <?php foreach ( $r->posts as $recent_post ) : ?>
                <?php
                $post_title   = get_the_title( $recent_post->ID );
                $title        = ( ! empty( $post_title ) ) ? $post_title : __( '(no title)' );
                $aria_current = '';
 
                if ( get_queried_object_id() === $recent_post->ID ) {
                    $aria_current = ' aria-current="page"';
                }
                ?>
                <li>
                    <a href="<?php the_permalink( $recent_post->ID ); ?>"<?php echo $aria_current; ?>><?php echo $title; ?></a>
                    <?php if ( $show_date ) : ?>
                        <span class="post-date"><?php echo get_the_date( '', $recent_post->ID ); ?></span>
                    <?php endif; ?>
                </li>
            <?php endforeach; ?>
        </ul>
 
        <?php
        if ( 'html5' === $format ) {
            echo '</nav>';
        }
 
        echo $args['after_widget'];
    }


    public function form( $instance ) {
        $title     = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
        $number    = isset( $instance['number'] ) ? absint( $instance['number'] ) : 5;
        $show_date = isset( $instance['show_date'] ) ? (bool) $instance['show_date'] : false;
        ?>
        <p>
            <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo $title; ?>" />
        </p>
 
        <p>
            <label for="<?php echo $this->get_field_id( 'number' ); ?>"><?php _e( 'Number of posts to show:' ); ?></label>
            <input class="tiny-text" id="<?php echo $this->get_field_id( 'number' ); ?>" name="<?php echo $this->get_field_name( 'number' ); ?>" type="number" step="1" min="1" value="<?php echo $number; ?>" size="3" />
        </p>
 
        <p>
            <input class="checkbox" type="checkbox"<?php checked( $show_date ); ?> id="<?php echo $this->get_field_id( 'show_date' ); ?>" name="<?php echo $this->get_field_name( 'show_date' ); ?>" />
            <label for="<?php echo $this->get_field_id( 'show_date' ); ?>"><?php _e( 'Display post date?' ); ?></label>
        </p>
        <?php
    }

 }

 add_action( 'widgets_init', function() {
    register_widget( 'Awesome_Profile_Widget' );
});


function save_post_view(){
    $metaKey = 'post_view';
    $views =  get_post_meta($postID,$metaKey, true);

    $count = (empty( $views) ? '0': $views);
    $count++;
    update_post_meta($postID,$metaKey, $count);
}
