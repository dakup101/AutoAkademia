<footer class="footer">
  <div class="container">
    <div class="row">
      <div class="col-12 col-lg-10 offset-lg-1">
        <div class="footer-grid">
          <?php if ($logo = get_field('logo', 'options')) : ?>

            <a href="<?= esc_url(home_url()); ?>" class="footer__logo">
              <?= wp_get_attachment_image($logo, 'full'); ?>
            </a>

          <?php endif; ?>
          <div class="footer__info">



            <?php if ($footer_info = get_field('footer_info', 'options')) : ?>

              <p class="footer__info-text">
                <?= $footer_info; ?>
              </p>

            <?php endif; ?>

            <?php if ($footer_address = get_field('footer_address', 'options')) : ?>

              <div class="footer__address">
                <h3 class="footer__address-heading">
                  <?= $footer_address['heading']; ?>
                </h3>
                <?= $footer_address['address']; ?>
              </div>

            <?php endif; ?>

            <div class="footer__call d-flex align-tems-center">
              <img src="<?= get_template_directory_uri(); ?>/dist/images/contact-phone.svg" alt="" class="footer__call-icon">
              <div class="d-flex flex-column justify-content-center">
                <p class="footer__call-text">
                  Zadzwoń do nas i zacznij z nami jeździć
                </p>

                <?php if ($phone = get_field('phone_sign_up', 'options')) : ?>

                  <a href="tel: <?= trim($phone); ?>" class="footer__call-phone">
                    <?= $phone; ?>
                  </a>

                <?php endif; ?>

              </div>
            </div>

          </div>
          <?php if ($footer_menu_heading = get_field('footer_menu_heading', 'options')) : ?>

            <h3 id="footer-main-menu-heading" class="footer__menu-heading">
              <?= $footer_menu_heading; ?>
            </h3>

          <?php endif; ?>
          <div id="footer-main-menu" class="footer__menu">



            <?php get_template_part('/components/footer-menu', '', array(
              'menu' => 'footer-menu',
              'class' => 'footer__menu-items'
            )); ?>

          </div>
          <?php if ($footer_courses_heading = get_field('footer_courses_heading', 'options')) : ?>

            <h3 id="footer-courses-menu-heading" class="footer__menu-heading">
              <?= $footer_courses_heading; ?>
            </h3>

          <?php endif; ?>
          <div id="footer-courses-menu" class="footer__menu">
            <?php get_template_part('/components/courses-menu', '', array(
              'menu' => 'courses-menu',
              'class' => 'footer__menu-items'
            )); ?>

          </div>
          <?php if ($footer_gallery_heading = get_field('footer_gallery_heading', 'options')) : ?>
            <h3 id="footer-gallery-heading" class="footer__menu-heading">
              <?= $footer_gallery_heading; ?>
            </h3>
          <?php endif; ?>
          <div class="footer__gallery">
            <div class="footer__gallery-images">
              <?php if ($footer_gallery = get_field('footer_gallery', 'options')) : ?>
                <?php foreach ($footer_gallery as $image) : ?>
                  <a href="<?= esc_url(wp_get_attachment_url($image)); ?>" class="fslightbox footer__gallery-image">
                    <?= wp_get_attachment_image($image, 'footer-thumb'); ?>
                  </a>
                <?php endforeach; ?>
              <?php endif; ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="footer__bottom">
      <a href="" class="footer__privacy">Polityka prywatnośći</a>
      <div class="footer__social">
        <?php if (have_rows('social', 'options')) : ?>
          <?php while (have_rows('social', 'options')) : the_row(); ?>
            <a href="<?= get_sub_field('link'); ?>" class="footer__social-link">
              <?= wp_get_attachment_image(get_sub_field('icon')); ?>
            </a>
          <?php endwhile; ?>
        <?php endif; ?>
      </div>
      <div class="footer__copy">
        &copy; <?= date('Y'); ?> AutoAkademia.pl &copy; Wszelkie prawa zastrzeżone.

        <a href="https://everywhere.pl" class="footer__everywhere">
          <img src="<?= get_template_directory_uri(); ?>/dist/images/everywhere-logo.svg" alt="">
        </a>
      </div>
    </div>
  </div>
</footer>

<?php wp_footer(); ?>

<!-- Cookies -->
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/cookies/divante.cookies.min.js">
</script>
<script>
  window.jQuery.cookie || document.write(
    '<script src="<?php echo get_template_directory_uri(); ?>/cookies/jquery.cookie.min.js"><\/script>')
</script>
<script>
  jQuery(function($) {
    $.divanteCookies.render({
      privacyPolicy: true,
    });
  });
</script>

</body>

</html>