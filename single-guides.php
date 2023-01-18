<?php get_header(); ?>

<main class="main">
  <?php get_template_part('/template-parts/banner'); ?>
  <section class="container">
    <div class="row guide flex-row--reverse justify-content-end">
      <aside class="guide__menu col-12 col-sm-5 col-md-3 col-lg-2">
        <div class="guide__menu-group">
          <h2 class="guide__menu-heading">Kategorie wpisów</h2>
          <ul class="guide__menu-categories">

            <?php
            $categories = get_terms(array(
              'taxonomy' => 'guides_categories',
              'hide_empty' => false
            ));
            if (!empty($categories)) :
              foreach ($categories as $category) :
                $category_name = $category->name;
                $category_link = get_term_link($category);
            ?>

                <li class="guide__menu-category">
                  <a href="<?= esc_url($category_link); ?>">
                    <?= $category_name; ?>
                  </a>
                </li>


            <?php
              endforeach;
            endif; ?>

          </ul>
        </div>

        <?php
        // Current Post Id
        $current_id = get_the_ID();
        //  Recent Guides

        // Query args
        $args = array(
          'post_type' => 'guides',
          'orderby' => 'date',
        );

        // The Query
        $guides = new WP_Query($args);

        if ($guides->have_posts()) :
          $i = 0;
        ?>

          <div class="guide__menu-group">
            <h2 class="guide__menu-heading">
              Ostatnie wpisy
            </h2>
            <div class="guide__recent-posts">

              <?php while ($guides->have_posts()) : $guides->the_post(); ?>

                <?php if ($current_id != get_the_ID()) : ?>

                  <a href="<?= esc_url(get_permalink()); ?>" class="guide__recent-post">
                    <div class="d-flex">
                      <div class="guide__recent-post-thumb">
                        <div>
                          <?= get_the_post_thumbnail('', 'recent-thumb'); ?>
                        </div>
                      </div>
                      <div class="guide__recent-post-info">
                        <h2 class="guide__recent-post-title">
                          <?= get_the_title(); ?>
                        </h2>
                        <p class="guide__recent-post-date">
                          <?= get_the_date('d.m.Y '); ?>
                        </p>
                      </div>
                    </div>
                  </a>

                <?php endif; ?>
                <?php
                $i++;
                if ($i >= 2) break; ?>

              <?php endwhile; ?>

            </div>
          </div>

        <?php wp_reset_query();
        endif; ?>


      </aside>
      <article class="col-12 col-sm-7 col-md-9 col-lg-8 offset-lg-1">
        <div class="guide__content row">
          <div class="guide__thumbnail guide__media cut-corner col-12 col-md-6">
            <?= get_the_post_thumbnail('', 'guide-img'); ?>
          </div>
          <div class="col-12 col-md-6">
            <h2 class="guide__title"><?= get_the_title(); ?></h2>
            <div class="guide__info">
              <div class="guide__info-group d-flex align-items-center">
                <img src="<?= get_template_directory_uri(); ?>/dist/images/user.svg" alt="" class="guide__info-icon">
                <p class="guide__info-text">Dodano: <?= get_the_author(); ?></p>
              </div>
              <div class="guide__info-group d-flex align-items-center">
                <img src="<?= get_template_directory_uri(); ?>/dist/images/callendar.svg" alt="" class="guide__info-icon">
                <p class="guide__info-text"><?= get_the_date('d M, Y'); ?></p>
              </div>
            </div>
            <div class="guide__text text-lead">

              <?php if ($main_content = get_field('main_content')) : ?>
                <?= $main_content; ?>
              <?php endif; ?>

            </div>
          </div>
        </div>


        <?php if (have_rows('guide_content')) : ?>
          <?php while (have_rows('guide_content')) : the_row(); ?>

            <div class="guide__content row">
              <div class="col-12 col-md-6 guide__media">

                <?php $media =  get_sub_field('media');
                if ($media['media'] == 'film_yt') {
                  echo $media['yt_movie'];
                } else if ($media['media'] == 'zdjecie') {
                  echo wp_get_attachment_image($media['image']);
                }; ?>

              </div>

              <?php if ($text = get_sub_field('text')) : ?>
                <div class="col-12 col-md-6 guide__text text-lead">
                  <?= $text;  ?>
                </div>
              <?php endif; ?>

            </div>

          <?php endwhile; ?>
        <?php endif; ?>

      </article>

      <?php
      // Get and display tags list 
      $tags = get_the_terms('', 'guide_tags');

      if (!empty($tags)) : ?>


        <div class="col-12 col-sm-7 col-md-9 col-lg-8 offset-lg-1 d-flex justify-content-between align-items-center flex-wrap">
          <div class="guide__tags d-flex align-items-center flex-wrap">
            <p class="text-bold">Tagi:</p>

            <?php foreach ($tags as $tag) :
              $tag_name = $tag->name;
              $tag_link = get_term_link($tag);
            ?>

              <a href="<?= esc_url($tag_link); ?>" class="btn btn--tag">
                <?= $tag_name; ?>
              </a>

            <?php endforeach; ?>

          </div>

          <div class="guide__share d-flex align-items-center">
            <p class="text-bold">
              Udostępnij:
            </p>
            <a href="" class="guide__share-link">
              <img src="<?= get_template_directory_uri(); ?>/dist/images/facebook-icon.png" alt="">
            </a>
            <a href="" class="guide__share-link">
              <img src="<?= get_template_directory_uri(); ?>/dist/images/twitter-icon.png" alt="">
            </a>
          </div>
        </div>

      <?php endif; ?>

    </div>
  </section>
  <?php get_template_part('/template-parts/cta'); ?>
  <?php get_template_part('/template-parts/opinions'); ?>
  <?php get_template_part('/template-parts/guides'); ?>
</main>

<?php get_footer(); ?>