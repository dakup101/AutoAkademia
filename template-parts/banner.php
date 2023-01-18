<?php $page_id = (isset($args['page_id'])) ? $args['page_id'] : ''; ?>

<section class="banner-container">
  <div class="banner-container__decor banner-container__decor--light"></div>
  <div class="banner-container__decor banner-container__decor--dark"></div>
  <div class="container">
    <div class="row">
      <div class="col-12 col-md-10 offset-md-1 banner">

        <div class="banner__content">

          <?php if ($banner_text = get_field('banner_text', $page_id)) : ?>

            <div class="banner__text">
              <?= $banner_text; ?>
            </div>

          <?php endif; ?>

          <?php if ($banner_link = get_field('banner_link', $page_id)) : ?>

            <a href="<?= esc_url($banner_link['url']) ?>" class="btn btn--secondary"><?= $banner_link['title']; ?></a>

          <?php endif; ?>

          <?php if ($banner_bg = get_field('banner_bg', $page_id)) : ?>
            <div class="banner__bg cut-corner">
              <?= wp_get_attachment_image($banner_bg, 'banner-image'); ?>
            </div>
          <?php endif; ?>

        </div>


        <?php
        if (function_exists('yoast_breadcrumb')) {
          yoast_breadcrumb('<p id="breadcrumbs" class="breadcrumbs">', '</p>');
        }
        ?>

      </div>
    </div>
  </div>
</section>