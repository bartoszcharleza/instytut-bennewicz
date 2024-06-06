<?php

// Moje kursy

function ws_add_my_account_my_courses_endpoint()
{
    add_rewrite_endpoint('moje-kursy', EP_ROOT | EP_PAGES);
}
add_action('init', 'ws_add_my_account_my_courses_endpoint');

function ws_add_my_account_my_courses_menu_items($items)
{
    $items['moje-kursy'] = 'Moje kursy';
    return $items;
}
add_filter('woocommerce_account_menu_items', 'ws_add_my_account_my_courses_menu_items');


// Moje Certyfikaty

function ws_add_my_account_my_certificates_endpoint()
{
    add_rewrite_endpoint('moje-certyfikaty', EP_ROOT | EP_PAGES);
}
add_action('init', 'ws_add_my_account_my_certificates_endpoint');

function ws_add_my_account_my_certificates_menu_items($items)
{
    $items['moje-certyfikaty'] = 'Moje certyfikaty';
    return $items;
}
add_filter('woocommerce_account_menu_items', 'ws_add_my_account_my_certificates_menu_items');


// Wszystkie kursy

function ws_add_my_account_all_courses_endpoint()
{
    add_rewrite_endpoint('wszystkie-kursy', EP_ROOT | EP_PAGES);
}
add_action('init', 'ws_add_my_account_all_courses_endpoint');

function ws_add_my_account_all_courses_menu_items($items)
{
    $items['wszystkie-kursy'] = 'Wszystkie kursy';
    return $items;
}
add_filter('woocommerce_account_menu_items', 'ws_add_my_account_all_courses_menu_items');
