<?php $featured_pricing = get_field("pricing_featured"); ?>
<div class="pricing-featured">
    <?php foreach($featured_pricing as $item): $is_popular = $item['is_popular']; ?>
    <div class="pricing-featured-item-wrapper">
        <article class="pricing-featured-item <?php if ($is_popular) echo "popular" ?>">
            <?php $product = wc_get_product($item['product']) ?>
            <header class="pricing-featured-item-header">
                <h2><?php echo $product->get_name(); ?></h2>
                <span><?php echo $item['subtitle']; ?></span>
            </header>
            <main class="pricing-featured-item-text text">
                <?php $list = get_field("pricing_list", $product->get_id()) ?>
                <ul>
                    <?php foreach($list as $el): ?>
                    <li><?php echo $el['item'] ?></li>
                    <?php endforeach; ?>
                </ul>
            </main>
            <footer>
                <div class="pricing-featured-item-price course-price">
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
                <a class="btn btn--secondary" href="<?php echo $product->get_permalink(); ?>">
                    Czytaj więcej
                </a>
            </footer>
        </article>
    </div>
    <?php endforeach;?>
</div>