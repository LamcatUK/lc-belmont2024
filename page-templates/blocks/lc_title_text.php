<?php
switch (get_field('split')) {
    case 4060:
        $colTitle = 'col-md-4';
        $colText = 'col-md-8';
        break;
    case 6040:
        $colTitle = 'col-md-8';
        $colText = 'col-md-4';
        break;
    case 7030:
        $colTitle = 'col-md-9';
        $colText = 'col-md-3';
        break;
    default:
        $colTitle = 'col-md-6';
        $colText = 'col-md-6';
}
?>
<section class="title_text py-5">
    <div class="container-xl" style="overflow-x: hidden;">
        <div class="row">
            <div class="<?= $colTitle ?>" data-aos="fade-up">
                <?php
                if (get_field('pre_title') ?? null) {
                ?>
                    <div class="ff-body small text-uppercase mb-2">
                        <?= get_field('pre_title') ?>
                    </div>
                <?php
                }
                ?>
                <h2 class="has-line text-taupe-400">
                    <?= get_field('title') ?>
                </h2>
            </div>
            <div class="<?= $colText ?>" data-aos="fade-up">
                <div><?= get_field('content') ?>
                </div>
                <?php
                if (get_field('book_button') ?? null) {
                ?>
                    <br>
                    <a href="/book-now/" class="button button-primary">Book Now</a>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
</section>