<?php $about_id = (isset($args['page_id'])) ? $args['page_id'] : ''; ?>

<section class="about container">

    <?php if ($about_heading = get_field('about_heading', $about_id)) : ?>

    <div class="row">
        <div class="heading-secondary col-12 col-xs-10 offset-xs-1 offset-sm-0 offset-lg-1">
            <?= $about_heading; ?>
        </div>
    </div>

    <?php endif; ?>

    <div class="row">
        <div class="col-12 col-xs-10 offset-xs-1 col-sm-5 offset-sm-0 offset-lg-1 col-lg-4 mb-4 mb-sm-0">

            <?php if ($about_img = get_field('about_img', $about_id)) : ?>

            <div class="about__image cut-corner">

                <?= wp_get_attachment_image($about_img, 'standard'); ?>

            </div>
            <?php endif; ?>

        </div>
        <div class="col-12 col-xs-10 offset-xs-1 col-sm-7 offset-sm-0 col-lg-6">

            <?php if ($about_content = get_field('about_content', $about_id)) : ?>

            <div class="section-heading">
                <h3>
                    <span><?= $about_content['heading_upper']; ?></span>
                    <div class="title-speed">
                        <span><?= $about_content['heading']; ?></span>
                        <img src="<?php echo THEME_IMG . "speed-shape.svg" ?>" alt="">
                    </div>
                </h3>
            </div>
            <div class="text-lead">
                <?= $about_content['text']; ?>
            </div>
            <?php if($about_id): ?>
            <a href="<?= esc_url(get_permalink($about_id)); ?>" class="btn btn--secondary">Czytaj więcej</a>
            <?php endif; ?>

            <?php endif; ?>

        </div>
    </div>

</section>