<?php

/**
 * Thankyou page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/thankyou.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 8.1.0
 *
 * @var WC_Order $order
 */

defined('ABSPATH') || exit;
?>
<?php
get_template_part('/partials/cart-progress', null, array(
	'stage'       => '3',
	'title' => 'Zrealizowano'
));
?>

<section class="section thankyou-section">
	<div data-aos="fade-up" class="section-container">
		<div class="content">
			<svg xmlns="http://www.w3.org/2000/svg" width="96.467" height="84.952" viewBox="0 0 96.467 84.952">
				<path id="Path_17320" data-name="Path 17320" d="M65.939,3.44,81.3,30.045H97.672v9.567H92.089L88.47,83.06A4.783,4.783,0,0,1,83.7,87.445H15.973a4.783,4.783,0,0,1-4.767-4.386L7.582,39.611H2V30.046H18.373L33.737,3.44l8.285,4.783-12.6,21.822H70.249L57.654,8.223Zm16.55,36.171H17.182l3.19,38.267H79.3ZM54.622,49.179V68.312H45.055V49.179Zm-19.133,0V68.312H25.922V49.179Zm38.267,0V68.312H64.188V49.179Z" transform="translate(-1.605 -2.894)" fill="#ef9700" stroke="#00243e" stroke-width="0.8" />
			</svg>
			<h1 class="heading heading--l">Dziękujemy za zakupy</h1>
			<p>Wkrótce otrzymasz e-mail z potwierdzeniem zamówienia.</p>
			<a href="<?php echo get_home_url() ?>" class="btn btn--secondary">Wróć do sklepu</a>
		</div>
	</div>
</section>

<!-- previous content below -->
<?php if (false) { ?>
	<div class="woocommerce-order">
		<?php
		if ($order) :

			do_action('woocommerce_before_thankyou', $order->get_id());
		?>

			<?php if ($order->has_status('failed')) : ?>

				<p class="woocommerce-notice woocommerce-notice--error woocommerce-thankyou-order-failed"><?php esc_html_e('Unfortunately your order cannot be processed as the originating bank/merchant has declined your transaction. Please attempt your purchase again.', 'woocommerce'); ?></p>

				<p class="woocommerce-notice woocommerce-notice--error woocommerce-thankyou-order-failed-actions">
					<a href="<?php echo esc_url($order->get_checkout_payment_url()); ?>" class="button pay"><?php esc_html_e('Pay', 'woocommerce'); ?></a>
					<?php if (is_user_logged_in()) : ?>
						<a href="<?php echo esc_url(wc_get_page_permalink('myaccount')); ?>" class="button pay"><?php esc_html_e('My account', 'woocommerce'); ?></a>
					<?php endif; ?>
				</p>

			<?php else : ?>

				<?php wc_get_template('checkout/order-received.php', array('order' => $order)); ?>

				<ul class="woocommerce-order-overview woocommerce-thankyou-order-details order_details">

					<li class="woocommerce-order-overview__order order">
						<?php esc_html_e('Order number:', 'woocommerce'); ?>
						<strong><?php echo $order->get_order_number(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped 
								?></strong>
					</li>

					<li class="woocommerce-order-overview__date date">
						<?php esc_html_e('Date:', 'woocommerce'); ?>
						<strong><?php echo wc_format_datetime($order->get_date_created()); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped 
								?></strong>
					</li>

					<?php if (is_user_logged_in() && $order->get_user_id() === get_current_user_id() && $order->get_billing_email()) : ?>
						<li class="woocommerce-order-overview__email email">
							<?php esc_html_e('Email:', 'woocommerce'); ?>
							<strong><?php echo $order->get_billing_email(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped 
									?></strong>
						</li>
					<?php endif; ?>

					<li class="woocommerce-order-overview__total total">
						<?php esc_html_e('Total:', 'woocommerce'); ?>
						<strong><?php echo $order->get_formatted_order_total(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped 
								?></strong>
					</li>

					<?php if ($order->get_payment_method_title()) : ?>
						<li class="woocommerce-order-overview__payment-method method">
							<?php esc_html_e('Payment method:', 'woocommerce'); ?>
							<strong><?php echo wp_kses_post($order->get_payment_method_title()); ?></strong>
						</li>
					<?php endif; ?>

				</ul>

			<?php endif; ?>

			<?php do_action('woocommerce_thankyou_' . $order->get_payment_method(), $order->get_id()); ?>
			<?php do_action('woocommerce_thankyou', $order->get_id()); ?>

		<?php else : ?>

			<?php wc_get_template('checkout/order-received.php', array('order' => false)); ?>

		<?php endif; ?>
	</div>
<?php }; ?>