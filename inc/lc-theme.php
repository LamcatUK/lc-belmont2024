<?php
defined('ABSPATH') || exit;

// require_once get_theme_file_path('inc/class-bs-collapse-navwalker.php');

require_once LC_THEME_DIR . '/inc/lc-utility.php';
require_once LC_THEME_DIR . '/inc/lc-blocks.php';
require_once LC_THEME_DIR . '/inc/lc-blog.php';

if (function_exists('acf_add_options_page')) {
    acf_add_options_page(
        array(
            'page_title' 	=> 'Site-Wide Settings',
            'menu_title'	=> 'Site-Wide Settings',
            'menu_slug' 	=> 'theme-general-settings',
            'capability'	=> 'edit_posts',
        )
    );
}

function widgets_init()
{
  
    register_nav_menus(array(
        'primary_nav' => 'Primary Nav',
        'footer_menu_1' => 'Footer 1',
        'footer_menu_2' => 'Footer 2',
    ));
 
    unregister_sidebar('hero');
    unregister_sidebar('herocanvas');
    unregister_sidebar('statichero');
    unregister_sidebar('left-sidebar');
    unregister_sidebar('right-sidebar');
    unregister_sidebar('footerfull');
    unregister_nav_menu('primary');
 
    add_theme_support('disable-custom-colors');
    add_theme_support(
        'editor-color-palette',
        array(
            array(
                'name' => 'Black',
                'slug' => 'black',
                'color' => '#212529'
            ),
            array(
                'name' => 'White',
                'slug' => 'white',
                'color' => '#ffffff'
            ),
            array(
                'name' => 'Grey 100',
                'slug' => 'grey-100',
                'color' => '#f8f8f8'
            ),
            array(
                'name' => 'Taupe 400',
                'slug' => 'taupe-400',
                'color' => '#87806e'
            ),
            array(
                'name' => 'Taupe 600',
                'slug' => 'taupe-600',
                'color' => '#665f4d'
            ),
            array(
                'name' => 'Copper 400',
                'slug' => 'copper-400',
                'color' => '#cfa47f'
            ),
            array(
                'name' => 'Copper 600',
                'slug' => 'copper-600',
                'color' => '#6b3a02'
            ),
            array(
                'name' => 'Cream 300',
                'slug' => 'cream-300',
                'color' => '#fbfbf2'
            ),
        )
    );
}
add_action('widgets_init', 'widgets_init', 11);

remove_action('wp_enqueue_scripts', 'wp_enqueue_global_styles');
remove_action('wp_body_open', 'wp_global_styles_render_svg_filters');

//Custom Dashboard Widget
add_action('wp_dashboard_setup', 'register_lc_dashboard_widget');
function register_lc_dashboard_widget()
{
    wp_add_dashboard_widget(
        'lc_dashboard_widget',
        'Lamcat',
        'lc_dashboard_widget_display'
    );
}

function lc_dashboard_widget_display()
{
    ?>
<div style="display: flex; align-items: center; justify-content: space-around;">
    <img style="width: 50%;"
        src="<?= get_stylesheet_directory_uri().'/img/lc-full.jpg'; ?>">
    <a class="button button-primary" target="_blank" rel="noopener nofollow noreferrer"
        href="mailto:hello@lamcat.co.uk/">Contact</a>
</div>
<div>
    <p><strong>Thanks for choosing Lamcat!</strong></p>
    <hr>
    <p>Got a problem with your site, or want to make some changes & need us to take a look for you?</p>
    <p>Use the link above to get in touch and we'll get back to you ASAP.</p>
</div>
<?php
}


function lc_theme_enqueue()
{
    $the_theme = wp_get_theme();
    $theme_version = $the_theme->get('Version');

    $suffix = defined('SCRIPT_DEBUG') && SCRIPT_DEBUG ? '' : '.min';
    // Grab asset urls.
    $theme_styles  = "/css/child-theme{$suffix}.css";
    $theme_scripts = "/js/child-theme{$suffix}.js";

    $css_version = $theme_version . '.' . filemtime(get_stylesheet_directory() . $theme_styles);

    wp_deregister_script('jquery');

    wp_enqueue_style('swiper-style', "https://unpkg.com/swiper/swiper-bundle.min.css", array());
    wp_enqueue_script('swiper', "https://unpkg.com/swiper/swiper-bundle.min.js", array(), null, true);
    wp_enqueue_style('aos-style', "https://unpkg.com/aos@2.3.1/dist/aos.css", array());
    wp_enqueue_script('aos', 'https://unpkg.com/aos@2.3.1/dist/aos.js', array(), null, true);
    wp_enqueue_style('child-understrap-styles', get_stylesheet_directory_uri() . $theme_styles, array(), $css_version);

    // wp_enqueue_script('timelyScript', 'https://book.gettimely.com/widget/book-button-v1.5.js', array(), null, true);

    $js_version = $theme_version . '.' . filemtime(get_stylesheet_directory() . $theme_scripts);
    
    wp_enqueue_script('child-understrap-scripts', get_stylesheet_directory_uri() . $theme_scripts, array(), $js_version, true);

}
add_action('wp_enqueue_scripts', 'lc_theme_enqueue');

function custom_gutenberg_scripts()
{
    wp_enqueue_script(
        'custom-gutenberg',
        get_stylesheet_directory_uri() . '/js/custom-gutenberg.js',
        array('wp-blocks', 'wp-dom-ready', 'wp-edit-post'),
        filemtime(get_stylesheet_directory() . '/js/custom-gutenberg.js'),
        true
    );
}
add_action('enqueue_block_editor_assets', 'custom_gutenberg_scripts');

add_filter('wpcf7_autop_or_not', '__return_false');

add_shortcode('timely_button', 'timelyButton');

function timelyButton() {
    ob_start();
    ?>
    <script id="timelyScript" src="https://book.gettimely.com/widget/book-button-v1.5.js" async></script>
<script>
    new timelyButton("belmontskinandlaserclinic", {
        "style": "dark"
    });
</script>
<?php
    return ob_get_clean();
}


//-------------- pricing schema

function extract_pricing_table_data($block_data) {
    $offers = [];
    $product_count = $block_data['products'];

    for ($i = 0; $i < $product_count; $i++) {
        $product_title = $block_data["products_{$i}_title"];
        $list_count = $block_data["products_{$i}_list"];

        for ($j = 0; $j < $list_count; $j++) {
            $description = $block_data["products_{$i}_list_{$j}_description"];
            $price = $block_data["products_{$i}_list_{$j}_price"];

            $offers[] = [
                "@type" => "Offer",
                "url" => get_permalink(),
                "priceCurrency" => "GBP",
                "price" => $price,
                "priceValidUntil" => "2024-12-31",
                "itemCondition" => "https://schema.org/NewCondition",
                "availability" => "https://schema.org/InStock",
                "name" => "{$product_title} - {$description}"
            ];

        }
    }

    return $offers;
}

function get_pricing_table_data_from_blocks($blocks) {
    $all_offers = [];

    foreach ($blocks as $block) {
        if ($block['blockName'] === 'acf/lc-pricing-table') {
            $block_data = $block['attrs']['data'];
            $offers = extract_pricing_table_data($block_data);
            $all_offers = array_merge($all_offers, $offers);
        } elseif (!empty($block['innerBlocks'])) {
            // Recursively handle nested blocks
            $nested_offers = get_pricing_table_data_from_blocks($block['innerBlocks']);
            $all_offers = array_merge($all_offers, $nested_offers);
        }
    }

    return $all_offers;
}

// Function to generate the schema
function generate_pricing_table_schema() {
    // Get all blocks on the page
    $blocks = parse_blocks(get_the_content());
    $offers = get_pricing_table_data_from_blocks($blocks);
    $featured_image_url = get_the_post_thumbnail_url(); // Get the featured image URL

    $business_image_url = get_stylesheet_directory_uri() . "/img/belmont-logo-full.png";

    $schema = [
        "@context" => "https://schema.org",
        "@type" => "Product",
        "name" => get_the_title(),
        "description" => "Effective and long-lasting hair removal using advanced laser technology.",
        "image" => $featured_image_url,
        "url" => get_permalink(),
        "provider" => [
            "@type" => "LocalBusiness",
            "name" => "Belmont Skin and Laser Clinic",
            "image" => $business_image_url,
            "@id" => "https://belmontskinandlaserclinic.co.uk",
            "url" => "https://belmontskinandlaserclinic.co.uk",
            "telephone" => parse_phone(get_field('contact_phone', 'options')),
            "address" => [
                "@type" => "PostalAddress",
                "streetAddress" => "Belmont, Storrington Road",
                "addressLocality" => "Thakeham",
                "addressRegion" => "West Sussex",
                "postalCode" => "RH20 3NA",
                "addressCountry" => "GB"
            ],
            "geo" => [
                "@type" => "GeoCoordinates",
                "latitude" => 50.924132,
                "longitude" => -0.435876
            ],
            "openingHoursSpecification" => [
                [
                    "@type" => "OpeningHoursSpecification",
                    "dayOfWeek" => [
                        "Monday",
                        "Tuesday",
                        "Wednesday",
                        "Thursday",
                        "Friday"
                    ],
                    "opens" => "08:00",
                    "closes" => "17:00"
                ],
                [
                "@type" => "OpeningHoursSpecification",
                "dayOfWeek" => "Saturday",
                "opens" => "09:00",
                "closes" => "15:00"
                ]
            ],
            "sameAs" => [
                "https://www.instagram.com/belmont_skin_and_laser/",
                "https://www.facebook.com/belmontskinandlaser/"
            ]
        ],
        "offers" => $offers
    ];

    echo '<script type="application/ld+json">' . json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) . '</script>';
}


//--------------- Generate Breadcrumb schema
function generate_breadcrumb_schema() {
    $schema = [
        "@context" => "https://schema.org",
        "@type" => "BreadcrumbList",
        "itemListElement" => [
            [
                "@type" => "ListItem",
                "position" => 1,
                "name" => "Home",
                "item" => get_home_url()
            ],
            [
                "@type" => "ListItem",
                "position" => 2,
                "name" => "Services",
                "item" => get_permalink(get_page_by_path('services'))
            ],
            [
                "@type" => "ListItem",
                "position" => 3,
                "name" => get_the_title(),
                "item" => get_permalink()
            ]
        ]
    ];

    echo '<script type="application/ld+json">' . json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) . '</script>';
}

?>