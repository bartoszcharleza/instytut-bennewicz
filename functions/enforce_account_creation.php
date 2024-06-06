<?php

function filter_woocommerce_checkout_registration_required($bool_value)
{
    // Check if WC()->cart is initialized
    if (!WC()->cart) {
        return $bool_value;
    }

    $create_account_required = false;

    foreach (WC()->cart->get_cart() as $cart_item) {
        $product_id = $cart_item['product_id'];
        if (get_field('create_account', $product_id)) {
            $create_account_required = true;
            break;
        }
    }

    // Loop through cart items
    foreach (WC()->cart->get_cart() as $cart_item) {
        // Product ID from cart item in specific array
        if ($create_account_required) {
            // Registration_required
            $bool_value = true;

            // Break loop
            break;
        }
    }

    return $bool_value;
}
add_filter('woocommerce_checkout_registration_required', 'filter_woocommerce_checkout_registration_required', 10, 1);
