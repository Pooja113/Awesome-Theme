<?php get_header(); ?>
    <div class="row">
            <div class="col-xs-12 col-sm-8">
Single Book page
<?php 
            if ( have_posts() ) {
                while ( have_posts() ) {
                    the_post();  ?>
<h1><?php the_title(); ?> </h1>
<?php the_category();?><?php the_tags(); ?>
<?php echo post_taxonomy_slug_array('genre');
// foreach($cat as $a){
//     echo $a->name;
// } 
?>
     
     <?php if ( has_post_thumbnail() ) : ?>
        <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
            <?php the_post_thumbnail('thumbnail'); ?>
        </a>
    <?php endif; ?>
     
     <?php the_content(); ?> 

     <?php previous_post_link('%link', '%title'); ?>
<?php next_post_link('%link', '%title'); ?>
    <br>
    <br>
        <?php if ( comments_open() || get_comments_number() ) :
    comments_template();
        else: 
            echo "Sorry no comments";
endif; ?>

<li><span class="post-meta-key">Price:</span> <?php echo esc_html( get_post_meta( get_the_ID(), 'test12', true ) ); ?></li>

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
     
