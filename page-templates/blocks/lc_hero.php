<?php
$d = 200;
$class = $block['className'] ?? null;
?>

<section class="hero <?=$class?>">
    <?=wp_get_attachment_image(get_field('background'), 'full', false, array('class' => 'hero__bg'))?>
    <div class="overlay"></div>
    <div class="container-xl h-100 d-flex align-items-center">
        <div class="hero__inner">
            <h1 data-aos="fade-right">
                <?=get_field('title')?>
            </h1>
            <?php
            if (get_field('content') ?? null) {
                ?>
            <div class="hero__content mb-4" data-aos="fade-right"
                data-aos-delay="<?=$d?>">
                <?=get_field('content')?>
            </div>
            <?php
            $d += 200;
            }
            ?>
            <div class="button-group">
                <?php
if (get_field('booking_link') ?? null) {
    ?>
                <div class="hero__button" data-aos="fade-right"
                data-aos-delay="<?=$d?>">
                    <a href="/book-now/" class="button button-primary">Book Now</a>
                </div>
                <?php
                $d += 200;
}
if (get_field('link') ?? null) {
        $l = get_field('link');
        ?>
                <div class="hero__button" data-aos="fade-right"
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
    </div>
</section>