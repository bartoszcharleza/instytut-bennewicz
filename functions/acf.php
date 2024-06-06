<?php

/**
 * Add options page
 */
if (function_exists('acf_add_options_page')) {
    acf_add_options_page([
        'page_title' => 'Opcje globalne',
        'menu_title' => 'Opcje globalne',
        'redirect'   => false,
        'position' => '58',
    ]);
}

if (function_exists('acf_add_options_sub_page')) {
    $parent_slug = 'acf-options-opcje-globalne';

    acf_add_options_sub_page([
        'page_title'  => 'Integracje',
        'menu_title'  => 'Integracje',
        'parent_slug' => $parent_slug
    ]);

    acf_add_options_sub_page([
        'page_title'  => 'Ciasteczka',
        'menu_title'  => 'Ciasteczka',
        'parent_slug' => $parent_slug
    ]);
}

/**
 * Register google map api key
 */
function my_acf_google_map_api($api)
{
    $api['key'] = get_field('google_maps_api_key', 'options');
    return $api;
}
add_filter('acf/fields/google_map/api', 'my_acf_google_map_api');
