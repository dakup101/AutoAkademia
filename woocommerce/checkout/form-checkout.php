<?php
if (!defined('ABSPATH')) {
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
                action="<?php echo esc_url(wc_get_checkout_url()); ?>" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-7 col-12">
                        <h2>Dane kupującego</h2>
                        <div class="row">
                            <div class="col-md-6 col-12">
                                <?php woocommerce_form_field('billing_first_name', array(
                                    'required'    => true,
                                    'placeholder'       => 'Imię',
                                    'type'        => 'text'
                                ), $checkout->get_value('billing_first_name')); ?>
                            </div>
                            <div class="col-md-6 col-12">
                                <?php woocommerce_form_field('billing_last_name', array(
                                    'required'    => true,
                                    'placeholder'       => 'Nazwisko',
                                    'type'        => 'text'
                                ), $checkout->get_value('billing_last_name')); ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-12">
                                <?php woocommerce_form_field('pesel', array(
                                    'required'    => true,
                                    'placeholder'       => 'PESEL',
                                    'type'        => 'text'
                                )); ?>
                            </div>
                            <div class="col-md-6 col-12">
                                <?php woocommerce_form_field('age', array(
                                    'required'    => true,
                                    'placeholder'       => 'Wiek',
                                    'type'        => 'text'
                                ),); ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <?php woocommerce_form_field('billing_company', array(
                                    'required'    => false,
                                    'placeholder'       => 'Nazwy firmy (opcjonalne)',
                                    'type'        => 'text',
                                )); ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-12">
                                <?php woocommerce_form_field('billing_address_1', array(
                                    'required'    => true,
                                    'placeholder'       => 'Ulica, nr. domu, nr. mieszkania *',
                                    'type'        => 'text',
                                )); ?>
                            </div>
                            <div class="col-md-3 col-6">
                                <?php woocommerce_form_field('billing_city', array(
                                    'required'    => true,
                                    'placeholder'       => 'Miasto',
                                    'type'        => 'text'
                                )); ?>
                            </div>
                            <div class="col-md-3 col-6">
                                <?php woocommerce_form_field('billing_postcode', array(
                                    'required'    => true,
                                    'placeholder'       => 'Kod pocztowy',
                                    'type'        => 'text',
                                    'validate'    => array('postcode')
                                )); ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-12">
                                <?php woocommerce_form_field('billing_phone', array(
                                    'required'    => true,
                                    'placeholder'       => 'Numer telefonu',
                                    'type'        => 'tel',
                                    'validate'    => array('phone')
                                ), $checkout->get_value('billing_phone')); ?>
                            </div>
                            <div class="col-md-6 col-12">
                                <?php woocommerce_form_field('billing_email', array(
                                    'required'    => true,
                                    'placeholder'       => 'Adres e-mail',
                                    'type'        => 'email',
                                    'validate'    => array('email')
                                ), $checkout->get_value('billing_email')); ?>
                            </div>
                            <div class="hidden">
                                <?php woocommerce_form_field('billing_country', array(
                                    'placeholder' => '',
                                    'required'    => true
                                ), 'PL'); ?>
                            </div>
                        </div>
                        <hr>
                        <h2>Metoda Płatności</h2>
                        <ul class="payment-methods">
                            <?php
                            $available_gateways = array();
                            if (WC()->cart->needs_payment()) {
                                $available_gateways = WC()->payment_gateways()->get_available_payment_gateways();
                                WC()->payment_gateways()->set_current_gateway($available_gateways);
                            }

                            if (!empty($available_gateways)) {
                                foreach ($available_gateways as $gateway) {
                                    wc_get_template('checkout/payment-method.php', array('gateway' => $gateway));
                                }
                            }
                            ?>
                        </ul>
                        <p class="rodo-info">
                            Twoje dane osobowe będą użyte do przetworzenia twojego zamówienia, obsługi twojej wizyty na
                            naszej stronie oraz dla innych celów o których mówi nasza polityka prywatności.
                        </p>
                        <?php
                        woocommerce_form_field('privacy_policy', array(
                            'type'          => 'checkbox',
                            'class'         => array('form-row privacy'),
                            'label_class'   => array('woocommerce-form__label woocommerce-form__label-for-checkbox checkbox'),
                            'input_class'   => array('woocommerce-form__input woocommerce-form__input-checkbox input-checkbox'),
                            'required'      => true,
                            'label'         => '<label for="privacy_policy">Przeczytałem i zgadzam się z <a href="#">regulaminem strony</a></label>',
                        ));
                        ?>
                        <div class="d-none">
                            <input type="file" name="" id="gowno">
                            <?php
                            woocommerce_form_field('file_url', array(
                                'type'          => 'text',
                                'class'         => array('form-row privacy'),
                                'label_class'   => array('woocommerce-form__label woocommerce-form__label-for-checkbox checkbox'),
                                'input_class'   => array('woocommerce-form__input woocommerce-form__input-checkbox input-checkbox'),
                                'required'      => true,
                                'label'         => 'nnn',
                            ));
                            ?>
                        </div>
                    </div>
                    <div class="col-md-4 col-12 offset-md-1">
                        <div id="order_review" class="woocommerce-checkout-review-order">
                            <?php do_action('woocommerce_checkout_order_review'); ?>
                        </div>
                    </div>
                    <div class="col-md-7" style="text-align: right;">
                        <a class="btn btn--primary" id="start_checkout"
                            style="margin-top: -30px; margin-bottom: 30px">Zapisuję
                            się</a>
                        <div class="d-none">
                            <?php
                            $order_button_text = apply_filters('woocommerce_order_button_text', __("Zapisuję się", "woocommerce"));
                            echo '<button type="submit" class="btn btn--primary" id="place_order" value="' . esc_attr($order_button_text) . '" data-value="' . esc_attr($order_button_text) . '">' . esc_html($order_button_text) . '</button>'
                            ?>
                        </div>
                    </div>
                </div>
                <?php wp_nonce_field('woocommerce-process_checkout', 'woocommerce-process-checkout-nonce'); ?>

            </form>
            <?php do_action('woocommerce_after_checkout_form', $checkout); ?>
        </div>
    </div>
</div>
<div class="contract-popup" id="contractPopup">
    <div class="contract-popup-inner">
        <div class="contract-popup-loader">
            <div class="terms-loading">
                <div class="lds-ellipsis">
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                </div>
            </div>
        </div>
        <div class="contract-popup-status">
            Generuję umowę...
        </div>
    </div>
</div>
<input type="hidden" name="ordarTotalNum" id="ordarTotalNum" value="<?php echo WC()->cart->cart_contents_total ?>">
<div class="hide-cotract">

    <div id="testUmowa" style="aspect-ratio: 1 / 1.4142; width: 1040px" class="contract">
        <div class="text-center contract-logo">
            <img src="<?php echo THEME_IMG . "logo.png" ?>">
        </div>
        <p class="contract-title contract-title-big text-center">
            Umowa o świadczenie usług edukacyjnych
        </p>
        <p class="text-center">Data zwarcia: <span class="contract-date contract-info">26.07.2000</span>, w Krakowie.
        </p>
        <p class="contract-title text-center">Pomiędzy:</p>
        <p class="text-center">
            Ośrodkiem Szkolenia Kierowców Auto Akademia w Krakowie mieszczącym się przy ulicy
            Balickiej 77 – szczegółowe dane na pieczęci placówki, zwaną dalej ośrodkiem szkolenia
        </p>
        <p class="text-center">a</p>
        <p class="text-center">Panem(nią) <span class="contract-name-full">Danylo Kupriienko</span>,<br>zwany(a) dalej
            <span class="contract-info">kursantem</span>
        </p>
        <p class="contract-title contract-title-small text-center">Dane osoby zapisującej się</p>
        <p>
            <span class="contract-info">Imię:</span>
            <span class="contract-name">Danylo</span>
        </p>
        <p>
            <span class="contract-info">Nazwisko:</span>
            <span class="contract-name-last">Kupriienko</span>
        </p>
        <p>
            <span class="contract-info">PESEL:</span>
            <span class="contract-pesel">12312312312</span>
        </p>
        <p>
            <span class="contract-info">Wiek:</span>
            <span class="contract-age">22</span>
        </p>
        <p class="contract-title-small text-center">
            Adres zamieszkania (meldunku)
        </p>
        <p>
            <span class="contract-info">Kod pocztowy:</span>
            <span class="contract-post">12-123</span>
        </p>
        <p>
            <span class="contract-info">Miejscowość:</span>
            <span class="contract-city">Kraków</span>
        </p>
        <p>
            <span class="contract-info">Pełny adres:</span>
            <span class="contract-addr">Racławicka 50 / 3a</span>
        </p>
        <p>
            <span class="contract-info">Nr. telefonu:</span>
            <span class="contract-tel">+48 572 739 208</span>
        </p>
        <p>
            <span class="contract-info">Adres e-mail:</span>
            <span class="contract-email">dakup101@onmail.com</span>
        </p>
        <p class="contract-title-small text-center">Postanowienia:</p>
        <p><span class="contract-info">§1</span>. Akademia Auto (AAS) działa na podstawie Zezwolenia wydanego przez
            Prezydenta
            Miasta Krakowa oraz jest wpisana do rejestru ośrodków szkolenia WEPiK UMK</p>
        <p><span class="contract-info">§2</span>. Ośrodek zobowiązuje się zapewnić kursantowi naukę w formie kursu jazdy
            samochodem
            zgodnie z planem nauczania określonym w rozporządzeniu Ministra Transportu i
            Budownictwa oraz innymi aktami wykonawczymi do Ustawy o Kierujących Pojazdami.</p>
        <p><span class="contract-info">§3</span>.Szkolenie realizowane będzie w formie wykładów i zajęć praktycznych –
            jazd
            szkoleniowych pojazdem odpowiednio przystosowanym pod nadzorem instruktora.</p>
        <p><span class="contract-info">§4</span>. Kurs jest odpłatny i kursant zobowiązuje się do pokrycia jego kosztów
            według ceny
            ustalonej w dniu podpisywania umowy z możliwością zmian określonych w Regulaminie</p>
        <p><span class="contract-info">§5</span>.Ośrodek oferuje na zasadach promocji możliwość opłacenia szkolenia
            ratach
            na zasadzie
            przedpłat przed kolejnymi lekcjami lub z góry za określoną ilość lekcji.</p>
        <p><span class="contract-info">§5a</span>. Kursant ma obowiązek <span class="contract-info">w ciągu 3 miesięcy
                od
                dnia podpisania umowy podjąć
                zajęcia i zakończyć kurs w ciągu 24 miesięcy od dnia rozpoczęcia szkolenia.</span> W
            przypadku 24 miesięcznej bezczynności (braku podejmowania nauki) – zgodnie z przepisami
            kursant może być skreślony z listy osób szkolonych, a profil PKK zwrócony do PWPW (o ile
            ośrodek profil pobrał z bazy SI Kierowca) jako rezygnacja. Wpłacone środki nie podlegają w
            takim przypadku zwrotowi, a Klient może otrzymać rachunek na całą wpłaconą kwotę.</p>
        <p>
            <span class="contract-info">§6</span>. Ewentualną korespondencję papierową do kursanta ośrodek będzie
            kierował
            na adres
            podany w niniejszej umowie, aktualizowany na podstawie udokumentowanych zmian.
        </p>
        <p><span class="contract-info">§7</span>.W przypadku nie wywiązywania się kursanta z postanowień wynikających z
            umowy
            ośrodek zastrzega sobie prawo do przerwania szkolenia celem uniknięcia strat oraz żądania
            pokrycia już poniesionych faktycznie kosztów za wykonaną część usługi.</p>
        <p><span class="contract-info">§8</span>. Kursant zobowiązuje się w czasie szkolenia do przestrzegania zasad i
            przepisów ruchu
            drogowego, wykonywania poleceń instruktora oraz przestrzegania zasad bezpieczeństwa.</p>
        <p><span class="contract-info">§8a</span>. Kursant zobowiązuje się, iż w czasie i przed szkoleniem nie będzie
            spożywał alkoholu,
            używał środków podobnie działających do alkoholu oraz środków farmaceutycznych
            zawierających pseudoefedrynę, a w razie pogorszenia stanu zdrowia będzie informował o
            tym instruktora z wyprzedzeniem co najmniej jednego dnia roboczego.</p>
        <p><span class="contract-info">§9</span>. W zakresie szkód komunikacyjnych – działa ubezpieczenie OC pojazdów
            szkoleniowych,
            a szkody wykraczające poza ten zakres rozliczane są na ogólnych zasadach o jakich stanowi
            Kodeks Cywilny.</p>
        <p><span class="contract-info">§10</span>.
            <span class="span contract-info">Kursant może w każdej chwili zrezygnować z kursu w ośrodku</span>. W
            przypadku
            rezygnacji ośrodek będzie domagał się uregulowania opłat za już wykonaną część usługi,
            jednak nie mniej wysokość opłaty za część teoretyczną z pakietem materiałów
            szkoleniowych (w tym opłata rezerwacyjna oraz opłata za wpis do książki szkolenia).
        </p>
        <p><span class="contract-info">§11</span>. <span class="contract-info">Kursant wyraża zgodę na przetwarzanie
                swoich
                danych osobowych</span> dla
            niezbędnych potrzeb ośrodka w celu realizacji umowy i świadczonych usług zgodnie z
            obowiązującym w tym zakresie prawie. <span class="contract-info">Kursant ponadto oświadcza, że zapoznał się
                oraz akceptuje postanowienia regulaminu ośrodka</span>.</p>
        <p><span class="contract-info">§12</span>.Spory mogące powstać w trakcie realizacji niniejszej umowy, strony
            będą
            starały się
            załatwić polubownie, a w razie braku porozumienia poddawane będą rozstrzygnięciu przez
            właściwy Sąd dla siedziby ośrodka szkolenia.</p>
        <p>
            <span class="contract-info">§13</span>.W sprawach nieuregulowanych niniejszą umową maja zastosowanie
            odpowiednie
            przepisy Kodeksu Cywilnego, przepisy wewnętrzne ośrodka, w szczególności Regulamin.
        </p>
        <p><span class="contract-info">§14</span>. Wszelkie zmiany umowy wymagają formy pisemnej pod rygorem
            nieważności.
        </p>
        <p><span class="contract-info">§15</span>. Rachunek zostaje wystawiony po zakończeniu usługi lub w razie nie
            podjęcia nauki w
            okresie 24 miesięcy ośrodek może wystawić rachunek na wpłacone środki i tym samym
            zakończyć zlecenie usługi zgodnie z zapisami tej umowy.</p>
        <p><span class="contract-info">§16</span>. Cenę przedmiotowego kursu strony umowy ustaliły na kwotę: <span
                class="contract-info contract-price"> 1000
            </span> pln (słownie: <span class="contract-info contract-price-words"> tysiąc </span> złotych )
        </p>
        <div class="contract-title-small text-center">Usługi:</div>
        <?php
        foreach (WC()->cart->get_cart() as $cart_item_key => $cart_item) {
            $_product = apply_filters('woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key);

            if ($_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters(
                'woocommerce_checkout_cart_item_visible',
                true,
                $cart_item,
                $cart_item_key
            )) {
        ?>
        <div class="contract-item">
            <div class="contract-item-name">
                <?php echo wp_kses_post(apply_filters('woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key)) . '&nbsp;'; ?>
            </div>

            <?php
                    // Course Date & Time
                    if ($_product->get_type() == "course") :
                        $course_date =  woo_get_cartItem_data($cart_item_key, "course_term_date");
                        $course_time = woo_get_cartItem_data($cart_item_key, "course_term_time");
                    ?>
            <div class="contract-item-date">
                <span>Data rozpoczęcia: <?php echo $course_date ?></span>
            </div>
            <div class="contract-item-time">
                <span>Godzina: <?php echo $course_time ?></span>
            </div>
            <?php else : ?>
            <div class="contract-item-date">
            </div>
            <div class="contract-item-time">
            </div>
            <?php endif; ?>
            <div class="contract-item-price">
                Cena: <?php echo apply_filters('woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal($_product, $cart_item['quantity']), $cart_item, $cart_item_key); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped 
                                ?>
            </div>
        </div>

        <?php
            }
        }
        ?>
        <div class="contract-signatures">
            <div class="contract-signatures-item">
                <p>Ośrodek Szkolenia - pieczęć i podpis</p>
            </div>
            <div class="contract-signatures-item">
                <p>Kursant - podpis</p>
            </div>
        </div>
    </div>
</div>