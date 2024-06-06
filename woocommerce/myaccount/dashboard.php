<?php

/**
 * My Account Dashboard
 *
 * Shows the first intro screen on the account dashboard.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/dashboard.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 4.4.0
 */

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}

$allowed_html = array(
	'a' => array(
		'href' => array(),
	),
);

$hello_text = get_field('hello_text', 'options');

function show_user_greeting()
{
	$current_user = wp_get_current_user();

	// Sprawdź, czy imię i nazwisko są ustawione
	$name = trim($current_user->first_name . ' ' . $current_user->last_name);

	if (!empty($name)) {
		// Jeśli imię i nazwisko są dostępne, użyj ich
		echo "Cześć, " . esc_html($name) . "!";
	} else {
		// W przeciwnym razie użyj loginu
		echo "Cześć, " . esc_html($current_user->user_login) . "!";
	}
}

// Możesz teraz wywołać funkcję w dowolnym miejscu w szablonie, na przykład:
?>
<div class="profile-hello">
	<h2 class="heading--xl">
		<?php show_user_greeting(); ?>
	</h2>
	<p><?php echo esc_html($hello_text); ?>
	</p>
</div>


<div class="profile-my-courses-list">
	<h2 class="heading--m">Twoje szkolenia</h2>
	<?php
	echo do_shortcode('[uo_dashboard]');
	?>
</div>


<div class="profile-courses-list">
	<h2 class="heading--m">Pozostałe szkolenia</h2>
	<div class="products">
		<?php

		$categories = ['kursy-rozwojowe', 'kursy-zawodowe'];

		// Znajdź produkty zakupione przez obecnego użytkownika
		$customer_orders = get_posts(array(
			'numberposts' => -1,
			'meta_key'    => '_customer_user',
			'meta_value'  => get_current_user_id(),
			'post_type'   => wc_get_order_types(),
			'post_status' => array_keys(wc_get_order_statuses()),
		));

		$purchased_products = array();
		foreach ($customer_orders as $customer_order) {
			$order = wc_get_order($customer_order->ID);
			foreach ($order->get_items() as $item) {
				$purchased_products[] = $item->get_product_id();
			}
		}

		// Ustaw argumenty zapytania, wykluczając zakupione produkty i ograniczając do określonych kategorii
		$args = array(
			'post_type' => 'product',
			'posts_per_page' => 10,
			'post__not_in' => $purchased_products, // Wyklucz produkty już zakupione
			'tax_query' => array(
				array(
					'taxonomy' => 'product_cat',
					'field' => 'slug',
					'terms' => $categories,
				),
			),
		);

		$loop = new WP_Query($args);

		if ($loop->have_posts()) {
			while ($loop->have_posts()) {
				$loop->the_post();

				//wc_get_template_part('content', 'product');
				$product = wc_get_product(get_the_ID());
				$image = get_the_post_thumbnail(get_the_id(), 'full');
				$link = get_permalink();
				$title = get_the_title();
				$excerpt = get_the_excerpt();
				$regular_price = floatval($product->get_regular_price());
				$sale_price = floatval($product->get_sale_price());
				$active_price = floatval($product->get_price());
				$formatted_regular_price = number_format($regular_price, 0, '', '') . 'zł';
				$formatted_sale_price = number_format($sale_price, 0, '', '') . 'zł';
				$formatted_active_price = number_format($active_price, 0, '', '') . 'zł';


		?>
				<div class="book">
					<?php
					echo $image;
					?>
					<h3><a class="heading--xxs" href="<?php echo $link; ?>">
							<?php echo $title; ?>
						</a></h3>
					<?php if ($excerpt) { ?>
						<div class="book__excerpt"><?php echo $excerpt; ?></div>
					<?php };
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

		<?php
			}
		}

		?>
	</div>
</div>




<?php
/**
 * My Account dashboard.
 *
 * @since 2.6.0
 */
do_action('woocommerce_account_dashboard');

/**
 * Deprecated woocommerce_before_my_account action.
 *
 * @deprecated 2.6.0
 */
do_action('woocommerce_before_my_account');

/**
 * Deprecated woocommerce_after_my_account action.
 *
 * @deprecated 2.6.0
 */
do_action('woocommerce_after_my_account');

/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */
