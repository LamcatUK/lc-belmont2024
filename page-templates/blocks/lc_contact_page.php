<section class="contact_page">
    <div class="container-xl">
        <div class="row g-5 mb-4 pb-5">
            <div class="col-md-6" data-aos="fade-up">
                <div class="contact__address mb-4">
                    <h2 class="h3">Our Clinic</h2>
                    <?= get_field('contact_address', 'options') ?>
                </div>
                <div class="contact__phone mb-4">
                    <i class="fa-solid fa-phone"></i>
                    <?= contact_phone() ?>
                </div>

                <div class="contact__socials mb-4">
                    <h2 class="h4">Connect</h2>
                    <?= social_icons() ?>
                </div>

                <div class="contact__hours mb-4">
                    <h2 class="h4">Opening Hours</h2>
                    <?= do_shortcode('[lc_open_ajax]') ?>
                </div>
                <div class="mb-3">To schedule an appointment, please click below</div>
                <a href="/book-now/" class="button button-primary">Book Now</a>
                <div class="my-4">Or email <a href="mailto:<?= get_field('contact_email', 'options') ?>"><?= get_field('contact_email', 'options') ?></a></div>
            </div>
            <div class="col-md-6" data-aos="fade-up">
                <h2 class="h3">Get in Touch</h2>
                <?= do_shortcode('[contact-form-7 id="' . get_field('contact_form_id', 'options') . '"]') ?>
            </div>
        </div>
    </div>
    <iframe
        title="Find The Belmont Skin and Laser Clinic"
        src="<?= get_field('google_map', 'options') ?>"
        width="100%" height="550" class="contact__map" style="border:0;" allowfullscreen="" loading="lazy"
        referrerpolicy="no-referrer-when-downgrade"></iframe>
</section>