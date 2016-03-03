<?php
 /*
 Template Name: About
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package Hezy
 */

get_header(); ?>
    <div class="main-image"><?php if ( function_exists( 'cr_img_frontend' ) ) { cr_img_frontend(); } ?></div>
    <div class="content">
		<div class="col-6 text-left">

	        <?php while ( have_posts() ) : the_post(); ?>

	            <?php get_template_part( 'content', 'page' ); ?>

	        <?php endwhile; // end of the loop. ?>

    	</div>
    	<div class="row-content">
            <div class="slider_testimonials">
                <h4>TESTIMONIALS</h4>
                <ul class="bxslider">
                    <li>
                        <div class="description_wrap">
                            <div class="slide_description">
                                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim.</p>
                                <div class="author_name">Tobias van Schneider</div>
                            </div>
                            <div class="slider-img"><img src="<?php bloginfo('template_url') ?>/images/slider_image1.png" alt="image01" /></div>
                        </div>
                    </li>
                    <li>
                        <div class="description_wrap">
                            <div class="slide_description">
                                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim.</p>
                                <div class="author_name">Tobias van Schneider</div>
                            </div>
                            <div class="slider-img"><img src="<?php bloginfo('template_url') ?>/images/slider_image1.png" alt="image01" /></div>
                        </div>
                    </li>
                    <li>
                        <div class="description_wrap">
                            <div class="slide_description">
                                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim.</p>
                                <div class="author_name">Tobias van Schneider</div>
                            </div>
                            <div class="slider-img"><img src="<?php bloginfo('template_url') ?>/images/slider_image1.png" alt="image01" /></div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div><!-- .content -->
<?php get_footer(); ?>
