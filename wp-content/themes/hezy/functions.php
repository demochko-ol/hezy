<?php
/**
 * Hezy functions and definitions
 *
 * @package Hezy
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'hezy_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function hezy_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Hezy, use a find and replace
	 * to change 'hezy' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'hezy', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	/*add_theme_support( 'automatic-feed-links' );*/

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	//add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'hezy' ),
        'categories' => __( 'Categories', 'hezy' ),
		'categories-filter' => __( 'Categories-filter', 'hezy' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link',
	) );

	// Setup the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'hezy_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );


	// Add woocommerce

	add_theme_support( 'woocommerce' );
    define('WOOCOMMERCE_USE_CSS', false);

    add_filter( 'woocommerce_show_page_title' , 'woo_hide_page_title' );

    function woo_hide_page_title() {
        return false;
    }

    remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );

    remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );
    remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );


	remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );
	remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10 );


    remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 10 );
    remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10 );
    remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );
    remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30 );/*
    remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 10 );
    remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 10 );
    remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 10 );*/

    /*add_action( 'woocommerce_after_single_product_summary', 'my_extra_fields_content', 30 );*/

    remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
    remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );
    remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5 );
    remove_action( 'woocommerce_single_variation', 'woocommerce_single_variation', 10 );

    add_action( 'price', 'woocommerce_single_variation', 10 );

    add_action('product_details', 'show_product_details', 20);
    add_action('product_details', 'woocommerce_template_single_add_to_cart', 30);

    add_action('email-form', 'show_email_form');
    add_action('product_share', 'woocommerce_template_single_sharing', 50);

    function show_product_details() {
       get_template_part( 'content', 'details' );
    }
    function show_email_form() {
       get_template_part( 'content', 'after' );
    }

    /*add_action( 'woocommerce_share', '');*/


    if (!function_exists('woocommerce_output_upsells')) {
        function woocommerce_output_upsells() {
            woocommerce_upsell_display(2,2); // Показать 4 товара а 4 колонки
        }
    }


    /*
    remove admin bar
    */
    show_admin_bar(false);

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function hezy_widgets_init() {

    register_sidebar( array(
        'name'          => __( 'Shopping Cart', 'hezy' ),
        'id'            => 'cart',
        'description'   => '',
        'before_widget' => '',
        'after_widget'  => '',
        'before_title'  => '<h4>',
        'after_title'   => '</h4>',
    ) );

    register_sidebar( array(
        'name'          => __( 'works', 'hezy' ),
        'id'            => 'works',
        'before_widget' => '',
        'after_widget'  => '',
        'before_title' => '',
        'after_title' => '',
    ) );

    register_sidebar( array(
        'name'          => __( 'e-mail', 'hezy' ),
        'id'            => 'e-mail',
        'before_widget' => '',
        'after_widget'  => '',
        'before_title' => '',
        'after_title' => '',
    ) );
}
add_action( 'widgets_init', 'hezy_widgets_init' );

}
endif; // hezy_setup

add_action( 'after_setup_theme', 'hezy_setup' );




/**
 *
 * Checkout
 */

// Hook in
add_filter( 'woocommerce_checkout_fields' , 'custom_override_checkout_fields' );

// Our hooked in function - $fields is passed via the filter!
function custom_override_checkout_fields( $fields ) {
    unset($fields['billing']['billing_company']);
    unset($fields['billing']['billing_address_1']);
    unset($fields['billing']['billing_address_2']);
    unset($fields['billing']['billing_city']);
    unset($fields['billing']['billing_postcode']);
    unset($fields['billing']['billing_country']);
    unset($fields['billing']['billing_state']);

    $fields['billing']['billing_first_name']['label'] = '';
    $fields['billing']['billing_first_name']['placeholder'] = 'First Name*';
    $fields['billing']['billing_last_name']['label'] = '';
    $fields['billing']['billing_last_name']['placeholder'] = 'Last Name*';
    $fields['billing']['billing_email']['label'] = '';
    $fields['billing']['billing_email']['placeholder'] = 'Email Address*';
    $fields['billing']['billing_phone']['label'] = '';
    $fields['billing']['billing_phone']['placeholder'] = 'Phone*';

    $fields['order']['order_comments']['label'] = '';
    return $fields;
}



/**
 *
 * Details
 */

// Добавляем метабокс
function add_custom_meta_box() {
    add_meta_box(
        'custom_meta_box', // $id
        'Details', // $title
        'show_custom_meta_box', // $callback
        'product', // $page
        'normal', // $context
        'high'); // $priority
}
add_action('add_meta_boxes', 'add_custom_meta_box');


// Массив полей
$prefix = 'custom_';//префикс необходим для избежания возможных ошибок, при совпадении имен нашего поля и полей которые могут быть добавленны различными плагинами
$custom_meta_fields = array(
    array(
        'label'=> 'File size',
        'desc' => '',
        'id' => $prefix.'filesize',
        'type' => 'text'//инпут
    ),
    array(
        'label'=> 'Last Updated',
        'desc' => '',
        'id' => $prefix.'update',
        'type' => 'text'//инпут
    )
);


// Обратный вызов
function show_custom_meta_box() {
    global $custom_meta_fields, $post;
// Используем скрытое поле для верификации
    echo '<input type="hidden" name="custom_meta_box_nonce" value="'.wp_create_nonce(basename(__FILE__)).'" />';

    // Начинаем таблицу полей и запускаем цикл
    echo '<table class="form-table">';
    foreach ($custom_meta_fields as $field) {
        // берём значение этого поля, если оно задано для этого поста
        $meta = get_post_meta($post->ID, $field['id'], true);
        // начинаем строку таблицы
        echo '<tr>
                <th><label for="'.$field['id'].'">'.$field['label'].'</label></th>
                <td>';
        switch($field['type']) {
            case 'text':
                echo '<input type="text" name="'.$field['id'].'" id="'.$field['id'].'" value="'.$meta.'" size="30" />
        <br /><span class="description">'.$field['desc'].'</span>';
                break;

        } //выход из switch
        echo '</td></tr>';
    } //заканчиваем цикл
    echo '</table>'; // закончить таблицу
}

// Сохраняем данные
function save_custom_meta($post_id) {
    global $custom_meta_fields;

    // проверяем
    if (!wp_verify_nonce($_POST['custom_meta_box_nonce'], basename(__FILE__)))
        return $post_id;
    // проверяем автосохранение
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
        return $post_id;
    // проверяем разрешения
    if ('page' == $_POST['post_type']) {
        if (!current_user_can('edit_page', $post_id))
            return $post_id;
    } elseif (!current_user_can('edit_post', $post_id)) {
        return $post_id;
    }

    // Проходим циклом по полям и сохраняем данные
    foreach ($custom_meta_fields as $field) {
        $old = get_post_meta($post_id, $field['id'], true);
        $new = $_POST[$field['id']];
        if ($new && $new != $old) {
            update_post_meta($post_id, $field['id'], $new);
        } elseif ('' == $new && $old) {
            delete_post_meta($post_id, $field['id'], $old);
        }
    } //выход из foreach
}
add_action('save_post', 'save_custom_meta');






/**
 * Enqueue scripts and styles.
 */
function hezy_scripts() {

    wp_enqueue_style('jquery.fpSlider', get_template_directory_uri(). '/css/jquery.fpSlider.css');
    wp_enqueue_style('jquery.bxslider', get_template_directory_uri(). '/css/jquery.bxslider.css');
    wp_enqueue_style('hover-style', get_template_directory_uri(). '/css/hover-style.css');
    /*wp_enqueue_style('hover-style', get_template_directory_uri(). '/css/queryLoader.css');*/

    wp_enqueue_style('styles', get_template_directory_uri(). '/styles.css');

    wp_enqueue_script('jquery.min', 'https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js');
    wp_enqueue_script('jquery-ui.min', 'http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.0/jquery-ui.min.js');
    wp_enqueue_script('jquery.slimscroll.min', get_template_directory_uri(). '/js/jquery.slimscroll.min.js');

    wp_enqueue_script('fpSlider', get_template_directory_uri(). '/js/fpSlider.js');
    wp_enqueue_script('jquery-hover-effect', get_template_directory_uri(). '/js/jquery-hover-effect.js');
    wp_enqueue_script('jquery.bxslider', get_template_directory_uri(). '/js/jquery.bxslider.js');

    /*wp_enqueue_script('fpSlider', get_template_directory_uri(). '/js/queryLoader.js');*/
    
    wp_enqueue_script('js', get_template_directory_uri(). '/js/js.js');

	/*wp_enqueue_script( 'hezy-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'hezy-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );*/

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'hezy_scripts' );


/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';
