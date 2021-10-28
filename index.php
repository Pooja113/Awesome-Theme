<?php get_header(); ?>
    <div class="row">
            <div class="col-xs-12 col-sm-8">
            <?php 
                // the query
                // $cat = array(4,5);
                // foreach($cat as $a){
                    $currentPage = (get_query_var( 'paged'))?get_query_var( 'paged'):1;
                    
                $args = array(
                    'post_type' => 'post',
                    'post_per_page' => 2,
                    'paged' => $currentPage,
                    // 'category__in' => $a,
                    // 'category__not_in' => 1 
                );
                $the_query = new WP_Query( $args ); ?>
                
                <?php if ( $the_query->have_posts() ) : ?>
                
                    <!-- pagination here -->
                
                    <!-- the loop -->
                    <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                        <h2><?php the_title(); ?></h2>
                        <?php the_excerpt(); ?>
                    <?php endwhile; ?>
                    <!-- end of the loop -->
                
                    <!-- pagination here -->
                    <?php previous_posts_link("New"); ?>
<?php next_posts_link("Older"); ?>
                
                    <?php wp_reset_postdata(); ?>
                
                <?php else : ?>
                    <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
                <?php endif; 
                
                //}?>




           
                    
                    <?php // get_template_part('content',get_post_format()); ?>     
                 <!-- <hr> -->

            
            </div>

            <div class="col-xs-12 col-sm-4">

                <?php get_sidebar();?>

            </div>
    </div>
<?php get_footer(); ?>