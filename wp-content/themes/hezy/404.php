<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @package Hezy
 */

get_header(); ?>

<div class="content">

			<section class="error-404 not-found">
				<header class="page-header">
					<h1 class="page-title"><?php _e( '404', 'hezy' ); ?></h1>
					<h1 class="page-title"><?php _e( 'Oops! That page can&rsquo;t be found.', 'hezy' ); ?></h1>
				</header><!-- .page-header -->

				<div class="page-content">
					<p><?php _e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'hezy' ); ?></p>



					<?php /*if ( hezy_categorized_blog() ) : // Only show the widget if site has multiple categories. */?><!--
					<div class="widget widget_categories">
						<h2 class="widget-title"><?php /*_e( 'Most Used Categories', 'hezy' ); */?></h2>
						<ul>
						<?php
/*							wp_list_categories( array(
								'orderby'    => 'count',
								'order'      => 'DESC',
								'show_count' => 1,
								'title_li'   => '',
								'number'     => 10,
							) );
						*/?>
						</ul>
					</div><!-- .widget -->
					<?php /*endif; */?>




				</div><!-- .page-content -->
			</section><!-- .error-404 -->

	</div><!-- #primary -->

<?php get_footer(); ?>
