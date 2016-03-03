<?php
/**
 * Single Product Screenshots
 *
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $post, $woocommerce, $product;

$filesize = get_post_meta($post->ID, 'custom_filesize',  1);
$update = get_post_meta($post->ID, 'custom_update', 1);
    ?>
    <div class="details">
        <ul>
            <li>
                <span>File size:</span>
                <b>
                    <?php echo $filesize ?>
                </b>
            </li>
            <li>
                <span>Last Updated:</span>
                <b>
                    <?php echo $update ?>
                </b>
            </li>
        </ul>
    </div>
</div>



