<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package Hezy
 */

get_header(); ?>

		<?php if ( is_home() || is_front_page() ) : ?>

            <?php get_template_part( 'content', 'before' ); ?>

		<?php endif; ?>

		<div class="content">

	        <div class="works row-content">
	        	
	            <?php woocommerce_content(); ?>

            </div><!-- .works .row-content -->

        </div><!-- .content -->

		<?php if ( is_home() || is_front_page() ) : ?>
			
			<?php get_footer('main'); ?>

		<?php else : ?>

			<?php get_footer(); ?>

		<?php endif; ?>


