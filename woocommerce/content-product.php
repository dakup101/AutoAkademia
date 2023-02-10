<?php

/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined('ABSPATH') || exit;

global $product;

// Ensure visibility.
if (empty($product) || !$product->is_visible()) {
    return;
}

if ($product->get_type() == "addon") return;
?>
<div class="course-archive-item col-12 item-<?php echo $product->get_type(); ?>">
    <div class="course-archive-item-content">
        <div class="course-archive-item-img">
            <?php echo $product->get_image("large") ?>
            <span class="course-archive-item-img-label"></span>
        </div>
        <div class="course-archive-item-info">
            <div class="row">
                <div class="col-md-9 col-xl-8 col-12">
                    <h2><?php echo $product->get_name(); ?></h2>
                    <?php
                    $meets = $product->get_attribute("pa_spotkania");
                    $time = $product->get_attribute("pa_czas");
                    $rides = $product->get_attribute("pa_jazdy");
                    // START | if attributes
                    if (!empty($meets) && !empty($time) && !empty($rides)) :
                    ?>
                    <div class="course-attrs course-archive-item-attrs">
                        <div class="course-attrs-item meets">
                            <img src="<?php echo THEME_IMG . "student.svg" ?>" alt="">
                            <span><?php echo $meets ?></span>
                        </div>
                        <div class="course-attrs-item rides">
                            <img src="<?php echo THEME_IMG . "wheel.svg" ?>" alt="">
                            <span><?php echo $rides ?></span>
                        </div>
                        <div class="course-attrs-item time">
                            <img src="<?php echo THEME_IMG . "calendar.svg" ?>" alt="">
                            <span><?php echo $time ?></span>
                        </div>
                    </div>
                    <?php
                    endif;
                    // END | if attributes
                    ?>
                </div>
                <div class="col-md-3 col-xl-4 col-12">
                    <div class="course-archive-item-price course-price">
                        <?php if (!empty($product->get_sale_price())) : ?>
                        <span class="course-price-value old">
                            <?php echo $product->get_regular_price() ?>
                        </span>
                        <span class="course-price-value">
                            <?php echo $product->get_sale_price() ?>
                        </span>

                        <?php else : ?>
                        <span class="course-price-value">
                            <?php echo $product->get_regular_price() ?>
                        </span>
                        <?php endif; ?>

                        <span class="course-price-currency">
                            <?php echo get_woocommerce_currency_symbol(); ?>
                        </span>
                    </div>
                </div>
            </div>
            <div class="course-archive-item-desc">
                <?php echo $product->get_short_description(); ?>
            </div>
            <div class="course-buttons">
                <a href="<?php echo $product->get_permalink(); ?>" class="btn btn--primary">
                    Zapisz się na kurs
                </a>
                <a href="/zadaj-pytanie" class="btn btn--secondary">
                    Zadaj pytanie
                </a>
            </div>
        </div>
    </div>
</div>