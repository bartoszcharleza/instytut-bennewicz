<?php
add_filter('woocommerce_checkout_fields', 'override_checkout_fields');
function override_checkout_fields($fields)
{

    $fields['billing']['billing_first_name']['placeholder'] = 'Imię';
    $fields['shipping']['shipping_first_name']['placeholder'] = 'Imię';

    $fields['billing']['billing_company']['placeholder'] = 'Nazwa firmy (opcjonalnie)';
    $fields['billing']['billing_company']['class'] = array('form-row-wide');
    $fields['shipping']['shipping_company']['placeholder'] = 'Nazwa firmy';
    $fields['shipping']['shipping_company']['class'] = array('form-row-first');

    $fields['billing']['billing_last_name']['placeholder'] = 'Nazwisko';
    $fields['shipping']['shipping_last_name']['placeholder'] = 'Nazwisko';

    $fields['billing']['billing_email']['placeholder'] = 'Adres email';
    $fields['billing']['billing_email']['class'] = array('form-row-first');

    $fields['billing']['billing_phone']['placeholder'] = 'Numer telefonu';
    $fields['billing']['billing_phone']['class'] = array('form-row-last');

    $fields['shipping']["shipping_postcode"]['placeholder'] = 'Kod pocztowy';
    $fields['shipping']["shipping_postcode"]['class'] = array('form-row-last');
    $fields['billing']["billing_postcode"]['placeholder'] = 'Kod pocztowy';
    $fields['billing']["billing_postcode"]['class'] = array('form-row-last');

    $fields['shipping']["shipping_city"]['placeholder'] = 'Miasto';
    $fields['shipping']["shipping_city"]['class'] = array('form-row-last');
    $fields['billing']["billing_city"]['placeholder'] = 'Miasto';
    $fields['billing']["billing_city"]['class'] = array('form-row-last');

    return $fields;
}
