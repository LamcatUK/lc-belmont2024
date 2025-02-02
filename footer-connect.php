<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 * @package lc-belmont2024
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

?>
<footer>
    <div class="container-xl">
        <div class="colophon">
            <div>&copy; <?= date('Y') ?> Belmont
                Skin and
                Laser Clinic</div>
            <div>
                <a href="/privacy-policy/">Privacy</a> &amp; <a href="/cookie-policy/">Cookie</a> Policies
            </div>
        </div>
    </div>
</footer>
<?php wp_footer(); ?>
</body>

</html>
<?php
//  | Site by <a
//  href="https://www.lamcat.co.uk/" target="_blank">Lamcat</a>
?>