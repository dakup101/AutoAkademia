<?php
add_action('init', 'get_product_addons');

function get_product_addons()
{
    add_action('wp_ajax_nopriv_get_product_addons', 'get_product_addons_handle');
    add_action('wp_ajax_get_product_addons', 'get_product_addons_handle');
}

function get_product_addons_handle()
{
    global $woocommerce;
    $product_id = $_POST['product_id'];
    $addons = get_field("course_addons", $product_id);
    if (!empty($addons)) {
        echo get_product_addons_response($addons);
        wp_die();
    }
    echo get_product_addons_response_fail();
    wp_die();
}


function get_product_addons_response($addons)
{
    ob_start();
    // FUNCTION MARKUP START
?>
<!-- <div class="course-addons-info">
    <div class="heading-primary">
        <h2><em><strong>94% uczniów</strong></em><br>
            <strong>zdaje egzamin</strong><br>
            dzięki dodatkom
        </h2>
    </div>
    <p>
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequuntur, eveniet corrupti facilis beatae
        expedita tempora illum. Et nam esse dignissimos.
    </p>
    <div>
        <img src="<?php // echo THEME_IMG . "terminy_popup.png" 
                    ?>" alt="">

    </div>
</div> -->
<div class="course-addons-picker">
    <div class="heading-primary">
        <h2>
            <strong>Do tego kursu polecamy jeszcze</strong>
        </h2>
    </div>
    <div class="course-addons-items">
        <div class="course-addons-items-fix">
            <?php foreach ($addons as $el) : $product = wc_get_product($el['addon']) ?>
            <label class="course-addons-item" for="<?php echo "addon" . $product->get_id() ?>">
                <label class="custom-chkbox" for="<?php echo "addon" . $product->get_id() ?>"
                    class="course-addons-item-chkbox">
                    <input class="addon-chkbox" type="checkbox" name="<?php echo "addon" . $product->get_id() ?>"
                        id="<?php echo "addon" . $product->get_id() ?>" value="<?php echo $product->get_id() ?>">
                    <span></span>
                </label>
                <div class="course-addons-item-content">
                    <h2 class="course-addons-item-title"><?php echo $product->get_name(); ?></h2>
                    <?php if (!empty($product->get_short_description())) : ?>
                    <p class="course-addons-item-info"><?php echo $product->get_short_description() ?></p>
                    <?php endif; ?>
                    <p class="course-addons-item-action">
                        <span class="course-addons-item-price">
                            <?php echo empty($product->get_sale_price()) ? $product->get_regular_price() : $product->get_sale_price(); ?>
                            zł
                        </span>
                        <a href="<?php echo $product->get_permalink(); ?>" class="course-addons-item-link">
                            Czytaj więcej
                        </a>
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
            <?php endforeach; ?>
        </div>
    </div>
    <div class="course-addons-btns">
        <a class="btn btn--outline" href="#">Kontynuj zakupy</a>
        <a class="btn btn--primary" href="<?php echo wc_get_cart_url() ?>">Przejdź dalej</a>
    </div>
</div>
<?php
    // FUNCTION MARKUP END
    return ob_get_clean();
}

function get_product_addons_response_fail()
{
    ob_start();
    // FUNCTION MARKUP START
?>
<div class="course-addons">
    <p>Brak Dodatków dla tego kursu</p>
</div>
<?php
    // FUNCTION MARKUP END
    return ob_get_clean();
}