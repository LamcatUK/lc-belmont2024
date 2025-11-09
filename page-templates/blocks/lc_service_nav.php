<?php
/**
 * Service Navigation Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 *
 * @package lc-belmont2024
 */

defined( 'ABSPATH' ) || exit;

?>
<section class="service_nav">
    <div class="container-xl">
        <div class="row g-4 justify-content-center">
            <?php
            $d          = 0;
            $card_count = count( get_field( 'cards' ) );
            $col_class  = ( 0 === $card_count % 2 ) ? 'col-xl-4' : 'col-xl-3';

            while ( have_rows( 'cards' ) ) {
                the_row();
                ?>
                <div class="col-lg-6 <?= esc_attr( $col_class ); ?>">
                    <a class="service_nav__card" data-aos="fade-up"
                        data-aos-delay="<?= esc_attr( $d ); ?>"
                        href="<?= esc_attr( get_sub_field( 'link' ) ); ?>">
                        <?= wp_get_attachment_image( get_sub_field( 'image' ), 'large', false, array( 'class' => 'service_nav__image' ) ); ?>
                        <div class="service_nav__inner">
                            <h2 class="service_nav__title">
                                <?= wp_kses_post( get_sub_field( 'title' ) ); ?>
                            </h2>
                            <div class="service_nav__content">
                                <?= wp_kses_post( get_sub_field( 'content' ) ); ?>
                            </div>
                        </div>
                    </a>
                </div>
                <?php
                $d += 100;
            }
            ?>
        </div>
    </div>
</section>