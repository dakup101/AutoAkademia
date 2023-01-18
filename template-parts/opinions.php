<?php
// Temporary using ACF Reapeater for opinions, later remake section to get opinions from users
if (have_rows('opinions', 'options')) : ?>

  <section class="opinions-section container">

    <div class="row justify-content-center">
      <div class="col-12 col-xs-10 col-sm-9 col-md-8 col-lg-7 col-xl-6">
        <?php if ($opinions_heading = get_field('opinions_heading', 'options')) : ?>

          <div class="heading-secondary text-center">
            <?= $opinions_heading; ?>
          </div>

        <?php endif; ?>

        <?php if ($opinions_subheading = get_field('opinions_subheading', 'options')) : ?>

          <div class="text-lead text-center">
            <?= $opinions_subheading; ?>
          </div>

        <?php endif; ?>

        <?php if ($average_rating = get_field('average_rating', 'options')) : ?>

          <?php get_template_part('/components/rating', '', ['rating' => $average_rating['score']]); ?>

          <div class="text-lead text-center">
            <p>
              <strong>

                <?= $average_rating['text']; ?>

                <span>

                  <?= ' ' . $average_rating['score'] . ' '; ?>

                </span>

              </strong>
              (na podstawie <?= $average_rating['number']; ?> opinii naszych kursantów.)
            </p>
          </div>

        <?php endif; ?>


      </div>
    </div>

    <div class="opinions-section__opinions swiper mySwiper">

      <div class="swiper-wrapper">
        <?php while (have_rows('opinions', 'options')) : the_row(); ?>
          <?php
          $photo = get_sub_field('photo');
          $name = get_sub_field('name');
          $instructor = get_sub_field('instructor');
          $content = get_sub_field('content');
          $rating = get_sub_field('rating');
          ?>

          <div class="swiper-slide">

            <div class="opinions-section__opinion-wrapper">
              <div class="opinions-section__opinion">
                <div class="opinions-section__opinion-user">

                  <?= wp_get_attachment_image($photo, 'opinion-user', '', ['class' => 'opinions-section__opinion-user-photo']); ?>

                  <p class="opinions-section__opinion-user-name">
                    <?= $name; ?>
                  </p>

                </div>
                <div class="opinions-section__opinion-instructor">

                  <img src="<?= get_template_directory_uri(); ?>/dist/images/instructor-icon.svg" alt="" class="opinions-section__opinion-instructor-icon">
                  <p class="opinions-section__opinion-instructor-name">
                    <strong>Instruktor: </strong>
                    <?= $instructor; ?>
                  </p>

                </div>

                <p class="opinions-section__opinion-content">
                  <?= $content; ?>
                </p>

                <?php get_template_part('/components/rating-gold', '', ['rating' => $rating]); ?>
              </div>
            </div>

          </div>

        <?php endwhile; ?>
      </div>

      <div class="swiper-navigation">
        <button class="swiper-button swiper-button--prev"></button>
        <div class="swiper-navigation__separator"></div>
        <button class="swiper-button swiper-button--next"></button>
      </div>
    </div>

  </section>

<?php endif; ?>