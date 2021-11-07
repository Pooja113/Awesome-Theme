<?php get_header(); ?>
<h1> SEARCH PAGE</h1>
    <div class="row">
       
            <div class="col-xs-12 col-sm-8">
            <?php 
            if ( have_posts() ) {
                while ( have_posts() ) {
                    the_post();  ?>
                    
                    <?php  the_title(); ?>  
                    <?php  the_content(); ?> 
                 <hr>

            <?php  	} // end while
             } // end if
            ?>
            </div>
            <?php the_widget( 'WP_Widget_Recent_Posts'); ?> 
            <div class="col-xs-12 col-sm-4">

                <?php //get_sidebar();?>
    <?php wp_list_categories( array(
        'orderby' => 'name',
    ) ); ?> 

            </div>
            <?php the_widget( 'WP_Widget_Archives', 'dropdown=1' ); ?> 
    </div>
<?php get_footer(); ?>