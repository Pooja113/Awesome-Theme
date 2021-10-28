<?php get_header(); ?>

<h1>Book Page</h1>
<?php
$args = array(
    'post_type'      => 'book',
    'posts_per_page' => 10,
);
$loop = new WP_Query($args);
while ( $loop->have_posts() ) {
    $loop->the_post();
    ?>
    <div class="entry-content">

        Posted on: <?php the_time('F j, Y');?> in <?php the_category();?>
        <h1><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" ><?php the_title(); ?></a> </h1>
     
     <?php if ( has_post_thumbnail() ) : ?>
        <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
            <?php the_post_thumbnail('thumbnail'); ?>
        </a>
    <?php endif; ?>

        <?php the_content(); ?>
    </div>
    <?php
}

?>
<?php get_footer(); ?>