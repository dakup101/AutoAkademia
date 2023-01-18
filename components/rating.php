<?php
$rating = (isset($args['rating'])) ? floatval($args['rating']) : false;
$max = 5;

if (($rating) && ($rating <= 5) && ($rating > 0)) :
  $rounded_rating = round($rating * 2) / 2;
  $i = 0;
?>

  <div class="rating">

    <?php for ($j = 0; $j < ($rounded_rating * 2 - 1); $j += 2) : ?>

      <div class="rating__star">
        <img src="<?= get_template_directory_uri(); ?>/dist/images/star-full.svg" alt="" class="rating__star-icon">
      </div>

      <?php $i++; ?>

    <?php endfor; ?>

    <?php if (($rounded_rating * 2) % 2) : ?>

      <div class="rating__star">
        <img src="<?= get_template_directory_uri(); ?>/dist/images/star-half.svg" alt="" class="rating__star-icon">
      </div>

    <?php $i++;
    endif; ?>

    <?php for ($i; $i < $max; $i++) : ?>

      <div class="rating__star">
        <img src="<?= get_template_directory_uri(); ?>/dist/images/star-empty.svg" alt="" class="rating__star-icon">
      </div>

    <?php endfor; ?>

  </div>


<?php endif; ?>