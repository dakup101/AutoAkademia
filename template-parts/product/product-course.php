<?php
global $product; 
global $post;
$show_aside_list = !empty(get_field('aside_title')) && !empty(get_field('aside_list'));
?>
<?php get_template_part('/template-parts/banner'); ?>
<div class="container course-content">
    <div class="row">
        <div class="col-12 col-xl-10 offset-xl-1">
            <h2 class="heading-secondary">Szczegóły kursu</h2>
            <div class="row reverse-on-mobile">
                <div class="col-12 col-md-7 col-xl-8">
                    <div class="text">
                        <?php the_content(); ?>
                    </div>
                </div>
                <div class="col-12 col-md-5 col-xl-4">
                    <div class="course-rating">
                        <?php get_template_part('/components/rating', '', ['rating' => 4.5]); ?>
                        <p>
                            <strong>Nasza ocena to 4,65</strong><br>
                            (Na podstawie 723 opinii naszych kursantów)
                        </p>
                    </div>

                    <div class="course-aside">
                        <?php
                        $meets = $product->get_attribute("pa_spotkania");
                        $time = $product->get_attribute("pa_czas");
                        $rides = $product->get_attribute("pa_jazdy");
                        // START | if attributes
                        if (!empty($meets) && !empty($time) && !empty($rides)) :
                        ?>
                        <div class="course-attrs">
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
                        <?php
                        // START | if list
                        if ($show_aside_list) :
                        ?>
                        <div class="text">
                            <strong class="course-aside-list-title"><?php echo get_field('aside_title') ?></strong>
                            <ul>
                                <?php foreach(get_field('aside_list') as $list) : ?>
                                <li><?php echo $list['item'] ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                        <?php
                        endif;
                        // END | if list
                        ?>
                        <div class="course-aside-price">
                            <div class="course-price">
                                <?php if (!empty($product->get_sale_price())): ?>
                                <span class="course-price-value old">
                                    <?php echo $product->get_regular_price() ?>
                                </span>
                                <span class="course-price-value">
                                    <?php echo $product->get_sale_price() ?>
                                </span>

                                <?php else: ?>
                                <span class="course-price-value">
                                    <?php echo $product->get_regular_price() ?>
                                </span>
                                <?php endif; ?>

                                <span class="course-price-currency">
                                    <?php echo get_woocommerce_currency_symbol(); ?>
                                </span>
                            </div>
                            <button class="btn btn--primary add-to-cart"
                                data-product="<?php echo $product->get_id(); ?>">
                                Zapisz się on-line
                            </button>
                        </div>
                    </div>
                    <div id="courseFixedAnchorMobile"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="courseFixedAnchorDesktop"></div>
<div class="container course-info">
    <div class="row">
        <div class="col-12 col-md-10 offset-md-1">
            <div class="row">
                <div class="col-12 col-md-6">
                    <div class="course-info-img-wrapper">
                        <img src="<?php echo get_field("course_img_left_img") ?>" alt="">
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="text">
                        <?php echo get_field("course_img_left_content") ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php if (!empty(get_field('course_car_content'))) : ?>
<div class="container course-cars">
    <div class="row">
        <div class="col-12 col-md-10 offset-md-1">
            <h2 class="course-cars-title heading-secondary">Egzamin na samochodzie szkoleniowym Akademii</h2>
            <div class="row">
                <div class="col-md-8">
                    <div class="text">
                        <?php echo get_field('course_car_content'); ?>
                    </div>
                </div>
                <div class="col-md-4">
                    <?php
                    $cars = new WP_Query(array(
                        "post_type" => "cars",
                        'posts_per_page' => -1,
                    ));
                    if ($cars->have_posts()) :
                    ?>
                    <div class="course-cars-fixed">
                        <?php while ($cars->have_posts()) : $cars->the_post(); ?>
                        <div class="course-cars-fixed-item">
                            <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="">
                            <span class="course-cars-fixed-item-title">
                                <?php echo get_the_title() . ' - ' . get_field('engine'); ?>
                            </span>
                            <span class="course-cars-fixed-item-dimensions">
                                Wymiary: <?php echo get_field('dimensions'); ?>
                            </span>
                        </div>
                        <?php endwhile; ?>
                        <img src="<?php echo THEME_IMG . 'aa-shape.svg' ?>" alt="" class="course-cars-fixed-bg">
                    </div>
                    <?php
                    wp_reset_query();
                    endif;
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>
<div class="course-fixed">
    <div class="container ">
        <div class="row">
            <div class="col-12 col-md-10 offset-md-1">
                <div class="course-fixed-content">
                    <div class="course-fixed-title heading-secondary">
                        Kurs Wieczorowy (Kat. A)
                    </div>
                    <div class="course-fixed-price">
                        <div class="course-price">
                            <?php if (!empty($product->get_sale_price())): ?>
                            <span class="course-price-value old">
                                <?php echo $product->get_regular_price() ?>
                            </span>
                            <span class="course-price-value">
                                <?php echo $product->get_sale_price() ?>
                            </span>

                            <?php else: ?>
                            <span class="course-price-value">
                                <?php echo $product->get_regular_price() ?>
                            </span>
                            <?php endif; ?>

                            <span class="course-price-currency">
                                <?php echo get_woocommerce_currency_symbol(); ?>
                            </span>
                        </div>
                        <button class="btn btn--primary add-to-cart" data-product="<?php echo $product->get_id(); ?>">
                            Zapisz się on-line
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_template_part('/template-parts/course-popup'); ?>