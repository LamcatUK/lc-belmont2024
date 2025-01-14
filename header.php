<?php

/**
 * The header for the theme
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package lc-belmont2024
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
  <meta
    charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="profile" href="http://gmpg.org/xfn/11">
  <link rel="preload"
    href="<?= get_stylesheet_directory_uri() ?>/fonts/cinzel-v23-latin-500.woff2"
    as="font" type="font/woff2" crossorigin="anonymous">
  <link rel="preload"
    href="<?= get_stylesheet_directory_uri() ?>/fonts/montserrat-v26-latin-regular.woff2"
    as="font" type="font/woff2" crossorigin="anonymous">
  <link rel="preload"
    href="<?= get_stylesheet_directory_uri() ?>/fonts/montserrat-v26-latin-600.woff2"
    as="font" type="font/woff2" crossorigin="anonymous">
  <?php
  if (get_field('ga_property', 'options')) {
    if (!is_user_logged_in()) {
  ?>
      <!-- Global site tag (gtag.js) - Google Analytics -->
      <script async
        src="https://www.googletagmanager.com/gtag/js?id=<?= get_field('ga_property', 'options') ?>">
      </script>
      <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
          dataLayer.push(arguments);
        }
        gtag('js', new Date());
        gtag('config',
          '<?= get_field('ga_property', 'options') ?>'
        );
      </script>
    <?php
    }
  }
  if (get_field('google_site_verification', 'options')) {
    echo '<meta name="google-site-verification" content="' . get_field('google_site_verification', 'options') . '" />';
  }
  if (get_field('bing_site_verification', 'options')) {
    echo '<meta name="msvalidate.01" content="' . get_field('bing_site_verification', 'options') . '" />';
  }
  if (is_front_page() || is_page('contact-us')) {
    ?>
    <script type="application/ld+json">
      {
        "@context": "https://schema.org",
        "@type": "LocalBusiness",
        "name": "Belmont Skin and Laser Clinic",
        "image": "<?= get_stylesheet_directory_uri() ?>/img/belmont-logo-full.png",
        "@id": "https://belmontskinandlaserclinic.co.uk",
        "url": "https://belmontskinandlaserclinic.co.uk",
        "telephone": "<?= parse_phone(get_field('contact_phone', 'options')) ?>",
        "address": {
          "@type": "PostalAddress",
          "streetAddress": "Belmont, Storrington Road",
          "addressLocality": "Thakeham",
          "addressRegion": "West Sussex",
          "postalCode": "RH20 3NA",
          "addressCountry": "GB"
        },
        "geo": {
          "@type": "GeoCoordinates",
          "latitude": 50.924132,
          "longitude": -0.435876
        },
        "openingHoursSpecification": [{
          "@type": "OpeningHoursSpecification",
          "dayOfWeek": [
            "Monday",
            "Tuesday",
            "Wednesday",
            "Thursday",
            "Friday",
            "Saturday",
            "Sunday"
          ],
          "opens": "09:00",
          "closes": "21:00"
        }],
        "sameAs": [
          "https://www.instagram.com/belmont_skin_and_laser/",
          "https://www.facebook.com/belmontskinandlaser/"
        ],
        "priceRange": "$$",
        "description": "Belmont Skin and Laser Clinic offers advanced skincare and laser treatments to help you look and feel your best.",
        "contactPoint": {
          "@type": "ContactPoint",
          "telephone": "<?= parse_phone(get_field('contact_phone', 'options')) ?>",
          "contactType": "Customer Service"
        },
        "makesOffer": [{
            "@type": "Offer",
            "itemOffered": {
              "@type": "Service",
              "name": "Laser Hair Removal",
              "description": "Effective and long-lasting hair removal using advanced laser technology."
            }
          },
          {
            "@type": "Offer",
            "itemOffered": {
              "@type": "Service",
              "name": "Laser Tattoo Removal",
              "description": "Safe and efficient laser removal of unwanted tattoos."
            }
          },
          {
            "@type": "Offer",
            "itemOffered": {
              "@type": "Service",
              "name": "Skin Rejuvenation IPL Treatments",
              "description": "Intense Pulsed Light treatments to rejuvenate and enhance skin appearance."
            }
          },
          {
            "@type": "Offer",
            "itemOffered": {
              "@type": "Service",
              "name": "Skin Rejuvenation Laser Carbon Facial",
              "description": "Advanced laser carbon facial treatments for deep skin rejuvenation."
            }
          }
        ]
      }
    </script>
  <?php
  }
  ?>
  <?php wp_head(); ?>
  <meta name="msvalidate.01" content="E6F5C30AAAA2E2AD3FA070F88CC885B3" />
</head>

<body <?php body_class(); ?>>
  <?php
  do_action('wp_body_open');

  if (get_field('gtm_property', 'options')) {
    if (!is_user_logged_in()) {
  ?>
      <!-- Google Tag Manager (noscript) -->
      <noscript><iframe
          src="https://www.googletagmanager.com/ns.html?id=<?= get_field('ga_property', 'options') ?>"
          height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
      <!-- End Google Tag Manager (noscript) -->
  <?php
    }
  }
  ?>
  <header id="navigation">
    <nav id="main-nav" class="navbar navbar-expand-lg d-block px-0" aria-labelledby="main-nav-label">
      <div class="container-xl">
        <div class="d-flex justify-content-between w-100 align-items-center">
          <a href="/" class="navbar-brand" rel="home" aria-label="Home Page"></a>
          <button class="navbar-toggler input-button" id="navToggle" data-bs-toggle="collapse"
            data-bs-target=".navbars" type="button" aria-label="Navigation"><i
              class="fa fa-navicon"></i></button>
        </div>
        <div class="w-100 d-flex flex-column-reverse flex-lg-column">
          <div id="topNav" class="px-2 px-lg-0 pb-4 pb-lg-0 collapse navbar-collapse navbars">
            <ul id="top-nav"
              class="navbar-nav w-100 justify-content-end align-items-lg-center mt-2 mt-lg-0 gap-4">
              <li itemscope="itemscope" itemtype="https://www.schema.org/SiteNavigationElement"
                class="menu-item nav-item">
                <a href="/book-now/" class="topNav_phone d-block text-center">Book Now</a>
              </li>
              <li itemscope="itemscope" itemtype="https://www.schema.org/SiteNavigationElement"
                class="menu-item nav-item">
                <a class="topNav_phone d-block text-center"
                  href="tel:<?= parse_phone(get_field('contact_phone', 'options')) ?>">Call
                  <?= get_field('contact_phone', 'options') ?></a>
              </li>
            </ul>
          </div>
          <?php

          wp_nav_menu(
            array(
              'theme_location'  => 'primary_nav',
              'container_class' => 'collapse navbar-collapse navbars',
              'container_id'    => 'primaryNav',
              'menu_class'      => 'navbar-nav w-100 justify-content-end gap-lg-5 ms-auto',
              'fallback_cb'     => '',
              'menu_id'         => 'main-menu',
              'depth'           => 2,
              'walker'          => new Understrap_WP_Bootstrap_Navwalker(),
            )
          );
          ?>
        </div>
      </div>

    </nav>
  </header>