<?php get_header(); ?>
    <div class="row">
            <div class="col-xs-12 col-sm-8">
Single Page
<?php 
            if ( have_posts() ) {
                while ( have_posts() ) {
                    the_post();  ?>
<h1><?php the_title(); ?> </h1>
<?php the_category();?><?php the_tags(); ?>
     
     <?php if ( has_post_thumbnail() ) : ?>
        <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
            <?php the_post_thumbnail('thumbnail'); ?>
        </a>
    <?php endif; ?>
     
     <?php the_content(); ?> 
     <?php echo get_post_meta( $post->ID, 'wpdocs-meta-post-text', true ); ?>     


     <?php previous_post_link('%link', '%title'); ?>
<?php next_post_link('%link', '%title'); ?>
    <br>
    <br>
        <?php if ( comments_open() || get_comments_number() ) :
    comments_template();
        else: 
            echo "Sorry no comments";
endif; ?>


<?php  	} // end while
             } // end if
            ?>


     </div> 
     <div class="col-xs-12 col-sm-4">

                <?php get_sidebar();?>

            </div>
     </div>
    </div>

<?php get_footer(); ?>  
     
