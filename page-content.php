<?php 
/* 
Template Name: About Template
*/ 
?>

<?php get_header(); ?>

<h1>About Us Page!!</h1>
<?php 
if ( have_posts() ) {
	while ( have_posts() ) {
		the_post();  ?>
        Posted on: <?php the_time('F j, Y');?> in <?php the_category();?>
     <h1><?php the_title(); ?> </h1> 
     
     <?php the_content(); ?>
     
     <hr>
<?php 	} // end while
} // end if
?>
<?php get_footer(); ?>