<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package Hezy
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<!--
	--><?php /*the_title( '<h4>', '</h4>' ); */?>
	
	<?php the_content(); ?>
	<?php
		wp_link_pages( array(
			'before' => '<div class="page-links">' . __( 'Pages:', 'hezy' ),
			'after'  => '</div>',
		) );
	?>

</article><!-- #post-## -->
