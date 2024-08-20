<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 * @package cb-peoplesafe
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

?>
<footer>
    <div class="container-xl">
        <div class="pre_footer">
            <a class="pre_footer__card"
                href="<?=get_field('directions_link', 'options')?>"
                target="_blank">
                <i class="fa-solid fa-map"></i>
                <div>
                    <span class="small">Find Us</span>
                    <div class="large">Get Directions</div>
                </div>
            </a>
            <a class="pre_footer__card"
                href="tel:<?=parse_phone(get_field('contact_phone', 'options'))?>">
                <i class="fa-solid fa-phone"></i>
                <div>
                    <span class="small">Text or call for more information</span>
                    <div class="large">
                        <?=get_field('contact_phone', 'options')?>
                    </div>
                </div>
            </a>
            <a class="pre_footer__card"
                href="mailto:<?=get_field('contact_email', 'options')?>">
                <i class="fa-solid fa-envelope"></i>
                <div>
                    <span class="small">Message Us</span>
                    <div class="large">Send an Email</div>
                </div>
            </a>

        </div>

        <div class="row g-4">
            <div class="col-12 col-lg-4">
                <div class="h4 has-line">About Us</div>
                <div class="footer__content">
                    <?=get_field('footer_content', 'options')?>
                </div>
            </div>
            <div class="col-sm-6 col-lg-2">
                <div class="h4 has-line">Services</div>
                <?php wp_nav_menu(array('theme_location' => 'footer_menu_1')); ?>
            </div>
            <div class="col-sm-6 col-lg-2">
                <div class="h4 has-line">Quick Links</div>
                <?php wp_nav_menu(array('theme_location' => 'footer_menu_2')); ?>
            </div>
            <div class="col-12 col-lg-4">
                <div class="h4 has-line">Contact Us</div>
                <ul class="fa-ul">
                    <li><span class="fa-li"><i class="fa-solid fa-map-marker-alt"></i></span>
                        <?=get_field('contact_address', 'options')?>
                    </li>
                    <li><span class="fa-li"><i class="fa-solid fa-phone"></i></span>
                        <?=contact_phone()?>
                    </li>
                    <li><span class="fa-li"><i class="fa-solid fa-paper-plane"></i></span>
                        <?=contact_email()?>
                    </li>
                </ul>
                <div class="h5 ff-heading">Connect</div>
                <?=social_icons()?>
            </div>
        </div>
        <div class="colophon">
            <div>&copy; <?=date('Y')?> Belmont
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