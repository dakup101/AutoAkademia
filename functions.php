<?php
// Defs
define('THEME_IMG', trailingslashit(esc_url(get_template_directory_uri().'/dist/images/')));

// ACF
require_once(__DIR__ . '/inc/acf/options.php');

// General
require_once(__DIR__ . '/inc/general/register-menu.php');
require_once(__DIR__ . '/inc/general/scripts-and-styles.php');
require_once(__DIR__ . '/inc/general/img-size.php');
require_once(__DIR__ . '/inc/general/variables-export.php');
require_once(__DIR__ . '/inc/general/disable-seo-cpt.php');

// Menu
require_once(__DIR__ . '/inc/menu/wp-menu-array.php');

// Custom Post Types
require_once(__DIR__ . '/inc/custom-posts/guides.php');
require_once(__DIR__ . '/inc/custom-posts/terms.php');
require_once(__DIR__ . '/inc/custom-posts/signups.php');
require_once(__DIR__ . '/inc/custom-posts/cars.php');
require_once(__DIR__ . '/inc/custom-posts/product-type-course.php');
require_once(__DIR__ . '/inc/custom-posts/product-type-addon.php');

// Custom Taxonomies
require_once(__DIR__ . '/inc/custom-tax/guides-tax.php');
require_once(__DIR__ . '/inc/custom-tax/terms-tax.php');

// MetaBoxes
require_once(__DIR__ . '/inc/meta-boxes/metaboxes-signups.php');
require_once(__DIR__ . '/inc/meta-boxes/metaboxes-terms.php');

// Functions
require_once(__DIR__ . '/inc/functions/get-term-signups-count.php');
require_once(__DIR__ . '/inc/functions/wc-split-products-in-cart.php');
require_once(__DIR__ . '/inc/functions/wc-jquery-events-to-dom.php');
require_once(__DIR__ . '/inc/functions/wc-custom-cart-data-to-order-meta.php');
require_once(__DIR__ . '/inc/functions/wc-checkout-course-enroll.php');
require_once(__DIR__ . '/inc/functions/wc-hide-order-item-meta-from-frontend.php');


// AJAX
require_once(__DIR__ . '/inc/ajax/ajax-get-avaliable-terms.php');
require_once(__DIR__ . '/inc/ajax/ajax-get-product-addons.php');
require_once(__DIR__ . '/inc/ajax/ajax-add-to-cart.php');
require_once(__DIR__ . '/inc/ajax/ajax-product-data.php');



// Theme Support
add_theme_support('title-tag');
add_theme_support('post-thumbnails');
add_theme_support('automatic-feed-links');
add_theme_support( 'woocommerce' );
add_theme_support( 'wc-product-gallery-lightbox' );
add_theme_support( 'wc-product-gallery-slider' );

// WooCommerce Hooks
remove_action( 'woocommerce_checkout_order_review', 'woocommerce_checkout_payment', 20 );
remove_action('woocommerce_thankyou', 'woocommerce_order_details_table', 10);

// Allow SVG
function cc_mime_types($mimes)
{
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');

function wpdocs_custom_excerpt_length($length)
{
  return 60;
}
add_filter('excerpt_length', 'wpdocs_custom_excerpt_length', 999);

function pagination_bar($custom_query)
{

  $total_pages = $custom_query->max_num_pages;
  $big = 999999999; // need an unlikely integer

  if ($total_pages > 1) {
    $current_page = max(1, get_query_var('paged'));

    echo paginate_links(array(
      'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
      'format' => '?paged=%#%',
      'current' => $current_page,
      'total' => $total_pages,
      'prev_text' => '<span class="guides__nav-prev">Poprzednia</span>',
      'next_text' => '<span class="guides__nav-next">Następna</span>'
    ));
  }
}

add_filter('wpseo_breadcrumb_links', function ($breadcrumbs) {
  if (is_singular('guides') === true) {
    $breadcrumbs[3] = $breadcrumbs[1]; // move the title to third position
    $breadcrumbs[1] = ['id' => 223]; // add link to page with id
  }

  return $breadcrumbs;
}, 100);
  
add_filter(
  'wpseo_breadcrumb_links',
  function ($links)  {
    global $post;
    $breadcrumb = array();
    if (is_singular('guides')) {
      $breadcrumb[] = array(
        'url' => site_url('/poradnik/'),
        'text' => 'poradnik',
      );
    } 
    if ($breadcrumb) {
      array_splice($links, 1, -1, $breadcrumb);
      $breadcrumb = $links[2];
      $links[2] = $links[1];
      $links[1] = $breadcrumb;
    }
    return $links;
  }
);

function strWordCut($string,$length,$end='....')
{
    $string = strip_tags($string);

    if (strlen($string) > $length) {

        // truncate string
        $stringCut = substr($string, 0, $length);

        // make sure it ends in a word so assassinate doesn't become ass...
        $string = substr($stringCut, 0, strrpos($stringCut, ' ')).$end;
    }
    return $string;
}