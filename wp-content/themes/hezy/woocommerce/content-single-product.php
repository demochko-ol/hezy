<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * Override this template by copying it to yourtheme/woocommerce/content-single-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
global $post, $woocommerce, $product;
?>

<?php
	/**
	 * woocommerce_before_single_product hook
	 *
	 * @hooked wc_print_notices - 10
	 */
	 do_action( 'woocommerce_before_single_product' );

	 if ( post_password_required() ) {
	 	echo get_the_password_form();
	 	return;
	 }
?>
<div itemscope itemtype="<?php echo woocommerce_get_product_schema(); ?>" id="product-<?php the_ID(); ?>" <?php post_class(); ?>>

    <div class="cart-btn">
        <?php
        /**
         * header_add_to_cart_button hook
         *
         * @hooked woocommerce_template_loop_price - 20
         */
        do_action( 'price' );
        ?>
    </div>

    <?php
    /**
     * woocommerce_before_single_product_summary hook
     *
     * @hooked woocommerce_show_product_sale_flash - 10
     * @hooked woocommerce_show_product_images - 20
     */
    do_action( 'woocommerce_before_single_product_summary' );
    ?>

    <div class="col-6 product_description"><?php the_content(); ?></div>

    <?php do_action( 'woocommerce_product_thumbnails' ); ?>

    <div class="col-8 product_description">

        <h4>FEATURES & DETAILS</h4>

        <div class="pluses">
            <?php
            /**
             * woocommerce_single_product_summary hook
             *
             * @hooked woocommerce_template_single_title - 5
             * @hooked woocommerce_template_single_rating - 10
             * @hooked woocommerce_template_single_price - 10
             * @hooked woocommerce_template_single_excerpt - 20
             * @hooked woocommerce_template_single_add_to_cart - 30
             * @hooked woocommerce_template_single_meta - 40
             * @hooked woocommerce_template_single_sharing - 50
             */
            do_action( 'woocommerce_single_product_summary' );
            ?>
        </div>

        <?php
        /**
         * @hooked show_product_details - 30
         */
        do_action('product_details');
        ?>

    <div class="social">
        <?php
        /**
         * woocommerce_after_single_product_summary hook
         *
         * @hooked woocommerce_template_single_sharing - 30
         */
        do_action('product_share');
        ?>
    </div>


	<meta itemprop="url" content="<?php the_permalink(); ?>" />

</div><!-- #product-<?php the_ID(); ?> -->

<?php do_action( 'woocommerce_after_single_product' ); ?>
