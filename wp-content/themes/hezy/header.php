<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Hezy
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?php wp_title( '|', true, 'right' ); ?></title>
        <link rel="profile" href="http://gmpg.org/xfn/11">
        <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script charset="utf-8" type="text/javascript">var switchTo5x=true;</script>
        <script charset="utf-8" type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
        <script charset="utf-8" type="text/javascript">stLight.options({"publisher":"773e0980-f565-48b9-9511-32d62a1206c7","doNotCopy":true,"hashAddressBar":false,"doNotHash":true});var st_type="wordpress4.0";</script>
        <?php wp_head(); ?>
    </head>

<body <?php body_class(); ?>>
    <?php if ( is_home() || is_front_page() ) : ?>
        <div id="preloader">
            <div class="bar">
                <span class="line"></span>
                <span class="perc">0%</span>
            </div>
        </div>
    <?php else : ?>
    <?php endif; ?>
<div class="wrapper">

    <header  class="top-nav fixed-nav page-nav" role="banner">
        <div class="nav_content">
            <button type="button" class="navbar_button glyphicon glyphicon-th-list"></button>
            <a href="#" class="glyphicon shopping-cart-button">
                <img src="<?php bloginfo('template_url') ?>/images/shopping-cart.png" alt="">
                <img class="white" src="<?php bloginfo('template_url') ?>/images/shopping-cart-white.png" alt="">
            </a>
            <?php if ( is_home() || is_front_page() ) : ?>
                <ol class="breadcrumb">
                    <li><a class="navbar-brand" href="<?php echo home_url();?>"><?php bloginfo('name');?></a></li>
                    <li class="active">Works</li>
                </ol>
            <?php else : ?>
                <?php
                $args = array(
                    'home' => 'Hezy'
                );
                ?>
                <?php woocommerce_breadcrumb( $args ); ?>

                <?php if ( is_product_category() ) : ?>
                    <div class="fixed_panel">
                        <h4>
                            <?php woocommerce_page_title(); ?>
                        </h4>
                    </div>
                <?php else : ?>
                    <div class="fixed_panel">
                        <h4 class="product_title">
                            <?php the_title(); ?>
                        </h4>
                    </div>
                <?php endif; ?>
            <?php endif; ?>

        </div>
    </header><!-- top-nav -->

    <div class="main_nav">
        <div>

            <?php wp_nav_menu( array( 'theme_location' => 'categories' ) ); ?>
            <?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>

            <div class="socicon">
                <a href="https://www.facebook.com/hezytheme">b</a>
                <a href="https://twitter.com/hezytheme">a</a>
                <a href="https://dribbble.com/hezy">D</a>
                <a href="http://www.pinterest.com/hezytheme/">d</a>
                <a href="https://www.behance.net/hezytheme">H</a>
            </div>
        </div>
    </div>

    <div class="shopping-cart">
        <div>
            <?php dynamic_sidebar( 'cart' ); ?>
        </div>
    </div>
