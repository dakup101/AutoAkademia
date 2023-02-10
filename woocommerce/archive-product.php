<?php
defined('ABSPATH') || exit;
get_header();
get_template_part('/template-parts/banner', null, array("page_id" => get_option('woocommerce_shop_page_id')));
?>
<div class="container course-content">

    <div class="row">
        <div class="col-12 col-lg-10 offset-lg-1">
            <div class="course-nav">
                <button class="course-nav-btn active" data-products="course">
                    Kursy
                </button>
                <button class="course-nav-btn" data-products="package">
                    Pakiety
                </button>
            </div>
            <?php
			if (woocommerce_product_loop()) {
				woocommerce_product_loop_start();
				if (wc_get_loop_prop('total')) {
					while (have_posts()) {
						the_post();
						do_action('woocommerce_shop_loop');
						wc_get_template_part('content', 'product');
					}
				}
				woocommerce_product_loop_end();
			} else do_action('woocommerce_no_products_found');
			do_action('woocommerce_after_main_content');
			?>
        </div>
    </div>
</div>
<?php get_template_part('/template-parts/cta'); ?>
<?php get_template_part('/template-parts/opinions'); ?>
<?php get_template_part('/template-parts/guides', '', ['is_front' => true]); ?>
<?php
get_footer();