<?php
/**
 * Template Name: licensing
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package Hezy
 */

get_header(); ?>
    <div class="content">
		<div class="col-6 text-left">

	        <?php while ( have_posts() ) : the_post(); ?>

	            <?php get_template_part( 'content', 'page' ); ?>

	        <?php endwhile; // end of the loop. ?>

    	</div>
    </div><!-- .content -->

<?php get_footer(); ?>
