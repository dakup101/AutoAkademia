<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<div class="container checkout-page">
    <div class="row">
        <div class="col-12 col-md-10 offset-md-1">
            <h1 class="wc-title">Twoje Zamówienie</h1>
            <?php
			if (function_exists('yoast_breadcrumb')) {
			yoast_breadcrumb('<p id="breadcrumbs" class="breadcrumbs">', '</p>');
			}
			?>
            <form name="checkout" method="post" class="checkout woocommerce-checkout"
                action="<?php echo esc_url( wc_get_checkout_url() ); ?>" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-7 col-12">
                        <h2>Dane kupującego</h2>
                        <div class="row">
                            <div class="col-md-6 col-12">
                                <?php woocommerce_form_field( 'billing_first_name', array(
								'required'    => true,
								'placeholder'       => 'Imię',
								'type'        => 'text'
							), $checkout->get_value( 'billing_first_name' ) ); ?>
                            </div>
                            <div class="col-md-6 col-12">
                                <?php woocommerce_form_field( 'billing_last_name', array(
								'required'    => true,
								'placeholder'       => 'Nazwisko',
								'type'        => 'text'
							), $checkout->get_value( 'billing_last_name' ) ); ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <?php woocommerce_form_field( 'billing_company', array(
									'required'    => false,
									'placeholder'       => 'Nazwy firmy (opcjonalne)',
									'type'        => 'text',
								)); ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-12">
                                <?php woocommerce_form_field( 'billing_address_1', array(
									'required'    => true,
									'placeholder'       => 'Ulica, nr. domu, nr. mieszkania *',
									'type'        => 'text',
								)); ?>
                            </div>
                            <div class="col-md-3 col-6">
                                <?php woocommerce_form_field( 'billing_city', array(
									'required'    => true,
									'placeholder'       => 'Miasto',
									'type'        => 'text'
								)); ?>
                            </div>
                            <div class="col-md-3 col-6">
                                <?php woocommerce_form_field( 'billing_postcode', array(
									'required'    => true,
									'placeholder'       => 'Kod pocztowy',
									'type'        => 'text',
									'validate'    => array('postcode')
								));?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-12">
                                <?php woocommerce_form_field( 'billing_phone', array(
								'required'    => true,
								'placeholder'       => 'Numer telefonu',
								'type'        => 'tel',
								'validate'    => array('phone')
							), $checkout->get_value( 'billing_phone' ) ); ?>
                            </div>
                            <div class="col-md-6 col-12">
                                <?php woocommerce_form_field( 'billing_email', array(
								'required'    => true,
								'placeholder'       => 'Adres e-mail',
								'type'        => 'email',
								'validate'    => array('email')
							), $checkout->get_value( 'billing_email' ) ); ?>
                            </div>
                            <div class="hidden">
                                <?php woocommerce_form_field( 'billing_country', array(
								'placeholder' => '',
								'required'    => true
							), 'PL' ); ?>
                            </div>
                        </div>
                        <hr>
                        <h2>Metoda Płatności</h2>
                        <ul class="payment-methods">
                            <?php
							$available_gateways = array();
							if ( WC()->cart->needs_payment() ) {
								$available_gateways = WC()->payment_gateways()->get_available_payment_gateways();
								WC()->payment_gateways()->set_current_gateway( $available_gateways );
							} 
		
								if ( ! empty( $available_gateways ) ) {
									foreach ( $available_gateways as $gateway ) {
									wc_get_template( 'checkout/payment-method.php', array( 'gateway' => $gateway ) );
									}
								}
							?>
                        </ul>
                        <p class="rodo-info">
                            Twoje dane osobowe będą użyte do przetworzenia twojego zamówienia, obsługi twojej wizyty na
                            naszej stronie oraz dla innych celów o których mówi nasza polityka prywatności.
                        </p>
                        <?php
						woocommerce_form_field( 'privacy_policy', array(
							'type'          => 'checkbox',
							'class'         => array('form-row privacy'),
							'label_class'   => array('woocommerce-form__label woocommerce-form__label-for-checkbox checkbox'),
							'input_class'   => array('woocommerce-form__input woocommerce-form__input-checkbox input-checkbox'),
							'required'      => true,
							'label'         => '<label for="privacy_policy">Przeczytałem i zgadzam się z <a href="#">regulaminem strony</a></label>',
						 )); 
						?>
                    </div>
                    <div class="col-md-4 col-12 offset-md-1">
                        <div id="order_review" class="woocommerce-checkout-review-order">
                            <?php do_action( 'woocommerce_checkout_order_review' ); ?>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <?php
						$order_button_text = apply_filters( 'woocommerce_order_button_text', __( "Składam zamówienie", "woocommerce" ) );
						echo '<button type="submit" class="btn btn--primary" id="place_order" value="' . esc_attr( $order_button_text ) . '" data-value="' . esc_attr( $order_button_text ) . '">' . esc_html( $order_button_text ) . '</button>'
						?>
                    </div>
                </div>
                <?php wp_nonce_field( 'woocommerce-process_checkout', 'woocommerce-process-checkout-nonce' ); ?>

            </form>
            <?php do_action( 'woocommerce_after_checkout_form', $checkout ); ?>
        </div>
    </div>
</div>