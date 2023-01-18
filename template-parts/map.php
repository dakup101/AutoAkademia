<section class="map-section">
  <div class="container">
    <div class="row">
      <div class="map-section__content col-12 col-xs-10 offset-xs-1 col-lg-5 offset-lg-1 col-xl-4-5">

        <?php if ($map_heading = get_field('map_heading', 'options')) : ?>

          <h2 class="heading-secondary">
            <?= $map_heading; ?>
          </h2>

        <?php endif; ?>

        <?php if ($map_subheading = get_field('map_subheading', 'options')) : ?>
          <div class="subheading">
            <?= $map_subheading; ?>
          </div>
        <?php endif; ?>

        <?php if (have_rows('map_locations', 'options')) : ?>

          <div class="map-section__locations row">

            <?php while (have_rows('map_locations', 'options')) : the_row(); ?>
              <?php $coordinates = get_sub_field('coordinates'); ?>
              <div class="col-12 col-md-6 col-lg-12">
                <div class="map-section__location d-flex flex-column flex-xs-row align-items-center justify-content-between" data-coordinates="<?= $coordinates; ?>">

                  <div class="d-flex align-items-center">
                    <img src="<?= get_template_directory_uri(); ?>/dist/images/map-icon.svg" alt="" class="map-section__location-icon">

                    <?php if ($location_name = get_sub_field('location_name')) : ?>

                      <div class="map-section__location-name">
                        <?= $location_name; ?>
                      </div>

                    <?php endif; ?>

                  </div>

                  <?php if ($map_btn = get_sub_field('map_btn')) : ?>

                    <a href="/kursy/" class="btn btn--primary"><?= $map_btn; ?></a>

                  <?php endif; ?>

                </div>
              </div>

            <?php endwhile; ?>

          </div>

        <?php endif; ?>



      </div>
      <div class="col-12 col-sm-10 offset-sm-1 col-lg-6 offset-lg-0 col-xl-6-5">
        <div id="map" class="map-section__map">

        </div>
      </div>
    </div>
  </div>
</section>