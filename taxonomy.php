<?php


get_header();
?>

<main class="main">

  <?php get_template_part('/template-parts/banner', '', ['page_id' => 223]); ?>
  <?php if (have_posts()) : ?>

    <section class="guides container">
      <div class="row justify-content-center">
        <div class="col-12 col-xs-10 col-sm-9 col-md-8 col-lg-7 col-xl-6">

          <?php if ($guides_heading = get_field('guides_heading', 223)) : ?>
            <div class="heading-secondary text-center">
              <?= $guides_heading; ?>
            </div>

          <?php endif; ?>

          <?php if ($guides_subheading = get_field('guides_subheading', 223)) : ?>

            <div class="text-lead text-center">
              <?= $guides_subheading; ?>
            </div>

          <?php endif; ?>

        </div>
      </div>

      <div class="row">
        <div class="col-12 col-xs-10 offset-xs-1 d-flex flex-column align-items-center">
          <div class="guides__cards">

            <?php while (have_posts()) : the_post(); ?>

              <div class="guides__card">
                <div class="guides__card-content">
                  <h3 class="guides__card-title">
                    <?= get_the_title(); ?>
                  </h3>

                  <?php if ($guides_excerpt = get_field('guides_excerpt')) : ?>

                    <div class="guides__card-excerpt">
                      <?= $guides_excerpt; ?>
                    </div>

                  <?php endif; ?>

                  <a href="<?= esc_url(get_permalink()); ?>" class="btn btn--secondary">Czytaj więcej</a>

                </div>
                <div class="guides__card-thumbnail">
                  <?= get_the_post_thumbnail('', 'guide-thumb'); ?>
                </div>
              </div>

            <?php endwhile; ?>

          </div>

          <div class="guides__nav d-flex justify-contnet-center align-items-center">
            <?php
            pagination_bar($guides);
            ?>
          </div>

        </div>
      </div>

    </section>

  <?php wp_reset_query();
  endif; ?>
  <?php get_template_part('/template-parts/cta'); ?>
  <?php get_template_part('/template-parts/opinions'); ?>

</main>

<?php get_footer(); ?>