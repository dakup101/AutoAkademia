<?php $cf_shortcode = (isset($args['cf_shortcode'])) ? $args['cf_shortcode'] : ''; ?>

<section class="contact container">
  <div class="row flex-wrap--reverse">
    <div class="col-12 col-xs-10 offset-xs-1 col-sm-6 offset-sm-0 col-lg-5 offset-lg-1">

      <?php if ($contact_heading = get_field('contact_heading')) : ?>
        <div class="heading-secondary">
          <?= $contact_heading; ?>
        </div>
      <?php endif; ?>

      <?php if ($contact_subheading = get_field('contact_subheading')) : ?>
        <div class="subheading">
          <?= $contact_subheading; ?>
        </div>
      <?php endif; ?>

      <?php if (have_rows('contact_icons')) : ?>

        <div class="contact__info d-flex justify-content-between">

          <?php while (have_rows('contact_icons')) : the_row(); ?>

            <div class="d-flex flex-column mb-3">

              <?php if ($icon = get_sub_field('icon')) echo wp_get_attachment_image($icon, 'icon', true, ['class' => 'contact__info-icon']); ?>

              <?php if ($text = get_sub_field('text')) : ?>

                <div class="contact__info-text">
                  <?= $text; ?>
                </div>

              <?php endif; ?>

            </div>

          <?php endwhile; ?>

        </div>

      <?php endif; ?>

    </div>
    <div class="col-12 col-xs-10 offset-xs-1 col-sm-6 offset-sm-0 col-lg-5 contact__form-container">
      <div class="contact-form">

        <?php if ($worth_contact_heading = get_field('worth_contact_heading', 'options')) : ?>
          <div class="contact-form__heading">
            <?= $worth_contact_heading; ?>
          </div>
        <?php endif; ?>

        <?= do_shortcode($cf_shortcode); ?>

      </div>
    </div>
  </div>
</section>