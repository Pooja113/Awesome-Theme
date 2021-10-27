<?php get_header(); ?>
    <div class="row">
            <div class="col-xs-12 col-sm-8">
Single Page

<h1><?php the_title(); ?> </h1>
<?php the_category();?><?php the_tags(); ?>
     
     <?php if ( has_post_thumbnail() ) : ?>
        <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
            <?php the_post_thumbnail('thumbnail'); ?>
        </a>
    <?php endif; ?>
     
     <?php the_content(); ?> 
     </div> 
     <div class="col-xs-12 col-sm-4">

                <?php get_sidebar();?>

            </div>
     </div>
    </div>

<?php get_footer(); ?>  
     
