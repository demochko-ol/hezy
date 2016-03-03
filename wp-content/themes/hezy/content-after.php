<?php
/**
 * @package Hezy
 */
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $post, $woocommerce, $product;

?>


</div><!-- #works -->
<div class="mail_block ">
    <!--<h5>join our newsletter for updates and special offers</h5>
    <input type="text" placeholder="E-mail address" name=""/>-->
    <?php dynamic_sidebar( 'e-mail' ); ?>
</div>