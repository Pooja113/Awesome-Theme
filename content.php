
Standard Post<h1><?php the_title(); ?> </h1>
     
     <?php if ( has_post_thumbnail() ) : ?>
        <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
            <?php the_post_thumbnail('thumbnail'); ?>
        </a>
    <?php endif; ?>
     
     <?php the_content(); ?>    
