<section class="image_banner">
    <?=wp_get_attachment_image(get_field('background'), 'full', false, array('class' => 'image_banner__bg'))?>
    <div class="overlay"></div>
    <div class="container-xl h-100 d-flex justify-content-center align-items-center">
        <div class="image_banner__content" data-aos="fade-down">
            <?=get_field('content')?>
        </div>
        <div class="d-flex g-2">
            <?php
            if (get_field('booking_link') ?? null) {
                ?>
            <div class="hero__button">
                <a href="/book-now/" class="button button-primary">Book Now</a>
            </div>
                <?php
            }
            if (get_field('link') ?? null) {
                $l = get_field('link');
                ?>
            <div class="image_banner__button" data-aos="fade-up"
                data-aos-delay="<?=$d?>">
                <a href="<?=$l['url']?>"
                    target="<?=$l['target']?>"
                    class="button button-primary"><?=$l['title']?></a>
            </div>
            <?php
            }
            ?>
        </div>
    </div>
</section>