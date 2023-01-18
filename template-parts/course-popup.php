<?php global $product ?>
<div class="course-terms-popup">
    <div class="course-terms">
        <div class="course-terms-close">
            Zamknij
            <svg clip-rule="evenodd" fill-rule="evenodd" stroke-linejoin="round" stroke-miterlimit="2"
                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="m21 3.998c0-.478-.379-1-1-1h-16c-.62 0-1 .519-1 1v16c0 .621.52 1 1 1h16c.478 0 1-.379 1-1zm-8.991 6.932 2.717-2.718c.146-.146.338-.219.53-.219.405 0 .751.325.751.75 0 .193-.073.384-.219.531l-2.718 2.717 2.728 2.728c.147.147.22.339.22.531 0 .427-.349.75-.75.75-.192 0-.384-.073-.531-.219l-2.728-2.728-2.728 2.728c-.146.146-.339.219-.531.219-.401 0-.75-.323-.75-.75 0-.192.073-.384.22-.531l2.728-2.728-2.722-2.722c-.146-.147-.219-.338-.219-.531 0-.425.346-.749.75-.749.192 0 .384.073.53.219z"
                    fill-rule="nonzero" />
            </svg>
        </div>
        <div class="course-terms-header">
            <div class="course-terms-header-status hidden">
                Dodałeś pomyślnie do koszyka
            </div>
            <?php
                $img = get_the_post_thumbnail_url(null, "thumbnail");
                $name = get_the_title();
                $price = empty($product->get_sale_price()) ? $product->get_regular_price() : $product->get_sale_price();
            ?>
            <div class="course-terms-popup-product">
                <div class="course-terms-popup-product-info">
                    <img src="<?php echo $img; ?>" alt="<?php echo $name; ?>">
                    <div>
                        <h2><?php echo $name ?></h2>
                        <?php if ($product->get_short_description()): ?>
                        <p class="course-terms-popup-product-progress">
                            <?php echo strWordCut($product->get_short_description(), 60, "..."); ?>
                        </p>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="course-terms-popup-product-price">
                    <span><?php echo $price ?> zł</span>
                </div>
            </div>
        </div>
        <div class="course-terms-content"></div>
        <div class="course-addons-content hidden"></div>
        <div class="course-terms-loading">
            <div class="lds-ellipsis">
                <div></div>
                <div></div>
                <div></div>
                <div></div>
            </div>
        </div>
    </div>
</div>