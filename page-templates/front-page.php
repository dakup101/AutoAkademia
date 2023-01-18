<?php

/* Template Name: Strona główna */

get_header();
?>

<main class="main">

  <?php get_template_part('/template-parts/banner-slider'); ?>
  <?php get_template_part('/template-parts/worth-signing'); ?>
  <?php get_template_part('/template-parts/map'); ?>
  <?php get_template_part('/template-parts/about', '', ['page_id' => 44]); ?>
  <?php get_template_part('/template-parts/cta'); ?>
  <?php get_template_part('/template-parts/opinions'); ?>
  <?php get_template_part('/template-parts/guides', '', ['is_front' => true]); ?>
  
</main>

<?php get_footer(); ?>