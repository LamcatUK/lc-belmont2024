<section class="contact">
    <div class="container-xl" style="overflow-x: hidden;">
        <div class="row g-5">
            <div class="col-md-6" data-aos="fade-up">
                <h2 class="text-taupe-400 has-line">Contact Us</h2>
                <div class="contact__inner mb-4">
                    <div class="contact__address">
                        <div class="h4 text-taupe-400">Our Clinic</div>
                        <?= get_field('contact_address', 'options') ?>
                    </div>
                    <div class="contact__hours">
                        <div class="h4 text-taupe-400">Hours of Operation</div>
                        <?= get_field('opening_hours', 'options') ?>
                    </div>
                </div>
                <div class="contact__number">
                    <div class="h4 text-taupe-400">Call</div>
                    <div class="contact__phone mb-3">
                        <i class="fa-solid fa-phone"></i>
                        <?= contact_phone() ?>
                    </div>
                    <div class="mb-3">To schedule an appointment, please click below</div>
                    <a href="/book-now/" class="button button-primary">Book Now</a>
                </div>
            </div>
            <div class="col-md-6" data-aos="fade-up">
                <iframe title="Find The Belmont Skin and Laser Clinic"
                    src="<?= get_field('google_map', 'options') ?>"
                    width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </div>
</section>