<section class="service_nav">
    <div class="container-xl">
        <div class="row g-4">
            <?php
            $d = 0;
            while (have_rows('cards')) {
                the_row();
            ?>
                <div class="col-lg-6 col-xl-3">
                    <a class="service_nav__card" data-aos="fade-up"
                        data-aos-delay="<?= $d ?>"
                        href="<?= get_sub_field('link') ?>">
                        <?= wp_get_attachment_image(get_sub_field('image'), 'large', false, array('class' => 'service_nav__image')) ?>
                        <div class="service_nav__inner">
                            <h2 class="service_nav__title">
                                <?= get_sub_field('title') ?>
                                </h3>
                                <div class="service_nav__content">
                                    <?= get_sub_field('content') ?>
                                </div>
                        </div>
                    </a>
                </div>
            <?php
                $d += 100;
            }
            ?>
        </div>
    </div>
</section>