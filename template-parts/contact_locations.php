<?php if (have_rows('contact_locations')) : ?>
  <section class="locations container">
    <div class="row">
      <div class="col-12 col-xs-10 offset-xs-1">
        <div class="row">
          <div class="heading-secondary text-center col-12">
            <h2>Szkolimy z <strong>3 lokalizacji w Krakowie</strong></h2>
          </div>
        </div>
        <div class="row">

          <?php while (have_rows('contact_locations')) : the_row(); ?>
            <div class="locations__location col-12 col-xs-6 col-md-4 d-flex flex-column align-items-center justify-content-end text-center">

              <?php if ($district = get_sub_field('district')) : ?>

                <p class="locations__location-district">
                  <?= $district; ?>
                </p>

              <?php endif; ?>
              <?php if ($street = get_sub_field('street')) : ?>

                <p class="locations__location-street">
                  <?= $street; ?>
                </p>

              <?php endif; ?>

              <a href="" class="btn btn--primary">Zapisz się online</a>

              <?php if (($district) && ($coordinates = get_sub_field('coordinates'))) : ?>

                <div class="locations__location-map" data-district="<?= $district; ?>" data-coordinates="<?= $coordinates; ?>">
                  <div id="location-<?= str_replace(' ', '', strtolower($district)); ?>"></div>
                </div>

              <?php endif; ?>

            </div>
          <?php endwhile; ?>

        </div>
      </div>
    </div>
  </section>
<?php endif; ?>