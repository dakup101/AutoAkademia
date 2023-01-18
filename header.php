<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="apple-touch-icon" sizes="180x180"
        href="<?= get_template_directory_uri(); ?>/dist/images/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32"
        href="<?= get_template_directory_uri(); ?>/dist/images/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16"
        href="<?= get_template_directory_uri(); ?>/dist/images/favicon-16x16.png">
    <link rel="manifest" href="<?= get_template_directory_uri(); ?>/dist/images/site.webmanifest">
    <title><?php echo wp_title(); ?></title>
    <?php wp_head(); ?>

</head>


<body <?php body_class(); ?>>

    <header class="header">
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div
                        class="col-12 col-md-11 offset-md-1 d-flex justify-content-between flex-column flex-lg-row align-contnent-center">

                        <?php if ($contact_email = get_field('contact_email', 'options')) : ?>
                        <div class="header__top-group d-flex align-items-center justify-content-center">
                            <img src="<?= get_template_directory_uri(); ?>/dist/images/mail.svg" alt=""
                                class="header__top-icon">
                            <p class="header__top-text">
                                <strong>Napisz do nas:</strong>
                                <a href="mailto: <?= $contact_email; ?>"
                                    class="header__top-text header__top-text--link"><?= $contact_email; ?></a>
                            </p>
                        </div>
                        <?php endif; ?>

                        <div class="header__top-group d-flex align-items-center justify-content-center">
                            <img src="<?= get_template_directory_uri(); ?>/dist/images/location.svg" alt=""
                                class="header__top-icon">
                            <p class="header__top-text">
                                <strong>Nasze nowe biuro: </strong>
                                <a href="#" class="header__top-text header__top-text--link">ul . Balicka 77, Kraków</a>
                            </p>

                        </div>
                        <?php if (have_rows('social', 'options')) : ?>
                        <div class="header__top-group d-flex align-items-center justify-content-center">
                            <img src="<?= get_template_directory_uri(); ?>/dist/images/social.svg" alt=""
                                class="header__top-icon">
                            <p class="header__top-text">
                                <strong>Sprawdź nasze social media: </strong>
                            </p>
                            <?php while (have_rows('social', 'options')) : the_row(); ?>
                            <a href="<?= get_sub_field('link'); ?>" class="header__top-social-icon">
                                <?= wp_get_attachment_image(get_sub_field('icon')); ?>
                            </a>
                            <?php endwhile; ?>
                        </div>
                        <?php endif; ?>

                    </div>
                </div>
            </div>
        </div>

        <div class="header__nav">
            <div class="container">
                <div class="row align-items-center">

                    <?php if ($logo = get_field('logo', 'options')) : ?>

                    <a href="<?= esc_url(home_url()); ?>" class="header__logo col-5 col-xs-3 col-lg-2">
                        <?= wp_get_attachment_image($logo, 'full'); ?>
                    </a>

                    <?php endif; ?>

                    <nav class="col-7 col-xs-9 col-lg-10 col-xl-8 header__menu">
                        <?php get_template_part('/components/courses-menu', '', array(
              'menu' => 'footer-menu',
              'class' => 'header__menu-items'
            )); ?>
                        <a href="/kursy/" class="btn btn--primary header__sign-up">Zapisz się na kurs</a>
                        <a href="<?php echo wc_get_cart_url() ?>" class="header__cart">
                            <img src="<?= get_template_directory_uri(); ?>/dist/images/cart.svg" alt="">
                        </a>
                        <button class="header__burger">
                            <div class="header__burger-bar header__burger-bar--top"></div>
                        </button>
                    </nav>
                </div>
            </div>
            <div class="header__call-container">
                <div class="header__call d-flex align-tems-center">
                    <img src="<?= get_template_directory_uri(); ?>/dist/images/contact-phone.svg" alt=""
                        class="header__call-icon">
                    <div class="d-flex flex-column justify-content-center">
                        <p class="header__call-text">
                            Zadzwoń do nas i zacznij z nami jeździć
                        </p>

                        <?php if ($phone = get_field('phone_sign_up', 'options')) : ?>

                        <a href="tel: <?= trim($phone); ?>" class="header__call-phone">
                            <?= $phone; ?>
                        </a>

                        <?php endif; ?>

                    </div>
                </div>
            </div>
        </div>

        <div class="header__mobile-menu-container">
            <nav class="header__mobile-menu">
                <!-- Logo -->
                <?php if ($logo = get_field('logo', 'options')) : ?>

                <a href="<?= esc_url(home_url()); ?>" class="header__mobile-logo">
                    <?= wp_get_attachment_image($logo, 'full'); ?>
                </a>

                <?php endif; ?>
                <!-- Menu -->
                <?php get_template_part('/components/courses-menu', '', array(
          'menu' => 'footer-menu',
          'class' => 'header__mobile-menu-items'
        )); ?>

                <!-- Sign up -->
                <a href="/kursy/" class="btn btn--primary">Zapisz się na kurs</a>

                <!-- New office -->
                <?php if ($footer_address = get_field('footer_address', 'options')) : ?>

                <div class="header__mobile-address">
                    <h3 class="header__mobile-address-heading">
                        <?= $footer_address['heading']; ?>
                    </h3>
                    <?= $footer_address['address']; ?>
                </div>

                <?php endif; ?>
                <!-- Call -->
                <div class="header__mobile-call">
                    <p class="header__mobile-call-text">
                        Zadzwoń do nas i zacznij z nami jeździć
                    </p>

                    <?php if ($phone = get_field('phone_sign_up', 'options')) : ?>

                    <a href="tel: <?= trim($phone); ?>" class="header__mobile-call-phone">
                        <?= $phone; ?>
                    </a>

                    <?php endif; ?>

                </div>

                <?php if (have_rows('social', 'options')) : ?>
                <div class="header__mobile-social d-flex align-items-center justify-content-center">
                    <?php while (have_rows('social', 'options')) : the_row(); ?>
                    <a href="<?= get_sub_field('link'); ?>" class="header__mobile-social-icon">
                        <?= wp_get_attachment_image(get_sub_field('icon')); ?>
                    </a>
                    <?php endwhile; ?>
                </div>
                <?php endif; ?>


            </nav>
            <button class="header__mobile-menu-close">

            </button>
        </div>

    </header>

    <?php if (get_post_type($post) !== "product"): ?>
    <div class="scroll">
        <div class="scroll__progress">
            <div class="scroll__progress-bar"></div>
        </div>
        <div class="scroll__text">
            Powrót na górę
        </div>
    </div>
    <?php endif; ?>