<?php
// Exit if accessed directly.
defined('ABSPATH') || exit;
get_header();

$pp = get_option('page_for_posts');

?>
<main id="main" class="pb-5">
    <section class="hero" fade-up;">
        <?= get_the_post_thumbnail($pp, 'full', array('class' => 'hero__bg')) ?>
        <div class="overlay"></div>
        <div class="container-xl h-100 d-flex align-items-center">
            <div class="hero__inner">
                <h1 data-aos="fade-up">
                    <?= get_the_title($pp) ?>
                </h1>
                <div class="hero__content mb-4" data-aos="fade-up"
                    data-aos-delay="0">
                    <?= get_the_content(null, false, $pp) ?>
                </div>
                <div class="button-group">
                    <div class="hero__button" data-aos="fade-up" data-aos-delay="200">
                        <a href="/book-now/" class="button button-primary">Book Now</a>
                    </div>
                    <div class="hero__button" data-aos="fade-up"
                        data-aos-delay="400">
                        <a href="/contact/" class="button button-primary">Contact Us</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="container-xl py-5 mb-5">
        <?php
        $cats = get_categories(array('exclude' => array(32)));
        ?>
        <div class="filters mb-4">
            <?php
            echo '<button class="button button-outline-primary button--sm active me-2 mb-2" data-filter="*">All</button>';
            foreach ($cats as $cat) {
                echo '<button class="button button-outline-primary button--sm me-2 mb-2" data-filter=".' . acf_slugify($cat->name) . '">' . $cat->cat_name . '</button>';
            }
            ?>
        </div>
        <div class="grid">
            <?php
            while (have_posts()) {
                the_post();
                $img = get_the_post_thumbnail_url(get_the_ID(), 'large');
                if (!$img) {
                    $img = get_stylesheet_directory_uri() . '/img/default-blog.jpg';
                }
                $cats = get_the_category();
                $category = wp_list_pluck($cats, 'name');
                $flashcat = acf_slugify($category[0]);
                $catclass = implode(' ', array_map('acf_slugify', $category));
                $category = implode(', ', $category);

                $the_date = get_the_date('jS F, Y');

            ?>
                <a class="grid__card <?= $catclass ?>"
                    href="<?= get_the_permalink(get_the_ID()) ?>">
                    <div class="card card--<?= $flashcat ?>">
                        <div class="card__image_container">
                            <div
                                class="card__flash card__flash--<?= $flashcat ?>">
                                <?= $category ?>
                            </div>
                            <?= get_the_post_thumbnail(get_the_ID(), 'large', array('class' => 'card__image')) ?>
                        </div>
                        <div class="card__inner">
                            <h3 class="card__title mb-0">
                                <?= get_the_title() ?>
                            </h3>
                            <div class="card__date"><?= $the_date ?>
                            </div>
                            <div class="card__content">
                                <div class="card__content__overlay"></div>
                                <?= wp_trim_words(get_the_content(get_the_ID()), 20) ?>
                            </div>
                        </div>
                    </div>
                </a>
            <?php
            }
            ?>
        </div>
        <div class="author mx-2">
            <img src="/wp-content/uploads/2024/06/Belmont-01-01-1024x1020-1-300x300.jpg" alt="Alease Parlanti">
            <div>
                <p><a href="/about/">Alease Parlanti</a> is a dedicated skincare specialist at Belmont Skin &amp; Laser Clinic. With a passion for helping clients achieve their best skin, she brings extensive knowledge and experience to every treatment.</p>
                <p>Whether you're looking to remove unwanted hair with our advanced <a href="/services/laser-hair-removal/">laser hair removal</a>, erase tattoos with our precise <a href="/services/laser-tattoo-removal/">laser tattoo removal</a>, or rejuvenate your skin with our <a href="/services/skin-rejuvenation-carbon-laser/">carbon laser</a> and <a href="/services/skin-rejuvenation-ipl-treatments/">IPL treatments</a>, Alease is here to guide you every step of the way.</p>
                <p>Have questions? <a href="/contact/">Contact Alease</a> today!</p>
            </div>
        </div>
    </div>
</main>
<?php
add_action('wp_footer', function () {
?>
    <script src="https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.imagesloaded/5.0.0/imagesloaded.pkgd.min.js"></script>
    <script>
        function setEqualHeight(cards) {
            let maxHeight = 0;

            // Reset all heights to auto to measure new content heights
            cards.forEach(card => {
                card.style.height = 'auto';
            });

            // Find the maximum height
            cards.forEach(card => {
                const cardHeight = card.offsetHeight;
                if (cardHeight > maxHeight) {
                    maxHeight = cardHeight;
                }
            });

            // Set each card's height to the maximum found
            cards.forEach(card => {
                card.style.height = maxHeight + 'px';
            });
        }
        document.addEventListener('DOMContentLoaded', function() {

            var grid = document.querySelector('.grid');
            var iso = new Isotope(grid, {
                itemSelector: '.grid__card',
                percentPosition: true,
                layoutMode: 'fitRows',
            });

            // Apply equal height after initial layout
            const cards = document.querySelectorAll('.grid__card');
            setEqualHeight(cards);

            // Re-layout after images load and set equal height again
            imagesLoaded(grid, function() {
                iso.layout();
                setEqualHeight(cards);
            });

            // Ensure equal height is re-applied after filtering or sorting
            iso.on('arrangeComplete', function() {
                setEqualHeight(cards);
            });

            var filterButtons = document.querySelectorAll('.filters button');
            filterButtons.forEach(function(button) {
                button.addEventListener('click', function() {
                    var filterValue = this.getAttribute('data-filter');
                    iso.arrange({
                        filter: filterValue
                    });
                    filterButtons.forEach(function(btn) {
                        btn.classList.remove('active');
                    });
                    this.classList.add('active');
                });
            });

        });
    </script>
<?php
}, 9999);

get_footer();
?>