<section class="latest_posts">
    <div class="container-xl py-5">
        <h2 class="has-line text-taupe-400" data-aos="fade-up">The Belmont Blog</h2>
        <div class="grid pb-4">
            <?php
            $q = new WP_Query(array(
                'post_type' => 'post',
                'posts_per_page' => 3,
            ));
            $d = 0;
            while ($q->have_posts()) {
                $q->the_post();
                $img = get_the_post_thumbnail_url(get_the_ID(), 'large');
                if (!$img) {
                    $img = get_stylesheet_directory_uri() . '/img/default-blog.jpg';
                }
                $cats = get_the_category();
                $category = wp_list_pluck($cats, 'name');
                $flashcat = acf_slugify($category[0]);
                $category = implode(', ', $category);

                $the_date = get_the_date('jS F, Y');

            ?>
                <a class="grid__card"
                    data-aos="fade-up"
                    data-aos-delay="<?= $d ?>"
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
                $d += 200;
            }
            ?>
        </div>
        <div class="text-center"><a href="/blog/" class="button button-primary">View All Posts</a></div>
    </div>
</section>