<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WP_Bootstrap_Starter
 */

?>
<!DOCTYPE html>
<html id="scrolltop" <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

    <?php

    // WordPress 5.2 wp_body_open implementation
    if (function_exists('wp_body_open')) {
        wp_body_open();
    } else {
        do_action('wp_body_open');
    }

    ?>

    <div id="page" class="site">
        <?php if (!get_theme_mod('navbar_acessibility')) : ?>
            <nav id="nav-accessibility" class="accessibility nav d-none d-lg-block">
                <a class="py-1 px-3" href="#content" accesskey="1">Ir para o conteúdo principal</a>
                <a class="py-1 px-3" href="#nav" accesskey="2">Ir para o menu</a>
                <a class="py-1 px-3" href="#colophon" accesskey="3">Ir para o rodapé</a>
                <?php if(!get_theme_mod('high-contrast-accessibility')): ?>
                    <a class="py-1 px-3" href="#" id="btn-contrast" accesskey="4">Alto Contraste</a>
                <?php endif; ?>
            </nav>
        <?php endif; ?>
        <!--
        <a class="skip-link screen-reader-text" href="#content"><?php esc_html_e('Skip to content', 'wp-accessible-starter'); ?></a>
        -->
        <?php if (!is_page_template('blank-page.php') && !is_page_template('blank-page-with-container.php')) : ?>
            <header id="masthead" class="site-header navbar-static-top <?= get_theme_mod('navigation_sticky_top') ? 'sticky-top' : ''; ?>" role="banner">
                <div class="container<?= get_theme_mod('navigation_full_width') ? '-fluid' : ''; ?>">
                    <nav id="nav" class="navbar navbar-expand-lg p-0">
                        <div class="navbar-brand">
                            <?php if (get_theme_mod('wp_accessible_starter_logo')) : ?>
                                <a href="<?php echo esc_url(home_url('/')); ?>">
                                    <img src="<?php echo esc_url(get_theme_mod('wp_accessible_starter_logo')); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?>">
                                </a>
                            <?php else : ?>
                                <a class="site-title" href="<?php echo esc_url(home_url('/')); ?>"><?php esc_url(bloginfo('name')); ?></a>
                            <?php endif; ?>

                        </div>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-nav" aria-controls="nav" aria-expanded="false" aria-label="Toggle navigation">
                            <i class="fas fa-bars"></i>
                        </button>

                        <?php
                        wp_nav_menu(array(
                            'theme_location'    => 'primary',
                            'container'       => 'div',
                            'container_id'    => 'main-nav',
                            'container_class' => 'collapse navbar-collapse justify-content-' . (is_active_sidebar('header-right') ? 'center' : 'end'),
                            'menu_id'         => false,
                            'menu_class'      => 'navbar-nav',
                            'depth'           => 3,
                            'fallback_cb'     => 'wp_bootstrap_navwalker::fallback',
                            'walker'          => new wp_bootstrap_navwalker()
                        ));
                        ?>

                        <?php if (is_active_sidebar('header-right')) : ?>
                            <?php dynamic_sidebar('header-right'); ?>
                        <?php endif; ?>
                    </nav>
                </div>
            </header><!-- #masthead -->
            <?php if (is_front_page() && !get_theme_mod('header_banner_visibility')) : ?>
                <?php
                $header_images = get_uploaded_header_images();/* return all images uploaded header*/
                if (count($header_images) > 1) :/* create slide if more one image */
                    $header_images_index = 0;
                ?>
                    <div id="carouselHeader" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <?php foreach ($header_images as $image) : ?>
                                <li data-target="#carouselHeader" data-slide-to="<?= $header_images_index; ?>" <?= $header_images_index == 0 ? 'class="active"' : ''; ?>></li>
                            <?php
                                $header_images_index++;
                            endforeach;
                            ?>
                        </ol>
                        <div class="carousel-inner">
                            <?php
                            $header_images_index = 0;
                            foreach ($header_images as $image) :
                                $image['alt_text'] = get_post_meta( $image['attachment_parent'], '_wp_attachment_image_alt', true);
                            ?>
                                <div class="carousel-item <?= $header_images_index == 0 ? 'active' : ''; ?>">
                                    <img src="<?= $image['url'] ?>" class="d-block w-100" alt="<?= $image['alt_text'] ?>">
                                </div>
                            <?php
                                $header_images_index++;
                            endforeach;
                            ?>
                        </div>
                        <a class="carousel-control-prev" href="#carouselHeader" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only"><?= __('Previous', 'wp-accessible-starter'); ?></span>
                        </a>
                        <a class="carousel-control-next" href="#carouselHeader" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only"><?= __('Next', 'wp-accessible-starter'); ?></span>
                        </a>
                    </div>
                <?php else : ?>
                    <div id="page-sub-header" <?php if (has_header_image()) { ?>style="background-image: url('<?php header_image(); ?>');" <?php } ?>>
                        <div class="container">
                            <h1>
                                <?php
                                if (get_theme_mod('header_banner_title_setting')) {
                                    echo esc_attr(get_theme_mod('header_banner_title_setting'));
                                } else{
                                    echo 'WordPress + Bootstrap + Accessibility';
                                }
                                ?>
                            </h1>
                            <p>
                                <?php
                                if (get_theme_mod('header_banner_tagline_setting')) {
                                    echo esc_attr(get_theme_mod('header_banner_tagline_setting'));
                                } else{
                                    echo esc_html__('To customize the contents of this header banner and other elements of your site, go to Dashboard > Appearance > Customize','wp-bootstrap-starter');
                                }
                                ?>
                            </p>
                            <a href="#content" class="page-scroller"><i class="fa fa-fw fa-angle-down"></i></a>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endif; ?>
            <div id="content" class="site-content">
                <div class="container<?= is_page_template('fullwidth.php') ? '-fluid' : ''; ?>">
                    <div class="row">
                    <?php endif; ?>