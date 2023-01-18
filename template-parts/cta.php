<?php if ($cta = get_field('cta', 'options')) : ?>

<section class="cta">
    <div class="cta__decor cta__decor--light"></div>
    <div class="container">
        <div class="row">
            <div
                class="cta__content col-12 col-xs-10 offset-xs-1 col-sm-8 offset-sm-1 col-md-6 col-lg-6 col-xl-5 offset-xl-1">
                <div class="heading-primary">
                    <?= $cta['heading']; ?>
                </div>
                <div class="text-lead">
                    <?= $cta['content']; ?>
                </div>
                <div
                    class="d-flex align-items-center flex-column flex-xs-row mt-3 justify-content-xs-center justify-content-sm-start">
                    <div class="cta__call d-flex align-tems-center">
                        <img src="<?= get_template_directory_uri(); ?>/dist/images/contact-phone.svg" alt=""
                            class="cta__call-icon">
                        <div class="d-flex flex-column justify-content-center">
                            <p class="cta__call-text">
                                <?= $cta['call_text']; ?>
                            </p>
                            <?php if ($phone = get_field('phone_sign_up', 'options')) : ?>
                            <a href="tel: <?= trim($phone); ?>" class="cta__call-phone">
                                <?= $phone; ?>
                            </a>
                            <?php endif; ?>
                        </div>
                    </div>
                    <span class="cta__call-span">lub</span>
                    <?php if ($cta_link = $cta['link']) : ?>
                    <a href="<?= esc_url($cta_link['url']); ?>" class="btn btn--primary">
                        <?= $cta_link['title']; ?>
                    </a>
                    <?php endif; ?>
                </div>
            </div>
            <div class="cta__image col-md-6 col-lg-5">
                <img src="<?= get_template_directory_uri(); ?>/dist/images/cta-lady.png" alt="">
            </div>
        </div>
    </div>
</section>

<?php endif; ?>