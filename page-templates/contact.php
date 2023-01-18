<?php

/* Template Name: Kontakt */

get_header();
?>

<main class="main">

  <?php get_template_part('/template-parts/banner'); ?>
  <?php get_template_part('/template-parts/contact', '', ['cf_shortcode' => '[contact-form-7 id="184" title="Formularz zgłoszeniowy -- z polem na wiadomość"]']); ?>
  <?php get_template_part('/template-parts/contact_locations'); ?>
  <?php get_template_part('/template-parts/about', '', ['page_id' => 44]); ?>
  <?php get_template_part('/template-parts/cta'); ?>
  <?php get_template_part('/template-parts/opinions'); ?>
  <?php get_template_part('/template-parts/guides'); ?>
  
</main>

<?php get_footer(); ?>