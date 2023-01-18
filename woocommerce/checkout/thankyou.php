<?php defined( 'ABSPATH' ) || exit; ?>
<div class="container thank-you">
    <div class="row">
        <div class="col-12 col-md-10 offset-md-1">
            <h1 class="wc-title">Twóje Zamówienie</h1>
            <?php
			if (function_exists('yoast_breadcrumb')) {
			yoast_breadcrumb('<p id="breadcrumbs" class="breadcrumbs">', '</p>');
			}
			?>
            <?php if ( $order ) : do_action( 'woocommerce_before_thankyou', $order->get_id() ); ?>

            <div class="woocommerce-order">
                <?php
				// Failed Order Start
				if ( $order->has_status( 'failed' ) ) :
				?>

                <p class="woocommerce-notice woocommerce-notice--error woocommerce-thankyou-order-failed">
                    <?php esc_html_e( 'Unfortunately your order cannot be processed as the originating bank/merchant has declined your transaction. Please attempt your purchase again.', 'woocommerce' ); ?>
                </p>

                <p class="woocommerce-notice woocommerce-notice--error woocommerce-thankyou-order-failed-actions">
                    <a href="<?php echo esc_url( $order->get_checkout_payment_url() ); ?>"
                        class="button pay"><?php esc_html_e( 'Pay', 'woocommerce' ); ?></a>
                    <?php if ( is_user_logged_in() ) : ?>
                    <a href="<?php echo esc_url( wc_get_page_permalink( 'myaccount' ) ); ?>"
                        class="button pay"><?php esc_html_e( 'My account', 'woocommerce' ); ?></a>
                    <?php endif; ?>
                </p>

                <?php
				// Failed Order End
				else :
				// Success Order Start
				?>
                <div class="thank-you-text">
                    <h2 class="thank-you-title success">
                        <svg clip-rule="evenodd" fill-rule="evenodd" stroke-linejoin="round" stroke-miterlimit="2"
                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="m21 4.009c0-.478-.379-1-1-1h-16c-.62 0-1 .519-1 1v16c0 .621.52 1 1 1h16c.478 0 1-.379 1-1zm-16.5.5h15v15h-15zm2.449 7.882 3.851 3.43c.142.128.321.19.499.19.202 0 .405-.081.552-.242l5.953-6.509c.131-.143.196-.323.196-.502 0-.41-.331-.747-.748-.747-.204 0-.405.082-.554.243l-5.453 5.962-3.298-2.938c-.144-.127-.321-.19-.499-.19-.415 0-.748.335-.748.746 0 .205.084.409.249.557z"
                                fill-rule="nonzero" />
                        </svg>
                        Dziękujemy za złożenie zamówienia
                    </h2>
                    <div class="thank-you-order-info">
                        <p><strong>Numer Twojego zamówienia: </strong><?php echo $order->get_order_number(); ?></p>
                        <p><strong>Całkowita wartość zakupów: </strong><?php echo $order->get_formatted_order_total() ?>
                        </p>
                    </div>
                    <p class="thank-you-info">
                        O zmianie statusu będziemy Cię również informować pocztą elektroniczną.
                    </p>
                    <p class="thank-you-info">
                        W razie jakichkolwiek pytań lub wątpliwości prosimy o kontakt telefoniczny lub e-mailowy: <a
                            href="mailto:biuro@autoakademia.pl">biuro@autoakademia.pl</a>
                    </p>
                    <p class="thank-you-info">
                        Pozdrawiamy,<br>
                        Zespół Obsługi Auto Akademii
                    </p>
                </div>


                <table class="shop_table shop_table_responsive cart woocommerce-cart-form__contents">
                    <thead>
                        <tr>
                            <th class="product-name" colspan="2">
                                Produkt
                            </th>
                            <th class="product-price">
                                Cena za sztukę
                            </th>
                            <th class="product-quantity">
                                Ilość
                            </th>
                            <th class="product-subtotal">
                                Cena
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
						foreach ( $order->get_items() as $item ) :
						$_product   = $item->get_product();
						$product_id = $_product->get_id();
						?>
                        <tr class="woocommerce-cart-form__cart-item">
                            <td class="product-thumbnail">
                                <?php
                                $thumbnail = $_product->get_image();
                                    echo $thumbnail; 
                                ?>
                            </td>
                            <td class="product-name" data-title="<?php esc_attr_e( 'Product', 'woocommerce' ); ?>">
                                <a
                                    href="<?php echo $_product->get_permalink(); ?>"><?php echo $_product->get_name() ?></a>
                                <?php
                                // Course Date & Time
                                if ($_product->get_type() == "course"):
									$term_time = !empty($item->get_meta("Godzina")) ? $item->get_meta("Godzina") : null;
									$term_date =  !empty($item->get_meta("Data rozpoczęcia")) ? $item->get_meta("Data rozpoczęcia") : null;
                                ?>
                                <span>Data rozpoczęcia: <?php echo $term_date ?></span>
                                <br>
                                <span>Godzina: <?php echo $term_time ?></span>
                                <?php else: ?>
                                <span><?php echo $_product->get_short_description() ?></span>
                                <?php endif; ?>
                            </td>
                            <td class="product-price" data-title="<?php esc_attr_e( 'Price', 'woocommerce' ); ?>">
                                <?php echo $_product->get_price() ?> zł
                            </td>
                            <td class="product-quantity" data-title="<?php esc_attr_e( 'Quantity', 'woocommerce' ); ?>">
                                <?php echo $item->get_quantity(); ?>
                            </td>
                            <td class="product-subtotal" data-title="<?php esc_attr_e( 'Subtotal', 'woocommerce' ); ?>">
                                <?php echo ($item->get_quantity()) * $_product->get_price(); ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <?php do_action( 'woocommerce_thankyou', $order->get_id() ); ?>
                <div class="cart-actions thank-you-after-cart row">
                    <div class="col-12 col-md-7">
                        <?php if ( wc_coupons_enabled() ) { ?>
                        <div class="coupon">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="cart-info">
                                        <img src="<?php echo THEME_IMG . "contact-phone.svg" ?>" alt="">
                                        <span>Potrzebujesz pomocy? Zadzwoń do nas <a href="tel:+48536979090">+48 536 97
                                                90 90</a></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php } ?>

                        <button type="submit"
                            class="hidden button<?php echo esc_attr( wc_wp_theme_get_element_class_name( 'button' ) ? ' ' . wc_wp_theme_get_element_class_name( 'button' ) : '' ); ?>"
                            name="update_cart"
                            value="<?php esc_attr_e( 'Update cart', 'woocommerce' ); ?>"><?php esc_html_e( 'Update cart', 'woocommerce' ); ?></button>

                        <?php do_action( 'woocommerce_cart_actions' ); ?>

                        <?php wp_nonce_field( 'woocommerce-cart', 'woocommerce-cart-nonce' ); ?>
                    </div>
                    <div class="col-12 col-md-5">
                        <div class="cart-collaterals">
                            <div class="cart_totals">
                                <h2>Kwota razem: <span><?php echo $order->get_total( ); ?> zł</span></h2>
                                <div class="cart_totals-info">
                                    <p>Podatek: <?php echo $order->get_total_tax( ); ?> zł</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endif; ?>
            </div>
            <?php endif; ?>
        </div>
    </div>
</div>