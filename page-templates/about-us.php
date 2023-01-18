<?php

/* Template Name: O nas */

get_header();
?>

<main class="main">
  <?php get_template_part('/template-parts/banner'); ?>
  <?php get_template_part('/template-parts/worth-signing'); ?>
  <?php get_template_part('/template-parts/about'); ?>

  <section class="about about--pt-0 container">

    <div class="row">
      <div class="col-12 col-xs-10 offset-xs-1 col-md-6 offset-md-0 col-lg-5 offset-lg-1 mb-4 mb-sm-0">

        <?php if ($about_more = get_field('about_more')) : ?>
          <div class="heading-secondary text-lead">
            <?= $about_more; ?>
          </div>
        <?php endif; ?>

      </div>
      <div class="col-12 col-xs-10 offset-xs-1 col-md-6 offset-md-0 col-lg-5">

        <?php if ($about_more_img = get_field('about_more_img')) : ?>

          <div class="about__image cut-corner">

            <?= wp_get_attachment_image($about_more_img, 'standard'); ?>

          </div>
        <?php endif; ?>

      </div>
    </div>

  </section>

  <section class="about about--pt-0 container">

    <div class="row">
      <div class="col-12 col-xs-10 offset-xs-1 col-sm-5 offset-sm-0 offset-lg-1 col-lg-4 mb-4 mb-sm-0">

        <?php if ($about_courses_img = get_field('about_courses_img', $about_id)) : ?>

          <div class="about__image cut-corner">

            <?= wp_get_attachment_image($about_courses_img, 'standard'); ?>

          </div>
        <?php endif; ?>

      </div>
      <div class="col-12 col-xs-10 offset-xs-1 col-sm-7 offset-sm-0 col-lg-6">

        <?php if ($about_courses_content = get_field('about_courses_content', $about_id)) : ?>

          <div class="section-heading">
            <h3>
              <span><?= $about_courses_content['heading_upper']; ?></span>
              <?= $about_courses_content['heading']; ?>
            </h3>
          </div>
          <div class="text-lead">
            <?= $about_courses_content['text']; ?>
          </div>
          <?php if ($about_courses_link = get_field('about_courses_link')) : ?>
            <a href="<?= esc_url($about_courses_link['url']); ?>" class="btn btn--secondary"><?= $about_courses_link['title'] ?></a>
          <?php endif; ?>

        <?php endif; ?>

      </div>
    </div>

  </section>

  <?php get_template_part('/template-parts/cta'); ?>
  <?php get_template_part('/template-parts/opinions'); ?>
  <?php get_template_part('/template-parts/guides'); ?>
</main>

<?php get_footer(); ?>