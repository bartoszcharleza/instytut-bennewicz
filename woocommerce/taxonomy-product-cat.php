<?php

/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.4.0
 */

global $wp_query;
$term = $wp_query->get_queried_object();
if ( $term && property_exists( $term, 'term_id' ) ) {
    $term_id = $term->term_id;
    $customHeadingH1 = get_field('custom_h1', 'product_cat_' . $term_id);
	$customBottomDesc = get_field('opis_kategorii_dol', 'product_cat_' . $term_id);
}


defined('ABSPATH') || exit;

get_header('shop');

/**
 * Hook: woocommerce_before_main_content.
 *
 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
 * @hooked woocommerce_breadcrumb - 20
 * @hooked WC_Structured_Data::generate_website_data() - 30
 */
do_action('woocommerce_before_main_content');

?>
<!-- <header class="woocommerce-products-header">
    <?php // if (apply_filters('woocommerce_show_page_title', true)) : 
	?>
        <h1 class="woocommerce-products-header__title page-title"><?php woocommerce_page_title(); ?></h1>
    <?php // endif; 
	?>

    <?php
	/**
	 * Hook: woocommerce_archive_description.
	 *
	 * @hooked woocommerce_taxonomy_archive_description - 10
	 * @hooked woocommerce_product_archive_description - 10
	 */
	// do_action('woocommerce_archive_description');
	?>
</header> -->
<section class="section books">
	<div data-aos="fade-up" class="section-container">
		<?php get_template_part('partials/store-and-product-header'); ?>
	</div>
	<div data-aos="fade-up" class="section-container">
		<?php get_template_part('partials/store-and-product-sidebar'); ?>
		<div class="books__list">

		<header class="woocommerce-products-header">
			<?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
				<?php
					if(!empty($customHeadingH1)){ ?>
						<h1 class="woocommerce-products-header__title page-title"><?php echo $customHeadingH1; ?></h1>
					<?php } else { ?>
						<h1 class="woocommerce-products-header__title page-title"><?php woocommerce_page_title(); ?></h1>
					<?php }
			endif; ?>
			<?php
				do_action('woocommerce_archive_description');
			?>
		</header> 
			<?php
			if (woocommerce_product_loop()) {

				/**
				 * Hook: woocommerce_before_shop_loop.
				 *
				 * @hooked woocommerce_output_all_notices - 10
				 * @hooked woocommerce_result_count - 20
				 * @hooked woocommerce_catalog_ordering - 30
				 */
				// do_action('woocommerce_before_shop_loop');

				woocommerce_product_loop_start();

				$current_product_number = 1;

				if (wc_get_loop_prop('total')) {
					while (have_posts()) {
						the_post();

						/**
						 * Hook: woocommerce_shop_loop.
						 */
						do_action('woocommerce_shop_loop');

						//wc_get_template_part('content', 'product');
						$product = wc_get_product(get_the_ID());
						$image = get_the_post_thumbnail(get_the_id(), 'full');
						$link = get_permalink();
						$title = get_the_title();
						$premiere = get_field('premiere');
						$bestseller = get_field('bestseller');
						$regular_price = floatval($product->get_regular_price());
						$sale_price = floatval($product->get_sale_price());
						$active_price = floatval($product->get_price());
						$formatted_regular_price = number_format($regular_price, 0, '', '') . 'zł';
						$formatted_sale_price = number_format($sale_price, 0, '', '') . 'zł';
						$formatted_active_price = number_format($active_price, 0, '', '') . 'zł';


			?>
						<div class="book <?php if ($premiere) {
												echo 'book--premiere';
											}; ?>">

							<div class="book__tags">

								<?php if ($sale_price) : ?>
									<span class="book__sale-tag">Promocja</span>
								<?php endif; ?>

								<?php if ($premiere) : ?>
									<span class="book__premiere-tag">Premiera</span>
								<?php endif; ?>

								<?php if ($bestseller) : ?>
									<span class="book__bestseller-tag">Bestseller</span>
								<?php endif; ?>

							</div>

							<?php
							echo $image;
							?>
							<h3><a class="heading--xs" href="<?php echo $link; ?>">
									<?php echo $title; ?>
								</a></h3>
							<?php
							// Sprawdzenie, czy produkt należy do jednej z określonych kategorii
							if (!has_term(array('kursy-rozwojowe', 'kursy-zawodowe'), 'product_cat', $product->get_id())) {
								// Wyświetlenie ceny promocyjnej lub regularnej
								if ($product->is_on_sale()) {
									echo '<p class="book__price">' . $formatted_sale_price . '<del>' . $formatted_regular_price . '</del> </p>';
								} else {
									echo '<p class="book__price">' . $formatted_active_price . '</p>';
								}
								// Przycisk dodania do koszyka
								echo '<div class="book__add_to_cart">';
								woocommerce_template_loop_add_to_cart();
								echo '</div>';
							} else {
								// Przycisk linkujący do strony produktu dla określonych kategorii
								echo '<a href="' . get_permalink($product->get_id()) . '" class="btn btn--secondary">Zobacz produkt</a>';
							}
							?>
						</div>

			<?php $current_product_number++;
					}
				}
				
				woocommerce_product_loop_end();

				/**
				 * Hook: woocommerce_after_shop_loop.
				 *
				 * @hooked woocommerce_pagination - 10
				 */
				do_action('woocommerce_after_shop_loop');
			} else {
				/**
				 * Hook: woocommerce_no_products_found.
				 *
				 * @hooked wc_no_products_found - 10
				 */
				do_action('woocommerce_no_products_found');
			}
			?>
		</div>
	</div>

</section>

<?php
$newsletter_acf_block = get_template_directory() . '/acf-blocks/newsletter/newsletter.php';
include $newsletter_acf_block;
?>

<?php
$accordion_acf_block = get_template_directory() . '/acf-blocks/accordion/accordion.php';
include $accordion_acf_block;
?>

<?php
/**
 * Hook: woocommerce_after_main_content.
 *
 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
 */
do_action('woocommerce_after_main_content');

/**
 * Hook: woocommerce_sidebar.
 *
 * @hooked woocommerce_get_sidebar - 10
 */
// do_action( 'woocommerce_sidebar' );

get_footer('shop');

?>