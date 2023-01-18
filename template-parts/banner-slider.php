<section class="banner-container">
  <div class="banner-container__decor banner-container__decor--light"></div>
  <div class="banner-container__decor banner-container__decor--dark"></div>
  <div class="container">
    <div class="row">
      <div class="col-12 col-sm-11 col-md-10 offset-sm-1 banner banner-slider">

        <?php if (have_rows('banner_slider')) :
          while (have_rows('banner_slider')) : the_row(); ?>

            <div class="banner__content">

              <?php if ($banner_text = get_sub_field('banner_text')) : ?>

                <div class="banner__text">
                  <?= $banner_text; ?>
                </div>

              <?php endif; ?>

              <?php if ($banner_link = get_sub_field('banner_link')) : ?>

                <a href="<?= esc_url($banner_link['url']) ?>" class="btn btn--secondary"><?= $banner_link['title']; ?></a>

              <?php endif; ?>

              <?php if ($banner_bg = get_sub_field('banner_bg')) : ?>
                <div class="banner__bg cut-corner">
                  <?= wp_get_attachment_image($banner_bg, 'banner-image'); ?>
                </div>
              <?php endif; ?>

            </div>

        <?php endwhile;
        endif; ?>

      </div>
      <div class="banner-slider__controls col-12 col-md-1">

      </div>
    </div>
  </div>
</section>