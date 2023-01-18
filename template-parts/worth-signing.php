<section class="worth-signing container">
  <div class="row flex-wrap--reverse">
    <div class="col-12 col-xs-10 offset-xs-1 col-sm-6 offset-sm-0 col-lg-5 offset-lg-1">

      <?php if ($worth_heading = get_field('worth_heading', 'options')) : ?>
        <div class="heading-secondary">
          <?= $worth_heading; ?>
        </div>
      <?php endif; ?>

      <?php if ($worth_subheading = get_field('worth_subheading', 'options')) : ?>
        <div class="subheading">
          <?= $worth_subheading; ?>
        </div>
      <?php endif; ?>

      <?php if (have_rows('worth_reasons', 'options')) : ?>

        <div class="worth-signing__info">

          <?php while (have_rows('worth_reasons', 'options')) : the_row(); ?>

            <div class="d-flex align-items-center mb-3">

              <?php if ($icon = get_sub_field('icon')) echo wp_get_attachment_image($icon, 'icon', true, ['class' => 'worth-signing__info-icon']); ?>

              <?php if (($text_strong = get_sub_field('text_strong')) && ($text = get_sub_field('text'))) : ?>

                <p class="worth-signing__info-text">
                  <strong><?= $text_strong; ?></strong>
                  <?= $text; ?>
                </p>

              <?php endif; ?>

            </div>

          <?php endwhile; ?>

        </div>

      <?php endif; ?>

    </div>
    <div class="col-12 col-xs-10 offset-xs-1 col-sm-6 offset-sm-0 col-lg-5 worth-signing__contact">
      <div class="contact-form">

        <?php if ($worth_contact_heading = get_field('worth_contact_heading', 'options')) : ?>
          <div class="contact-form__heading">
            <?= $worth_contact_heading; ?>
          </div>
        <?php endif; ?>

        <?= do_shortcode('[contact-form-7 id="34" title="Formularz zgłoszeniowy -- bez pola na wiadomość"]'); ?>

      </div>
    </div>
  </div>
</section>