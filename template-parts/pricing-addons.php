<?php
$products_args = array(
    "post_type" => "product",
    "posts_per_page" => -1, 
    "status" => "publish"
);
$products = new WP_Query($products_args);
if ($products->have_posts()) :
?>
<div class="pricing-addons">
    <?php while ($products->have_posts()): $products->the_post(); ?>
    <?php $product = wc_get_product(get_the_id()); if ($product->get_type() == "addon") : ?>
    <label class="course-addons-item pricing-addons-item" for="<?php echo "addon" . $product->get_id() ?>">
        <label class="custom-chkbox" for="<?php echo "addon" . $product->get_id() ?>" class="course-addons-item-chkbox">
            <input autocomplete="off" class="addon-chkbox" type="checkbox"
                name="<?php echo "addon" . $product->get_id() ?>" id="<?php echo "addon" . $product->get_id() ?>"
                value="<?php echo $product->get_id() ?>">
            <span></span>
        </label>
        <div class="course-addons-item-content">
            <h2 class="course-addons-item-title"><?php echo $product->get_name(); ?></h2>
            <?php if (!empty($product->get_short_description())): ?>
            <p class="course-addons-item-info"><?php echo $product->get_short_description() ?></p>
            <?php endif; ?>
            <p class="course-addons-item-action">
                <span class="course-addons-item-price">
                    <?php echo empty($product->get_sale_price()) ? $product->get_regular_price() : $product->get_sale_price(); ?>
                    zł
                </span>
            </p>
        </div>
        <div class="course-addons-item-loading">
            <div class="lds-ellipsis">
                <div></div>
                <div></div>
                <div></div>
                <div></div>
            </div>
        </div>
    </label>
    <?php endif; ?>
    <?php endwhile; ?>
</div>

<?php else: ?>
<div class="pricing-addons no-addons"></div>
<?php endif; ?>