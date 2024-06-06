<?php

/**
 *
 * @package websitestyle
 */

define('FUNCTIONS_DIR', get_stylesheet_directory() . '/functions/');
define('ACF_BLOCKS_DIR', get_stylesheet_directory() . '/acf-blocks/');

require_once(FUNCTIONS_DIR . 'security.php');
require_once(FUNCTIONS_DIR . 'register_styles.php');
require_once(FUNCTIONS_DIR . 'register_scripts.php');
require_once(FUNCTIONS_DIR . 'deregister_styles.php');
require_once(FUNCTIONS_DIR . 'deregister_scripts.php');
require_once(FUNCTIONS_DIR . 'register_post_types.php');
require_once(FUNCTIONS_DIR . 'register_taxonomies.php');
require_once(FUNCTIONS_DIR . 'acf.php');
require_once(FUNCTIONS_DIR . 'register_nav_menus.php');
require_once(FUNCTIONS_DIR . 'image_sizes.php');
require_once(FUNCTIONS_DIR . 'support.php');
require_once(FUNCTIONS_DIR . 'admin.php');
require_once(FUNCTIONS_DIR . 'utils.php');
require_once(FUNCTIONS_DIR . 'helpers.php');
require_once(FUNCTIONS_DIR . 'optimization.php');
require_once(FUNCTIONS_DIR . 'admin_bar.php');
require_once(FUNCTIONS_DIR . 'acf-blocks-helpers.php');
require_once(FUNCTIONS_DIR . 'tinyMCE.php');
require_once(FUNCTIONS_DIR . 'load_swiper.php');
require_once(FUNCTIONS_DIR . 'load_toggler.php');
require_once(FUNCTIONS_DIR . 'woo-checkout-fields.php');
require_once(FUNCTIONS_DIR . 'woo-myaccount-register-subpages.php');
require_once(FUNCTIONS_DIR . 'woo-myaccount-mycourses.php');
require_once(FUNCTIONS_DIR . 'woo-myaccount-mycertificates.php');
require_once(FUNCTIONS_DIR . 'woo-myaccount-allcourses.php');
require_once(FUNCTIONS_DIR . 'acf-fields-in-header-menu.php');
require_once(FUNCTIONS_DIR . 'course-form.php');
require_once(FUNCTIONS_DIR . 'disable-specific-gutenerg-blocks.php');
require_once(FUNCTIONS_DIR . 'generate-certificate-shortcode.php');
require_once(FUNCTIONS_DIR . 'myaccount-account-details-custom-fields.php');
require_once(FUNCTIONS_DIR . 'myaccount-details-change-accept-admin-page.php');
require_once(FUNCTIONS_DIR . 'woo-orders-custom-column.php');
require_once(FUNCTIONS_DIR . 'woo-gutenberg-settings.php');
require_once(FUNCTIONS_DIR . 'woo-custom-button-and-price.php');
require_once(FUNCTIONS_DIR . 'menu-icons.php');
require_once(FUNCTIONS_DIR . 'image-upload-settings.php');
require_once(FUNCTIONS_DIR . 'learndash-additional-functions.php');
require_once(FUNCTIONS_DIR . 'woo-register-privacy-policy.php');
// require_once(FUNCTIONS_DIR . 'auto_create_account.php');
require_once(FUNCTIONS_DIR . 'enforce_account_creation.php');

register_block_type(ACF_BLOCKS_DIR . '/text-editor/block.json');
register_block_type(ACF_BLOCKS_DIR . '/carousel/block.json');
register_block_type(ACF_BLOCKS_DIR . '/icons-and-text/block.json');
register_block_type(ACF_BLOCKS_DIR . '/cta-blocks/block.json');
register_block_type(ACF_BLOCKS_DIR . '/hero/block.json');
register_block_type(ACF_BLOCKS_DIR . '/cta-with-image/block.json');
register_block_type(ACF_BLOCKS_DIR . '/floating-text-blocks/block.json');
register_block_type(ACF_BLOCKS_DIR . '/knowledge-base/block.json');
register_block_type(ACF_BLOCKS_DIR . '/newsletter/block.json');
register_block_type(ACF_BLOCKS_DIR . '/accordion/block.json');
register_block_type(ACF_BLOCKS_DIR . '/courses/block.json');
register_block_type(ACF_BLOCKS_DIR . '/numbers-text-and-photo/block.json');
register_block_type(ACF_BLOCKS_DIR . '/number-list-and-photo/block.json');
register_block_type(ACF_BLOCKS_DIR . '/course-header/block.json');
register_block_type(ACF_BLOCKS_DIR . '/cta-course/block.json');
register_block_type(ACF_BLOCKS_DIR . '/image/block.json');
register_block_type(ACF_BLOCKS_DIR . '/video/block.json');
register_block_type(ACF_BLOCKS_DIR . '/authors/block.json');
register_block_type(ACF_BLOCKS_DIR . '/list/block.json');
register_block_type(ACF_BLOCKS_DIR . '/product-description/block.json');
register_block_type(ACF_BLOCKS_DIR . '/product-details/block.json');
register_block_type(ACF_BLOCKS_DIR . '/similar-products/block.json');
register_block_type(ACF_BLOCKS_DIR . '/blog-post-content/block.json');
register_block_type(ACF_BLOCKS_DIR . '/similar-posts/block.json');
register_block_type(ACF_BLOCKS_DIR . '/contact/block.json');
register_block_type(ACF_BLOCKS_DIR . '/login-register/block.json');
register_block_type(ACF_BLOCKS_DIR . '/client-panel/block.json');
register_block_type(ACF_BLOCKS_DIR . '/spinning-circle/block.json');
register_block_type(ACF_BLOCKS_DIR . '/course-form/block.json');
register_block_type(ACF_BLOCKS_DIR . '/course-details/block.json');
register_block_type(ACF_BLOCKS_DIR . '/course-time/block.json');
register_block_type(ACF_BLOCKS_DIR . '/text-in-columns/block.json');
register_block_type(ACF_BLOCKS_DIR . '/course-program/block.json');
register_block_type(ACF_BLOCKS_DIR . '/course-certificate-example/block.json');
register_block_type(ACF_BLOCKS_DIR . '/text-icon-image/block.json');
register_block_type(ACF_BLOCKS_DIR . '/podcast/block.json');
register_block_type(ACF_BLOCKS_DIR . '/graduates/block.json');

function custom_shop_order($query)
{
    if (!is_admin() && $query->is_main_query() && (is_shop() || is_product_category() || is_product_tag())) {
        $query->set('orderby', 'menu_order');
        $query->set('order', 'ASC');
    }
}
add_action('pre_get_posts', 'custom_shop_order');


function enqueue_cart_count_script()
{
    wp_enqueue_script('cart-count', get_template_directory_uri() . '/inc/cart-count.js', array('jquery'), null, true);
    wp_localize_script('cart-count', 'ajaxurl', admin_url('admin-ajax.php'));
}
add_action('wp_enqueue_scripts', 'enqueue_cart_count_script');

function get_cart_count()
{
    $count = WC()->cart->get_cart_contents_count();
    wp_send_json(array('count' => $count));
}
add_action('wp_ajax_get_cart_count', 'get_cart_count');
add_action('wp_ajax_nopriv_get_cart_count', 'get_cart_count');

add_filter( 'wpseo_robots', 'set_noindex_on_specific_page' );
function set_noindex_on_specific_page( $robotsstr ) {
    if ($_SERVER['REQUEST_URI'] == '/?trk=article-ssr-frontend-pulse_little-text-block') {
        return 'noindex, follow, noodp, noydir';
    }
    
    return $robotsstr;
}

function add_category_description() {
    global $wp_query;
    $term = $wp_query->get_queried_object();
    if ( $term && property_exists( $term, 'term_id' ) ) {
        $term_id = $term->term_id;
        $customDesc = get_field( 'opis_kategorii_dol', 'product_cat_' . $term_id );
        if ( $customDesc ) {
            echo '<div class="ek-custom_desc"><p>' . $customDesc . '</p></div>';
        }
    }
}
add_action( 'woocommerce_after_shop_loop', 'add_category_description' );

function change_attachement_image_attributes($attr, $attachment) {
    global $post;
    if ($post->post_type == 'product') {
        $title = $post->post_title;
        $attr['alt'] = $title;
        $attr['title'] = $title;
    }
    return $attr;
}
add_filter('wp_get_attachment_image_attributes', 'change_attachement_image_attributes', 20, 2);

function custom_canonical_pagination($canonical) {
    if (is_paged()) {
        $current_url = 'https://instytutbennewicz.pl' . $_SERVER['REQUEST_URI'];
        return $current_url;
    }
    return $canonical;
}
add_filter('wpseo_canonical', 'custom_canonical_pagination');

function check_empty_category_noindex_for_yoast($robots) {
    if (is_product_category()) {
        $cat = get_queried_object();
        $product_count = $cat->count;
        if ($product_count == 0) {
            $robots['index'] = 'noindex';
        }
    }
    return $robots;
}
add_filter('wpseo_robots_array', 'check_empty_category_noindex_for_yoast');