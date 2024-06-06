<?php

function post_blog()
{
    $labels = array(
        'name' => _x('Wpisy blogowe', 'Wpisy blogowe', 'websitestyle'),
        'singular_name' => _x('Wpis blogowy', 'Wpis blogowy', 'websitestyle'),
        'add_new'               => _x('Dodaj nowy wpis blogowy', 'websitestyle'),
        'add_new_item'          => _x('Dodaj nowy wpis blogowy', 'websitestyle'),
        'new_item'              => _x('Dodaj nowy wpis blogowy', 'websitestyle'),
        'edit_item'             => _x('Edytuj wpis blogowy', 'websitestyle'),
        'view_item'             => _x('Zobacz wpis blogowy', 'websitestyle'),
        'all_items'             => _x('Wszystkie wpisy blogowe', 'websitestyle'),
        'search_items'          => _x('Szukaj wpisu blogowego', 'websitestyle'),
    );
    $args = array(
        'label' => __('Wpisy blogowe', 'websitestyle'),
        'labels' => $labels,
        'supports' => array('title', 'thumbnail', 'editor', 'category', 'author'),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 21,
        'show_in_admin_bar' => true,
        'show_in_nav_menus' => true,
        'can_export' => true,
        'has_archive' => false,
        'exclude_from_search' => false,
        'publicly_queryable' => true,
        'capability_type' => 'page',
        'query_var' => true,
        'rewrite' => array('slug' => 'blog'),
        'show_in_rest' => true,
    );
    register_post_type('wpis-blogowy', $args);
}
add_action('init', 'post_blog');


// function ws_register_post_type_course()
// {
//     $labels = array(
//         'name' => _x('Kursy', 'Kursy', 'websitestyle'),
//         'singular_name' => _x('kurs', 'kurs', 'websitestyle'),
//         'add_new'               => _x('Dodaj nowy kurs', 'websitestyle'),
//         'add_new_item'          => _x('Dodaj nowy kurs', 'websitestyle'),
//         'new_item'              => _x('Dodaj nowy kurs', 'websitestyle'),
//         'edit_item'             => _x('Edytuj kurs', 'websitestyle'),
//         'view_item'             => _x('Zobacz kurs', 'websitestyle'),
//         'all_items'             => _x('Wszystkie Kursy', 'websitestyle'),
//         'search_items'          => _x('Szukaj wpisu blogowego', 'websitestyle'),
//     );
//     $args = array(
//         'label' => __('Kursy', 'websitestyle'),
//         'labels' => $labels,
//         'supports' => array('title', 'thumbnail'),
//         'public' => true,
//         'show_ui' => true,
//         'show_in_menu' => true,
//         'menu_position' => 5,
//         'show_in_admin_bar' => true,
//         'show_in_nav_menus' => true,
//         'can_export' => true,
//         'has_archive' => false,
//         'exclude_from_search' => false,
//         'publicly_queryable' => true,
//         'capability_type' => 'page',
//         'query_var' => true,
//         'rewrite' => array('slug' => 'kurs'),
//         'show_in_rest' => false,
//     );
//     register_post_type('kurs', $args);
// }
// add_action('init', 'ws_register_post_type_course');

// function ws_register_post_type_course_application()
// {
//     $labels = array(
//         'name' => _x('Aplikacje na kursy', 'Aplikacje na kursy', 'websitestyle'),
//         'singular_name' => _x('Aplikacja na kurs', 'Aplikacja na kurs', 'websitestyle'),
//         'add_new'               => _x('Dodaj nowy kurs', 'websitestyle'),
//         'add_new_item'          => _x('Dodaj nowy kurs', 'websitestyle'),
//         'new_item'              => _x('Dodaj nowy kurs', 'websitestyle'),
//         'edit_item'             => _x('Edytuj kurs', 'websitestyle'),
//         'view_item'             => _x('Zobacz kurs', 'websitestyle'),
//         'all_items'             => _x('Wszystkie Aplikacje na kursy', 'websitestyle'),
//         'search_items'          => _x('Szukaj wpisu blogowego', 'websitestyle'),
//     );
//     $args = array(
//         'label' => __('Aplikacje na kursy', 'websitestyle'),
//         'labels' => $labels,
//         'supports' => array('title'),
//         'public' => true,
//         'show_ui' => true,
//         'show_in_menu' => true,
//         'menu_position' => 22,
//         'show_in_admin_bar' => true,
//         'show_in_nav_menus' => true,
//         'can_export' => true,
//         'has_archive' => false,
//         'exclude_from_search' => false,
//         'publicly_queryable' => true,
//         'capability_type' => 'page',
//         'query_var' => true,
//         'rewrite' => array('slug' => 'aplikacje-na-kurs'),
//         'show_in_rest' => true,
//     );
//     register_post_type('aplikacje-na-kurs', $args);
// }
// add_action('init', 'ws_register_post_type_course_application');
