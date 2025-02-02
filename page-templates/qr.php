<?php
/*
Template Name: Links
*/
// Exit if accessed directly.
defined('ABSPATH') || exit;

get_header('connect');
?>
<main class="mt-3">
    <img src="<?= get_stylesheet_directory_uri() ?>/img/belmont-logo.png" alt="Belmont Skin & Laser Clinic">
    <div class="container-xl pt-5 qr">
        <a class="button button-outline-primary d-block text-center" href="mailto:<?= get_field('contact_email', 'options') ?>">
            <i class="fa-solid fa-envelope"></i> Email Us
        </a>
        <a class="button button-outline-primary d-block text-center" href="tel:<?= parse_phone(get_field('contact_phone', 'options')) ?>">
            <i class="fa-solid fa-envelope"></i> Call <?= get_field('contact_phone', 'options') ?>
        </a>
        <a class="button button-outline-primary d-block text-center" href="/book-now/">
            <i class="fa-solid fa-envelope"></i> Book Now
        </a>

        <h2 class="mb-0">Connect</h2>
        <?php
        $s = get_field('socials', 'options');
        // echo '<pre>' . var_dump($s) . '</pre>';

        if ($s['linkedin_url'] ?? null) {
        ?>
            <a href="<?= $s['linkedin_url'] ?>" target="_blank" class="button button-outline-primary d-block text-center">
                <i class="fa-brands fa-linkedin-in"></i> LinkedIn
            </a>
        <?php
        }
        if ($s['instagram_url'] ?? null) {
        ?>
            <a href="<?= $s['instagram_url'] ?>" target="_blank" class="button button-outline-primary d-block text-center">
                <i class="fa-brands fa-instagram"></i> Instagram
            </a>
        <?php
        }
        if ($s['facebook_url'] ?? null) {
        ?>
            <a href="<?= $s['facebook_url'] ?>" target="_blank" class="button button-outline-primary d-block text-center">
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