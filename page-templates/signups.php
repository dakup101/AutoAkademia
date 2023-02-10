<?php

/* Template Name: Zapisy */

get_header();
?>

<main class="main">

    <!-- <?php get_template_part('/template-parts/banner'); ?> -->
    <h1 class="d-none"><?php echo get_the_title() ?></h1>
    <section class="row signups-about">
        <?php $content = get_field("content_left"); ?>
        <div class="col-4 signups-about-col signups-about-courses"
            style="background-image: url('<?php echo $content["img"] ?>');">
            <article class="signups-about-inner">
                <h3 class="signups-about-title">
                    <?php echo $content["title"] ?>
                </h3>
                <div class="signups-about-content">
                    <?php echo $content["text"] ?>
                </div>
                <a href="<?php echo $content["btn_link"] ?>" class="signups-about-btn btn btn--primary">
                    <?php echo $content["btn"] ?>
                </a>
            </article>
        </div>
        <?php $content = get_field("content_center"); ?>
        <div class="col-4 signups-about-col signups-about-form"
            style="background-image: url('<?php echo $content["img"] ?>');">
            <article class="signups-about-inner">
                <h3 class="signups-about-title">
                    <?php echo $content["title"] ?>
                </h3>
                <div class="signups-about-content">
                    <?php echo $content["text"] ?>
                </div>
                <a href="<?php echo $content["btn_link"] ?>" class="signups-about-btn btn btn--primary">
                    <?php echo $content["btn"] ?>
                </a>
            </article>
        </div>
        <?php $content = get_field("content_right"); ?>
        <div class="col-4 signups-about-col signups-about-form"
            style="background-image: url('<?php echo $content["img"] ?>');">
            <article class="signups-about-inner">
                <h3 class="signups-about-title">
                    <?php echo $content["title"] ?>
                </h3>
                <div class="signups-about-content">
                    <?php echo $content["text"] ?>
                </div>
                <a href="<?php echo $content["btn_link"] ?>" class="signups-about-btn btn btn--primary">
                    <?php echo $content["btn"] ?>
                </a>
            </article>
        </div>

    </section>

    <div class="container signups-how" id="singpusHow">
        <div class="row">
            <div class="col-12 col-lg-10 offset-lg-1">
                <h2>Jak rozpocząć kurs prawa jazdy w 2023 roku?</h2>
                <nav class="signups-how-tabs-nav tabs-nav">
                    <?php $counter = 0; ?>
                    <?php foreach (get_field("tabs") as $tab) : ?>
                    <button class="tabs-nav-item tab-<?php echo $counter ?>" data-target="tab-<?php echo $counter; ?>">
                        <?php echo $tab["title"];  ?>
                    </button>
                    <?php $counter++;
          endforeach; ?>
                </nav>
                <div class="signups-how-tabs tabs">
                    <?php $counter = 0; ?>
                    <?php foreach (get_field("tabs") as $tab) : ?>
                    <div class="tabs-item">
                        <?php if (!empty($tab["text"])) : ?>
                        <div class="tab-item-content">
                            <?php echo $tab["text"] ?>
                        </div>
                        <?php endif; ?>
                        <?php if (!empty($tab["text_left"]) && !empty($tab["text_right"])) : ?>
                        <div class="row">
                            <div class="col-12 col-md-6 tab-item-content">
                                <?php echo $tab["text_left"]; ?>
                            </div>
                            <div class="col-12 col-md-6 tab-item-content">
                                <?php echo $tab["text_right"]; ?>

                            </div>
                        </div>
                        <?php endif; ?>
                        <?php if (!empty($tab["text_after"])) : ?>
                        <div class="tab-item-content">
                            <?php echo $tab["text_after"] ?>
                        </div>
                        <?php endif; ?>
                    </div>
                    <?php $counter++;
          endforeach; ?>
                </div>
            </div>
        </div>
    </div>
    <div class="container signups-form" id="singpusForm">
        <div class="row">
            <div class="col-12 col-lg-10 offset-lg-1">
                <h2>Zadaj pytanie</h2>
            </div>
        </div>
    </div>

</main>

<?php get_footer(); ?>