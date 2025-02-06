<?php
$background = get_field('bg_colour') ?: 'white';
$class = $block['className'] ?? 'py-5';

$title = get_field('title_colour') ?: 'taupe-600';

switch (get_field('split')) {
    case 4060:
        $colText = 'col-md-4';
        $colImage = 'col-md-8';
        break;
    case 6040:
        $colText = 'col-md-8';
        $colImage = 'col-md-4';
        break;
    case 7030:
        $colText = 'col-md-9';
        $colImage = 'col-md-3';
        break;
    default:
        $colText = 'col-md-6';
        $colImage = 'col-md-6';
}

$orderText = get_field('order') == 'text image' ? 'order-md-1' : 'order-md-2';
$orderImage = get_field('order') == 'text image' ? 'order-md-2' : 'order-md-1';

$orderTextMobile = get_field('mobile_order') == 'text image' ? 'order-1' : 'order-2';
$orderImageMobile = get_field('mobile_order') == 'text image' ? 'order-2' : 'order-1';

$animText = get_field('order') == 'text image' ? 'fade-up' : 'fade-up';
$animImage = get_field('order') == 'text image' ? 'fade-up' : 'fade-up';


if (isset($block['anchor'])) {
    echo '<a id="' . esc_attr($block['anchor']) . '" class="anchor"></a>';
}

?>
<section
    class="text_image bg-<?= $background ?> <?= $class ?>">
    <div class="container-xl">
        <div class="row g-5">
            <div
                class="<?= $colText ?> <?= $orderTextMobile ?> <?= $orderText ?> d-flex flex-column justify-content-center">
                <div data-aos="<?= $animText ?>">
                    <h2 class="has-line text-<?= $title ?>">
                        <?= get_field('title') ?>
                    </h2>
                    <div class="fs-600">
                        <?= get_field('content') ?>
                    </div>
                </div>
            </div>
            <div
                class="<?= $colImage ?> <?= $orderImageMobile ?> <?= $orderImage ?> d-flex justify-content-center align-items-center">

                <img src="<?= wp_get_attachment_image_url(get_field('image'), 'large') ?>"
                    alt="" data-aos="<?= $animImage ?>">
            </div>
        </div>
    </div>
</section>