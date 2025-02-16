<?php
/*
Template Name: Links
*/
// Exit if accessed directly.
defined('ABSPATH') || exit;

get_header('connect');
?>
<style>
    body {
        min-height: 100vh;
        display: grid;
        align-items: stretch;
        grid-template-rows: 1fr auto;
    }

    body>div:not([class]) {
        display: none !important;
    }

    [class^="cky-"] {
        display: none !important;
    }

    .grecaptcha-badge {
        display: none !important;
    }

    img {
        max-width: 100px;
    }

    footer .colophon {
        border-top: none;
        justify-content: center;
        padding-block: 0.5rem;
    }
</style>
<main class="mt-3">
    <img src="<?= get_stylesheet_directory_uri() ?>/img/belmont-logo.png" class="d-block mx-auto" alt="Belmont Skin & Laser Clinic">
    <div class="container-xl pt-4 qr">
        <h2 class="h4 my-2 text-center">Contact</h2>

        <a class="button button-outline-primary d-block text-center mb-3" href="/book-now/">
            <i class="fa-solid fa-calendar-days"></i> Book Now
        </a>
        <a class="button button-outline-primary d-block text-center mb-3" href="mailto:<?= get_field('contact_email', 'options') ?>">
            <i class="fa-solid fa-envelope"></i> Email Us
        </a>
        <a class="button button-outline-primary d-block text-center mb-3" href="tel:<?= parse_phone(get_field('contact_phone', 'options')) ?>">
            <i class="fa-solid fa-phone"></i> Call <?= get_field('contact_phone', 'options') ?>
        </a>
        <a class="button button-outline-primary d-block text-center mb-3" href="https://search.google.com/local/writereview?placeid=ChIJC72RFq69dUgRgMBpRhO-xk4" target="_blank">
            <i class="fa-solid fa-star"></i> Leave a Review
        </a>

        <h2 class="h4 mt-4 mb-2 text-center">Connect</h2>
        <?php
        $s = get_field('socials', 'options');
        // echo '<pre>' . var_dump($s) . '</pre>';

        if ($s['linkedin_url'] ?? null) {
        ?>
            <a href="<?= $s['linkedin_url'] ?>" target="_blank" class="button button-outline-primary d-block text-center mb-3">
                <i class="fa-brands fa-linkedin-in"></i> LinkedIn
            </a>
        <?php
        }
        if ($s['instagram_url'] ?? null) {
        ?>
            <a href="<?= $s['instagram_url'] ?>" target="_blank" class="button button-outline-primary d-block text-center mb-3">
                <i class="fa-brands fa-instagram"></i> Instagram
            </a>
        <?php
        }
        if ($s['facebook_url'] ?? null) {
        ?>
            <a href="<?= $s['facebook_url'] ?>" target="_blank" class="button button-outline-primary d-block text-center mb-3">
                <i class="fa-brands fa-facebook-f"></i> Facebook
            </a>
        <?php
        }
        ?>
    </div>
</main>
<?php
get_footer('connect');
?>