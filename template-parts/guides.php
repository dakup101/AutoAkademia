<?php

$is_front = (isset($args['is_front'])) ? $args['is_front'] : false;

$posts_per_page = ($is_front) ? 2 : 4;
$is_paged = ($is_front) ? false : $paged;
// Query args
$args = array(
  'post_type' => 'guides',
  'post_status' => 'publish',
  'paged' => $is_paged,
  'posts_per_page' => $posts_per_page
);

// The query
$guides = new WP_Query($args);

if ($guides->have_posts()) : ?>

<section class="guides container">
    <div class="row justify-content-center">
        <div class="col-12 col-xs-10 col-sm-9 col-md-8 col-lg-7 col-xl-6">

            <?php if ($guides_heading = get_field('guides_heading')) : ?>

            <div class="heading-secondary text-center">
                <?= $guides_heading; ?>
            </div>

            <?php endif; ?>

            <?php if ($guides_subheading = get_field('guides_subheading')) : ?>

            <div class="text-lead text-center">
                <?= $guides_subheading; ?>
            </div>

            <?php endif; ?>

        </div>
    </div>

    <div class="row">
        <div class="col-12 col-xs-10 offset-xs-1 d-flex flex-column align-items-center">
            <div class="guides__cards">

                <?php while ($guides->have_posts()) : $guides->the_post(); ?>

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

            <?php if ($is_front) : ?>

            <a href="#" class="link link--primary link--center">Przeczytaj wszystkie nasze poradniki</a>

            <?php endif; ?>

            <div class="guides__nav d-flex justify-contnet-center align-items-center">
                <?php if (!$is_front) {
            pagination_bar($guides);
          } ?>
            </div>

        </div>
    </div>

</section>

<?php wp_reset_query();
endif; ?>