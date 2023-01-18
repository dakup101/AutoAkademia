<?php

/* Template Name: Cennik */

get_header();
?>

<main class="main">
    <?php get_template_part('/template-parts/banner'); ?>
    <div class="container course-content">
        <div class="row">
            <div class="col-12 col-lg-10 offset-lg-1">
                <?php get_template_part('/template-parts/pricing-featured'); ?>
                <div class="pricing-credit">
                    <span><strong>RATY 0%</strong> na wszystkie szkolenia podstawowe w Auto Akademii. <a
                            href="/kontakt/">Dowiedz się więcej</a>.</span>
                </div>
                <?php get_template_part('/template-parts/pricing-addons'); ?>

            </div>
        </div>
    </div>
    <?php get_template_part('/template-parts/cta'); ?>
    <?php get_template_part('/template-parts/opinions'); ?>
    <?php get_template_part('/template-parts/guides'); ?>
</main>

<?php get_footer(); ?>